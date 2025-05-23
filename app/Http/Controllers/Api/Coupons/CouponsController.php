<?php
namespace App\Http\Controllers\Api\Coupons;

use App\Bll\CouponCheck;
use App\Http\Controllers\Controller;
use App\Http\Resources\Coupons\CouponsResource;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Support\Api\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function allCoupons()
    {
        $coupons = Coupon::query()->where('active', 1)->where('is_hidden', 0)
            ->where('start', '<=', Carbon::now('Asia/Riyadh'))->where('end', '>=', Carbon::now('Asia/Riyadh'))
            ->get();

        $this->body['coupons'] = CouponsResource::collection($coupons);
        return self::apiResponse(200, null, $this->body);
    }

    protected function submit(Request $request)
    {

        $code = $request->code;
        $user = auth()->user('sanctum');

        $carts = Cart::query()->where('user_id', $user->id)->get();
        if (! $carts->first()) {
            return self::apiResponse(400, t_('Cart is empty'), []);
        }
        $total  = $this->calc_total($carts);
        $coupon = Coupon::query()->where('code', $code)->first();

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
                // CouponUser::query()->create([
                //     'user_id' => auth()->user()->id,
                //     'coupon_id' => $coupon->id,
                // ]);
                foreach ($carts as $cart) {
                    $cart->update([
                        'coupon_id' => $coupon->id,
                    ]);
                }
                $coupon->times_used++;
                $coupon->save();
                $sub_total                  = $total - $discount;
                $this->body['coupon_value'] = $discount;
                $this->body['total']        = $total;
                $this->body['sub_total']    = $sub_total;
                return self::apiResponse(200, $res['success'], $this->body);
            } else {
                return self::apiResponse(400, $res['error'], $this->body);
            }
        }
        return self::apiResponse(400, __('api.invalid code!'), $this->body);
    }
    protected function cancel(Request $request)
    {

        $user = auth()->user('sanctum');

        $carts = Cart::query()->where('user_id', $user->id)->get();
        if (! $carts->first()) {
            return self::apiResponse(400, __('api.Cart is empty'), []);
        }
        $total = $this->calc_total($carts);

        $coupon = Coupon::query()->where('code', $request->code)->first();
        if ($coupon) {
            CouponUser::query()->where('user_id', auth()->user()->id)
                ->where('coupon_id', $coupon->id)->delete();
            $coupon->times_used--;
            $coupon->save();
            foreach ($carts as $cart) {
                $cart->update([
                    'coupon_id' => null,
                ]);
            }
            $coupon_value = $coupon->type == 'percentage' ? ($coupon->value / 100) * $total : $coupon->value;
            $sub_total    = $request->total - $coupon_value;

            $this->body['coupon_value'] = $coupon_value;
            $this->body['total']        = $total;
            $this->body['sub_total']    = $sub_total;
            return self::apiResponse(200, null, $this->body);
        } else {
            return self::apiResponse(400, __('api.invalid code!'), $this->body);
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

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'code'       => 'required|string',
            'user_id'    => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'price'      => 'required|numeric|min:0',
        ]);

        $coupon = Coupon::where('code', $request->code)->first();
        if (! $coupon) {
            return response()->json(['message' => 'الكوبون غير صالح'], 400);
        }

        // تحقق من الاستخدام السابق
        $alreadyUsed = CouponUser::where('coupon_id', $coupon->id)
            ->where('user_id', $request->user_id)
            ->exists();

        if ($alreadyUsed) {
            return response()->json(['message' => 'لقد استخدمت هذا الكوبون مسبقاً'], 400);
        }

        // حساب الخصم
        $discount = $coupon->type === 'percentage'
        ? ($request->price * $coupon->value / 100)
        : min($coupon->value, $request->price);

        $sub_total = $request->price - $discount;

        // تحديث عدد الاستخدامات
        $coupon->increment('times_used');

        // حفظ في جدول CouponUser
        CouponUser::create([
            'coupon_id' => $coupon->id,
            'user_id'   => $request->user_id,
        ]);

        return response()->json([
            'message'   => 'تم تطبيق الكوبون بنجاح',
            'discount'  => $discount,
            'sub_total' => $sub_total,
            'coupon_id' => $coupon->id,
        ]);
    }

}
