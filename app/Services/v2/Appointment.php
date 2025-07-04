<?php
namespace App\Services\v2;

use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\Day;
use App\Models\Group;
use App\Models\GroupRegion;
use App\Models\Service;
use App\Models\Shift;
use App\Models\Technician;
use App\Models\Visit;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class Appointment
{
    public $region_id;
    public $services;
    public $package_id;
    public $page_number;
    public $unavailableTimeSlots = [];
    public $daysOfWeek           = [
        ['id' => 1, 'name' => 'Saturday'],
        ['id' => 2, 'name' => 'Sunday'],
        ['id' => 3, 'name' => 'Monday'],
        ['id' => 4, 'name' => 'Tuesday'],
        ['id' => 5, 'name' => 'Wednesday'],
        ['id' => 6, 'name' => 'Thursday'],
        ['id' => 7, 'name' => 'Friday'],
    ];

    public function __construct($region_id, $services, $package_id, $page_number)
    {
        $this->region_id   = $region_id;
        $this->services    = $services;
        $this->package_id  = $package_id;
        $this->page_number = $page_number;
    }

    public function getAvailableTimesFromDate()
    {

        $servicesCollection = collect($this->services);
        $service_ids        = $servicesCollection->pluck('id')->toArray();

        $times = [];

        foreach ($this->services as $service) {
            $amount                       = $service['amount'];
            $service_id                   = $service['id'];
            $times[$service_id]['amount'] = $amount;
            $times[$service_id]['days']   = []; // Initialize days for each service

            $bookSetting = BookingSetting::where('service_id', $service_id)->first();

            if (! $bookSetting) {
                continue;
            }

            // Get $dayStart and $dayEnd without checking is_active
            $dayStart = Day::where('name', $bookSetting->service_start_date)->first();
            $dayEnd   = Day::where('name', $bookSetting->service_end_date)->first();

            // If either $dayStart or $dayEnd is not found, skip this iteration
            if (! $dayStart || ! $dayEnd) {
                continue;
            }

            // Retrieve only active days within the specified range
            $serviceDays = Day::whereBetween('id', [$dayStart->id, $dayEnd->id])
                ->where('is_active', 1) // Filter for active days only
                ->pluck('name')
                ->toArray();

            // dd($serviceDays);

            // Generate dates for this specific service
            $dates       = [];
            $page_size   = 14;
            $page_number = $this->page_number ?? 0;
            $start       = $page_number * $page_size;
            $end         = ($page_number + 1) * $page_size;

            for ($i = $start; $i < $end; $i++) {
                $date = Carbon::now('Asia/Riyadh')->addDays($i)->format('Y-m-d');
                if (in_array(Carbon::parse($date)->format('l'), $serviceDays)) {
                    $dates[] = $date;
                }
            }

            if (empty($dates)) {
                continue;
            }

            // Process each date for the current service
            foreach ($dates as $day) {
                $dayName = Carbon::parse($day)->timezone('Asia/Riyadh')->locale('en')->dayName;
                $shifts  = $this->getShiftsForDay($dayName);

                if ($shifts->isEmpty()) {
                    continue;
                }

                // Use a new uniqueTimeSlots array for each service to prevent time overlap
                $uniqueTimeSlots = [];

                foreach ($shifts as $shift) {
                    $shiftId   = $shift->id;
                    $startTime = Carbon::parse($shift->start_time)->timezone('Asia/Riyadh');
                    $endTime   = Carbon::parse($shift->end_time)->timezone('Asia/Riyadh');

                    $periods = CarbonInterval::minutes($bookSetting->service_duration + $bookSetting->buffering_time)
                        ->toPeriod($startTime, $endTime);

                    // Ensure the day array is set for this specific service and date
                    if (! isset($times[$service_id]['days'][$day])) {
                        $times[$service_id]['days'][$day] = [];
                    }

                    foreach ($periods as $period) {
                        $periodStatus = $this->isSlotUnavailable($period, $service_id, $day, $amount, $bookSetting, $shiftId);

                        if (! $periodStatus) {
                            $formattedTime = $period->format('H:i');

                            if (! in_array($formattedTime, $uniqueTimeSlots)) {
                                $uniqueTimeSlots[] = $formattedTime;
                                // Store time with all necessary details for each service, shift, and date
                                $times[$service_id]['days'][$day][] = [
                                    'time'       => $formattedTime,
                                    'shift_id'   => $shiftId,
                                    'service_id' => $service_id,
                                    'amount'     => $amount,
                                ];
                            }
                        }
                    }
                }
            }
        }

        return $this->finalizeTimes($times);
    }

    protected function finalizeTimes($times)
    {
        $finalTimes      = [];
        $currentDateTime = Carbon::now('Asia/Riyadh');
        $currentDay      = $currentDateTime->format('Y-m-d');
        $currentTime     = $currentDateTime->format('H:i'); // Get current time for comparison

        foreach ($times as $service_id => $serviceData) {
            foreach ($serviceData['days'] as $day => $timeSlots) {
                if (! isset($finalTimes[$day])) {
                    $finalTimes[$day] = [
                        'day'     => $day,
                        'dayName' => Carbon::parse($day)->translatedFormat('l'),
                        'times'   => [],
                    ];
                }

                $formattedTimeSlots = [];

                // Filter out expired times for the current day
                if ($day === $currentDay) {
                    foreach ($timeSlots as $time) {
                        $store_time = $time['time'];
                        $dateTime   = Carbon::parse($store_time, 'Asia/Riyadh');

                        // Only keep future times and not deprecated (expired) ones
                        if ($dateTime->greaterThan($currentDateTime->copy()->addMinutes(45))) {
                            $formattedTimeSlots[] = [
                                'time'       => Carbon::parse($store_time)->format('H:i'), // Store in 24-hour format for sorting
                                'shift_id'   => $time['shift_id'],
                                'service_id' => $service_id, // Add service_id
                            ];
                        }
                    }
                } else {
                    foreach ($timeSlots as $time) {
                        $formattedTimeSlots[] = [
                            'time'       => Carbon::parse($time['time'])->format('H:i'), // Store in 24-hour format for sorting
                            'shift_id'   => $time['shift_id'],
                            'service_id' => $service_id, // Add service_id
                        ];
                    }
                }

                // Remove duplicates based on time only (ignore shift_id and service_id)
                $uniqueTimeSlots = [];
                $seenTimes       = []; // To track already added times per day

                foreach ($formattedTimeSlots as $slot) {
                    if (! isset($seenTimes[$slot['time']])) {
                        $seenTimes[$slot['time']] = true;
                        $uniqueTimeSlots[]        = $slot;
                    }
                }

                // Sort the unique time slots by time (24-hour format)
                usort($uniqueTimeSlots, function ($a, $b) {
                    return strcmp($a['time'], $b['time']);
                });

                // Group time slots by shift_id
                $groupedByShift = [];
                foreach ($uniqueTimeSlots as $slot) {
                    $groupedByShift[$slot['shift_id']][] = $slot;
                }

                // For each shift, calculate total slots and filter time slots
                foreach ($groupedByShift as $shift_id => $shiftSlots) {
                    $totalSlots        = count($shiftSlots);
                    $requestedQuantity = 1;

                    foreach ($this->services as $service) {
                        if ($service['amount'] > $requestedQuantity) {
                            $requestedQuantity = $service['amount'];
                        }
                    }

                    $availableTimeSlots = [];

                    if ($requestedQuantity <= $totalSlots) {
                        // Calculate how many slots we need to keep
                        $slotsToKeep        = $totalSlots - ($requestedQuantity - 1);
                        $availableTimeSlots = array_slice($shiftSlots, 0, $slotsToKeep);
                    }
                    //  else {
                    //     // If there are not enough slots for the requested quantity, show all available slots
                    //     $availableTimeSlots = $shiftSlots;
                    // }

                    // Apply unavailable time filtering
                    $filteredTimeSlots = $this->filterUnavailableSlots($availableTimeSlots, $day, $service_id);

                    // dd($filteredTimeSlots);

                    // Add filtered time slots for the shift if they aren't already present
                    if (! empty($filteredTimeSlots)) {
                        foreach ($filteredTimeSlots as $slot) {
                            // Check if this time already exists for the day
                            $timeExists = false;
                            foreach ($finalTimes[$day]['times'] as $existingSlot) {
                                if ($existingSlot['time'] === $slot['time']) {
                                    $timeExists = true;
                                    break;
                                }
                            }

                            // Only merge if the time is not already present
                            if (! $timeExists) {
                                $finalTimes[$day]['times'][] = [
                                    'time'       => $slot['time'], // Store in 24-hour format for sorting
                                    'shift_id'   => $slot['shift_id'],
                                    'service_id' => $slot['service_id'], // Ensure service_id is included
                                ];
                            }

                            // dd($finalTimes);
                        }
                    }
                }
            }
        }

        // Sort times for each day
        foreach ($finalTimes as $day => $data) {
            usort($finalTimes[$day]['times'], function ($a, $b) {
                return strcmp($a['time'], $b['time']);
            });

            // Convert times to 12-hour format after sorting
            foreach ($finalTimes[$day]['times'] as &$timeSlot) {
                $timeSlot['time'] = Carbon::parse($timeSlot['time'])->format('g:i A'); // Convert to 12-hour format
            }
        }

        return array_values($finalTimes);
    }

    

    protected function isSlotUnavailable($period, $service_id, $day, $amount, $bookSetting, $shiftId)
    {
        $shiftGroupsJson = Shift::where('id', $shiftId)
            ->where('is_active', 1)
            ->pluck('group_id')
            ->toArray();

        $shiftGroupIds = array_merge(...array_map(function ($json) {
            return array_map('intval', json_decode($json, true));
        }, $shiftGroupsJson));

        $dayName = Carbon::parse($day)->format('l');
        $dayId   = collect($this->daysOfWeek)->firstWhere('name', $dayName)['id'];

        $region_id = $this->region_id;

        $validGroupIds = Group::where('active', 1)
            ->whereIn('id', $shiftGroupIds)
            ->whereHas('regions', fn($q) => $q->where('region_id', $region_id))
            ->pluck('id')
            ->toArray();

        // dd($validGroupIds);

        $technicians = Technician::whereIn('group_id', $validGroupIds)
            ->whereHas('workingDays', fn($q) => $q->where('day_id', $dayId))
            ->get();

        $periodStart = Carbon::parse("$day {$period->format('H:i:s')}", 'Asia/Riyadh');
        $duration    = $bookSetting->service_duration + $bookSetting->buffering_time;
        $periodEnd   = $periodStart->copy()->addMinutes($duration * $amount);

        foreach ($technicians as $tech) {
            $visits = Visit::where('assign_to_id', $tech->group_id)
                ->whereHas('booking', fn($q) => $q->where('date', $day))
                ->whereNotIn('visits_status_id', [5, 6])
                ->get();

            $hasOverlap = false;

            foreach ($visits as $visit) {
                $visitStart = Carbon::parse("$day {$visit->start_time}", 'Asia/Riyadh');
                $visitEnd   = Carbon::parse("$day {$visit->end_time}", 'Asia/Riyadh');

                if ($visitEnd->lessThanOrEqualTo($visitStart)) {
                    $visitEnd->addDay();
                }

                if ($visitStart->lt($periodEnd) && $visitEnd->gt($periodStart)) {
                    $hasOverlap = true;
                    break;
                }
            }

            if (! $hasOverlap) {
                return false; //  Slot is available
            }
        }

        //  all busy
        $takenTime = $periodStart->format('g:i A');

        $exists = collect($this->unavailableTimeSlots)->contains(function ($slot) use ($takenTime, $day, $service_id, $shiftId) {
            return $slot['time'] === $takenTime &&
                $slot['date'] === $day &&
                $slot['service_id'] === $service_id &&
                $slot['shift_id'] === $shiftId;
        });

        if (! $exists) {
            $this->unavailableTimeSlots[] = [
                'time'       => $takenTime,
                'date'       => $day,
                'service_id' => $service_id,
                'shift_id'   => $shiftId,
            ];
        }

        return true;
    }

    private function filterUnavailableSlots($timeSlots, $day, $service_id)
    {

        $availableSlots = [];

        // dd($timeSlots);

        foreach ($timeSlots as $timeSlot) {
            $isAvailable = true;

            // dd($this->unavailableTimeSlots);

            foreach ($this->unavailableTimeSlots as $unavailableSlot) {
                if (
                    $unavailableSlot['date'] === $day &&
                    $unavailableSlot['time'] === $timeSlot['time'] &&
                    $unavailableSlot['service_id'] === $service_id &&
                    $unavailableSlot['shift_id'] === $timeSlot['shift_id']
                ) {
                    $isAvailable = false;
                    break;
                }
            }

            if ($isAvailable) {
                $availableSlots[] = $timeSlot;
            }
        }
        // dd($availableSlots);

        // dd($this->unavailableTimeSlots);

        // Return the filtered available slots
        return $availableSlots;
    }

    protected function getShiftsForDay($day)
    {
        $servicesCollection = collect($this->services);
        $ids                = $servicesCollection->pluck('id');
        $service_ids        = $ids->toArray();

        $dayModel = Day::where('name', $day)->where('is_active', true)->first();
        if (! $dayModel) {
            return collect();
        }

        $region_id = $this->region_id;

        $groupIds = GroupRegion::where('region_id', $region_id)->pluck('group_id')->toArray();

        $dayId = (string) $dayModel->id;

        return Shift::where(function ($query) use ($groupIds, $dayId, $service_ids) {
            // Filter by same groups
            $query->where(function ($subQuery) use ($groupIds) {
                foreach ($groupIds as $groupId) {
                    $subQuery->orWhereJsonContains('group_id', $groupId)
                        ->orWhereJsonContains('group_id', (string) $groupId);
                }
            })
            // Filter by same days
                ->where(function ($subQuery) use ($dayId) {
                    $subQuery->orWhereJsonContains('day_id', (string) $dayId)
                        ->orWhereJsonContains('day_id', (int) $dayId);
                })
            // Filter by same services
                ->where(function ($subQuery) use ($service_ids) {
                    foreach ($service_ids as $serviceId) {
                        $subQuery->orWhereJsonContains('service_id', (int) $serviceId)
                            ->orWhereJsonContains('service_id', (string) $serviceId);
                    }
                })
            // Ensure the shifts are active
                ->where('is_active', true);
        })

            ->get();

    }

    protected function adjustTimesForVisits(&$times, $service_id, $day, $amount, $bookSetting)
    {
        // Fetch the category ID of the service
        $category_id = Service::where('id', $service_id)->first()->category_id;

        // Get all booking IDs for that day
        $booking_ids = Booking::whereHas('category', function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        })->where('date', $day)->pluck('id')->toArray();

        // Get active groups for the service's category
        $activeGroups = Group::GroupInRegionCategory($this->region_id, [$category_id])
            ->where('active', 1)
            ->pluck('id')
            ->toArray();

        // Ensure the times array has the right structure
        if (! isset($times[$service_id]['days'][$day])) {
            return; // Early exit if no times are set for this day
        }

        // Gather all time slots for the day from the times array
        $timeSlots = $times[$service_id]['days'][$day];

        // Initialize an array to collect unavailable slots
        $unavailableSlots = [];

        foreach ($timeSlots as $key => $timeSlot) {
            $formattedTime = $timeSlot->format('H:i:s');
            $duration      = $bookSetting->service_duration + $bookSetting->buffering_time;

            // Fetch visits that overlap with this time slot
            $takenIds = Visit::where('start_time', '<', $timeSlot->copy()->addMinutes($duration * $amount)->format('H:i:s'))
                ->where('end_time', '>', $formattedTime)
                ->activeVisits()
                ->whereIn('booking_id', $booking_ids)
                ->whereNotIn('visits_status_id', [5, 6])
                ->whereIn('assign_to_id', $activeGroups)
                ->pluck('assign_to_id')
                ->toArray();

        }

    }

}
