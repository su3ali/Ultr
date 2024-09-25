<?php

namespace App\Services;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\CategoryGroup;
use App\Models\ContractPackage;
use App\Models\Group;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Visit;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class Appointment
{
    public $days = [0 => 'Saturday', 1 => 'Sunday', 2 => 'Monday', 3 => 'Tuesday', 4 => 'Wednesday', 5 => 'Thursday', 6 => 'Friday'];

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

        $services_ids = $ids->toArray();

        $category_id = Service::where('id', $this->services[0]['id'])->first()->category_id;

        $group = Group::GroupInRegionCategory($this->region_id, [$category_id])->get();

        if ($group->isEmpty()) {
            return false;
        }

        $timeDuration = 60;
        if ($this->package_id != 0) {
            $contract = ContractPackage::where('id', $this->package_id)->first();
            $timeDuration = $contract->time * 30;
        }

        $times = [];
        foreach ($this->services as $service) {
            $amount = $service['amount'];
            $service_id = $service['id'];
            $times[$service_id]['amount'] = $amount;
            $bookSetting = BookingSetting::whereHas('regions', function ($q) {
                $q->where('region_id', $this->region_id);
            })->where('service_id', $service_id)->first();

            if (!$bookSetting) {
                return false;
            }

            $dayStartIndex = array_search($bookSetting->service_start_date, $this->days);
            $dayEndIndex = array_search($bookSetting->service_end_date, $this->days);
            $serviceDays = [];
            for ($i = $dayStartIndex; $i <= $dayEndIndex; $i++) {
                $serviceDays[] = $this->days[$i];
            }
            $dates = [];
            $page_size = 14;
            $page_number = 0;
            if ($this->page_number) {
                $page_number = $this->page_number;
            }
            $start = $page_number * $page_size;
            $end = ($page_number + 1) * $page_size;
            if ($start >= $timeDuration) {
                $start = $timeDuration;
            }
            if ($end >= $timeDuration) {
                $end = $timeDuration;
            }
            for ($i = $start; $i < $end; $i++) {
                $date = Carbon::now('Asia/Riyadh')->addDays($i)->format('Y-m-d');
                if (in_array(Carbon::parse($date)->timezone('Asia/Riyadh')->format('l'), $serviceDays)) {
                    $dates[] = $date;
                }
            }
            if ($bookSetting) {
                foreach ($dates as $day) {
                    $dayName = Carbon::parse($day)->timezone('Asia/Riyadh')->locale('en')->dayName;
                    $get_time = $this->getTime($dayName, $bookSetting);
                    if ($get_time == true) {
                        $times[$service_id]['days'][$day] = CarbonInterval::minutes($bookSetting->service_duration)
                            ->toPeriod(
                                Carbon::now('Asia/Riyadh')->setTimeFrom($bookSetting->service_start_time ?? Carbon::now('Asia/Riyadh')->startOfDay()),
                                Carbon::now('Asia/Riyadh')->setTimeFrom($bookSetting->service_end_time ?? Carbon::now('Asia/Riyadh')->endOfDay())
                            );
                        // bring the service buffuring for the service that ends at this time and add it to to times 
                        $activeGroups = Group::where('active', 1)->pluck('id')->toArray();
                        $booking_id = Booking::whereHas('category', function ($qu) use ($category_id) {
                            $qu->where('category_id', $category_id);
                        })->where('date', $day)->pluck('id')->toArray();
                        $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();

                        $timesArray = iterator_to_array($times[$service_id]['days'][$day]);
                        $times[$service_id]['days'][$day] = $timesArray;
                        $endTimeWithBuffer = [];

                        foreach ($times[$service_id]['days'][$day] as $key => $time) {
                            if ($times[$service_id]['days'][$day][$key]) {
                                $formattedTime = $time->format('H:i:s');
                                $allowedDuration = Carbon::parse($bookSetting->service_start_time)
                                    ->diffInMinutes(Carbon::parse($bookSetting->service_end_time));

                                $duration = min($bookSetting->service_duration, $allowedDuration);

                                $takenIds =
                                    Visit::where('start_time', '<', $time->copy()->addMinutes(($duration + $bookSetting->buffering_time) * $amount)->format('H:i:s'))
                                        ->where('end_time', '>', $formattedTime)
                                        ->activeVisits()->whereIn('booking_id', $booking_id)
                                        ->whereIn('assign_to_id', $activeGroups)->pluck('assign_to_id')->toArray();


                                if (!empty($takenIds)) {
                                    $availableGroups = Group::groupInRegionCategory($this->region_id, [$category_id])
                                        ->whereNotIn('id', $takenIds)
                                        ->pluck('id')->toArray();

                                    if (empty($availableGroups)) {
                                        $times[$service_id]['days'][$day][$key] = null;
                                        continue;
                                    }
                                }

                                $endTimeWithBuffer = [];
                                $diffCalculated = false;

                                $alreadyTakenVisits =
                                    Visit::where('start_time', '<', $time->copy()->addMinutes(($bookSetting->service_duration + $bookSetting->buffering_time) * $amount)->format('H:i:s'))
                                        ->where('end_time', '<=', $formattedTime)  // Initial end_time filter
                                        ->activeVisits()
                                        ->whereIn('booking_id', $booking_id)
                                        ->whereIn('assign_to_id', $activeGroups)
                                        ->get()
                                        ->filter(function ($visit) use ($time) {
                                            $bufferingTime = $visit->booking->service->BookingSetting->buffering_time;
                                            $adjustedEndTime = Carbon::parse($visit->end_time)->addMinutes($bufferingTime);
                                            return $adjustedEndTime->greaterThan($time);
                                        });

                                if (!$alreadyTakenVisits->isEmpty()) {
                                    foreach ($alreadyTakenVisits as $alreadyTakenVisit) {
                                        $buffering_time = $alreadyTakenVisit->booking->service->BookingSetting->buffering_time;
                                        $endTimeWithBuffer[] = Carbon::parse($alreadyTakenVisit->end_time)->addMinutes($buffering_time);
                                    }
                                    $min = min($endTimeWithBuffer);
                                    $bufferTime = $time->copy()->diffInMinutes($min);
                                    $diffCalculated = true;
                                }

                                $addedBuffer = ['diffCalculated' => $diffCalculated, 'bufferTime' => $bufferTime ?? null];
                                if ($addedBuffer['diffCalculated']) {
                                    $bufferTime = $addedBuffer['bufferTime'];
                                    array_walk($times[$service_id]['days'][$day], function (&$subTime, $subKey) use ($key, $bufferTime) {
                                        if ($subKey >= $key && $subTime) {
                                            $subTime = $subTime->copy()->addMinutes($bufferTime);
                                        }
                                    });
                                }
                            }
                        }
                    }
                }
            }
        }
        // Store times for each service
        $timesForEachService = [];

        foreach ($times as $service_id => $service) {
            $amount = $service['amount'];
            $timesInDays = $service['days'];

            $category_id = Service::where('id', $service_id)->first()->category_id;
            $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();


            foreach ($timesInDays as $day => $time) {
                $times = $time;
                $subTimes['day'] = $day;
                $subTimes['dayName'] = Carbon::parse($day)->timezone('Asia/Riyadh')->locale(app()->getLocale())->dayName;
                $subTimes['times'] = collect($times)->map(function ($time) use ($bookSetting, $day) {

                    if ($time) {
                        $now = Carbon::now('Asia/Riyadh')->format('H:i:s');
                        $convertNowTimestamp = Carbon::parse($now)->timezone('Asia/Riyadh')->addHour()->timestamp;
                        $dayNow = Carbon::now('Asia/Riyadh')->format('Y-m-d');

                        //realtime
                        $realTime = $time->format('H:i:s');
                        $converTimestamp = Carbon::parse($realTime)->timezone('Asia/Riyadh')->timestamp;
                        //check time between two times
                        $setting = Setting::query()->first();
                        $startDate = $setting->resting_start_time;
                        $endDate = $setting->resting_end_time;

                        $endingTime = $time;
                        $lastWorkTime = Carbon::parse($bookSetting->service_end_time);

                        if ($day == $dayNow && $converTimestamp < $convertNowTimestamp) {
                        } else if ($setting->is_resting == 1 && $time->between($startDate, $endDate, true)) {
                        } else if ($endingTime->gte($lastWorkTime)) {
                        } else {
                            return $time->format('g:i A');
                        }
                    }

                })->toArray();
                $subTimes['times'] = array_values($subTimes['times']);

                $timesForEachService[$service_id][] = $subTimes;
            }
        }

        $commonTimes = [];

        $hasLongService = false;
        $services_duration = 0;
        $lastWorkTime = [];
        foreach ($this->services as $service) {

            $amount = $service['amount'];
            $service_id = $service['id'];
            $booking_setting = BookingSetting::where('service_id', $service_id)->first();

            $allowedDuration = Carbon::parse($bookSetting->service_start_time)->timezone('Asia/Riyadh')->diffInMinutes(Carbon::parse($bookSetting->service_end_time)->timezone('Asia/Riyadh'));
            if ($booking_setting->service_duration > $allowedDuration) {
                $hasLongService = true;
            }

            $lastWorkTime[] = Carbon::parse($booking_setting->service_end_time);
            $services_duration += intval($booking_setting->service_duration) * $amount;
        }

        $lastWorkTime = min($lastWorkTime);

        $category_ids = Service::whereIn('id', $services_ids)->pluck('category_id')->toArray();
        $groupIds = CategoryGroup::whereIn('category_id', $category_ids)->pluck('group_id')->toArray();

        $booking_id = Booking::whereHas('category', function ($qu) use ($category_ids) {
            $qu->whereIn('category_id', $category_ids);
        })->where('date', $day)->pluck('id')->toArray();

        foreach ($timesForEachService as $service_id => $serviceTimes) {

            foreach ($serviceTimes as $serviceTime) {
                $day = $serviceTime['day'];
                $times = $serviceTime['times'];

                $commonTimes[$day] = isset($commonTimes[$day]) ? array_intersect($commonTimes[$day], $times) : $times; 
            }
        }

        foreach ($commonTimes as $day => $times) {
            $commonTimes[$day] = array_values($commonTimes[$day]);


            foreach ($times as $key => $time) {

                $booking_id = Booking::whereHas('category', function ($qu) use ($category_ids) {
                    $qu->whereIn('category_id', $category_ids);
                })->where('date', $key)->pluck('id')->toArray();
                if ($time) {
                    $endingTime = Carbon::parse($time)->timezone('Asia/Riyadh');

                    $timeInstance = Carbon::parse($time)->timezone('Asia/Riyadh');

                    $takenGroupsIds = Visit::where('start_time', '<', $timeInstance->copy()->addMinutes($services_duration)->format('H:i:s'))
                        ->where('end_time', '>', $timeInstance->format('H:i:s'))
                        ->activeVisits()->whereIn('booking_id', $booking_id)
                        ->whereIn('assign_to_id', $activeGroups)->pluck('assign_to_id')->toArray();

                    if (!empty($takenGroupsIds)) {
                        $groups = Group::with('regions')->whereHas('regions', function ($qu) {
                            $qu->where('region_id', $this->region_id);
                        })->whereNotIn('id', $takenGroupsIds)->whereIn('id', $groupIds)->where('active', 1)->pluck('id')->toArray();
                        if (empty($groups)) {
                            unset($commonTimes[$day][$key]);
                        }
                    }

                    if ($endingTime->gte($lastWorkTime) && (!$hasLongService)) {
                        unset($commonTimes[$day][$key]);
                    }
                }
            }
        }

        $collectionOfTimesOfServices = [];
        foreach ($commonTimes as $day => $times) {
            if (!empty($times)) {
                $subTimes['day'] = $day;
                $subTimes['dayName'] = Carbon::parse($day)->timezone('Asia/Riyadh')->locale(app()->getLocale())->dayName;
                $subTimes['times'] = array_values($times);
                $collectionOfTimesOfServices[] = $subTimes;
            }
        }
        return $collectionOfTimesOfServices;
    }

    function getTime($day, $booking): string
    {
        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        $chooseDate = array_search($day, $days);
        $startDate = array_search($booking->service_start_date, $days);
        $endDate = array_search($booking->service_end_date, $days);

        $time = in_array($chooseDate, range($startDate, $endDate));

        return $time;
    }
}