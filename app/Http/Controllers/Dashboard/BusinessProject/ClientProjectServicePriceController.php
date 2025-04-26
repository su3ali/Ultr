<?php
namespace App\Http\Controllers\Dashboard\BusinessProject;

use App\Http\Controllers\Controller;
use App\Models\BusinessProject\ClientProject;
use App\Models\ClientProjectServicePrice;
use App\Models\Service;
use App\Traits\imageTrait;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientProjectServicePriceController extends Controller
{

    use imageTrait;
    public function index()
    {
        if (request()->ajax()) {
            $projects = ClientProjectServicePrice::with(['clientProject:id,name_ar,name_en', 'service'])->select('id', 'client_project_id', 'service_id', 'price')->get();

            return DataTables::of($projects)
                ->addColumn('project_name', function ($row) {
                    // Check if the project name is set in Arabic or English based on the locale
                    if (app()->getLocale() == 'ar') {
                        return $row->clientProject?->name_ar ?? '-';
                    } else {
                        return $row->clientProject?->name_en ?? '-';
                    }
                })
                ->addColumn('service_name', function ($row) {
                    return $row->service?->title ?? '-';
                })
                ->addColumn('price', function ($row) {
                    return $row?->price;
                })
                ->addColumn('controll', function ($row) {
                    $user = auth()->user();
                    $html = '';

                    // Edit button
                    if ($user->can('business_projects_prices_update') || $user->hasRole('admin')) {
                        $html .= '
                            <button type="button"
                                class="btn btn-primary btn-sm mr-2 edit-price"
                                data-id="' . $row->id . '"
                                data-client_project_id="' . $row->client_project_id . '"
                                data-service_id="' . $row->service_id . '"
                                data-price="' . $row->price . '"
                                data-action="' . route('dashboard.business_projects_prices.update', $row->id) . '"
                                data-toggle="modal"
                                data-target="#editModal"
                                title="تعديل السعر">
                                <i class="far fa-edit fa-2x"></i>
                            </button>';
                    }

                    // Delete button
                    if ($user->can('business_projects_prices_delete') || $user->hasRole('admin')) {
                        $html .= '
                            <a href="javascript:void(0);"
                                data-href="' . route('dashboard.business_projects_prices.destroy', $row->id) . '"
                                data-id="' . $row->id . '"
                                class="btn btn-outline-danger btn-sm btn-delete"
                                title="حذف">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </a>';
                    }

                    return $html;
                })
                ->rawColumns(['project_name', 'service_name', 'controll'])
                ->make(true);
        }

        // if normal page load

        $clientProjects = ClientProject::select('id', 'name_ar', 'name_en')->get();
        $services       = Service::get();

        return view('dashboard.business_projects.ServicesPrice.index', compact('clientProjects', 'services'));
    }

    public function create()
    {
        $clientProjects = ClientProject::select('id', 'name_ar', 'name_en')->get();
        $services       = Service::select('id', 'title_ar', 'title_en')->get();

        return view('dashboard.business_projects.ServicesPrice.create', compact('clientProjects', 'services'));
    }

    public function edit($id)
    {
        $servicePrice   = ClientProjectServicePrice::findOrFail($id);
        $clientProjects = ClientProject::select('id', 'name_ar', 'name_en')->get();
        $services       = Service::get();

        return view('dashboard.business_projects.ServicesPrice.edit', compact('servicePrice', 'clientProjects', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_project_id' => 'required|exists:client_projects,id',
            'service_id'        => 'required|exists:services,id',
            'price'             => 'required|numeric|min:0',
        ]);

        $servicePrice = ClientProjectServicePrice::where('client_project_id', $request->client_project_id)
            ->where('service_id', $request->service_id)
            ->first();

        if ($servicePrice) {
            $servicePrice->update([
                'price' => $request->price,
            ]);
        } else {
            ClientProjectServicePrice::create([
                'client_project_id' => $request->client_project_id,
                'service_id'        => $request->service_id,
                'price'             => $request->price,
            ]);
        }

        return redirect()->route('dashboard.business_projects_prices.index')
            ->with('success', 'تم حفظ سعر الخدمة بنجاح.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_project_id' => 'required|exists:client_projects,id',
            'service_id'        => 'required|exists:services,id',
            'price'             => 'required|numeric|min:0',
        ]);

        $servicePrice = ClientProjectServicePrice::findOrFail($id);

        $exists = ClientProjectServicePrice::where('client_project_id', $request->client_project_id)
            ->where('service_id', $request->service_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()
                ->withErrors(['error' => 'هذا المشروع وهذه الخدمة موجودين بالفعل. لا يمكن التكرار.'])
                ->withInput();
        }

        $servicePrice->update([
            'client_project_id' => $request->client_project_id,
            'service_id'        => $request->service_id,
            'price'             => $request->price,
        ]);

        return redirect()->route('dashboard.business_projects_prices.index')
            ->with('success', 'تم تحديث سعر الخدمة بنجاح.');
    }

    public function destroy($id)
    {
        $servicePrice = ClientProjectServicePrice::findOrFail($id);
        $servicePrice->delete();

        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];
    }

}
