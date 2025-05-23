<?php
namespace App\Http\Controllers\Api\Checkout;

use App\Bll\ControlCart;
use App\Bll\CouponCheck;
use App\Http\Controllers\Controller;
use App\Http\Resources\Checkout\CartResource;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CategoryGroup;
use App\Models\ContractPackage;
use App\Models\ContractPackagesUser;
use App\Models\Icon;
use App\Models\Service;
use App\Services\Appointment;
use App\Support\Api\ApiResponse;
use App\Traits\schedulesTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CartController extends Controller
{
    use ApiResponse, schedulesTrait;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function add_to_cart(Request $request): JsonResponse
    {

        try {

            // dd("*");
            // return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
            if ($request->type == 'package') {
                $package = ContractPackage::where('id', $request->package_id)->first();
                if ($package && $package->active === 1) {
                    $cart = Cart::query()->where('user_id', auth()->user()->id)
                        ->first();
                    if ($cart) {
                        return self::apiResponse(400, __('api.finish current order first or clear the cart'), $this->body);
                    }
                    for ($i = 0; $i < $package->visit_number; $i++) {
                        Cart::query()->create([
                            'user_id'             => auth()->user()->id,
                            'contract_package_id' => $package->id,
                            'price'               => $package->price,
                            'quantity'            => $package->visit_number,
                            'type'                => 'package',
                        ]);
                    }
                    //                $carts = Cart::query()->where('user_id', auth()->user()->id)->count();
                    //                $this->body['total_items_in_cart'] = $carts;
                    $this->body['total_items_in_cart'] = 1;

                    return self::apiResponse(200, __('api.Added To Cart Successfully'), $this->body);
                }
            } else {
                $service = Service::with('category')->find($request->service_id);
                if ($service && $service->active === 1) {
                    $cart = Cart::query()->where('user_id', auth()->user()->id)->where('service_id', $service->id)
                        ->first();
                    if ($cart) {
                        return self::apiResponse(400, __('api.Already In Your Cart!'), $this->body);
                    }
                    if (auth()->user()->carts->where('type', 'package')->first()) {
                        return self::apiResponse(400, __('api.finish current order first or clear the cart'), $this->body);
                    }
                    $price                = $service->price;
                    $now                  = Carbon::now('Asia/Riyadh');
                    $contractPackagesUser = ContractPackagesUser::where('user_id', auth()->user()->id)
                        ->whereDate('end_date', '>=', $now)
                        ->where(function ($query) use ($service) {
                            $query->whereHas('contactPackage', function ($qu) use ($service) {
                                $qu->whereHas('ContractPackagesServices', function ($qu) use ($service) {
                                    $qu->where('service_id', $service->id);
                                });
                            });
                        })->first();

                    if ($contractPackagesUser) {
                        $contractPackage = ContractPackage::where('id', $contractPackagesUser->contract_packages_id)->first();
                        if ($request->quantity < ($contractPackage->visit_number - $contractPackagesUser->used)) {
                            $price = 0;
                        } else {
                            $price = ($request->quantity - ($contractPackage->visit_number - $contractPackagesUser->used)) * $service->price;
                        }
                    }

                    if ($request->icon_ids) {
                        $icon_ids = $request->icon_ids;

                        foreach ($icon_ids as $icon_id) {

                            $price += Icon::where('id', $icon_id)->first()->price;
                        }
                    }

                    Cart::query()->create([
                        'user_id'     => auth()->user()->id,
                        'service_id'  => $service->id,
                        'icon_ids'    => json_encode($request->icon_ids),
                        'category_id' => $service->category->id,
                        'price'       => $price,
                        'quantity'    => $request->quantity,
                        'type'        => 'service',
                    ]);
                    $carts                             = Cart::query()->where('user_id', auth()->user()->id)->count();
                    $this->body['total_items_in_cart'] = $carts;

                    activity()
                        ->causedBy(auth()->user()) // Action performed by the authenticated user
                        ->withProperties([
                            'title'         => 'A Added  service to Cart', // Descriptive title of the action
                            'user_id'       => auth()->user()->id,         // User’s ID for identification
                            'user_name'     => auth()->user()->first_name, // User’s name for clarity
                            'region_id'     => Cart::where('user_id', auth()->user()->id)->pluck('region_id')->first(),
                            'date'          => Cart::where('user_id', auth()->user()->id)->pluck('date')->first(),
                            'time'          => Cart::where('user_id', auth()->user()->id)->pluck('time')->first(),
                            'price_in_cart' => Cart::where('user_id', auth()->user()->id)->pluck('price')->first(),    // Total price of items in the cart (sum of prices)
                            'quantity'      => Cart::where('user_id', auth()->user()->id)->pluck('quantity')->first(), // Total quantity of items in the cart
                            'current_url'   => url()->current(),                                                       // URL of the page from which the action was triggered
                        ])
                        ->log('A service was added to the cart'); // Log description

                    return self::apiResponse(200, __('api.Added To Cart Successfully'), $this->body);
                }
            }

            return self::apiResponse(400, __('api.service not found or an error happened.'), $this->body);
        } catch (\Exception $e) {
            // Log the exception with additional context
            activity()
                ->causedBy(auth()->user()) // Log the user who caused the action
                ->withProperties([
                    'exception_message' => $e->getMessage(),
                    'exception_file'    => $e->getFile(),
                    'exception_line'    => $e->getLine(),
                    'url'               => url()->current(),
                    'user_id'           => auth()->user()->id,
                    'user_name'         => auth()->user()->first_name,
                    'cart_id'           => Cart::where('user_id', auth()->user()->id)->pluck('id')->first(),

                ])
                ->log('Exception while processing the add_to_cart endpoint');
        }
    }

    protected function index(): JsonResponse
    {
        $this->handleCartResponse();
        return self::apiResponse(200, null, $this->body);
    }

    protected function updateCart(Request $request)
    {
        $cart = auth()->user()->carts->first();
        if ($cart) {
            $rules = [
                'category_ids'   => 'required|array',
                'category_ids.*' => 'required|exists:categories,id',
                'date'           => 'required|array',
                'date.*'         => 'required|date',
                'time'           => 'required|array',
                'time.*'         => 'required|date_format:h:i A',
                'notes'          => 'nullable|array',
                'notes.*'        => 'nullable|string|max:191',
            ];
            $request->validate($rules, $request->all());
            if ($cart->type == 'service' || ! $cart->type) {
                $cartCategoryCount = count(array_unique(auth()->user()->carts->pluck('category_id')->toArray()));
                if (
                    count($request->category_ids) < $cartCategoryCount
                    ||
                    count($request->time) < $cartCategoryCount
                    ||
                    count($request->date) < $cartCategoryCount
                ) {
                    return self::apiResponse(400, __('api.date or time is missed'), $this->body);
                }

                foreach ($request->category_ids as $key => $category_id) {

                    $countGroup = CategoryGroup::where('category_id', $category_id)->count();

                    $countInBooking = Booking::whereHas('visit', function ($q) {
                        $q->whereNotIn('visits_status_id', [5, 6]);
                    })->where('category_id', $category_id)->where('date', $request->date[$key])
                        ->where('time', Carbon::createFromFormat('H:i A', $request->time[$key])->format('H:i:s'))->count();

                    if ($countInBooking == $countGroup) {
                        return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
                    }

                    Cart::query()->where('user_id', auth('sanctum')->user()->id)
                        ->where('category_id', $category_id)->update([
                        'date'  => $request->date[$key],
                        'time'  => Carbon::parse($request->time[$key])->timezone('Asia/Riyadh')->toTimeString(),
                        'notes' => $request->notes ? array_key_exists($key, $request->notes) ? $request->notes[$key] : '' : '',
                    ]);
                }
                return self::apiResponse(200, __('api.date and time for reservations updated successfully'), $this->body);
            } else {
                $cartCategoryCount = auth()->user()->carts->count();

                if (
                    count($request->category_ids) < $cartCategoryCount
                    ||
                    count($request->time) < $cartCategoryCount
                    ||
                    count($request->date) < $cartCategoryCount
                ) {
                    return self::apiResponse(400, __('api.date or time is missed'), $this->body);
                }

                foreach (auth()->user()->carts as $key => $cart) {

                    $countGroup = CategoryGroup::where('category_id', $cart->category_id)->count();

                    $countInBooking = Booking::whereHas('visit', function ($q) {
                        $q->whereNotIn('visits_status_id', [5, 6]);
                    })->where('category_id', $cart->category_id)->where('date', $request->date[$key])
                        ->where('time', Carbon::createFromFormat('H:i A', $request->time[$key])->format('H:i:s'))->count();

                    if ($countInBooking == $countGroup) {
                        return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
                    }

                    error_log($cart->id);

                    $cart->update([
                        'date'  => $request->date[$key],
                        'time'  => Carbon::parse($request->time[$key])->timezone('Asia/Riyadh')->toTimeString(),
                        'notes' => $request->notes ? array_key_exists($key, $request->notes) ? $request->notes[$key] : '' : '',
                    ]);
                }
                return self::apiResponse(200, __('api.date and time for reservations updated successfully'), $this->body);
            }
        }
        return self::apiResponse(400, __('api.cart empty'), $this->body);
    }

    protected function controlItem(Request $request): JsonResponse
    {
        $cart = Cart::query()->find($request->cart_id);
        if ($cart) {
            if (request()->action == 'delete') {
                if ($cart->type == 'package') {
                    Cart::query()->where('user_id', auth()->user()->id)->delete();
                } else {
                    $cart->delete();
                }
                $response = ['success' => 'deleted successfully'];
                $this->handleCartResponse();
                return self::apiResponse(200, $response['success'], $this->body);
            }
            $service = service::query()->where('id', $cart->service_id)->first();
            if ($service) {
                $controlClass = new ControlCart();
                $response     = $controlClass->makeAction($request->action, $cart, $service);

                $carts = Cart::query()->where('user_id', auth()->user()->id)->get();

                $tempTotal            = $this->calc_total($carts);
                $now                  = Carbon::now('Asia/Riyadh');
                $contractPackagesUser = ContractPackagesUser::where('user_id', auth()->user()->id)
                    ->whereDate('end_date', '>=', $now)
                    ->where(function ($query) use ($service) {
                        $query->whereHas('contactPackage', function ($qu) use ($service) {
                            $qu->whereHas('ContractPackagesServices', function ($qu) use ($service) {
                                $qu->where('service_id', $service->id);
                            });
                        });
                    })->first();

                if ($contractPackagesUser) {
                    $contractPackage = ContractPackage::where('id', $contractPackagesUser->contract_packages_id)->first();
                    if ($cart->quantity < ($contractPackage->visit_number - $contractPackagesUser->used)) {
                        $tempTotal = 0;
                    } else {
                        $tempTotal = ($cart->quantity - ($contractPackage->visit_number - $contractPackagesUser->used)) * $service->price;
                    }
                }

                $total   = number_format($tempTotal, 2);
                $cat_ids = $carts->pluck('category_id');
                if (key_exists('success', $response)) {
                    $this->body['total'] = $total;
                    $this->body['carts'] = [];
                    $cat_ids             = array_unique($cat_ids->toArray());
                    foreach ($cat_ids as $cat_id) {
                        if ($cat_id) {
                            $this->body['carts'][] = [
                                'category_id'    => $cat_id ?? 0,
                                'category_title' => Category::query()->find($cat_id)?->title ?? '',
                                'cart-services'  => CartResource::collection($carts->where('category_id', $cat_id)),
                            ];
                        }
                    }
                    $this->body['total_items_in_cart'] = auth()->user()->carts->count();
                    return self::apiResponse(200, $response['success'], $this->body);
                } else {
                    return self::apiResponse(400, $response['error'], $this->body);
                }
            }
        }
        return self::apiResponse(400, __('api.Cart Not Found'), $this->body);
    }

    private function calc_total($carts)
    {
        $total = [];
        for ($i = 0; $i < $carts->count(); $i++) {
            $cart_total = ($carts[$i]->price) * $carts[$i]->quantity;
            array_push($total, $cart_total);
        }
        $total = array_sum($total);
        return $total;
    }

    public function getAvailableTimesFromDate(Request $request)
    {
        $rules = [
            'services'          => 'required|array',
            'services.*.id'     => 'required|exists:services,id',
            'services.*.amount' => 'required|numeric',
            'region_id'         => 'required|exists:regions,id',
            'package_id'        => 'required',
            'page_number'       => 'required|numeric',
        ];
        $request->validate($rules, $request->all());

        $times = new Appointment($request->region_id, $request->services, $request->package_id, $request->page_number);

        $collectionOfTimesOfServices = $times->getAvailableTimesFromDate();

        if ($collectionOfTimesOfServices) {
            $this->body['times']['available_days'] = $collectionOfTimesOfServices;
            return self::apiResponse(200, null, $this->body);
        }

        return self::apiResponse(400, __('api.Sorry, the service is currently unavailable'), []);
    }

    // protected function getAvailableTimesFromDate(Request $request)
    // {
    //     $rules = [
    //         'services' => 'required|array',
    //         'services.*.id' => 'required|exists:services,id',
    //         'services.*.amount' => 'required|numeric',
    //         'region_id' => 'required|exists:regions,id',
    //         'package_id' => 'required',
    //         'page_number' => 'required|numeric'
    //     ];
    //     $request->validate($rules, $request->all());

    //     $servicesCollection = collect($request->services);

    //     $ids = $servicesCollection->pluck('id');

    //     $services_ids = $ids->toArray();

    //     $category_id = Service::where('id', $request->services[0]['id'])->first()->category_id;

    //     $group = Group::GroupInRegionCategory($request->region_id, [$category_id])->get();

    //     if ($group->isEmpty()) {
    //         return self::apiResponse(400, __('api.Sorry, the service is currently unavailable'), []);
    //     }

    //     $timeDuration = 60;
    //     if ($request->package_id != 0) {
    //         $contract = ContractPackage::where('id', $request->package_id)->first();
    //         $timeDuration = $contract->time * 30;
    //     }

    //     $times = [];
    //     $bookingTimes = [];
    //     $bookingDates = [];
    //     foreach ($request->services as $service) {
    //         $amount = $service['amount'];
    //         $service_id = $service['id'];
    //         $times[$service_id]['amount'] = $amount;
    //         $bookSetting = BookingSetting::whereHas('regions', function ($q) use ($request) {
    //             $q->where('region_id', $request->region_id);
    //         })->where('service_id', $service_id)->first();

    //         if (!$bookSetting) {
    //             return self::apiResponse(400, __('api.Sorry, the service is currently unavailable'), []);
    //         }

    //         $dayStartIndex = array_search($bookSetting->service_start_date, $this->days);
    //         $dayEndIndex = array_search($bookSetting->service_end_date, $this->days);
    //         $serviceDays = [];
    //         for ($i = $dayStartIndex; $i <= $dayEndIndex; $i++) {
    //             $serviceDays[] = $this->days[$i];
    //         }
    //         $dates = [];
    //         $page_size = 14;
    //         $page_number = 0;
    //         if ($request->page_number) {
    //             $page_number = $request->page_number;
    //         }
    //         $start = $page_number * $page_size;
    //         $end = ($page_number + 1) * $page_size;
    //         if ($start >= $timeDuration) {
    //             $start = $timeDuration;
    //         }
    //         if ($end >= $timeDuration) {
    //             $end = $timeDuration;
    //         }
    //         for ($i = $start; $i < $end; $i++) {
    //             $date = Carbon::now('Asia/Riyadh')->addDays($i)->format('Y-m-d');
    //             if (in_array(Carbon::parse($date)->timezone('Asia/Riyadh')->format('l'), $serviceDays)) {
    //                 $dates[] = $date;
    //             }
    //         }
    //         if ($bookSetting) {
    //             foreach ($dates as $day) {
    //                 $dayName = Carbon::parse($day)->timezone('Asia/Riyadh')->locale('en')->dayName;
    //                 $get_time = $this->getTime($dayName, $bookSetting);
    //                 if ($get_time == true) {
    //                     $times[$service_id]['days'][$day] = CarbonInterval::minutes($bookSetting->service_duration + $bookSetting->buffering_time)
    //                         ->toPeriod(
    //                             \Carbon\Carbon::now('Asia/Riyadh')->setTimeFrom($bookSetting->service_start_time ?? Carbon::now('Asia/Riyadh')->startOfDay()),
    //                             Carbon::now('Asia/Riyadh')->setTimeFrom($bookSetting->service_end_time ?? Carbon::now('Asia/Riyadh')->endOfDay())
    //                         );
    //                     // bring the service buffuring for the service that ends at this time and add it to to times
    //                     $activeGroups = Group::where('active', 1)->pluck('id')->toArray();
    //                     $booking_id = Booking::whereHas('category', function ($qu) use ($category_id) {
    //                         $qu->where('category_id', $category_id);
    //                     })->where('date', $day)->pluck('id')->toArray();
    //                     $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();

    //                     $timesArray = iterator_to_array($times[$service_id]['days'][$day]);
    //                     $times[$service_id]['days'][$day] = $timesArray;
    //                     $endTimeWithBuffer = [];
    //                     foreach ($times[$service_id]['days'][$day] as $key => $time) {
    //                         $time = $times[$service_id]['days'][$day][$key];
    //                         $diffCalculated = false;
    //                         $formattedTime = $time->format('H:i:s');

    //                         $allowedDuration = Carbon::parse($bookSetting->service_start_time)->diffInMinutes(Carbon::parse($bookSetting->service_end_time));
    //                         if (($bookSetting->service_duration > $allowedDuration)) {
    //                             $duration = $allowedDuration;
    //                         } else {
    //                             $duration = $bookSetting->service_duration;
    //                         }
    //                         $takenGroupsIds = Visit::where('start_time', '<', $time->copy()->addMinutes(($duration + $bookSetting->buffering_time))->format('H:i:s'))
    //                             ->where('end_time', '>', $formattedTime)
    //                             ->whereNotIn('visits_status_id', [5, 6])->whereIn('booking_id', $booking_id)
    //                             ->whereIn('assign_to_id', $activeGroups)->pluck('assign_to_id')->toArray();
    //                         if (!empty($takenGroupsIds)) {
    //                             $groups = Group::with('regions')->whereHas('regions', function ($qu) use ($request) {
    //                                 $qu->where('region_id', $request->region_id);
    //                             })->whereNotIn('id', $takenGroupsIds)->whereIn('id', $groupIds)->where('active', 1)->pluck('id')->toArray();
    //                             if (empty($groups)) {
    //                                 $times[$service_id]['days'][$day][$key] = null;
    //                             }
    //                         }

    //                         //visits with their buffering time that end after and required time
    //                         $alreadyTakenVisits = Visit::where('start_time', '<', $time->copy()->addMinutes(($bookSetting->service_duration + $bookSetting->buffering_time))->format('H:i:s'))
    //                             ->where('end_time', '<=', $formattedTime)  // Initial end_time filter
    //                             ->whereNotIn('visits_status_id', [5, 6])
    //                             ->whereIn('booking_id', $booking_id)
    //                             ->whereIn('assign_to_id', $activeGroups)
    //                             ->get()
    //                             ->filter(function ($visit) use ($time) {
    //                                 $bufferingTime = $visit->booking->service->BookingSetting->buffering_time;
    //                                 $adjustedEndTime = Carbon::parse($visit->end_time)->addMinutes($bufferingTime);
    //                                 return $adjustedEndTime->greaterThan($time);
    //                             });
    //                         if (!$alreadyTakenVisits->isEmpty()) {
    //                             foreach ($alreadyTakenVisits as $alreadyTakenVisit) {
    //                                 $buffering_time = $alreadyTakenVisit->booking->service->BookingSetting->buffering_time;
    //                                 $endTimeWithBuffer[] = Carbon::parse($alreadyTakenVisit->end_time)->addMinutes($buffering_time);
    //                             }
    //                             $min = min($endTimeWithBuffer);
    //                             $bufferTime = $time->copy()->diffInMinutes($min);
    //                             $diffCalculated = true;
    //                         }

    //                         if ($diffCalculated) {
    //                             foreach ($times[$service_id]['days'][$day] as $subKey => $subTime) {
    //                                 if ($subKey >= $key) {
    //                                     $times[$service_id]['days'][$day][$subKey] = $subTime?->copy()->addMinutes($bufferTime);
    //                                 }
    //                             }
    //                         }
    //                     }
    //                     // check after times edit
    //                     foreach ($times[$service_id]['days'][$day] as $key => $time) {
    //                         if ($times[$service_id]['days'][$day][$key]) {
    //                             $formattedTime = $time->format('H:i:s');
    //                             $allowedDuration = Carbon::parse($bookSetting->service_start_time)->diffInMinutes(Carbon::parse($bookSetting->service_end_time));
    //                             if (($bookSetting->service_duration > $allowedDuration)) {
    //                                 $duration = $allowedDuration;
    //                             } else {
    //                                 $duration = $bookSetting->service_duration;
    //                             }
    //                             $takenGroupsIds = Visit::where('start_time', '<', $time->copy()->addMinutes(($duration + $bookSetting->buffering_time))->format('H:i:s'))
    //                                 ->where('end_time', '>', $formattedTime)
    //                                 ->whereNotIn('visits_status_id', [5, 6])->whereIn('booking_id', $booking_id)
    //                                 ->whereIn('assign_to_id', $activeGroups)->pluck('assign_to_id')->toArray();
    //                             if (!empty($takenGroupsIds)) {
    //                                 $groups = Group::with('regions')->whereHas('regions', function ($qu) use ($request) {
    //                                     $qu->where('region_id', $request->region_id);
    //                                 })->whereNotIn('id', $takenGroupsIds)->whereIn('id', $groupIds)->where('active', 1)->pluck('id')->toArray();
    //                                 if (empty($groups)) {
    //                                     $times[$service_id]['days'][$day][$key] = null;
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }
    //             }
    //         }

    //         $bookings = Booking::where('category_id', $category_id)->whereHas('visit', function ($qq) {
    //             $qq->whereIn('visits_status_id', [1, 2, 3, 4]);
    //         })
    //             ->whereHas('address', function ($qq) use ($request) {
    //                 $qq->where('region_id', $request->region_id);
    //             })->get();
    //         foreach ($bookings as $booking) {
    //             array_push($bookingTimes, $booking->time);
    //             array_push($bookingDates, $booking->date);
    //         }
    //     }

    //     // Store times for each service
    //     $timesForEachService = [];

    //     foreach ($times as $service_id => $service) {
    //         $amount = $service['amount'];
    //         $timesInDays = $service['days'];

    //         $category_id = Service::where('id', $service_id)->first()->category_id;
    //         $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();
    //         $countGroup = Group::where('active', 1)->whereHas('regions', function ($qu) use ($request) {
    //             $qu->where('region_id', $request->region_id);
    //         })->whereIn('id', $groupIds)->count();

    //         foreach ($timesInDays as $day => $time) {
    //             $times = $time;
    //             $subTimes['day'] = $day;
    //             $subTimes['dayName'] = Carbon::parse($day)->timezone('Asia/Riyadh')->locale(app()->getLocale())->dayName;
    //             $subTimes['times'] = collect($times)->map(function ($time) use ($category_id, $countGroup, $amount, $bookSetting, $bookingTimes, $bookingDates, $day, $request) {

    //                 if ($time) {
    //                     $now = Carbon::now('Asia/Riyadh')->format('H:i:s');
    //                     $convertNowTimestamp = Carbon::parse($now)->timezone('Asia/Riyadh')->addHour()->timestamp;
    //                     $dayNow = Carbon::now('Asia/Riyadh')->format('Y-m-d');

    //                     //realtime
    //                     $realTime = $time->format('H:i:s');
    //                     $converTimestamp = Carbon::parse($realTime)->timezone('Asia/Riyadh')->timestamp;
    //                     //check time between two times
    //                     $setting = Setting::query()->first();
    //                     $startDate = $setting->resting_start_time;
    //                     $endDate = $setting->resting_end_time;

    //                     $countInBooking = Booking::whereHas('visit', function ($q) {
    //                         $q->whereNotIn('visits_status_id', [5, 6]);
    //                     })->where([['category_id', '=', $category_id], ['date', '=', $day], ['time', '=', $realTime]])
    //                         ->count();

    //                     $inVisit = Visit::where([['start_time', '<', Carbon::parse($realTime)->timezone('Asia/Riyadh')], ['end_time', '>', ($realTime)]])->get();
    //                     $inVisit2 = collect();
    //                     $inVisit3 = collect();

    //                     $endingTime = $time;
    //                     $lastWorkTime = Carbon::parse($bookSetting->service_end_time);

    //                     $allowedDuration = (Carbon::parse($bookSetting->service_start_time)->diffInMinutes(Carbon::parse($bookSetting->service_end_time)));
    //                     if (($bookSetting->service_duration) > (Carbon::parse($bookSetting->service_start_time)->diffInMinutes(Carbon::parse($bookSetting->service_end_time)))) {
    //                         $diff = (($bookSetting->service_duration) - $allowedDuration) / 60;

    //                         //visits at the day of expected end with a start time before the expected end
    //                         $inVisit2 = Visit::where('start_time', '<', Carbon::parse($bookSetting->service_start_time)->timezone('Asia/Riyadh')->addHours($diff % ($allowedDuration / 60)))->whereHas('booking', function ($qu) use ($category_id, $request, $day, $diff, $allowedDuration) {
    //                             $qu->where([['category_id', '=', $category_id], ['date', '=', Carbon::parse($day)->timezone('Asia/Riyadh')->addDays(1 + intval($diff / ($allowedDuration / 60)))]])->whereHas(
    //                                 'address.region',
    //                                 function ($q) use ($request) {

    //                                     $q->where('id', $request->region_id);
    //                                 }
    //                             );
    //                         })->get();

    //                         //visits between the expected start and expected end of the visit
    //                         $inVisit3 = Visit::whereHas('booking', function ($qu) use ($category_id, $request, $day, $diff, $allowedDuration) {
    //                             $qu->where([['category_id', '=', $category_id], ['date', '<', Carbon::parse($day)->timezone('Asia/Riyadh')->addDays(1 + intval($diff / ($allowedDuration / 60)))], ['date', '>=', Carbon::parse($day)->timezone('Asia/Riyadh')]])->whereHas(
    //                                 'address.region',
    //                                 function ($q) use ($request) {

    //                                     $q->where('id', $request->region_id);
    //                                 }
    //                             );
    //                         })->get();
    //                     }

    //                     if ($day == $dayNow && $converTimestamp < $convertNowTimestamp) {
    //                     } else if ($setting->is_resting == 1 && $time->between($startDate, $endDate, true)) {
    //                     } else if (in_array($day, $bookingDates) && in_array($converTimestamp, $bookingTimes) && ($countInBooking == $countGroup)) {
    //                     } /* else if (in_array($day, $bookingDates) && ($countInBooking + $inVisit->count()) == $countGroup) {
    //                   } */ else if (($inVisit2->IsNotEmpty() || $inVisit3->IsNotEmpty()) && ($countInBooking + $inVisit->count() + $inVisit2->count() + $inVisit3->count()) == $countGroup) {
    //                     } else if ($endingTime->gte($lastWorkTime)) {
    //                     } else {

    //                         return $time->format('g:i A');
    //                     }
    //                 }

    //             })->toArray();
    //             $subTimes['times'] = array_values($subTimes['times']);

    //             $timesForEachService[$service_id][] = $subTimes;
    //         }
    //     }

    //     $commonTimes = [];

    //     $hasLongService = false;
    //     $services_duration = 0;
    //     $lastWorkTime = [];
    //     foreach ($request->services as $service) {

    //         $amount = $service['amount'];
    //         $service_id = $service['id'];
    //         $booking_setting = BookingSetting::where('service_id', $service_id)->first();

    //         $allowedDuration = (Carbon::parse($bookSetting->service_start_time)->timezone('Asia/Riyadh')->diffInMinutes(Carbon::parse($bookSetting->service_end_time)->timezone('Asia/Riyadh')));
    //         if ($booking_setting->service_duration > $allowedDuration) {
    //             $hasLongService = true;
    //         }

    //         $lastWorkTime[] = Carbon::parse($booking_setting->service_end_time);
    //         $services_duration += intval($booking_setting->service_duration/*  + $booking_setting->buffering_time */) * $amount;
    //     }

    //     $lastWorkTime = min($lastWorkTime);

    //     $category_ids = Service::whereIn('id', $services_ids)->pluck('category_id')->toArray();
    //     $groupIds = CategoryGroup::whereIn('category_id', $category_ids)->pluck('group_id')->toArray();

    //     $booking_id = Booking::whereHas('category', function ($qu) use ($category_ids) {
    //         $qu->whereIn('category_id', $category_ids);
    //     })->where('date', $day)->pluck('id')->toArray();

    //     foreach ($timesForEachService as $service_id => $serviceTimes) {

    //         foreach ($serviceTimes as $serviceTime) {
    //             $day = $serviceTime['day'];
    //             $times = $serviceTime['times'];

    //             if (!isset($commonTimes[$day])) {
    //                 $commonTimes[$day] = $times;
    //             } else {
    //                 $commonTimes[$day] = array_intersect($commonTimes[$day], $times);
    //             }
    //         }
    //     }

    //     foreach ($commonTimes as $day => $times) {
    //         $commonTimes[$day] = array_values($commonTimes[$day]);

    //         foreach ($times as $key => $time) {

    //             $booking_id = Booking::whereHas('category', function ($qu) use ($category_ids) {
    //                 $qu->whereIn('category_id', $category_ids);
    //             })->where('date', $key)->pluck('id')->toArray();
    //             if ($time) {
    //                 $endingTime = Carbon::parse($time)->timezone('Asia/Riyadh');

    //                 $timeInstance = Carbon::parse($time)->timezone('Asia/Riyadh');

    //                 $takenGroupsIds = Visit::where('start_time', '<', $timeInstance->copy()->addMinutes($services_duration)->format('H:i:s'))
    //                     ->where('end_time', '>', $timeInstance->format('H:i:s'))
    //                     ->whereNotIn('visits_status_id', [5, 6])->whereIn('booking_id', $booking_id)
    //                     ->whereIn('assign_to_id', $activeGroups)->pluck('assign_to_id')->toArray();

    //                 if (!empty($takenGroupsIds)) {
    //                     $groups = Group::with('regions')->whereHas('regions', function ($qu) use ($request) {
    //                         $qu->where('region_id', $request->region_id);
    //                     })->whereNotIn('id', $takenGroupsIds)->whereIn('id', $groupIds)->where('active', 1)->pluck('id')->toArray();
    //                     if (empty($groups)) {
    //                         unset($commonTimes[$day][$key]);
    //                     }
    //                 }

    //                 if ($endingTime->gte($lastWorkTime) && (!$hasLongService)) {
    //                     unset($commonTimes[$day][$key]);
    //                 }
    //             }
    //         }
    //     }

    //     $collectionOfTimesOfServices = [];
    //     foreach ($commonTimes as $day => $times) {
    //         if (!empty($times)) {
    //             $subTimes['day'] = $day;
    //             $subTimes['dayName'] = Carbon::parse($day)->timezone('Asia/Riyadh')->locale(app()->getLocale())->dayName;
    //             $subTimes['times'] = array_values($times);
    //             $collectionOfTimesOfServices[] = $subTimes;
    //         }
    //     }

    //     $this->body['times']['available_days'] = $collectionOfTimesOfServices;
    //     return self::apiResponse(200, null, $this->body);
    // }

    /**
     * @return void
     */
    protected function handleCartResponse(): void
    {
        $carts                   = Cart::with('coupon')->where('user_id', auth()->user()->id)->where('type', 'service')->orWhereNull('type')->get();
        $cat_ids                 = $carts->pluck('category_id');
        $this->body['cart_type'] = auth()->user()->carts->first()?->type;
        $this->body['carts']     = [];
        $cat_ids                 = array_unique($cat_ids->toArray());
        foreach ($cat_ids as $cat_id) {
            if ($cat_id) {
                $this->body['carts'][] = [
                    'category_id'    => $cat_id ?? 0,
                    'category_title' => Category::query()->find($cat_id)?->title ?? '',
                    'cart-services'  => CartResource::collection($carts->where('category_id', $cat_id)),
                ];
            }
        }
        $total                             = number_format($this->calc_total($carts), 2, '.', '');
        $this->body['total']               = $total;
        $this->body['total_items_in_cart'] = auth()->user()->carts->count();

        //packages
        $cart_package = Cart::with('coupon')->where('user_id', auth()->user()->id)->where('type', 'package')->first();
        if ($cart_package) {
            $this->body['total']               = $cart_package->price;
            $this->body['total_items_in_cart'] = 1;
            $cat_id                            = $cart_package->category_id;
            $this->body['cart_package'][]      = [
                'category_id'    => $cat_id ?? 0,
                'category_title' => Category::query()->find($cat_id)?->title ?? '',
                'cart-services'  => CartResource::make($cart_package),
            ];
        } else {
            $this->body['cart_package'] = null;
        }
        $this->body['coupon'] = null;
        $coupon               = $carts->first()?->coupon;
        if ($coupon) {
            $match_response       = CouponCheck::check_coupon_services_match($coupon, $total, $carts);
            $discount_value       = $match_response['discount'];
            $this->body['coupon'] = [
                'code'                  => $coupon->code,
                'total_before_discount' => $total,
                'discount_value'        => $discount_value,
                'total_after_discount'  => $total - $discount_value,
            ];
        }
    }
}

//                $formatter = new \IntlDateFormatter(app()->getLocale(), \IntlDateFormatter::FULL, \IntlDateFormatter::NONE);
//                $collectionOfTimes[$formatter->format(strtotime($day))] = $subTimes;
