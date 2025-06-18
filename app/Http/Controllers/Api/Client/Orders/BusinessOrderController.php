<?php
namespace App\Http\Controllers\Api\Client\Orders;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\BusinessOrder;
use App\Models\BusinessOrderStatus;
use App\Models\BusinessOrderTechnicianHistory;
use App\Models\Group;
use App\Models\Technician;
use App\Models\User;
use App\Notifications\SendPushNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class BusinessOrderController extends Controller
{
    public function index(Request $request)
    {

        $authUser = auth()->user();

        if (! $authUser || $authUser->type !== 'client_admin') {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $clientProjectId = $authUser->client_project_id ?? null;
        $isClientAdmin   = $authUser->type === 'client_admin';

        if ($isClientAdmin && ! $clientProjectId) {
            return response()->json([
                'success' => true,
                'message' => 'No project assigned to this admin.',
                'data'    => [],
            ]);
        }

        $orders = BusinessOrder::with([
            'user:id,first_name,last_name,phone',
            'category:id,title_ar,title_en',
            'service:id,title_ar,title_en,category_id',
            'group:id,name_ar,name_en',
            'car:id,Plate_number',
            'paymentMethod:id,name_ar,name_en',
            'status:id,name_ar,name_en',
        ])->orderBy('id', 'desc');

        // Filter by project only if available
        if ($clientProjectId) {
            $orders->where('client_project_id', $clientProjectId);
        }

        // Additional filters
        if (request()->filled('date_from')) {
            $orders->whereDate('created_at', '>=', request('date_from'));
        }

        if (request()->filled('date_to')) {
            $orders->whereDate('created_at', '<=', request('date_to'));
        }

        if (request()->filled('status') && request('status') !== 'all') {
            $status = BusinessOrderStatus::where('name_en', request('status'))
                ->orWhere('name_ar', request('status'))
                ->first();

            if ($status) {
                $orders->where('status_id', $status->id);
            } else {
                $orders->whereRaw('1 = 0'); // no match
            }
        }

        if (request()->filled('payment_method') && request('payment_method') !== 'all') {
            $orders->where('payment_method_id', request('payment_method'));
        }

        return response()->json([
            'success' => true,
            'data'    => $orders->get()->map(function ($order) {
                return [
                    'id'             => $order->id,
                    'user'           => $order->user,
                    'car'            => $order->car,
                    'service'        => $order->service,
                    'group'          => $order->group,
                    'payment_method' => $order->paymentMethod,
                    'status'         => $order->status,
                    'total'          => $order->total,
                    'created_at'     => $order->created_at,
                ];
            }),
        ]);
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'user_id'           => 'required|exists:users,id',
            'car_id'            => 'nullable|exists:car_clients,id',
            'service_id'        => 'required|exists:services,id',
            'status_id'         => 'nullable|exists:order_statuses,id',
            'assign_to_id'      => 'nullable|exists:groups,id',
            'reason_cancel_id'  => 'nullable|exists:reason_cancels,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'price'             => 'required|numeric',
            'notes'             => 'nullable|string',
            'client_project_id' => 'required|exists:client_projects,id',
            'branch_id'         => 'required|exists:client_project_branches,id',
            'floor_id'          => 'required|exists:client_project_branch_floors,id',
        ]);

        $data                = $request->except('_token', 'price');
        $data['category_id'] = 7;
        $data['status_id']   = BusinessOrder::STATUS_PENDING;
        $data['sub_total']   = $request->price;
        $data['total']       = $request->price;

        $order = BusinessOrder::create($data);

        // First attempt: technician assigned to the same project + branch + floor
        $technician = Technician::business()
            ->where('client_project_id', $request->client_project_id)
            ->where('branch_id', $request->branch_id)
            ->whereHas('floors', fn($q) => $q->where('floor_id', $request->floor_id))
        // ->withCount(['orderHistories' => function ($q) use ($request) {
        //     $q->whereHas('order', fn($oq) =>
        //         $oq->where('client_project_id', $request->client_project_id)
        //             ->where('branch_id', $request->branch_id)
        //             ->where('floor_id', $request->floor_id)
        //     );
        // }])
        // ->orderBy('order_histories_count', 'asc')
            ->first();

        // Second attempt: only if no technician was found for the floor — try technician with same project + branch (without floor)
        if (! $technician) {
            $technician = Technician::business()
                ->where('client_project_id', $request->client_project_id)
                ->where('branch_id', $request->branch_id)
                ->withCount(['orderHistories' => function ($q) use ($request) {
                    $q->whereHas('order', fn($oq) =>
                        $oq->where('client_project_id', $request->client_project_id)
                            ->where('branch_id', $request->branch_id)
                    );
                }])
                ->orderBy('order_histories_count', 'asc')
                ->first();
        }

        if ($technician) {
            $order->assign_to_id = $technician->group_id;
            $order->save();

            BusinessOrderTechnicianHistory::create([
                'order_id'      => $order->id,
                'technician_id' => $technician->id,
                'group_id'      => $technician->group_id,
            ]);

            // Send notification to the technician
            if (filled($technician->fcm_token)) {
                $title   = __('api.new_appointment');
                $message = __('api.you_have_new_visit_appointment') . ' ' . $order->id;

                Notification::send($technician, new SendPushNotification($title, $message));

                // FCM + Admins
                $adminTokens = Admin::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
                $fcmTokens   = array_filter(array_unique(array_merge([$technician->fcm_token], $adminTokens)));

                if (! empty($fcmTokens)) {
                    $this->pushNotification([
                        'device_token' => $fcmTokens,
                        'title'        => $title,
                        'message'      => $message,
                        'type'         => 'technician',
                        'code'         => 1,
                    ]);
                }
            }
        }

        session()->flash('success', __('dash.created_successfully'));
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_id'        => 'required|exists:services,id',
            'client_project_id' => 'required|exists:client_projects,id',
            'branch_id'         => 'nullable|exists:client_project_branches,id',
            'floor_id'          => 'nullable|exists:client_project_branch_floors,id',
            'car_id'            => 'nullable|exists:car_clients,id',
            'assign_to_id'      => 'nullable|exists:groups,id',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'price'             => 'required|numeric',
        ]);

        $order = BusinessOrder::findOrFail($id);

        $data              = $request->except('_token', '_method', 'price');
        $data['sub_total'] = round($request->price, 2);
        $data['total']     = round($request->price, 2);

        $order->update($data);

        $order->load(['user', 'car', 'service', 'status']);

        return response()->json([
            'status'  => true,
            'message' => 'تم التحديث بنجاح',
            'order'   => $order,
        ]);
    }

    public function destroy($id)
    {
        $order = BusinessOrder::findOrFail($id);
        $order->delete();

        return [
            'success' => true,
            'msg'     => __('dash.deleted_success'),
        ];
    }

    public function edit($id)
    {
        $order = BusinessOrder::with('user')->findOrFail($id);

        return response()->json([
            'id'                => $order->id,
            'user_id'           => $order->user_id,
            'car_id'            => $order->car_id,
            'service_id'        => $order->service_id,
            'sub_total'         => $order->sub_total,
            'client_project_id' => $order->client_project_id,
            'branch_id'         => $order->branch_id,
            'floor_id'          => $order->floor_id,
            'user'              => [
                'full_name' => $order->user->first_name . ' ' . $order->user->last_name,
                'phone'     => $order->user->phone,
            ],
        ]);
    }

    public function getRelatedGroups($orderId)
    {
        $order = BusinessOrder::with('group')->findOrFail($orderId);

        $projectId = $order->client_project_id ?? null;
        $branchId  = $order->branch_id ?? null;

        if (! $projectId || ! $branchId) {
            return response()->json([]);
        }

        $technicianIds = Technician::where('client_project_id', $projectId)
            ->where('branch_id', $branchId)
            ->pluck('id');

        $groupIds = \DB::table('group_technicians')
            ->whereIn('technician_id', $technicianIds)
            ->pluck('group_id');

        $groups = Group::whereIn('id', $groupIds)
            ->select('id', 'name_ar', 'name_en')
            ->get();

        return response()->json($groups);
    }

    public function changeGroup(Request $request, $id)
    {
        $request->validate([
            'assign_to_id' => 'required|exists:groups,id',
            'note'         => 'nullable|string|max:500',
        ]);

        $order = BusinessOrder::findOrFail($id);

        // Check if order status is Completed (assuming you have a constant for completed status)
        if ($order->status_id == BusinessOrder::STATUS_COMPLETED) {
            return response()->json([
                'success' => false,
                'message' => __('api.order_completed_cannot_change_technician'),
            ], 400);
        }

        $order->assign_to_id = $request->assign_to_id;
        $order->save();

        $group        = Group::with('leader')->findOrFail($request->assign_to_id);
        $technician   = $group->leader;
        $technicianId = optional($technician)->id;

        BusinessOrderTechnicianHistory::updateOrCreate(
            [
                'order_id'      => $order->id,
                'group_id'      => $request->assign_to_id,
                'technician_id' => $technicianId,
                'end_time'      => null,
            ],
            [
                'start_time' => now(),
                'notes'      => $request->note,
            ]
        );

        // Handle notification safely
        if ($technician && filled($technician->fcm_token)) {
            try {
                $title   = __('api.assignment_updated');
                $message = __('api.you_have_been_assigned_to_order') . ' #' . $order->id;

                Notification::send($technician, new SendPushNotification($title, $message));

                $fcmTokens = array_filter(array_unique(array_merge(
                    [$technician->fcm_token],
                    Admin::whereNotNull('fcm_token')->pluck('fcm_token')->toArray()
                )));

                if (! empty($fcmTokens)) {
                    $this->pushNotification([
                        'device_token' => $fcmTokens,
                        'title'        => $title,
                        'message'      => $message,
                        'type'         => 'technician',
                        'code'         => 2,
                    ]);
                }
            } catch (\Exception $e) {
                \Log::error('Notification sending failed in changeGroup', [
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return response()->json(['success' => true]);
    }

    public function changeStatus(Request $request, BusinessOrder $order)
    {
        $request->validate([
            'status_id' => 'required|exists:business_order_statuses,id',
        ]);

        $order->update([
            'status_id' => $request->status_id,
        ]);

        return response()->json(['message' => 'تم تحديث الحالة بنجاح']);
    }

}
