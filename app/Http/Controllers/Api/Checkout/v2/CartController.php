<?php

namespace App\Http\Controllers\Api\Checkout\v2;

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
use App\Services\v2\Appointment;
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
                        'user_id' => auth()->user()->id,
                        'contract_package_id' => $package->id,
                        'price' => $package->price,
                        'quantity' => $package->visit_number,
                        'type' => 'package',
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
                $price = $service->price;
                $now = Carbon::now('Asia/Riyadh');
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
                    'user_id' => auth()->user()->id,
                    'service_id' => $service->id,
                    'icon_ids' => json_encode($request->icon_ids),
                    'category_id' => $service->category->id,
                    'price' => $price,
                    'quantity' => $request->quantity,
                    'type' => 'service',
                ]);
                $carts = Cart::query()->where('user_id', auth()->user()->id)->count();
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
        $cart = auth()->user()->carts->first();
        if ($cart) {
            $rules = [
                'category_ids' => 'required|array',
                'category_ids.*' => 'required|exists:categories,id',
                'date' => 'required|array',
                'date.*' => 'required|date',
                'time' => 'required|array',
                'time.*' => 'required|date_format:h:i A',
                'notes' => 'nullable|array',
                'notes.*' => 'nullable|string|max:191',
            ];
            $request->validate($rules, $request->all());
            if ($cart->type == 'service' || !$cart->type) {
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
                        'date' => $request->date[$key],
                        'time' => Carbon::parse($request->time[$key])->timezone('Asia/Riyadh')->toTimeString(),
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
                        'date' => $request->date[$key],
                        'time' => Carbon::parse($request->time[$key])->timezone('Asia/Riyadh')->toTimeString(),
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
                $response = $controlClass->makeAction($request->action, $cart, $service);

                $carts = Cart::query()->where('user_id', auth()->user()->id)->get();

                $tempTotal = $this->calc_total($carts);
                $now = Carbon::now('Asia/Riyadh');
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

                $total = number_format($tempTotal, 2);
                $cat_ids = $carts->pluck('category_id');
                if (key_exists('success', $response)) {
                    $this->body['total'] = $total;
                    $this->body['carts'] = [];
                    $cat_ids = array_unique($cat_ids->toArray());
                    foreach ($cat_ids as $cat_id) {
                        if ($cat_id) {
                            $this->body['carts'][] = [
                                'category_id' => $cat_id ?? 0,
                                'category_title' => Category::query()->find($cat_id)?->title ?? '',
                                'cart-services' => CartResource::collection($carts->where('category_id', $cat_id)),
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
            'services' => 'required|array',
            'services.*.id' => 'required|exists:services,id',
            'services.*.amount' => 'required|numeric',
            'region_id' => 'required|exists:regions,id',
            'package_id' => 'required',
            'page_number' => 'required|numeric',
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
        $carts = Cart::with('coupon')->where('user_id', auth()->user()->id)->where('type', 'service')->orWhereNull('type')->get();
        $cat_ids = $carts->pluck('category_id');
        $this->body['cart_type'] = auth()->user()->carts->first()?->type;
        $this->body['carts'] = [];
        $cat_ids = array_unique($cat_ids->toArray());
        foreach ($cat_ids as $cat_id) {
            if ($cat_id) {
                $this->body['carts'][] = [
                    'category_id' => $cat_id ?? 0,
                    'category_title' => Category::query()->find($cat_id)?->title ?? '',
                    'cart-services' => CartResource::collection($carts->where('category_id', $cat_id)),
                ];
            }
        }
        $total = number_format($this->calc_total($carts), 2, '.', '');
        $this->body['total'] = $total;
        $this->body['total_items_in_cart'] = auth()->user()->carts->count();

        //packages
        $cart_package = Cart::with('coupon')->where('user_id', auth()->user()->id)->where('type', 'package')->first();
        if ($cart_package) {
            $this->body['total'] = $cart_package->price;
            $this->body['total_items_in_cart'] = 1;
            $cat_id = $cart_package->category_id;
            $this->body['cart_package'][] = [
                'category_id' => $cat_id ?? 0,
                'category_title' => Category::query()->find($cat_id)?->title ?? '',
                'cart-services' => CartResource::make($cart_package),
            ];
        } else {
            $this->body['cart_package'] = null;
        }
        $this->body['coupon'] = null;
        $coupon = $carts->first()?->coupon;
        if ($coupon) {
            $match_response = CouponCheck::check_coupon_services_match($coupon, $total, $carts);
            $discount_value = $match_response['discount'];
            $this->body['coupon'] = [
                'code' => $coupon->code,
                'total_before_discount' => $total,
                'discount_value' => $discount_value,
                'total_after_discount' => $total - $discount_value,
            ];
        }
    }
}
