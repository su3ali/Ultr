<?php
namespace App\Http\Controllers\Dashboard\BusinessProject;

use App\Models\City;
use App\Models\User;
use App\Models\Group;
use App\Models\CarType;
use App\Models\Service;
use App\Models\CarModel;
use App\Models\Category;
use App\Models\CarClient;
use App\Models\ReasonCancel;
use Illuminate\Http\Request;
use App\Models\BusinessOrder;
use App\Models\PaymentMethod;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\BusinessProject\ClientProject;

class BusinessOrderController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $orders = BusinessOrder::with(['user', 'category', 'service', 'group', 'car', 'paymentMethod'])->get();

            return DataTables::of($orders)
                ->addColumn('user', fn($row) => $row->user?->first_name . ' ' . $row->user?->last_name)
                ->addColumn('category', fn($row) => $row->category?->name)
                ->addColumn('service', fn($row) => $row->service?->name)
                ->addColumn('car', fn($row) => $row->car?->plate_number ?? 'N/A')
                ->addColumn('price', fn($row) => number_format($row->price, 2) . ' ريال')
                ->addColumn('controll', function ($row) {
                    $editBtn = '<button type="button" class="btn btn-sm btn-primary edit"
                                    data-id="' . $row->id . '"
                                    data-user="' . $row->user_id . '"
                                    data-category="' . $row->category_id . '"
                                    data-service="' . $row->service_id . '"
                                    data-group="' . $row->assign_to_id . '"
                                    data-car="' . $row->car_id . '"
                                    data-payment="' . $row->payment_method_id . '"
                                    data-price="' . $row->price . '"
                                    data-toggle="modal" data-target="#editModal">
                                    <i class="far fa-edit fa-2x"></i>
                                </button>';

                    $deleteBtn = '<a data-href="' . route('dashboard.business_orders.destroy', $row->id) . '"
                                    data-id="' . $row->id . '"
                                    class="btn btn-sm btn-outline-danger btn-delete">
                                    <i class="far fa-trash-alt fa-2x"></i>
                                </a>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['user', 'category', 'service', 'car', 'price', 'controll'])
                ->make(true);
        }

        $users      = User::all();
        $categories = Category::all();
        $services   = Service::all();

        // dd($services);
        $groups         = Group::all();
        $cars           = CarClient::all();
        $paymentMethods = PaymentMethod::where('active', 1)->get();
        $reasons        = ReasonCancel::all();

        $cities         = City::where('active', 1)->get()->pluck('title', 'id');
        $types          = CarType::select('id', 'name_ar', 'name_en')->get();
        $models         = CarModel::select('id', 'name_ar', 'name_en')->get();
        $clientProjects = ClientProject::select('id', 'name_ar', 'name_en')->get();

        // $project = ClientProject::with('servicePrices')->find($projectId);
        // $price   = $project->servicePrices->where('service_id', $serviceId)->first()?->price;

        return view('dashboard.business_orders.index', compact(
            'users', 'categories', 'services', 'groups', 'cars', 'paymentMethods', 'reasons', 'cities', 'types', 'models', 'clientProjects'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'           => 'required|exists:users,id',
            'category_id'       => 'nullable|exists:categories,id',
            'service_id'        => 'required|exists:services,id',
            'status_id'         => 'nullable|exists:order_statuses,id',
            'car_id'            => 'nullable|exists:car_clients,id',
            'assign_to_id'      => 'nullable|exists:groups,id',
            'reason_cancel_id'  => 'nullable|exists:reason_cancels,id',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'price'             => 'required|numeric',
            'notes'             => 'nullable|string',
        ]);

        $service = Service::find($request->service_id);

        $data['status_id']   = 1;
        $data['category_id'] = $service->category_id;
        $data['total']       = $request->price;

        BusinessOrder::create($request->except('_token'));

        session()->flash('success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'           => 'required|exists:users,id',
            'category_id'       => 'required|exists:categories,id',
            'service_id'        => 'required|exists:services,id',
            'status_id'         => 'required',
            'car_id'            => 'nullable|exists:car_clients,id',
            'assign_to_id'      => 'nullable|exists:groups,id',
            'reason_cancel_id'  => 'nullable|exists:reason_cancels,id',
            'payment_method_id' => 'nullable|exists:payment_methods,id',
            'price'             => 'required|numeric',
            'notes'             => 'nullable|string',
        ]);

        $order = BusinessOrder::findOrFail($id);
        $order->update($request->except('_token'));

        session()->flash('success');
        return redirect()->back();
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
}
