<?php

namespace App\Http\Controllers\Api\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\Cart;
use App\Models\Contract;
use App\Models\CustomerWallet;
use App\Models\Group;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\Service;
use App\Models\Technician;
use App\Models\Transaction;
use App\Models\UserAddresses;
use App\Models\CategoryGroup;
use App\Models\ContractPackage;
use App\Models\ContractPackagesUser;
use App\Models\Visit;
use App\Notifications\SendPushNotification;
use App\Support\Api\ApiResponse;
use App\Traits\imageTrait;
use App\Traits\NotificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;


class CheckoutController extends Controller
{
    use ApiResponse, imageTrait, NotificationTrait;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function checkout(Request $request)
    {
        $rules = [
            'user_address_id' => 'required|exists:user_addresses,id',
            'car_user_id' => 'required|exists:car_clients,id',
            'payment_method' => 'required|in:cache,visa,wallet',
            'coupon' => 'nullable|numeric',
            'transaction_id' => 'nullable',
            'wallet_discounts' => 'nullable|numeric',
            'amount' => 'nullable|numeric',
            'file' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'notes' => 'nullable',
        ];
        $request->validate($rules, $request->all());
        $user = auth()->user('sanctum');
        $carts = Cart::query()->where('user_id', $user->id)->get();


        if (!$carts->first()) {
            return self::apiResponse(400, t_('Cart is empty'), []);
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
                $image = $this->storeImages($request->image, 'order');
                $uploadImage = 'storage/images/order' . '/' . $image;
            }
            $uploadFile = null;
            if ($request->file && $request->file != null) {
                $file = $this->storeImages($request->file, 'order');
                $uploadFile = 'storage/images/order' . '/' . $file;
            }
            foreach ($carts as $cart) {
                $contractPackagesUser = ContractPackagesUser::with('contactPackage')->where('user_id', auth()->user()->id)
                    ->whereHas('contactPackage', function ($qu) {
                        $qu->where('ContractPackagesUser.used', '<', 'contactPackage.visit_number');
                    })
                    ->whereHas('contactPackage', function ($query) use ($cart) {
                        $query->where('service_id', $cart->service_id);
                    })->first();
                if ($contractPackagesUser) {
                    $cart->price = 0;
                    $cart->coupon = null;
                    $contractPackagesUser->increment('used');
                }
            }
            $total = $this->calc_total($carts);

            return $this->saveOrder($user, $request, $total, $carts, $uploadImage, $uploadFile);
        }
    }

    private function calc_total($carts)
    {
        $total = [];
        for ($i = 0; $i < $carts->count(); $i++) {
            $cart_total = ($carts[$i]->price) * $carts[$i]->quantity;
            $total[] = $cart_total;
        }
        return array_sum($total);
    }

    private function saveOrder($user, $request, $total, $carts, $uploadImage, $uploadFile)
    {
        $totalAfterDiscount = ($total - $request->coupon);
        $order = Order::create([
            'user_id' => $user->id,
            'discount' => $request->coupon,
            'user_address_id' => $request->user_address_id,
            'sub_total' => $total,
            'total' => $totalAfterDiscount,

            'partial_amount' => ($totalAfterDiscount),
            'status_id' => 1,
            'file' => $uploadFile,
            'image' => $uploadImage,
            'notes' => $request->notes,
            'car_user_id' => $request->car_user_id,
        ]);

        foreach ($carts as $cart) {
            OrderService::create([
                'order_id' => $order->id,
                'service_id' => $cart->service_id,
                'price' => $cart->price,
                'quantity' => $cart->quantity,
                'category_id' => $cart->category_id,
            ]);
            $service = Service::query()->find($cart->service_id);
            $service?->save();
        }
        $category_ids = $carts->pluck('category_id')->toArray();
        $category_ids = array_unique($category_ids);
        foreach ($category_ids as $key => $category_id) {

            $cart = Cart::query()->where('user_id', auth('sanctum')->user()->id)
                ->where('category_id', $category_id)->first();
            $booking_no = 'dash2023/' . $cart->id;
            $minutes = 0;
            // $contractPackages = ContractPackages::where('service_id',$cart->service_id)->get();
            // $contractPackagesUser = ContractPackagesUser::where('user_id', $user->id)
            //     ->where('used', '<', 'contactPackage.visit_number')
            //     ->whereHas('contactPackage', function ($query) use ($cart) {
            //         $query->where('service_id', $cart->service_id);
            //     })->first();
            // if ($contractPackagesUser) {
            // }

            $bookSetting = BookingSetting::where('service_id', $cart->service_id)->first();
            if ($bookSetting) {
                foreach (Service::with('BookingSetting')->whereIn('id', $carts->pluck('service_id')->toArray())->get() as $service) {
                    $serviceMinutes = ($service->BookingSetting->buffering_time + $service->BookingSetting->service_duration)
                        * $carts->where('service_id', $service->id)->first()->quantity;
                    $minutes += $serviceMinutes;
                }
            }

            $address = UserAddresses::where('id', $order->user_address_id)->first();
            $booking_id = Booking::whereHas('address', function ($qu) use ($address) {
                $qu->where('region_id', $address->region_id);
            })->whereHas('category', function ($qu) use ($category_id) {
                $qu->where('category_id', $category_id);
            })->where('date', $cart->date)->pluck('id')->toArray();
            $activeGroups = Group::where('active', 1)->pluck('id')->toArray();
            $visit = DB::table('visits')
                ->select('*', DB::raw('COUNT(assign_to_id) as group_id'))
                ->whereIn('booking_id', $booking_id)
                ->whereIn('assign_to_id', $activeGroups)
                ->groupBy('assign_to_id')
                ->orderBy('group_id', 'ASC');
            $assign_to_id = 0;
            if ($visit->get()->isEmpty()) {
                $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();
                $group = Group::where('active', 1)->whereHas('regions', function ($qu) use ($address) {
                    $qu->where('region_id', $address->region_id);
                })->whereIn('id', $groupIds)->inRandomOrder()->first();
                if ($group == null) {
                    return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
                }
                $assign_to_id = $group->id;
            } else {
                $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();
                $group = Group::where('active', 1)->whereHas('regions', function ($qu) use ($address) {
                    $qu->where('region_id', $address->region_id);
                })->whereIn('id', $groupIds);
                if ($group->count() == 0) {
                    return self::apiResponse(400, __('api.There is a category for which there are currently no technical groups available'), $this->body);
                }
                if (($visit->get()->count()) < ($group->get()->count())) {
                    $assign_to_id = $group->whereNotIn('id', $visit->pluck('assign_to_id')->toArray())->inRandomOrder()->first()->id;
                } else {
                    $assign_to_id = $visit->where('start_time', '!=', $cart->time)->inRandomOrder()->first()->assign_to_id;
                    // $ids = $visit->where('start_time', '!=', $cart->time)->pluck('assign_to_id')->toArray();
                    // $group = Group::where('active', 1)->whereIn('id', $ids)->inRandomOrder()->first();
                    // if ($group == null) {

                    // } else {
                    //     $assign_to_id = $group->id;
                    // }
                }
            }
            $bookingInsert = Booking::query()->create([
                'booking_no' => $booking_no,
                'user_id' => auth('sanctum')->user()->id,
                'category_id' => $category_id,
                'order_id' => $order->id,
                'service_id' => $cart->service_id,
                'user_address_id' => $order->user_address_id,
                'booking_status_id' => 1,
                'notes' => $cart->notes,
                'quantity' => $cart->quantity,
                'date' => $cart->date,
                'type' => 'service',
                'time' => Carbon::parse($cart->time)->timezone('Asia/Riyadh')->toTimeString(),
                'end_time' => $minutes ? Carbon::parse($cart->time)->timezone('Asia/Riyadh')->addMinutes($minutes)->toTimeString() : null,
            ]);

            $start_time = Carbon::parse($cart->time)->timezone('Asia/Riyadh')->toTimeString();
            $end_time =  $minutes ? Carbon::parse($cart->time)->timezone('Asia/Riyadh')->addMinutes($minutes)->toTimeString() : null;
            $validated['start_time'] =  $start_time;
            $validated['end_time'] = $end_time;
            $validated['duration'] = $minutes;
            $validated['visite_id'] = rand(1111, 9999) . '_' . date('Ymd');
            $validated['assign_to_id'] = $assign_to_id;
            $validated['booking_id'] = $bookingInsert->id;
            $validated['visits_status_id'] = 1;
            $visitInsert = Visit::query()->create($validated);



            $allTechn = Technician::where('group_id', $assign_to_id)->whereNotNull('fcm_token')->get();

            if (count($allTechn) > 0) {

                $title = 'موعد زيارة جديد';
                $message = 'لديك موعد زياره جديد';

                foreach ($allTechn as $tech) {
                    Notification::send(
                        $tech,
                        new SendPushNotification($title, $message)
                    );
                }

                $FcmTokenArray = $allTechn->pluck('fcm_token');

                $notification = [
                    'device_token' => $FcmTokenArray,
                    'title' => $title,
                    'message' => $message,
                    'type' => 'technician',
                    'code' => 1,
                ];

                $this->pushNotification($notification);
            }
        }
        if ($request->payment_method == 'wallet') {
            $transaction = Transaction::create([
                'order_id' => $order->id,
                'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
            ]);
            Order::where('id', $order->id)->update(array('partial_amount' => 0));
        } elseif ($request->payment_method == 'cache') {
            $transaction = Transaction::create([
                'order_id' => $order->id,
                'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
            ]);
            Order::where('id', $order->id)->update(array('partial_amount' => $totalAfterDiscount));
        } else {
            Transaction::create([
                'order_id' => $order->id,
                'transaction_number' => $request->transaction_id,
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
            ]);
            Order::where('id', $order->id)->update(array('partial_amount' => 0));
        }

        $user->update([
            'point' => $user->point - $request->wallet_discounts ?? 0
        ]);

        $this->wallet($user, $total);

        Cart::query()->whereIn('id', $carts->pluck('id'))->delete();
        $this->body['order_id'] = $order->id;
        return self::apiResponse(200, __('api.order created successfully'), $this->body);
    }

    private function saveContract($user, $request, $total, $carts)
    {
        //  $contractPackage = ContractPackage::where('id', $carts->first()->contract_package_id)->first();
        $contractPackageUser = ContractPackagesUser::create([
            'used' => 0,
            // 'visit_number' => $contractPackage->visit_number,
            'user_id' => $user->id,
            'contract_packages_id' => $carts->first()->contract_package_id,
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
                'transaction_number' => 'waller/' . rand(1111111111, 9999999999),
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
            ]);
            //   Order::where('id', $order->id)->update(array('partial_amount' => 0));
        } elseif ($request->payment_method == 'cache') {
            $transaction = Transaction::create([
                //      'order_id' => $order->id,
                'contract_packages_users_id' => $contractPackageUser->id,
                'transaction_number' => 'cache/' . rand(1111111111, 9999999999),
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
            ]);
            //   Order::where('id', $order->id)->update(array('partial_amount' => ($total )));
        } else {
            Transaction::create([
                //       'order_id' => $order->id,
                'contract_packages_users_id' => $contractPackageUser->id,
                'transaction_number' => $request->transaction_id,
                'payment_result' => 'success',
                'payment_method' => $request->payment_method,
                //  'amount' => $total,
            ]);

            //  Order::where('id', $order->id)->update(array('partial_amount' => 0));
        }
        $user->update([
            'point' => $user->point - $request->wallet_discounts ?? 0
        ]);

        $this->wallet($user, $total);
        Cart::query()->whereIn('id', $carts->pluck('id'))->delete();
        // $this->body['order_id'] = $order->id;
        $this->body['order_id'] = $contractPackageUser->id;
        return self::apiResponse(200, __('api.order created successfully'), $this->body);
    }

    private function wallet($user, $total)
    {

        $walletSetting = CustomerWallet::query()->first();

        $wallet = ($total * $walletSetting->order_percentage) / 100;

        if ($wallet > $walletSetting->refund_amount) {
            $point = $walletSetting->refund_amount;
        } else {
            $point = $wallet;
        }
        $user->update([
            'point' => $user->point + $point ?? 0
        ]);
    }

    protected function paid(Request $request)
    {
        $rules = [
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|in:cache,visa,wallet',
            //   'amount' => 'required|numeric',
            'transaction_id' => 'nullable',
            'wallet_discounts' => 'nullable|numeric',
        ];
        $request->validate($rules, $request->all());
        $user = auth()->user('sanctum');

        $request->validate($rules, $request->all());

        Transaction::create([
            'order_id' => $request->order_id,
            'transaction_number' => $request->transaction_id,
            'payment_result' => 'success',
            'payment_method' => $request->payment_method,
            //     'amount' => $request->amount,
        ]);

        $order = Order::where('id', $request->order_id)->first();

        $order->update([
            //         'payment_status' => 'paid',
            'partial_amount' => 0,
        ]);

        $user->update([
            'point' => $user->point - $request->wallet_discounts ?? 0,
        ]);

        return self::apiResponse(200, __('api.paid successfully'), $this->body);
    }
}
