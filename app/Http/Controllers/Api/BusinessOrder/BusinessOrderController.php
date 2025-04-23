<?php
namespace App\Http\Controllers\Api\BusinessOrder;

use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessOrder\BusinessOrderResource;
use App\Models\BusinessOrder;
use App\Models\Group;
use App\Support\Api\ApiResponse;
use cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Log;

class BusinessOrderController extends Controller
{

    protected function orderDetails($id)
    {
        $order = BusinessOrder::find($id);

        if (! $order) {
            return self::apiResponse(404, __('api.Order not found'), []);
        }

        $this->body['businessOrder'] = BusinessOrderResource::make($order);
        return self::apiResponse(200, null, $this->body);
    }

    protected function myCurrentOrders()
    {
        $technicianId = auth('sanctum')->id();
        $groupIds     = Group::where('technician_id', $technicianId)->pluck('id');

        if ($groupIds->isEmpty()) {
            $this->body['businessOrder'] = [];
            return self::apiResponse(200, null, $this->body);
        }

        $orders = BusinessOrder::with(['user', 'status', 'car'])
            ->whereIn('status_id', [1, 2])
            ->whereIn('assign_to_id', $groupIds)
            ->orderByDesc('created_at')
            ->get();

        $this->body['businessOrder'] = BusinessOrderResource::collection($orders);
        return self::apiResponse(200, null, $this->body);
    }

    protected function myPreviousOrders()
    {
        try {
            $technicianId = auth('sanctum')->id();
            $groupIds     = Group::where('technician_id', $technicianId)->pluck('id');

            if ($groupIds->isEmpty()) {
                $this->body['businessOrder'] = [];
                return self::apiResponse(200, null, $this->body);
            }

            $cacheKey = "myPreviousOrders_$technicianId";

            $orders = cache()->remember($cacheKey, 300, function () use ($groupIds) {
                return BusinessOrder::with(['user', 'status', 'car'])
                    ->whereIn('status_id', [3, 4])
                    ->whereIn('assign_to_id', $groupIds)
                    ->orderByDesc('created_at')
                    ->take(16)
                    ->get();
            });

            $this->body['businessOrder'] = BusinessOrderResource::collection($orders);
            return self::apiResponse(200, null, $this->body);

        } catch (\Exception $e) {
            Log::error('myPreviousOrders error: ' . $e->getMessage());
            return self::apiResponse(500, __('api.Something went wrong, please try again later'), []);
        }
    }

    protected function changeStatus(Request $request)
    {
        $rules = [
            'order_id'  => 'required|exists:business_orders,id',
            'status_id' => 'required|exists:business_order_statuses,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return self::apiResponse(400, __('api.validation error'), $validator->errors());
        }
        if ($request->status_id == BusinessOrder::STATUS_CANCELED) {
            return self::apiResponse(400, __('api.can_not_cancel'), []);
        }

        if ($request->status_id == BusinessOrder::STATUS_CANCELED) {

            if ($request->status_id == BusinessOrder::STATUS_CANCELED) {
                return self::apiResponse(400, __('api.can not cancale'), []);
            }
        }

        $order = BusinessOrder::find($request->order_id);

        if (! $order) {
            return self::apiResponse(404, __('api.not found'), []);
        }

        $order->update([
            'status_id' => $request->status_id,
        ]);

        return self::apiResponse(200, __('api.successfully'), $this->body);
    }

}
