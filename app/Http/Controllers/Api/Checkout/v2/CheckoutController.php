<?php
namespace App\Http\Controllers\Api\Checkout\v2;

use App\Bll\CouponCheck;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\Cart;
use App\Models\CategoryGroup;
use App\Models\ContractPackage;
use App\Models\ContractPackagesUser;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\CustomerWallet;
use App\Models\Group;
use App\Models\GroupRegion;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\Service;
use App\Models\Shift;
use App\Models\Technician;
use App\Models\Transaction;
use App\Models\UserAddresses;
use App\Models\Visit;
use App\Notifications\SendPushNotification;
use App\Services\v2\Appointment;
use App\Support\Api\ApiResponse;
use App\Traits\imageTrait;
use App\Traits\NotificationTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{

    public $daysOfWeek = [
        ['id' => 1, 'name' => 'Saturday'],
        ['id' => 2, 'name' => 'Sunday'],
        ['id' => 3, 'name' => 'Monday'],
        ['id' => 4, 'name' => 'Tuesday'],
        ['id' => 5, 'name' => 'Wednesday'],
        ['id' => 6, 'name' => 'Thursday'],
        ['id' => 7, 'name' => 'Friday'],
    ];

    use ApiResponse, imageTrait, NotificationTrait;

    public function __construct()
    {
        $this->middleware('localization');

    }

    protected function checkTimeDate(Request $request)
    {
        try {

            $rules = [
                'user_address_id' => 'required|exists:user_addresses,id',
                'shift_id'        => 'required|exists:shifts,id',

            ];

            $validator = Validator::make($request->all(), $rules);
            // return self::apiResponse(200, __('api.test_checkout'), $this->body);

            if ($validator->fails()) {
                return self::apiResponse(400, 'Validation failed', $validator->errors());
            }

            $user                  = auth()->user('sanctum');
            $carts                 = Cart::query()->where('user_id', $user->id)->get();
            $parent_payment_method = null;

            if (! $carts->first() && ! $carts->first()?->time) {
                return self::apiResponse(400, t_('Cart is empty'), []);
            }

            $services = [];

            foreach ($carts as $cart) {
                $services[] = [
                    'amount' => $cart->quantity,
                    'id'     => $cart->service_id,
                ];
            }

            if ($carts->first()->type == 'package') {
                $total = $carts->first()->price;
                if ($request->payment_method == 'wallet' && $total > $user->point) {
                    return self::apiResponse(400, __('api.Your wallet balance is not enough to complete this process'), []);
                }
                return $this->saveContract($user, $request, $total, $carts);
            }

            $total = $this->calc_total($carts);
            if ($carts->first()) {
                $shift = Shift::find($request->shift_id);

            } else {
                DB::rollback();
                return self::apiResponse(400, __('api.cart empty'), $this->body);

            }

            if (empty($shift)) {
                DB::rollback();
                return false;
            }

            $regionId = UserAddresses::where('id', $request->user_address_id)->pluck('region_id')->toArray();

            if (empty($regionId)) {

                return self::apiResponse(400, __('api.address_not_found'), $this->body);
            }

            // dd($regionId);
            $region = UserAddresses::where('id', $request->user_address_id)
                ->orderBy('id', 'desc')
                ->pluck('region_id')
                ->first();

            $remaining_days = Carbon::now()->diffInDays(Carbon::parse($carts->first()->date)) + 1;
            $page_number    = floor($remaining_days / 14);
            // dd($services);
            $time      = new Appointment($regionId, $services, null, $page_number);
            $user_cart = Cart::where('user_id', auth()->user()->id)->first();
            if ($user_cart != null) {
                $time_on_cart_to_user = Carbon::parse($user_cart->time)->format('g:i A') ?? null;
                $date_on_cart_to_user = $user_cart->date ?? null;

                $dayName = Carbon::parse($date_on_cart_to_user)->locale('ar')->translatedFormat('l');
            }

            // dd($dayName);
            $times = $time->getAvailableTimesFromDate();
            if ($times) {
                // dd($times);

                $days = array_column($times, 'day');

                if (! in_array($carts->first()->date, $days)) {
                    DB::rollback();
                    return self::apiResponse(400, __('api.This Time is not available'), $this->body);
                }

                foreach ($times as $time) {
                    $timeEntries = $time['times']; // Access the array of time entries

                    $times_values = [];
                    foreach ($timeEntries as $entry) {
                        $times_values[] = $entry['time'];     // Access 'time'
                        $shiftId        = $entry['shift_id']; // Access 'shift_id' if needed
                                                              // You can now use $timeValue and $shiftId as needed
                    }
                    // dd($times_values);
                    // dd(  $times_values);

                    if (! in_array(date("g:i A", strtotime($carts->first()->time)), $times_values) && $carts->first()->date === $time['day']) {
                        DB::rollback();
                        return self::apiResponse(400, __('api.This Time is not available'), $this->body);
                    }
                }
            }

            $shiftGroupsIds = Shift::where('id', $shift->id)
                ->where('is_active', 1)->pluck('group_id')->toArray();
            $shiftGroupsIds = array_merge(...array_map(function ($jsonString) {
                return array_map('intval', json_decode($jsonString, true));
            }, $shiftGroupsIds));

            $shiftGroupsIds = GroupRegion::whereIn('group_id', $shiftGroupsIds)->where('region_id', $region)

                ->pluck('group_id')->toArray();

            // dd($shiftGroupsIds);

            $category_ids = $carts->pluck('category_id')->toArray();
            $category_ids = array_unique($category_ids);

            foreach ($category_ids as $key => $category_id) {

                $cart = Cart::query()->where('user_id', auth('sanctum')->user()->id)
                    ->where('category_id', $category_id)->first();
                $booking_no = 'dash2023/' . $cart->id;
                $minutes    = 0;

                $bookSetting = BookingSetting::where('service_id', $cart->service_id)->first();
                if ($bookSetting) {
                    foreach (Service::with('BookingSetting')->whereIn('id', $carts->pluck('service_id')->toArray())->get() as $service) {
                        $serviceMinutes = $service->BookingSetting->service_duration
                         * $carts->where('service_id', $service->id)->first()->quantity;
                        $minutes += $serviceMinutes;
                    }
                }

                $address    = UserAddresses::find($request->user_address_id);
                $booking_id = Booking::whereHas('address', function ($qu) use ($address) {
                    $qu->where('region_id', $address->region_id);
                })->whereHas('category', function ($qu) use ($category_id) {
                    $qu->where('category_id', $category_id);
                })->where('date', $cart->date)->pluck('id')->toArray();

                $assign_to_id = 0;

                $group = Group::where('active', 1)->whereHas('regions', function ($qu) use ($address) {
                    $qu->where('region_id', $address->region_id);
                })->whereIn('id', $shiftGroupsIds);

                //
                $technicians = Technician::whereIn('group_id', $shiftGroupsIds)->with('workingDays')->get();

                // dd($technicians);
                $dayName = Carbon::parse($cart->date)->format('l');
                $dayId   = collect($this->daysOfWeek)->firstWhere('name', $dayName)['id'];

                foreach ($technicians as $tech) {
                    if ($tech->workingDays->isNotEmpty()) {

                        // Extract the day IDs from the technician's working days
                        $workingDays = $tech->workingDays->pluck('day_id')->toArray();

                        // Check if the dayId is in the workingDays array
                        $exists = in_array($dayId, $workingDays);

                        if ($exists) {
                            $techIdsOnThisDay[] = $tech->group_id;
                        }
                    } else {

                        // If the technician has no working days, consider them as not working
                        $techIds_not_work[] = $tech->group_id;
                    }
                }

                //
                $this->logActivity(' before Processing the Test Checkout ');

                // dd($address->region_id);

                $group = Group::where('active', 1)->whereHas('regions', function ($qu) use ($address) {
                    $qu->where('region_id', $address->region_id);
                })->whereIn('id', $techIdsOnThisDay)->pluck('id')->toArray();

                // dd(empty($group));

                if (empty($group)) {
                    DB::rollback();
                    return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
                }
                // dd($cart->time);

                if ($cart->time == '23:00:00') {
                    $takenGroupsIds = Visit::where('start_time', '<', Carbon::parse($cart->time)->copy()
                            ->addMinutes(($bookSetting->service_duration) * $cart->quantity)
                            ->format('H:i:s'))
                        ->where('end_time', '>', $cart->time)
                        ->activeVisits()->whereIn('booking_id', $booking_id)
                        ->whereIn('assign_to_id', $techIdsOnThisDay)->pluck('assign_to_id')->toArray();
                    // dd($takenGroupsIds);
                } else {

                    $takenGroupsIds = Visit::where('start_time', '<', Carbon::parse($cart->time)->copy()
                            ->addMinutes(($bookSetting->service_duration + $bookSetting->buffering_time) * $cart->quantity)
                            ->format('H:i:s'))
                        ->where('end_time', '>', $cart->time)
                        ->activeVisits()->whereIn('booking_id', $booking_id)
                        ->whereIn('assign_to_id', $techIdsOnThisDay)->pluck('assign_to_id')->toArray();
                }

                $availableShiftGroupsIds = array_diff($group, $takenGroupsIds);

                // dd($availableShiftGroupsIds);

                if (empty($availableShiftGroupsIds)) {

                    return self::apiResponse(400, __('api.This Time is not available'), $this->body);
                }

            }

            $cart_updated = $carts->first();

            // Add 30 minutes
            $cart_updated->created_at = Carbon::now()->addMinutes(30);
            $cart_updated->save();
            $this->logActivity(' after Processing the Test Checkout ');

            $cart_updated = $carts->first();

            // Add 30 minutes
            $cart_updated->created_at = Carbon::now()->addMinutes(30);
            $cart_updated->save();

            return self::apiResponse(200, __('api.test_checkout'), $this->body);
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
                    'takenGroupsIds'    => $takenGroupsIds ?? null,
                    'shiftGroupsIds'    => $shiftGroupsIds ?? null,
                    'assign_to_id'      => $assign_to_id ?? null,
                    'cart'              => $cart ?? '',
                    'success'           => false,
                    'status_code'       => 500,

                ])
                ->log('Exception while processing the test checkout endpoint');

            return response()->json(['error' => 'Failed .'], 500);

        }

    }

    

    protected function checkout(Request $request)
    {

        try {

            $rules = [
                'user_address_id'  => 'required|exists:user_addresses,id',
                'car_user_id'      => 'required|exists:car_clients,id',
                'payment_method'   => 'required|in:cache,visa,wallet,package',
                'shift_id'         => 'required|exists:shifts,id',
                'coupon'           => 'nullable|numeric',
                'transaction_id'   => 'nullable',
                'wallet_discounts' => 'nullable|numeric',
                'amount'           => 'nullable|numeric',
                'file'             => 'nullable',
                'image'            => 'nullable|image|mimes:jpeg,jpg,png,gif',
                'notes'            => 'nullable',
            ];
            $request->validate($rules, $request->all());
            $user                  = auth()->user('sanctum');
            $carts                 = Cart::query()->where('user_id', $user->id)->get();
            $parent_payment_method = null;

            if (! $carts->first()) {
                return self::apiResponse(400, t_('Cart is empty'), []);
            }

            $code = $carts->first()->coupon_id;

            $coupon = Coupon::find($code);
            $total  = $this->calc_total($carts);

            if ($coupon) {
                $coupon_user = CouponUser::query()->where('coupon_id', $coupon->id)
                    ->where('user_id', auth()->user()->id)->get();
                $check          = new CouponCheck();
                $match_response = $check->check_coupon_services_match($coupon, $total, $carts);
                if ($match_response['error']) {
                    return self::apiResponse(400, __('api.This coupon con not be used to any of these services !'), $this->body);
                }
                $discount = $match_response['discount'];
                $res      = $check->check_avail($coupon, $coupon_user, $total);
                if (key_exists('success', $res)) {
                    CouponUser::query()->create([
                        'user_id'   => auth()->user()->id,
                        'coupon_id' => $coupon->id,
                    ]);
                    foreach ($carts as $cart) {
                        $cart->update([
                            'coupon_id' => $coupon->id,
                        ]);
                    }
                    $coupon->times_used++;
                    $coupon->save();
                    $sub_total = $total - $discount;
                    // $this->body['coupon_value'] = $discount;
                    // $this->body['total']        = $total;
                    // $this->body['sub_total']    = $sub_total;
                }
            }

            if ($carts->first()->type == 'package') {
                $total = $carts->first()->price;
                if ($request->payment_method == 'wallet' && $total > $user->point) {
                    return self::apiResponse(400, __('api.Your wallet balance is not enough to complete this process'), []);
                }
                return $this->saveContract($user, $request, $total, $carts);
            } else {
                // if ($request->payment_method == 'wallet' && $request->amount > $user->point) {
                //     return self::apiResponse(400, __('api.Your wallet balance is not enough to complete this process'), []);
                // }
                $uploadImage = null;
                if ($request->image && $request->image != null) {
                    $image       = $this->storeImages($request->image, 'order');
                    $uploadImage = 'storage/images/order' . '/' . $image;
                }
                $uploadFile = null;
                if ($request->file && $request->file != null) {
                    $file       = $this->storeImages($request->file, 'order');
                    $uploadFile = 'storage/images/order' . '/' . $file;
                }

                foreach ($carts as $cart) {
                    $now                  = Carbon::now('Asia/Riyadh');
                    $contractPackagesUser = ContractPackagesUser::where('user_id', auth()->user()->id)
                        ->whereDate('end_date', '>=', $now)
                        ->where(function ($query) use ($cart) {
                            $query->whereHas('contactPackage', function ($qu) use ($cart) {
                                $qu->whereHas('ContractPackagesServices', function ($qu) use ($cart) {
                                    $qu->where('service_id', $cart->service_id);
                                });
                            });
                        })->first();

                    if ($contractPackagesUser) {
                        $contractPackage       = ContractPackage::where('id', $contractPackagesUser->contract_packages_id)->first();
                        $cart->coupon          = null;
                        $parent_payment_method = $contractPackagesUser->payment_method;
                        if ($cart->quantity < $contractPackage->visit_number - $contractPackagesUser->used) {
                            $contractPackagesUser->increment('used', $cart->quantity);
                        } else {
                            $contractPackagesUser->increment('used', ($contractPackage->visit_number - $contractPackagesUser->used));
                        }
                    }
                }

                return $this->saveOrder($user, $request, $total, $carts, $uploadImage, $uploadFile, $parent_payment_method);
            }
        } catch (Exception $e) {

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
                    'status_code'       => 500,

                ])
                ->log('Exception while processing the checkout endpoint');

            return response()->json(['error' => 'Failed .'], 500);
        }
    }

    private function calc_total($carts)
    {
        $total = [];
        for ($i = 0; $i < $carts->count(); $i++) {
            $cart_total = ($carts[$i]->price) * $carts[$i]->quantity;
            $total[]    = $cart_total;
        }
        return array_sum($total);
    }

    private function saveOrder($user, $request, $total, $carts, $uploadImage, $uploadFile, $parent_payment_method)
    {

        DB::beginTransaction(); // Start the transaction

        try {
            // dd($request->shift_id);

            $totalAfterDiscount = $total - $request->coupon;
            $order              = Order::create([
                'user_id'         => $user->id,
                'discount'        => $request->coupon,
                'user_address_id' => $request->user_address_id,
                'sub_total'       => $total,
                'total'           => $totalAfterDiscount,

                'partial_amount'  => $totalAfterDiscount,
                'status_id'       => 1,
                'file'            => $uploadFile,
                'image'           => $uploadImage,
                'notes'           => $request->notes,
                'car_user_id'     => $request->car_user_id,
            ]);
            $address  = UserAddresses::where('id', $order->user_address_id)->first();
            $services = [];
            foreach ($carts as $cart) {
                $services[] = ['id' => $cart->service_id, 'amount' => $cart->quantity];
                OrderService::create([
                    'order_id'    => $order->id,
                    'service_id'  => $cart->service_id,
                    'price'       => $cart->price,
                    'quantity'    => $cart->quantity,
                    'category_id' => $cart->category_id,
                ]);
                $service = Service::query()->find($cart->service_id);
                $service?->save();
            }
            if ($cart) {
                $shift = Shift::find($request->shift_id);
                // dd($shift);

            } else {
                DB::rollback();
                return self::apiResponse(400, __('api.cart empty'), $this->body);

            }

            if (empty($shift)) {
                DB::rollback();
                return false;
            }

            $remaining_days = Carbon::now()->diffInDays(Carbon::parse($cart->date)) + 1;
            $page_number    = floor($remaining_days / 14);
            $time           = new Appointment($address->region_id, $services, null, $page_number);
            $times          = $time->getAvailableTimesFromDate();
            if ($times) {

                $days = array_column($times, 'day');
                if (! in_array($cart->date, $days)) {
                    DB::rollback();
                    return self::apiResponse(400, __('api.This Time is not available'), $this->body);
                }
                // dd($times);
                foreach ($times as $time) {
                    $timeEntries  = $time['times']; // Access the array of time entries
                    $times_values = [];
                    foreach ($timeEntries as $entry) {
                        $times_values[] = $entry['time'];     // Access 'time'
                        $shiftId        = $entry['shift_id']; // Access 'shift_id' if needed
                                                              // You can now use $timeValue and $shiftId as needed
                    }
                    // dd(in_array(date("g:i A", strtotime($cart->time)), $times_values) && $cart->date == $time['day']);

                    if (! in_array(date("g:i A", strtotime($cart->time)), $times_values) && $cart->date == $time['day']) {
                        DB::rollback();

                        return self::apiResponse(400, __('api.This Time is not available'), $this->body);
                    }
                }
            }

            $shiftGroupsIds = Shift::where('id', $shift->id)->pluck('group_id')->toArray();
            // dd($shiftGroupsIds);
            $shiftGroupsIds = array_merge(...array_map(function ($jsonString) {
                return array_map('intval', json_decode($jsonString, true));
            }, $shiftGroupsIds));

            // dd($shiftGroupsIds);
            $category_ids = $carts->pluck('category_id')->toArray();
            $category_ids = array_unique($category_ids);

            foreach ($category_ids as $key => $category_id) {

                $cart = Cart::query()->where('user_id', auth('sanctum')->user()->id)
                    ->where('category_id', $category_id)->first();
                $booking_no = 'dash2023/' . $cart->id;
                $minutes    = 0;

                $bookSetting = BookingSetting::where('service_id', $cart->service_id)->first();
                if ($bookSetting) {
                    foreach (Service::with('BookingSetting')->whereIn('id', $carts->pluck('service_id')->toArray())->get() as $service) {
                        $serviceMinutes = $service->BookingSetting->service_duration
                         * $carts->where('service_id', $service->id)->first()->quantity;
                        $minutes += $serviceMinutes;
                    }
                }

                $address    = UserAddresses::where('id', $order->user_address_id)->first();
                $booking_id = Booking::whereHas('address', function ($qu) use ($address) {
                    $qu->where('region_id', $address->region_id);
                })->whereHas('category', function ($qu) use ($category_id) {
                    $qu->where('category_id', $category_id);
                })->where('date', $cart->date)->pluck('id')->toArray();

                $activeGroups = Group::where('active', 1)->pluck('id')->toArray();
                $assign_to_id = 0;

                $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();

                $dayName = Carbon::parse($cart->date)->format('l');
                $dayId   = collect($this->daysOfWeek)->firstWhere('name', $dayName)['id'];

                                        //
                $techIds_not_work = []; // Array to store group IDs of technicians not working on the given day
                $techIdsOnThisDay = [];

                // Retrieve all technicians associated with the shift groups
                $technicians = Technician::whereIn('group_id', $shiftGroupsIds)->with('workingDays')->get();

                // dd($technicians);

                foreach ($technicians as $tech) {
                    if ($tech->workingDays->isNotEmpty()) {

                        // Extract the day IDs from the technician's working days
                        $workingDays = $tech->workingDays->pluck('day_id')->toArray();

                        // Check if the dayId is in the workingDays array
                        $exists = in_array($dayId, $workingDays);

                        if ($exists) {
                            $techIdsOnThisDay[] = $tech->group_id;
                        }
                    } else {

                        // If the technician has no working days, consider them as not working
                        $techIds_not_work[] = $tech->group_id;
                    }
                }

                // ------------------[ Group Availability Check ]------------------

                $group = Group::where('active', 1)
                    ->whereHas('regions', function ($qu) use ($address) {
                        $qu->where('region_id', $address->region_id);
                    })
                    ->whereIn('id', $techIdsOnThisDay);

                // dd($group->get());

                if ($group->get()->isEmpty()) {
                    DB::rollback();
                    return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
                }

                // ------------------[ Time Range Calculation ]------------------
                $serviceDuration = $bookSetting->service_duration ?? 0;
                $bufferingTime   = $bookSetting->buffering_time ?? 0;
                $totalDuration   = ($serviceDuration + $bufferingTime) * $cart->quantity;

                $startDateTime = Carbon::parse("{$cart->date} {$cart->time}", 'Asia/Riyadh');
                $endDateTime   = $startDateTime->copy()->addMinutes($totalDuration);

                // ------------------[ Conflict Check Using Full DateTime ]------------------
                $takenGroupsIds = Visit::whereHas('booking', function ($query) use ($cart) {
                    $query->where('date', $cart->date); // Ensure visits match the date of cart
                })
                    ->where(function ($q) use ($startDateTime, $endDateTime) {
                        $q->whereRaw("STR_TO_DATE(CONCAT(bookings.date, ' ', visits.start_time), '%Y-%m-%d %H:%i:%s') < ?", [$endDateTime])
                            ->whereRaw("STR_TO_DATE(CONCAT(bookings.date, ' ', visits.end_time), '%Y-%m-%d %H:%i:%s') > ?", [$startDateTime]);
                    })
                    ->activeVisits()
                    ->whereIn('booking_id', $booking_id)
                    ->whereIn('assign_to_id', $techIdsOnThisDay)
                    ->join('bookings', 'visits.booking_id', '=', 'bookings.id') // join needed for date access
                    ->pluck('assign_to_id');

                // ------------------[ Assign Group Based on Availability ]------------------
                if ($takenGroupsIds->isNotEmpty()) {
                    $assign_to_id = $group->whereNotIn('id', $takenGroupsIds)->inRandomOrder()?->first()?->id;
                    if (! isset($assign_to_id)) {
                        DB::rollback();
                        return self::apiResponse(400, __('api.This Time is not available'), $this->body);
                    }
                } else {
                    $assign_to_id = $group->inRandomOrder()?->first()?->id;
                    if (! isset($assign_to_id)) {
                        DB::rollback();
                        return self::apiResponse(400, __('api.This Time is not available'), $this->body);
                    }
                }

            }

            // dd($takenGroupsIds);

            $bookingInsert = Booking::query()->create([
                'booking_no'        => $booking_no,
                'user_id'           => auth('sanctum')->user()->id,
                'category_id'       => $category_id,
                'order_id'          => $order->id,
                'service_id'        => $cart->service_id,
                'user_address_id'   => $order->user_address_id,
                'booking_status_id' => 1,
                'notes'             => $cart->notes,
                'quantity'          => $cart->quantity,
                'date'              => $cart->date,
                'type'              => 'service',
                'time'              => Carbon::parse($cart->time)->timezone('Asia/Riyadh')->toTimeString(),
                'end_time'          => $minutes ? Carbon::parse($cart->time)->timezone('Asia/Riyadh')->addMinutes($minutes)->toTimeString() : null,
            ]);

            // dd($cart->time);

            $start_time                    = Carbon::parse($cart->time)->timezone('Asia/Riyadh')->toTimeString();
            $end_time                      = $minutes ? Carbon::parse($cart->time)->timezone('Asia/Riyadh')->addMinutes($minutes)->toTimeString() : null;
            $validated['start_time']       = $start_time;
            $validated['end_time']         = $end_time;
            $validated['duration']         = $minutes;
            $validated['visite_id']        = rand(1111, 9999) . '_' . date('Ymd');
            $validated['assign_to_id']     = $assign_to_id;
            $validated['booking_id']       = $bookingInsert->id;
            $validated['visits_status_id'] = 1;
            $visitInsert                   = Visit::query()->create($validated);

            $allTechn = Technician::where('group_id', $assign_to_id)->whereNotNull('fcm_token')->get();

            if (count($allTechn) > 0) {

                $title   = 'موعد زيارة جديد';
                $message = 'لديك موعد زياره جديد';

                foreach ($allTechn as $tech) {
                    Notification::send(
                        $tech,
                        new SendPushNotification($title, $message)
                    );
                }

                $techFcmArray  = $allTechn->pluck('fcm_token');
                $adminFcmArray = Admin::whereNotNull('fcm_token')->pluck('fcm_token');
                $FcmTokenArray = $techFcmArray->merge($adminFcmArray)->toArray();

                $notification = [
                    'device_token' => $FcmTokenArray,
                    'title'        => $title,
                    'message'      => $message,
                    'type'         => 'technician',
                    'code'         => 1,
                ];

                $this->pushNotification($notification);
            }

            $payment_method = $request->payment_method;
            if ($payment_method == 'wallet') {
                $transaction = Transaction::create([
                    'order_id'           => $order->id,
                    'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
                    'payment_result'     => 'success',
                    'payment_method'     => $payment_method,
                ]);
                Order::where('id', $order->id)->update(['partial_amount' => 0]);
            } elseif ($payment_method == 'cache') {
                $transaction = Transaction::create([
                    'order_id'           => $order->id,
                    'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
                    'payment_result'     => 'success',
                    'payment_method'     => $payment_method,
                ]);
                Order::where('id', $order->id)->update(['partial_amount' => $totalAfterDiscount]);
            } elseif ($payment_method == 'package') {
                $transaction = Transaction::create([
                    'order_id'           => $order->id,
                    'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
                    'payment_result'     => 'success',
                    'payment_method'     => $parent_payment_method,
                ]);
                Order::where('id', $order->id)->update(['partial_amount' => 0]);
            } else {
                $transaction = Transaction::create([
                    'order_id'           => $order->id,
                    'transaction_number' => $request->transaction_id,
                    'payment_result'     => 'success',
                    'payment_method'     => $payment_method,
                ]);
                Order::where('id', $order->id)->update(['partial_amount' => 0]);
            }

            $user->update([
                'point' => $user->point - $request->wallet_discounts ?? 0,
            ]);

            $this->wallet($user, $total);

            Cart::query()->whereIn('id', $carts->pluck('id'))->delete();

            DB::commit(); // Commit the transaction

            $this->body['order_id'] = $order->id;

            activity()
                ->causedBy(auth()->user()) // Action performed by the authenticated user
                ->withProperties([
                    'title'          => 'A  checkout Endpoint  ',   // Descriptive title of the action
                    'user_id'        => auth()->user()->id,         // User’s ID for identification
                    'user_name'      => auth()->user()->first_name, // User’s name for clarity
                    'region_id'      => Cart::where('user_id', auth()->user()->id)->pluck('region_id')->first(),
                    'date'           => Cart::where('user_id', auth()->user()->id)->pluck('date')->first(),
                    'time'           => Cart::where('user_id', auth()->user()->id)->pluck('time')->first(),
                    'total'          => $total,
                    'transaction'    => $transaction->id,
                    'payment_method' => $transaction->payment_method,
                    'order_id'       => $order->id,
                    'price_in_cart'  => Cart::where('user_id', auth()->user()->id)->pluck('price')->first(),    // Total price of items in the cart (sum of prices)
                    'quantity'       => Cart::where('user_id', auth()->user()->id)->pluck('quantity')->first(), // Total quantity of items in the cart
                    'current_url'    => url()->current(),                                                       // URL of the page from which the action was triggered
                ])
                ->log('A Checkout  successfully '); //

            return self::apiResponse(200, __('api.order created successfully'), $this->body);
        } catch (\Exception $e) {
            DB::rollback(); // Rollback the transaction on error

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
                    'cart_id'           => Cart::where('user_id', auth()->user()->id)->pluck('id')->first() ?? '',
                    'date'              => $cart->date ?? '',
                    'time'              => $cart->time ?? '',
                    'total'             => $total,
                    'transaction'       => $transaction->id ?? '',
                    'payment_method'    => $transaction->payment_method ?? '',
                    'order_id'          => $order->id ?? '',

                ])
                ->log('Exception while processing the Checkout V2 endpoint');

            return self::apiResponse(500, __('api.Something went wrong, please try again later'), $this->body);
        }
    }

    private function saveContract($user, $request, $total, $carts)
    {
        $contractPackage     = ContractPackage::where('id', $carts->first()->contract_package_id)->first();
        $date                = Carbon::now('Asia/Riyadh')->addDays($contractPackage->time)->format('Y-m-d');
        $contractPackageUser = ContractPackagesUser::create([
            'used'                 => 0,
            'end_date'             => $date,
            'user_id'              => $user->id,
            'contract_packages_id' => $carts->first()->contract_package_id,
            'payment_method'       => $request->payment_method,
        ]);

        // $order = Order::create([
        //     'user_id' => $user->id,
        //     'sub_total' => $total,
        //     'total' => ($total),
        //     'status_id' => 1,
        //     'notes' => $request->notes,
        // ]);

        if ($request->payment_method == 'wallet') {
            $transaction = Transaction::create([
                //      'order_id' => $order->id,
                'contract_packages_users_id' => $contractPackageUser->id,
                'transaction_number'         => 'waller/' . rand(1111111111, 9999999999),
                'payment_result'             => 'success',
                'payment_method'             => $request->payment_method,
            ]);
            //   Order::where('id', $order->id)->update(array('partial_amount' => 0));
        } elseif ($request->payment_method == 'cache') {
            $transaction = Transaction::create([
                //      'order_id' => $order->id,
                'contract_packages_users_id' => $contractPackageUser->id,
                'transaction_number'         => 'cache/' . rand(1111111111, 9999999999),
                'payment_result'             => 'success',
                'payment_method'             => $request->payment_method,
            ]);
            //   Order::where('id', $order->id)->update(array('partial_amount' => ($total )));
        } else {
            Transaction::create([
                //       'order_id' => $order->id,
                'contract_packages_users_id' => $contractPackageUser->id,
                'transaction_number'         => $request->transaction_id,
                'payment_result'             => 'success',
                'payment_method'             => $request->payment_method,
                //  'amount' => $total,
            ]);

            //  Order::where('id', $order->id)->update(array('partial_amount' => 0));
        }
        $user->update([
            'point' => $user->point - $request->wallet_discounts ?? 0,
        ]);

        $this->wallet($user, $total);
        Cart::query()->whereIn('id', $carts->pluck('id'))->delete();
        // $this->body['order_id'] = $order->id;
        $this->body['order_id'] = $contractPackageUser->id;
        return self::apiResponse(200, __('api.order created successfully'), $this->body);
    }

    private function wallet($user, $total)
    {
        // dd("*");

        $walletSetting = CustomerWallet::query()->first();
        $wallet        = ($total * $walletSetting->order_percentage) / 100;

        if ($wallet > $walletSetting->refund_amount) {
            $point = $walletSetting->refund_amount;
        } else {
            $point = $wallet;
        }

        $user->update([
            'point' => $user->point + $point ?? 0,
        ]);
    }

    protected function paid(Request $request)
    {
        try {
            $rules = [
                'order_id'         => 'required|exists:orders,id',
                'payment_method'   => 'required|in:cache,visa,wallet',
                //   'amount' => 'required|numeric',
                'transaction_id'   => 'nullable',
                'wallet_discounts' => 'nullable|numeric',
            ];
            $request->validate($rules, $request->all());
            $user = auth()->user('sanctum');

            $trans = Transaction::where('order_id', $request->order_id)->get();
            if ($trans->isEmpty()) {
                Transaction::create([
                    'order_id'           => $request->order_id,
                    'transaction_number' => $request->transaction_id,
                    'payment_result'     => 'success',
                    'payment_method'     => $request->payment_method,
                    //     'amount' => $request->amount,
                ]);
            } else {
                Transaction::where('order_id', $request->order_id)->update([
                    //   'order_id' => $request->order_id,
                    'transaction_number' => $request->transaction_id,
                    'payment_result'     => 'success',
                    'payment_method'     => $request->payment_method,
                    //     'amount' => $request->amount,
                ]);
            }

            $order = Order::where('id', $request->order_id)->first();

            $order->update([
                //         'payment_status' => 'paid',
                'partial_amount' => 0,
            ]);

            $user->update([
                'point' => $user->point - $request->wallet_discounts ?? 0,
            ]);

            activity()
                ->causedBy(auth()->user())
                ->withProperties(
                    json_decode(json_encode([
                        'url'            => url()->current(),
                        'user_id'        => auth()->id(),
                        'user_name'      => auth()->user()->first_name ?? 'N/A',
                        'order_id'       => $request->order_id,
                        'payment_method' => $request->payment_method,
                        'transaction_id' => $trans->first()->id ?? 'N/A',
                    ]), JSON_PRETTY_PRINT)
                )
                ->log('Order Payment Completed endpoint paid v2');

            return self::apiResponse(200, __('api.paid successfully'), $this->body);
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
                    'user_name'         => auth()->user()->first_name ?? '',
                    'order_id'          => $request->order_id,
                    'payment_method'    => $request->payment_method,

                ])
                ->log('Exception while processing the paid endpoint');
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

    public function logActivity($msg)
    {
        activity()
            ->causedBy(auth()->user()) // Log the user who caused the action
            ->withProperties([
                'url'            => url()->current(),
                'user_id'        => auth()->user()->id,
                'user_name'      => auth()->user()->first_name,
                'region_id'      => $address->region_id ?? '',
                'cart_time'      => $cart->time ?? '',
                'cart_date'      => $cart->date ?? '',
                'takenGroupsIds' => $takenGroupsIds ?? null,
                'assign_to_id'   => $assign_to_id ?? null,
                'shiftGroupsIds' => $shiftGroupsIds ?? null,
                'total'          => $total ?? '',
                'service_id'     => $cart->service_id ?? '',
                'cart'           => $cart ?? '',
                'success'        => true,
                'status_code'    => 200,

            ])
            ->log($msg);
    }
}
