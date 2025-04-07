<?php
namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource;
use App\Models\Booking;
use App\Models\Group;
use App\Models\Order;
use App\Models\RateService;
use App\Models\RateTechnician;
use App\Models\Shift;
use App\Models\Technician;
use App\Models\User;
use App\Models\Visit;
use App\Support\Api\ApiResponse;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('localization');
    }

    protected function myOrders()
    {
        $user   = User::with('orders.status', 'orders.bookings')->where('id', auth('sanctum')->user()->id)->first();
        $orders = Order::with('bookings.service.category')
            ->where('user_id', $user->id)
            ->orderBy('id', 'DESC')
            ->get();
        $this->body['orders'] = OrderResource::collection($orders);
        return self::apiResponse(200, null, $this->body);
    }
    protected function orderDetails($id)
    {
        $user  = User::with('orders.status', 'orders.bookings')->where('id', auth('sanctum')->user()->id)->first();
        $order = Order::with('bookings.service.category')
            ->where('user_id', $user->id)
            ->where('id', $id)
            ->first();
        $this->body['order'] = OrderResource::make($order);
        return self::apiResponse(200, null, $this->body);
    }
    // protected function rateTechnicians(Request $request){
    //     $rules = [
    //         'group_id' => 'required|exists:groups,id',
    //         'booking_id' => 'required|exists:bookings,id',
    //         'rate' => 'required|integer',
    //         'note' => 'nullable|string|max:255',
    //         'visit_id' => 'required|exists:visits,id',
    //     ];
    //     $request->validate($rules, $request->all());
    //     $technicians = Technician::query()->where('group_id', $request->group_id)->get();
    //     $order_id = Booking::query()->find($request->booking_id)->order_id;
    //     foreach ($technicians as $technician){
    //         RateTechnician::query()->create([
    //            'user_id' => auth()->user()->id,
    //            'technician_id' => $technician->id,
    //            'order_id' => $order_id,
    //             'visit_id' => $request->visit_id,
    //             'rate' => $request->rate,
    //            'note' => $request->note,
    //         ]);
    //     }
    //     return self::apiResponse(200, __('api.rated successfully'), $this->body);

    // }

    // protected function rateTechnicians(Request $request){
    //     $rules = [
    //         'group_id' => 'required|exists:groups,id',
    //         'booking_id' => 'required|exists:bookings,id',
    //         'visit_id' => 'required|exists:visits,id',
    //         'rate' => 'required|integer',
    //         'note' => 'nullable|string|max:255',
    //     ];
    //     $request->validate($rules, $request->all());
    //     $technicians = Technician::query()->where('group_id', $request->group_id)->get();
    //     $order_id = Booking::query()->find($request->booking_id)->order_id;
    //     foreach ($technicians as $technician){
    //         RateTechnician::query()->create([
    //            'user_id' => auth()->user()->id,
    //            'technician_id' => $technician->id,
    //             'visit_id' => $request->visit_id,
    //            'order_id' => $order_id,
    //            'rate' => $request->rate,
    //            'note' => $request->note,
    //         ]);
    //     }
    //     return self::apiResponse(200, __('api.rated successfully'), $this->body);

    // }

    protected function rateTechnicians(Request $request)
    {
        $rules = [
            'group_id'   => 'required|exists:groups,id',
            'booking_id' => 'required|exists:bookings,id',
            'visit_id'   => 'required|exists:visits,id',
            'rate'       => 'required|integer',
            'note'       => 'nullable|string|max:255',
        ];
        $request->validate($rules, $request->all());
        $group_id    = Group::where('id', $request->group_id)->first()->technician_id;
        $technicians = Technician::where('id', $group_id)->get();
        $order_id    = Booking::query()->find($request->booking_id)->order_id;
        foreach ($technicians as $technician) {
            RateTechnician::query()->create([
                'user_id'       => auth()->user()->id,
                'technician_id' => $technician->id,
                'visit_id'      => $request->visit_id,
                'order_id'      => $order_id,
                'rate'          => $request->rate,
                'note'          => $request->note,
            ]);
        }

        return self::apiResponse(200, __('api.rated successfully'), $this->body);

    }
    protected function rateService(Request $request)
    {
        $rules = [
            'visit_id' => 'required|exists:visits,id',
            'rate'     => 'required|integer',
            'note'     => 'nullable|string|max:255',
        ];
        $request->validate($rules, $request->all());

        $visit   = Visit::where('id', $request->visit_id)->first();
        $booking = Booking::where('id', $visit->booking_id)->first();

        RateService::query()->create([
            'user_id'    => auth()->user()->id,
            'service_id' => null,
            'visit_id'   => $request->visit_id,
            'order_id'   => $booking->order_id,
            'rate'       => $request->rate,
            'note'       => $request->note,
        ]);

        return self::apiResponse(200, __('api.rated successfully'), $this->body);

    }
    // protected function rateService(Request $request){
    //     $rules = [
    //         'booking_id' => 'required|exists:bookings,id',
    //         'visit_id' => 'required|exists:visits,id',
    //         'rate' => 'required|integer',
    //         'note' => 'nullable|string|max:255',
    //     ];

    //     $request->validate($rules, $request->all());
    //     $order_id = Booking::query()->find($request->booking_id)->order_id;
    //     $services = OrderService::where('order_id',$order_id)->get();
    //     foreach ($services as $service) {
    //         RateService::query()->create([
    //             'user_id' => auth()->user()->id,
    //             'service_id' => $service->service_id,
    //             'visit_id' => $request->visit_id,
    //             'order_id' => $order_id,
    //             'rate' => $request->rate,
    //             'note' => $request->note,
    //         ]);
    //     }

    //     return self::apiResponse(200, __('api.rated successfully'), $this->body);

    // }

    public function getOrderData($order_id)
    {
        $order = Order::with('bookings', 'userAddress.region')->find($order_id);

        if (! $order) {
            return response()->json([
                'status' => 404,
                'body'   => ['message' => __('api.order not found')],
            ]);
        }

        $booking  = $order->bookings->first();
        $regionId = optional($order->userAddress->region)->id;

        if (! $booking || ! $booking->date || ! $booking->time) {
            return response()->json([
                'status' => 422,
                'body'   => ['message' => 'Booking date or time not found.'],
            ]);
        }

        // try {
        //     $time = is_numeric($booking->time) ? date('H:i', $booking->time) : $booking->time;

        //     $bookingDateTime = \Carbon\Carbon::parse($booking->date . ' ' . $time, 'Asia/Riyadh');

        //     if ($bookingDateTime->isPast()) {
        //         return response()->json([
        //             'status' => 422,
        //             'body'   => ['message' => 'الوقت المحدد قد مضى. يرجى اختيار وقت آخر والمحاولة مرة أخرى.'],
        //         ]);
        //     }
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'status' => 500,
        //         'body'   => ['message' => 'خطأ أثناء التحقق من الوقت.'],
        //     ]);
        // }

        $formattedTime = is_numeric($booking->time)
        ? date('h:i A', $booking->time)
        : $booking->time;

        $visit = Visit::where('booking_id', $booking->id)->first();

        $firstShift = Shift::whereJsonContains('group_id', (string) $visit->group->id)->first();

        // $shiftGroupsIds = Shift::where('id', $firstShift->id)->pluck('group_id')->toArray();
        // // dd($shiftGroupsIds);
        // $shiftGroupsIds = array_merge(...array_map(function ($jsonString) {
        //     return array_map('intval', json_decode($jsonString, true));
        // }, $shiftGroupsIds));

        return response()->json([
            'status' => 200,
            'body'   => [
                'order'    => [
                    'id'        => $order->id,
                    'date'      => $booking->date,
                    'time'      => $formattedTime,
                    'serviceId' => $booking->service_id,
                    'amount'    => $booking->quantity,
                    'shift_id'  => $firstShift->id ?? null,
                    // 'shiftGroupsIds' => $shiftGroupsIds ?? null,
                ],
                'regionId' => $regionId,
            ],
        ]);
    }

}
