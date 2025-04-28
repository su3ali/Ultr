<?php
namespace App\Http\Controllers\Api\BusinessOrder;

use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessOrder\BusinessOrderResource;
use App\Models\BusinessOrder;
use App\Models\Group;
use App\Support\Api\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BusinessOrderController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    protected function orderDetails($id)
    {
        $order = BusinessOrder::find($id);

        if (! $order) {
            return self::apiResponse(404, __('api.no_data_found'));
        }

        return self::apiResponse(200, null, [
            'businessOrder' => BusinessOrderResource::make($order),
        ]);
    }

    protected function myCurrentOrders()
    {
        $technicianId = auth('sanctum')->id();
        $groupIds     = Group::where('technician_id', $technicianId)->pluck('id');

        if ($groupIds->isEmpty()) {
            return self::apiResponse(404, __('api.no_data_found'));
        }

        $orders = BusinessOrder::with(['user', 'status', 'car'])
            ->whereIn('status_id', [1, 2])
            ->whereIn('assign_to_id', $groupIds)
            ->orderByDesc('created_at')
            ->get();

        if ($orders->isEmpty()) {
            return self::apiResponse(404, __('api.no_data_found'));
        }

        return self::apiResponse(200, null, [
            'businessOrder' => BusinessOrderResource::collection($orders),
        ]);
    }

    protected function myPreviousOrders()
    {
        try {
            $technicianId = auth('sanctum')->id();
            $groupIds     = Group::where('technician_id', $technicianId)->pluck('id');

            if ($groupIds->isEmpty()) {
                return self::apiResponse(404, __('api.no_data_found'));
            }

            $cacheKey = "myPreviousOrders_$technicianId";

            $orders = Cache::remember($cacheKey, 300, function () use ($groupIds) {
                return BusinessOrder::with(['user', 'status', 'car'])
                    ->whereIn('status_id', [3, 4])
                    ->whereIn('assign_to_id', $groupIds)
                    ->orderByDesc('created_at')
                    ->take(16)
                    ->get();
            });

            if ($orders->isEmpty()) {
                return self::apiResponse(404, __('api.no_data_found'));
            }

            return self::apiResponse(200, null, [
                'businessOrder' => BusinessOrderResource::collection($orders),
            ]);
        } catch (\Exception $e) {
            Log::error('myPreviousOrders error: ' . $e->getMessage());
            return self::apiResponse(500, __('api.something_went_wrong'));
        }
    }

    protected function changeStatus(Request $request)
    {
        // Check if language passed in header or query
        $locale = $request->header('Accept-Language') ?? $request->query('lang');

        if (! $locale) {
            app()->setLocale('ar'); // Default to Arabic
        } else {
            app()->setLocale($locale);
        }

        // Now continue normally
        $validator = Validator::make($request->all(), [
            'order_id'  => 'required|exists:business_orders,id',
            'status_id' => 'required|exists:business_order_statuses,id',
        ]);

        if ($validator->fails()) {
            return self::apiResponse(400, __('api.validation_error'), $validator->errors());
        }

        if ($request->status_id == BusinessOrder::STATUS_CANCELED) {
            return self::apiResponse(400, __('api.cannot_cancel_order'));
        }

        $order = BusinessOrder::find($request->order_id);

        if (! $order) {
            return self::apiResponse(404, __('api.no_data_found'));
        }

        $order->update([
            'status_id' => $request->status_id,
        ]);

        $order->refresh();

        return self::apiResponse(200, __('api.successfully_updated'), [
            'businessOrder' => BusinessOrderResource::make($order),
        ]);
    }

}
