<?php
namespace App\Http\Controllers\Dashboard\BusinessProject;

use App\Models\City;
use App\Models\User;
use App\Models\Admin;
use App\Models\Group;
use App\Models\CarType;
use App\Models\Service;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\CarClient;
use App\Models\Technician;
use App\Models\ReasonCancel;
use Illuminate\Http\Request;
use App\Models\BusinessOrder;
use App\Models\PaymentMethod;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessOrderStatus;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Notifications\SendPushNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\BusinessProject\ClientProject;
use App\Models\BusinessOrderTechnicianHistory;

class BusinessOrderController extends Controller
{
    public function index()
    {
        // ====== Always prepare status list at the beginning ======
        $statusesModel = Cache::remember('business_order_statuses', 60, function () {
            return BusinessOrderStatus::select('id', 'name_ar', 'name_en')->get();
        });

        if (request()->ajax()) {
            $orders = BusinessOrder::with([
                'user', 'category', 'service', 'group', 'car', 'paymentMethod', 'status',
            ])->orderBy('id', 'desc');

            // ==========  Date Filter ==========
            if (request()->filled('date_from')) {
                $orders->whereDate('created_at', '>=', request('date_from'));
            }

            if (request()->filled('date_to')) {
                $orders->whereDate('created_at', '<=', request('date_to'));
            }

            // ==========  Status  filter ==========
            if (request()->filled('status') && request('status') !== 'all') {
                $orders->where('status_id', request('status'));
            }

            // ==========   Payment methods filter ==========
            if (request()->filled('payment_method') && request('payment_method') !== 'all') {
                $orders->where('payment_method_id', request('payment_method'));
            }

            return DataTables::of($orders)
                ->addColumn('user', fn($row) => $row->user?->first_name . ' ' . $row->user?->last_name)
                ->addColumn('phone', fn($row) => $row->user?->phone ?? '-')
                ->addColumn('car', fn($row) => $row->car?->Plate_number ?? '-')
                ->addColumn('service', fn($row) => '<button class="btn-sm btn-primary">' . $row->service?->title . '</button>')
                ->addColumn('total', fn($row) => number_format($row->total, 2))
                ->addColumn('group', fn($row) => $row->group?->name_ar ?? '-')
                ->addColumn('payment_method', fn($row) => $row->paymentMethod?->name ?? '-')

                ->addColumn('status', function ($row) {
                    $currentStatus = $row->status?->name ?? '-';
                    $html          = '<select class="form-control form-control-sm change-status" data-order-id="' . $row->id . '" data-current-status="' . $row->status_id . '">';
                    foreach (BusinessOrderStatus::all() as $status) {
                        $selected = $row->status_id == $status->id ? 'selected' : '';
                        $html .= '<option value="' . $status->id . '" ' . $selected . '>' . $status->{app()->getLocale() == 'ar' ? 'name_ar' : 'name_en'} . '</option>';
                    }
                    $html .= '</select>';

                    return $html . '<span class="d-none export-status">' . $currentStatus . '</span>';
                })

                ->addColumn('created_at', fn($row) => $row->created_at?->format('Y-m-d'))

                ->addColumn('controll', function ($row) {
                    $user = auth()->user();
                    $html = '';

                    if ($user->can('update_business_orders') || $user->hasRole('admin')) {
                        $html .= '
                        <button type="button"
                            onclick="openEditModal(' . $row->id . ')"
                            class="btn btn-sm btn-primary">
                            <i class="far fa-edit fa-2x"></i>
                        </button>';
                    }

                    if ($user->can('update_business_orders') || $user->hasRole('admin')) {
                        $html .= '
                        <button
                            type="button"
                            class="btn btn-primary"
                            data-toggle="modal"
                            data-target="#changeGroupModel"
                            data-order_id="' . $row->id . '"
                            data-group_id="' . $row->assign_to_id . '">
                            ' . __('dash.change_team') . '
                        </button>';
                    }
                    

                    if ($user->can('delete_business_orders') || $user->hasRole('admin')) {
                        $html .= '
                        <a href="javascript:void(0);" data-href="' . route('dashboard.business_orders.destroy', $row->id) . '"
                            data-id="' . $row->id . '"
                            class="btn btn-sm btn-outline-danger btn-delete">
                            <i class="far fa-trash-alt fa-2x"></i>
                        </a>';
                    }

                    return $html;
                })
                

                ->rawColumns(['service', 'controll', 'status']) 
                ->make(true);
        }

        // ========  Dropdwon  ==========

        $users           = User::all();
        $categories      = Category::all();
        $services        = Service::all();
        $groups          = Group::all();
        $cars            = CarClient::all();
        $paymentMethods  = PaymentMethod::where('active', 1)->get();
        $reasons         = ReasonCancel::all();
        $cities          = City::where('active', 1)->pluck(app()->getLocale() === 'ar' ? 'title_ar' : 'title_en', 'id');
        $types           = CarType::pluck('name_ar', 'id');
        $models          = CarModel::pluck('name_ar', 'id');
        $clientProjects  = ClientProject::select('id', 'name_ar', 'name_en')->get();
        $projects        = $clientProjects->pluck(app()->getLocale() === 'ar' ? 'name_ar' : 'name_en', 'id');
        $payment_methods = PaymentMethod::where('active', 1)->pluck(app()->getLocale() === 'ar' ? 'name_ar' : 'name_en', 'id');
        $statuses        = $statusesModel->pluck(app()->getLocale() === 'ar' ? 'name_ar' : 'name_en', 'id');

        return view('dashboard.business_orders.index', compact(
            'users', 'categories', 'services', 'groups', 'cars', 'paymentMethods',
            'reasons', 'cities', 'types', 'models', 'clientProjects', 'projects',
            'payment_methods', 'statuses'
        ));
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
            ->withCount(['orderHistories' => function ($q) use ($request) {
                $q->whereHas('order', fn($oq) =>
                    $oq->where('client_project_id', $request->client_project_id)
                        ->where('branch_id', $request->branch_id)
                        ->where('floor_id', $request->floor_id)
                );
            }])
            ->orderBy('order_histories_count', 'asc')
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
