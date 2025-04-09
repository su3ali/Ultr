<?php
namespace App\Http\Controllers\Api\Checkout\v2;

use App\Bll\ControlCart;
use App\Bll\CouponCheck;
use App\Http\Controllers\Controller;
use App\Http\Resources\Checkout\CartResource;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CategoryGroup;
use App\Models\ContractPackage;
use App\Models\ContractPackagesUser;
use App\Models\Group;
use App\Models\GroupRegion;
use App\Models\Icon;
use App\Models\Order;
use App\Models\Service;
use App\Models\Shift;
use App\Models\Technician;
use App\Models\UserAddresses;
use App\Models\Visit;
use App\Notifications\SendPushNotification;
use App\Services\v2\Appointment;
use App\Support\Api\ApiResponse;
use App\Traits\schedulesTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    use ApiResponse, schedulesTrait, \App\Traits\NotificationTrait;
    public $daysOfWeek = [
        ['id' => 1, 'name' => 'Saturday'],
        ['id' => 2, 'name' => 'Sunday'],
        ['id' => 3, 'name' => 'Monday'],
        ['id' => 4, 'name' => 'Tuesday'],
        ['id' => 5, 'name' => 'Wednesday'],
        ['id' => 6, 'name' => 'Thursday'],
        ['id' => 7, 'name' => 'Friday'],
    ];

    public function __construct()
    {
        $this->middleware('localization');

    }

    protected function add_to_cart(Request $request): JsonResponse
    {

        // dd($request->all());
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
                return self::apiResponse(200, __('api.Added To Cart Successfully'), $this->body);
            }
        }

        return self::apiResponse(400, __('api.service not found or an error happened.'), $this->body);
    }

    protected function index(): JsonResponse
    {
        $this->handleCartResponse();
        return self::apiResponse(200, null, $this->body);
    }

    protected function updateCart(Request $request)
    {

        try {

            $cart = auth()->user()->carts->first();

            if ($cart) {
                $rules = [
                    'category_ids'   => 'required|array',
                    'category_ids.*' => 'required|exists:categories,id',
                    'region_id'      => 'required|exists:regions,id',
                    'shift_id'       => 'required|exists:shifts,id',
                    'date'           => 'required|array',
                    'date.*'         => 'required|date',
                    'time'           => 'required|array',
                    'time.*'         => 'required',
                    'notes'          => 'nullable|array',
                    'notes.*'        => 'nullable|string|max:191',
                ];
                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return self::apiResponse(400, 'Validation failed', $validator->errors());
                }

                $categoryId = $request['category_ids'][0];
                $cart_time  = $request['time'][0];
                $cart_date  = $request['date'][0];
                $time24     = Carbon::parse($cart_time)->format('H:i');
                $cart_time  = $time24;

                if ($cart_time) {
                    $shift = Shift::find($request->shift_id);
                } else {
                    return self::apiResponse(400, __('api.cart empty'), $this->body);

                }

                if (empty($shift)) {
                    return false;
                }

                $shiftGroupsIds = Shift::where('id', $shift->id)
                    ->pluck('group_id')
                    ->flatMap(fn($jsonString) => array_map('intval', json_decode($jsonString, true)))
                    ->toArray();

                // $shiftRegionId = GroupRegion::where('group_id', $shiftGroupsIds[0])->pluck('region_id')->first();

                // dd($shiftRegionId);

                // if ($shiftRegionId != $request->region_id) {
                //     return self::apiResponse(400, __('api.time_out_your_region'), $this->body);
                // }

                $shiftGroupsIds = GroupRegion::whereIn('group_id', $shiftGroupsIds)
                    ->where('region_id', $request->region_id)
                    ->pluck('group_id')
                    ->toArray();

                // Retrieve all group IDs in the specified region and category
                $allGroupIdsInRegionCategory = Group::GroupInRegionCategory($request->region_id, [$categoryId])
                    ->pluck('id')
                    ->toArray();

                // Check if no groups are available
                if (empty($shiftGroupsIds)) {
                    return false;
                }

                // Retrieve group IDs associated with the provided category IDs
                $groupIdsForCategories = CategoryGroup::whereIn('category_id', $request['category_ids'])
                    ->pluck('group_id')
                    ->toArray();

                // Fetch booking IDs for the given category and cart date
                $bookingIdsForCategory = Booking::whereHas('category', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                })->where('date', $cart->date)
                    ->pluck('id')
                    ->toArray();

                // Retrieve IDs of visits assigned to these bookings
                $assignedVisitIds = Visit::whereIn('booking_id', $bookingIdsForCategory)->whereNotIn('visits_status_id', [5, 6])
                    ->whereIn('assign_to_id', $shiftGroupsIds)
                    ->pluck('assign_to_id')
                    ->toArray();
                // dd($groupIdsForCategories);
                // Calculate the available group IDs
                $availableGroupIds = array_diff($shiftGroupsIds, $assignedVisitIds);

                // Fetch the available groups based on region, category, and availability
                $availableGroupsCount = Group::GroupInRegionCategory($request->region_id, $request['category_ids'])
                    ->whereIn('id', $availableGroupIds)
                    ->count();

                $cartsIds = Cart::where([
                    'region_id' => $request->region_id,
                    'date'      => $cart_date,
                    'time'      => $cart_time,
                ])->pluck('user_id')->toArray();

                // Return the available groups
                $cartsCount = Cart::where([
                    'region_id' => $request->region_id,
                    'date'      => $cart_date,
                    'time'      => $cart_time,
                ])->count();

                $exists = in_array(auth()->user()->id, $cartsIds);
                // dd(!$exists);

                if (! $exists && $availableGroupsCount <= $cartsCount) {
                    return self::apiResponse(
                        400,
                        __('api.time_not_available'),
                        $this->body
                    );
                }

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
                            'region_id' => $request->region_id,
                            'date'      => $request->date[$key],
                            'time'      => Carbon::parse($request->time[$key])->timezone('Asia/Riyadh')->toTimeString(),
                            'notes'     => isset($request->notes[$key]) ? $request->notes[$key] : '',
                            // 'notes' => $request->notes ? array_key_exists($key, $request->notes) ? $request->notes[$key] : '' : '',
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

                        // $cart->update([
                        //     'date' => $request->date[$key],
                        //     'time' => Carbon::parse($request->time[$key])->timezone('Asia/Riyadh')->toTimeString(),
                        //     'notes' => $request->notes ? array_key_exists($key, $request->notes) ? $request->notes[$key] : '' : '',
                        // ]);
                        $cart->update([
                            'date'  => $request->date[$key] ?? null,                                                            // Use null if the date is not set
                            'time'  => Carbon::parse($request->time[$key] ?? '00:00')->timezone('Asia/Riyadh')->toTimeString(), // Use a default time if not set
                            'notes' => isset($request->notes[$key]) ? $request->notes[$key] : '',                               // Safely check if notes exists for this key
                        ]);

                    }

                    activity()
                        ->causedBy(auth()->user()) // Log the user who caused the action
                        ->withProperties([
                            'url'              => url()->current(),
                            'user_id'          => auth()->user()->id,
                            'user_name'        => auth()->user()->first_name,
                            'shiftRegionId'    => $shiftRegionId ?? '',
                            'region_id'        => $address->region_id ?? '',
                            'time'             => $cart->time ?? '',
                            'date'             => $cart->date ?? '',
                            'assignedVisitIds' => $assignedVisitIds ?? null,
                            'shiftGroupsIds'   => $shiftGroupsIds ?? null,
                            'service_id'       => $cart->service_id ?? '',

                        ])
                        ->log('  processing the Update Cart V2  endpoint successfully');

                    return self::apiResponse(200, __('api.date and time for reservations updated successfully'), $this->body);
                }
            }
            return self::apiResponse(400, __('api.time_not_available'), $this->body);
        } catch (\Exception $e) {

            activity()
                ->causedBy(auth()->user()) // Log the user who caused the action
                ->withProperties([
                    'url'              => url()->current(),
                    'user_id'          => auth()->user()->id,
                    'user_name'        => auth()->user()->first_name,
                    'shiftRegionId'    => $shiftRegionId ?? '',
                    'region_id'        => $address->region_id ?? '',
                    'time'             => $cart->time ?? '',
                    'date'             => $cart->date ?? '',
                    'assignedVisitIds' => $assignedVisitIds ?? null,
                    'shiftGroupsIds'   => $shiftGroupsIds ?? null,
                    'service_id'       => $cart->service_id ?? '',

                ])
                ->log('Exception while processing the Update Cart V2  endpoint Fail');

            return response()->json(['error' => $e->getMessage()], 500);
        }
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

    public function getAvailableTimes(Request $request)
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

    public function changeOrderSchedule(Request $request)
    {
        DB::beginTransaction();

        try {
            $order = Order::find($request->order_id);
            if (! $order) {
                return self::apiResponse(400, 'لا يوجد طلب من خلال هذا الرقم');
            }

            $shift_id = $request->shift_id;
            if (! $shift_id) {
                return self::apiResponse(400, 'رقم الشيفت غير موجود');
            }

            $date    = $request->date;
            $rawTime = $request->time;

            try {
                $bookingDateTime = Carbon::createFromFormat('Y-m-d h:i A', $date . ' ' . $rawTime, 'Asia/Riyadh');

                if ($bookingDateTime->isPast()) {
                    return self::apiResponse(422, 'الوقت المحدد قد مضى. يرجى اختيار وقت آخر والمحاولة مرة أخرى.');
                }

                $time = $bookingDateTime->format('H:i:s');
            } catch (\Exception $e) {
                return self::apiResponse(400, 'تنسيق الوقت غير صحيح. يرجى استخدام تنسيق مثل 02:30 PM');
            }

            $newDate = $request->date;
            $newTime = Carbon::parse($request->time)->format('H:i:s');

            // Create or update booking
            $booking                    = Booking::firstOrNew(['order_id' => $order->id]);
            $booking->booking_status_id = 1;
            $booking->date              = $newDate;
            $booking->time              = $newTime;
            $booking->save();

            // Create or update visit
            $visit                   = Visit::firstOrNew(['booking_id' => $booking->id]);
            $visit->visits_status_id = 1;
            $visit->save();

            // Reset order status
            if ($order->status_id === 5) {
                $order->status_id = 1;
                $order->save();
            }

            $serviceIds = $order->bookings->pluck('service_id')->toArray();
            $quantity   = $booking->quantity;

            // Get shift groups
            $shiftGroupJson = Shift::where('id', $shift_id)->value('group_id');
            $shiftGroupsIds = $shiftGroupJson ? json_decode($shiftGroupJson, true) : [];

            // Duration calculation
            $bookSetting = BookingSetting::where('service_id', $serviceIds[0] ?? null)->first();
            if (! $bookSetting) {
                DB::rollBack();
                return self::apiResponse(400, 'إعدادات الخدمة غير متوفرة.');
            }

            $serviceDuration = (int) $bookSetting->service_duration;
            $bufferTime      = (int) $bookSetting->buffering_time;
            $duration        = ($serviceDuration + $bufferTime) * $quantity;

            if ($duration <= 0) {
                DB::rollBack();
                return self::apiResponse(400, 'المدة المحتسبة غير صحيحة.', $order->quantity);
            }

            $category_id = Category::pluck('id')->first();
            $address     = UserAddresses::find($order->user_address_id);

            $booking_id = Booking::whereHas('address', function ($q) use ($address) {
                $q->where('region_id', optional($address)->region_id);
            })->whereHas('category', function ($q) use ($category_id) {
                $q->where('category_id', $category_id);
            })->where('date', $newDate)->pluck('id')->toArray();

            $dayName = Carbon::parse($newDate)->format('l');
            $dayId   = collect($this->daysOfWeek)->firstWhere('name', $dayName)['id'] ?? null;

            $techIdsOnThisDay = Technician::whereIn('group_id', $shiftGroupsIds)
                ->with('workingDays')
                ->get()
                ->filter(fn($tech) => in_array($dayId, $tech->workingDays->pluck('day_id')->toArray()))
                ->pluck('group_id')
                ->toArray();

            $groupQuery = Group::where('active', 1)
                ->whereIn('id', $techIdsOnThisDay)
                ->whereHas('regions', fn($q) => $q->where('region_id', optional($address)->region_id));

            if (! $groupQuery->exists()) {
                DB::rollBack();
                return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'));
            }

            $startTime = Carbon::parse($newTime);

            $takenGroupsIds = Visit::where('start_time', '<', $startTime->copy()->addMinutes($duration)->format('H:i:s'))
                ->where('end_time', '>', $newTime)
                ->activeVisits()
                ->whereIn('booking_id', $booking_id)
                ->whereIn('assign_to_id', $techIdsOnThisDay)
                ->pluck('assign_to_id');

            $availableGroups = $groupQuery
                ->when($takenGroupsIds->isNotEmpty(), fn($q) => $q->whereNotIn('id', $takenGroupsIds))
                ->get();

            if ($availableGroups->isEmpty()) {
                DB::rollBack();
                return self::apiResponse(400, __('api.This Time is not available'));
            }

            $groupWithLeastVisits = $availableGroups->sortBy(fn($group) => Visit::where('assign_to_id', $group->id)->count())->first();
            $assign_to_id         = $groupWithLeastVisits->id;

            // Update visit with assigned group and time info
            $visit->update([
                'assign_to_id' => $assign_to_id,
                'created_at'   => Carbon::parse($newDate)->setTimeFrom($startTime),
                'start_time'   => $startTime->format('H:i:s'),
                'end_time'     => $startTime->copy()->addMinutes($duration)->format('H:i:s'),
            ]);

            // Notifications
            try {
                $technicians = Technician::where('group_id', $assign_to_id)->whereNotNull('fcm_token')->get();

                if ($technicians->isNotEmpty()) {
                    $title   = 'موعد زيارة جديد';
                    $message = 'لديك موعد زياره جديد';

                    foreach ($technicians as $tech) {
                        Notification::send($tech, new SendPushNotification($title, $message));
                    }

                    $fcmTokens = $technicians->pluck('fcm_token')
                        ->merge(Admin::whereNotNull('fcm_token')->pluck('fcm_token'))
                        ->toArray();

                    $this->pushNotification([
                        'device_token' => $fcmTokens,
                        'title'        => $title,
                        'message'      => $message,
                        'type'         => 'technician',
                        'code'         => 1,
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('FCM send failed: ' . $e->getMessage());
            }

            DB::commit();
            return self::apiResponse(200, 'تمت إعادة الجدولة بنجاح', $assign_to_id);

        } catch (\Exception $e) {
            DB::rollBack();
            return self::apiResponse(500, 'حدث خطأ أثناء معالجة الطلب: ' . $e->getMessage());
        }
    }

}
