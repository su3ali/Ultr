<?php

namespace App\Services\v2;

use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\Day;
use App\Models\Group;
use App\Models\Service;
use App\Models\Shift;
use App\Models\Visit;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class Appointment
{
    public $region_id;
    public $services;
    public $package_id;
    public $page_number;

    public function __construct($region_id, $services, $package_id, $page_number)
    {
        $this->region_id = $region_id;
        $this->services = $services;
        $this->package_id = $package_id;
        $this->page_number = $page_number;
    }

    public function getAvailableTimesFromDate()
    {

        $servicesCollection = collect($this->services);
        $ids = $servicesCollection->pluck('id');
        $service_ids = $ids->toArray();
        // dd($service_ids);

        $category_id = Service::where('id', $this->services[0]['id'])->first()->category_id;

        // Fetch the group available in the region for the category
        $group = Group::GroupInRegionCategory($this->region_id, [$category_id])->get();
        if ($group->isEmpty()) {
            return ['error' => 'No group available for the selected category and region.'];
        }
        // dd($group);

        // Determine the time duration for the appointment
        $timeDuration = 60; // Default duration
        if ($this->package_id != 0) {
            $contract = ContractPackage::where('id', $this->package_id)->first();
            $timeDuration = $contract ? $contract->time * 30 : 60; // Validate contract and multiply by 30 minutes
        }

        $times = [];
        foreach ($this->services as $service) {
            $amount = $service['amount'];
            $service_id = $service['id'];
            $times[$service_id]['amount'] = $amount;

            // Initialize days key
            $times[$service_id]['days'] = [];

            // Fetch booking settings for the service in the region
            $bookSetting = BookingSetting::whereHas('regions', function ($q) {
                $q->where('region_id', $this->region_id);
            })->where('service_id', $service_id)->first();

            if (!$bookSetting) {
                return ['error' => "No booking settings found for service ID: $service_id."];
            }

            // Fetch active days for the service
            $dayStart = Day::where('is_active', 1)->where('name', $bookSetting->service_start_date)->first();
            $dayEnd = Day::where('is_active', 1)->where('name', $bookSetting->service_end_date)->first();

            if (!$dayStart || !$dayEnd) {
                return ['error' => 'Service start or end days not found.'];
            }

            // Fetch all active days between start and end
            $serviceDays = Day::whereBetween('id', [$dayStart->id, $dayEnd->id])
                ->where('is_active', true)
                ->get();

            $dates = [];
            $page_size = 14;
            $page_number = $this->page_number ?? 0;
            $start = $page_number * $page_size;
            $end = ($page_number + 1) * $page_size;

            // Limit the date range to the service duration
            for ($i = $start; $i < $end; $i++) {
                $date = Carbon::now('Asia/Riyadh')->addDays($i)->format('Y-m-d');
                if (in_array(Carbon::parse($date)->format('l'), $serviceDays->pluck('name')->toArray())) {
                    $dates[] = $date;
                }
            }

            // If no dates are available, return an error
            if (empty($dates)) {
                return ['error' => 'No available dates for the service.'];
            }

            // For each day, fetch shifts and generate time slots
            foreach ($dates as $day) {
                $dayName = Carbon::parse($day)->timezone('Asia/Riyadh')->locale('en')->dayName;
                // Fetch the shifts for the specific day
                $shifts = $this->getShiftsForDay($dayName);

                if ($shifts->isEmpty()) {
                    continue; // Skip this day if no active shifts are found
                }

                foreach ($shifts as $shift) {
                    $startTime = Carbon::parse($shift->start_time)->timezone('Asia/Riyadh')->locale(app()->getLocale());
                    $endTime = Carbon::parse($shift->end_time)->timezone('Asia/Riyadh')->locale(app()->getLocale());

                    // Generate time slots within each shift
                    $periods = CarbonInterval::minutes($bookSetting->service_duration + $bookSetting->buffering_time)
                        ->toPeriod($startTime, $endTime);

                    $times[$service_id]['days'][$day] = iterator_to_array($periods);

                    // Adjust time slots based on already booked visits
                    $this->adjustTimesForVisits($times, $service_id, $day, $amount, $bookSetting);
                }
            }
        }
        return $this->finalizeTimes($times);
    }

    protected function getShiftsForDay($day)
    {

        // Fetch the active shifts for the day
        $dayModel = Day::where('name', $day)->where('is_active', true)->first();
        if (!$dayModel) {
            return collect(); // Return an empty collection if no active day is found
        }

        return Shift::
            whereJsonContains('day_id', $dayModel->id)
            ->where('is_active', true)
            ->get();

    }

    protected function adjustTimesForVisits(&$times, $service_id, $day, $amount, $bookSetting)
    {
        // Fetch category id and booking data
        $category_id = Service::where('id', $service_id)->first()->category_id;
        $booking_ids = Booking::whereHas('category', function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        })->where('date', $day)->pluck('id')->toArray();

        $activeGroups = Group::GroupInRegionCategory($this->region_id, [$category_id])->where('active', 1)->pluck('id')->toArray();
        $timeSlots = $times[$service_id]['days'][$day];

        // $timeSlots = iterator_to_array($times[$service_id]['days'][$day]);
        $times[$service_id]['days'][$day] = $timeSlots;

        foreach ($timeSlots as $key => $timeSlot) {
            $formattedTime = $timeSlot->format('H:i:s');

            $duration = $bookSetting->service_duration + $bookSetting->buffering_time;

            // Fetch visits that overlap with this time slot
            $takenIds = Visit::where('start_time', '<', $timeSlot->copy()->addMinutes($duration * $amount)->format('H:i:s'))
                ->where('end_time', '>', $formattedTime)
                ->activeVisits()
                ->whereIn('booking_id', $booking_ids)
                ->whereIn('assign_to_id', $activeGroups)
                ->pluck('assign_to_id')
                ->toArray();

            if (!empty($takenIds)) {
                // Check if there are any available groups not already booked for this slot
                $availableGroups = Group::groupInRegionCategory($this->region_id, [$category_id])
                    ->whereNotIn('id', $takenIds)
                    ->pluck('id')
                    ->toArray();

                if (empty($availableGroups)) {
                    // Remove the unavailable time slot
                    $times[$service_id]['days'][$day][$key] = null;
                }
            }
        }

        // Remove null values from the time slots
        $times[$service_id]['days'][$day] = array_values(array_filter($times[$service_id]['days'][$day]));
    }

    protected function finalizeTimes($times)
    {
        $finalTimes = [];
        $currentDay = Carbon::now('Asia/Riyadh')->format('Y-m-d'); // Get the current day in the correct format

        foreach ($times as $service_id => $serviceData) {
            foreach ($serviceData['days'] as $day => $timeSlots) {
                // Skip if the day is today
                if ($day === $currentDay) {
                    continue; // Skip this iteration if the day is today
                }

                // Format the time slots
                $formattedTimeSlots = array_map(function ($time) {
                    return Carbon::parse($time)->format('g:i A'); // e.g., "6:00 PM"
                }, $timeSlots); // Apply formatting to each time slot

                // Only add if there are formatted time slots
                if (!empty($formattedTimeSlots)) {
                    // Set the locale for Carbon based on app locale
                    $locale = app()->getLocale();
                    Carbon::setLocale($locale); // Set Carbon's locale

                    $dayName = Carbon::parse($day)
                        ->timezone('Asia/Riyadh')
                        ->translatedFormat('l'); // Use translatedFormat for locale-aware day name

                    // Check if the day is already in the finalTimes array
                    if (!isset($finalTimes[$day])) {
                        // If not, initialize it
                        $finalTimes[$day] = [
                            'day' => $day,
                            'dayName' => $dayName,
                            'times' => $formattedTimeSlots, // Use formatted time slots here
                        ];
                    } else {
                        // If it exists, merge the time slots
                        $finalTimes[$day]['times'] = array_merge($finalTimes[$day]['times'], $formattedTimeSlots);
                    }
                }
            }
        }

        // Resetting the array keys to be sequential
        $finalTimes = array_values($finalTimes);

        return $finalTimes;
    }

}
