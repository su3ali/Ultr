<?php

namespace App\Http\Controllers\Api\Admin\home;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\home\VisitsResource;
use App\Models\Order;
use App\Models\Visit;
use App\Support\Api\ApiResponse;
use Carbon\Carbon;


class VisitsController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function currentOrders()
    {
        $orders = Visit::whereHas('booking', function ($q) {
            $q->whereHas('customer')->whereHas('address');
        })->with('booking', function ($q) {
            $q->with(['service' => function ($q) {
                $q->with('category');
            }, 'customer', 'address']);
        })->with('status')->whereIn('visits_status_id', [1, 2, 3, 4])
            ->orderBy('created_at', 'desc')->get();

        $this->body['visits'] = VisitsResource::collection($orders);
        return self::apiResponse(200, null, $this->body);
    }

    protected function previousOrders()
    {
        $orders = Visit::whereHas('booking', function ($q) {
            $q->whereHas('customer')->whereHas('address');
        })->with('booking', function ($q) {
            $q->with(['service' => function ($q) {
                $q->with('category');
            }, 'customer', 'address']);
        })->with('status')->whereIn('visits_status_id', [5, 6])->orderBy('created_at', 'desc')->get();
        $this->body['visits'] = VisitsResource::collection($orders);
        return self::apiResponse(200, null, $this->body);
    }

    protected function ordersByDateNow()
    {
        $orders = Visit::whereHas('booking', function ($q) {

            $q->where('date', Carbon::now('Asia/Riyadh')->format('Y-m-d'))->whereHas('customer')->whereHas('address');
        })->with('booking', function ($q) {
            $q->with(['service' => function ($q) {
                $q->with('category');
            }, 'customer', 'address']);
        })->with('status')->whereIn('visits_status_id', [1, 2, 3, 4])->orderBy('created_at', 'desc')->get();
        $this->body['visits'] = VisitsResource::collection($orders);
        return self::apiResponse(200, null, $this->body);
    }


    protected function orderDetails($id)
    {
        Order::findOrFail($id);
        $order = Visit::whereHas('booking', function ($q) {
            $q->whereHas('customer')->whereHas('address');
        })->with('booking', function ($q) {
            $q->with(['service' => function ($q) {
                $q->with('category');
            }, 'customer', 'address']);
        })->with('status')->where('id', $id)->first();
        $this->body['visits'] = VisitsResource::make($order);
        return self::apiResponse(200, null, $this->body);
    }
}
