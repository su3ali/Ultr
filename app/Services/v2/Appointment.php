<?php

namespace App\Services\v2;

use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\ContractPackage;
use App\Models\Day;
use App\Models\Group;
use App\Models\GroupRegion;
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
    public $unavailableTimeSlots = [];

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

        // Get category ID for the first service
        $category_id = Service::where('id', $this->services[0]['id'])->first()->category_id;

        // Fetch the group available in the region for the category
        $group = Group::GroupInRegionCategory($this->region_id, [$category_id])->get();
        if ($group->isEmpty()) {
            return ['error' => 'No group available for the selected category and region.'];
        }

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
                return false;
                // return ['error' => "No booking settings found for service ID: $service_id."];
            }

            // Fetch active days for the service
            $dayStart = Day::where('is_active', 1)->where('name', $bookSetting->service_start_date)->first();
            $dayEnd = Day::where('is_active', 1)->where('name', $bookSetting->service_end_date)->first();

            if (!$dayStart || !$dayEnd) {
                return false;
                // return ['error' => 'Service start or end days not found.'];
            }

            // Fetch all active days between start and end
            $serviceDays = Day::whereBetween('id', [$dayStart->id, $dayEnd->id])
                ->where('is_active', true)
                ->pluck('name')
                ->toArray();

            $dates = [];
            $page_size = 14;
            $page_number = $this->page_number ?? 0;
            $start = $page_number * $page_size;
            $end = ($page_number + 1) * $page_size;

            // Limit the date range to the service duration
            for ($i = $start; $i < $end; $i++) {
                $date = Carbon::now('Asia/Riyadh')->addDays($i)->format('Y-m-d');
                if (in_array(Carbon::parse($date)->format('l'), $serviceDays)) {
                    $dates[] = $date;
                }
            }

            // If no dates are available, return an error
            if (empty($dates)) {
                return false;
                // return ['error' => 'No available dates for the service.'];
            }

            // For each day, fetch shifts and generate unique time slots
            foreach ($dates as $day) {
                $dayName = Carbon::parse($day)->timezone('Asia/Riyadh')->locale('en')->dayName;

                // Fetch all shifts for the specific day
                $shifts = $this->getShiftsForDay($dayName);

                if ($shifts->isEmpty()) {
                    continue; // Skip this day if no active shifts are found
                }

                // Use an array to track unique time slots
                $uniqueTimeSlots = [];

                foreach ($shifts as $shift) {
                    $shiftId = $shift->id;
                    $startTime = Carbon::parse($shift->start_time)->timezone('Asia/Riyadh');
                    $endTime = Carbon::parse($shift->end_time)->timezone('Asia/Riyadh');

                    // Generate time slots within each shift
                    $periods = CarbonInterval::minutes($bookSetting->service_duration + $bookSetting->buffering_time)
                        ->toPeriod($startTime, $endTime);

                    // Initialize the day's entry if it doesn't exist
                    if (!isset($times[$service_id]['days'][$day])) {
                        $times[$service_id]['days'][$day] = [];
                    }
                    $duration = $bookSetting->service_duration + $bookSetting->buffering_time;

                    foreach ($periods as $period) {
                        $periodStatus = $this->isSlotUnavailable($period, $service_id, $day, $amount, $bookSetting, $shiftId);
                        // Check if the slot is unavailable; if it is, skip storing this time
                        if (!$periodStatus) {
                            $formattedTime = $period->format('H:i');

                            // Store unique time slots only
                            if (!in_array($formattedTime, $uniqueTimeSlots)) {
                                $uniqueTimeSlots[] = $formattedTime;
                                $times[$service_id]['days'][$day][] = $formattedTime;
                            }
                        }
                    }

                }
            }
        }

        return $this->finalizeTimes($times);
    }

    protected function isSlotUnavailable($period, $service_id, $day, $amount, $bookSetting, $shiftId)
    {
        $shiftGroupsIds = Shift::where('id', $shiftId)->pluck('group_id')->toArray();

        $shiftGroupsIds = array_merge(...array_map(function ($jsonString) {
            return array_map('intval', json_decode($jsonString, true));
        }, $shiftGroupsIds));

        // dd($shiftGroupsIds);

        $category_id = Service::where('id', $service_id)->first()->category_id;

        // Fetch booking IDs for the given date
        $booking_ids = Booking::whereHas('category', function ($query) use ($category_id) {
            $query->where('category_id', $category_id);
        })->where('date', $day)->pluck('id')->toArray();

        // Calculate the duration including buffering time
        $duration = $bookSetting->service_duration + $bookSetting->buffering_time;
        $periodEndTime = $period->copy()->addMinutes($duration * $amount)->format('H:i:s');
        $periodStartTime = $period->format('H:i:s');

        // Fetch unavailable group IDs within the specific period
        $takenIds = Visit::where(function ($query) use ($periodStartTime, $periodEndTime) {

            $query->where('start_time', '<', $periodEndTime)
                ->where('end_time', '>', $periodStartTime);
        })

            ->activeVisits()
            ->whereIn('booking_id', $booking_ids)
            ->whereNotIn('visits_status_id', [5, 6])
            ->whereIn('assign_to_id', $shiftGroupsIds)
            ->pluck('assign_to_id')
            ->toArray();

        // dd($takenIds);

        // Fetch the specific times that are unavailable within this period
        $takenTimes = Visit::where(function ($query) use ($periodStartTime, $periodEndTime) {
            $query->where('start_time', '<', $periodEndTime)
                ->where('end_time', '>', $periodStartTime);
        })

            ->activeVisits()
            ->whereIn('booking_id', $booking_ids)
            ->whereNotIn('visits_status_id', [5, 6])
            ->whereIn('assign_to_id', $shiftGroupsIds)
            ->pluck('start_time')
            ->toArray();

        $availableShiftGroupsIds = array_diff($shiftGroupsIds, $takenIds);

        $availableShiftGroupsCount = Group::GroupInRegionCategory($this->region_id, [$category_id])
            ->whereIn('id', $availableShiftGroupsIds)
            ->count();

        // dd($takenTimes);

        foreach ($takenTimes as $takenTime) {
            $takenTime = $takenTime ? Carbon::parse($takenTime)->format('g:i A') : null;

            if (empty($availableShiftGroupsIds) && $takenTime == $period->format('H:i:s')) {
                if ($takenTime) {
                    // Check if this date and time combination already exists in unavailableTimeSlots
                    $exists = collect($this->unavailableTimeSlots)->contains(function ($slot) use ($takenTime, $day, $service_id) {
                        return $slot['time'] === $takenTime && $slot['date'] === $day && $slot['service_id'] === $service_id;
                    });

                    if (!$exists) {
                        $this->unavailableTimeSlots[] = [
                            'time' => $takenTime,
                            'date' => $day,
                            'service_id' => $service_id,
                        ];
                    }
                }
            }
        }

        return empty($availableShiftGroupsIds);
    }

    protected function finalizeTimes($times)
    {

        $finalTimes = [];
        $currentDateTime = Carbon::now('Asia/Riyadh');
        $currentDay = $currentDateTime->format('Y-m-d');

        foreach ($times as $service_id => $serviceData) {

            foreach ($serviceData['days'] as $day => $timeSlots) {

                if (!isset($finalTimes[$day])) {
                    $finalTimes[$day] = [
                        'day' => $day,
                        'dayName' => Carbon::parse($day)->translatedFormat('l'),
                        'times' => [],
                    ];
                }

                $formattedTimeSlots = [];

                if ($day === $currentDay) {
                    foreach ($timeSlots as $time) {

                        $dateTime = Carbon::parse($time, 'Asia/Riyadh');
                        if ($dateTime->greaterThan($currentDateTime->copy()->addMinutes(45))) {
                            $formattedTimeSlots[] = $dateTime->format('g:i A');
                        }
                    }
                } else {
                    $formattedTimeSlots = array_map(function ($time) {
                        return Carbon::parse($time)->format('g:i A');
                    }, $timeSlots);
                }

                // Sort the time slots in ascending order
                usort($formattedTimeSlots, function ($a, $b) {
                    return strtotime($a) - strtotime($b);
                });
                // dd($formattedTimeSlots);
                if (!empty($formattedTimeSlots)) {
                    // dd($this->unavailableTimeSlots);

                    // Filter unavailable time slots for the specific day and service
                    $filteredTimeSlots = $this->filterUnavailableSlots($formattedTimeSlots, $day, $service_id);
                    // dd($filteredTimeSlots);
                    $finalTimes[$day]['times'] = $filteredTimeSlots;
                }
            }
        }

        return array_values($finalTimes);
    }

    private function filterUnavailableSlots($timeSlots, $day, $service_id)
    {

        // dd($timeSlots);
        // dd($this->unavailableTimeSlots);
        $availableSlots = [];

        foreach ($timeSlots as $timeSlot) {
            $isAvailable = true;

            foreach ($this->unavailableTimeSlots as $unavailableSlot) {
                // $unavailableSlot = $unavailableSlot['time'];
                // $unavailableSlotService = $unavailableSlot['service_id'];
                // $unavailableSlotDate = $unavailableSlot['date'];

                // dd($unavailableSlot['time'] . ' ' . $timeSlot);

                // if ($unavailableSlot['time'] === $timeSlot) {dd("true");} else {dd("false");}

                if ($unavailableSlot['date'] === $day && $unavailableSlot['time'] === $timeSlot) {
                    // dd("true");
                    $isAvailable = false;
                    break;
                }
            }

            if ($isAvailable) {
                // dd("false");

                $availableSlots[] = $timeSlot;
            }
            // dd($availableSlots);

        }

        // Return the filtered available slots
        return $availableSlots;
    }

    // protected function finalizeTimes($times)
    // {
    //     // dd($this->unavailableTimeSlots);
    //     $finalTimes = [];
    //     $currentDateTime = Carbon::now('Asia/Riyadh');
    //     $currentDay = $currentDateTime->format('Y-m-d');

    //     foreach ($times as $service_id => $serviceData) {
    //         foreach ($serviceData['days'] as $day => $timeSlots) {
    //             if (!isset($finalTimes[$day])) {
    //                 $finalTimes[$day] = [
    //                     'day' => $day,
    //                     'dayName' => Carbon::parse($day)->translatedFormat('l'),
    //                     'times' => [],
    //                 ];
    //             }

    //             $formattedTimeSlots = [];

    //             if ($day === $currentDay) {
    //                 foreach ($timeSlots as $time) {
    //                     $dateTime = Carbon::parse($time, 'Asia/Riyadh');
    //                     if ($dateTime->greaterThan($currentDateTime->copy()->addMinutes(45))) {
    //                         $formattedTimeSlots[] = $dateTime->format('g:i A');
    //                     }
    //                 }
    //             } else {
    //                 $formattedTimeSlots = array_map(function ($time) {
    //                     return Carbon::parse($time)->format('g:i A');
    //                 }, $timeSlots);
    //             }

    //             // Sort the time slots in ascending order
    //             usort($formattedTimeSlots, function ($a, $b) {
    //                 return strtotime($a) - strtotime($b);
    //             });

    //             if (!empty($formattedTimeSlots)) {
    //                 $finalTimes[$day]['times'] = $formattedTimeSlots;
    //             }
    //         }
    //     }

    //     return array_values($finalTimes);
    // }

    // protected function finalizeTimes($times)
    // {
    //     $finalTimes = [];
    //     $currentDateTime = Carbon::now('Asia/Riyadh');
    //     $currentDay = $currentDateTime->format('Y-m-d');

    //     foreach ($times as $service_id => $serviceData) {
    //         foreach ($serviceData['days'] as $day => $timeSlots) {
    //             if (!isset($finalTimes[$day])) {
    //                 $finalTimes[$day] = [
    //                     'day' => $day,
    //                     'dayName' => Carbon::parse($day)->translatedFormat('l'),
    //                     'times' => [],
    //                 ];
    //             }

    //             $formattedTimeSlots = [];

    //             if ($day === $currentDay) {
    //                 foreach ($timeSlots as $time) {
    //                     $dateTime = Carbon::parse($time, 'Asia/Riyadh');
    //                     if ($dateTime->greaterThan($currentDateTime->copy()->addMinutes(45))) {
    //                         $formattedTimeSlots[] = $dateTime->format('g:i A');
    //                     }
    //                 }
    //             } else {
    //                 $formattedTimeSlots = array_map(function ($time) {
    //                     return Carbon::parse($time)->format('g:i A');
    //                 }, $timeSlots);
    //             }

    //             if (!empty($formattedTimeSlots)) {
    //                 $finalTimes[$day]['times'] = $formattedTimeSlots;
    //             }
    //         }
    //     }

    //     return array_values($finalTimes);
    // }

    protected function getShiftsForDay($day)
    {
        $servicesCollection = collect($this->services);
        $ids = $servicesCollection->pluck('id');
        $service_ids = $ids->toArray();

        $dayModel = Day::where('name', $day)->where('is_active', true)->first();
        if (!$dayModel) {
            return collect();
        }

        $region_id = $this->region_id;

        $groupIds = GroupRegion::where('region_id', $region_id)->pluck('group_id')->toArray();

        $dayId = (string) $dayModel->id;

        // return Shift::where(function ($query) use ($groupIds) {
        //     foreach ($groupIds as $groupId) {

        //         $query->orWhereJsonContains('group_id', $groupId)
        //             ->orWhereJsonContains('group_id', (string) $groupId);
        //     }
        // })
        //     ->where(function ($query) use ($dayId) {
        //         $query->orWhereJsonContains('day_id', (string) $dayId)
        //             ->orWhereJsonContains('day_id', (int) $dayId);
        //     })
        //     ->where(function ($query) use ($service_ids) {
        //         foreach ($service_ids as $serviceId) {

        //             $query->orWhereJsonContains('service_id', (int) $serviceId)
        //                 ->orWhereJsonContains('service_id', (string) $serviceId);
        //         }
        //     })
        //     ->where('is_active', true)
        //     ->get();

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
        // Check for different time ranges

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
        if (!isset($times[$service_id]['days'][$day])) {
            return; // Early exit if no times are set for this day
        }

        // Gather all time slots for the day from the times array
        $timeSlots = $times[$service_id]['days'][$day];

        // Initialize an array to collect unavailable slots
        $unavailableSlots = [];

        foreach ($timeSlots as $key => $timeSlot) {
            $formattedTime = $timeSlot->format('H:i:s');
            $duration = $bookSetting->service_duration + $bookSetting->buffering_time;

            // Fetch visits that overlap with this time slot
            $takenIds = Visit::where('start_time', '<', $timeSlot->copy()->addMinutes($duration * $amount)->format('H:i:s'))
                ->where('end_time', '>', $formattedTime)
                ->activeVisits()
                ->whereIn('booking_id', $booking_ids)
                ->whereNotIn('visits_status_id', [5, 6])
                ->whereIn('assign_to_id', $activeGroups)
                ->pluck('assign_to_id')
                ->toArray();

            // $availableGroupIds = array_diff($activeGroups, $takenIds);
            // $availableGroupsCount = Group::GroupInRegionCategory($this->region_id, [$category_id])
            //     ->whereIn('id', $availableGroupIds)
            //     ->count();
            // dd($availableGroupIds);
            // if ($availableGroupIds == 0) {
            //     return true;
            // } else {
            //     return false;
            // }

        }

        //     // If there are overlapping visits, mark the slot as unavailable
        //     if (!empty($takenIds)) {
        //         $unavailableSlots[] = $timeSlot; // Add to the unavailable slots array
        //     }
        // }

        // // Filter out the unavailable time slots
        // $times[$service_id]['days'][$day] = array_values(
        //     array_filter($timeSlots, function ($timeSlot) use ($unavailableSlots) {
        //         dd(in_array($timeSlot, $unavailableSlots));
        //         return !in_array($timeSlot, $unavailableSlots);

        //     })
        // );

    }

}
