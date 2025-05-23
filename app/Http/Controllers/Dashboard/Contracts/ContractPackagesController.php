<?php
namespace App\Http\Controllers\Dashboard\Contracts;

use App\Http\Controllers\Controller;
use App\Models\ContractPackage;
use App\Models\ContractPackagesService;
use App\Models\Service;
use App\Traits\imageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class ContractPackagesController extends Controller
{
    use imageTrait;
    public function index()
    {
       
        if (request()->ajax()) {
            $ContractPackage = ContractPackage::query()->get();
            return DataTables::of($ContractPackage)
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('services', function ($row) {
                    $services_ids = $row->ContractPackagesServices->pluck('service_id');
                    $html         = '';
                    foreach ($services_ids as $service_id) {
                        $service = Service::where('id', $service_id)->first();
                        $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                    }
                    return $html;
                })
                ->addColumn('visit_number', function ($row) {
                    return $row->visit_number;
                })
                ->addColumn('status', function ($row) {
                    $checked = '';
                    if ($row->active == 1) {
                        $checked = 'checked';
                    }
                    return '<label class="switch s-outline s-outline-info  mb-4 mr-2">
                        <input type="checkbox" id="customSwitchStatus" data-id="' . $row->id . '" ' . $checked . '>
                        <span class="slider round"></span>
                        </label>';
                })
                ->addColumn('control', function ($row) {
                    $html = '
                    <a href="' . route('dashboard.contract_packages.edit', $row->id) . '"  id="edit-booking" class="btn btn-primary btn-sm card-tools edit" data-id="' . $row->id . '"
                          >
                            <i class="far fa-edit fa-2x"></i>
                       </a>

                                <a data-table_id="html5-extension" data-href="' . route('dashboard.contract_packages.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
                            <i class="far fa-trash-alt fa-2x"></i>
                    </a>';
                    return $html;
                })
                ->rawColumns([
                    'name',
                    'services',
                    'visit_number',
                    'status',
                    'control',
                ])

                ->make(true);
        }

        return view('dashboard.contract_packages.index');
    }

    protected function create()
    {
        $services = Service::where('active', 1)->get()->pluck('title', 'id');

        return view('dashboard.contract_packages.create', compact('services'));
    }

    /**
     * @throws ValidationException
     */
    protected function store(Request $request): RedirectResponse
    {
        $request->validate = ([
            'name_ar'        => 'required',
            'name_en'        => 'required',
            'avatar'         => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'description_ar' => 'required',
            'description_en' => 'required',
            'service_ids'    => 'required|array',
            'service_ids.*'  => 'required',
            'price'          => 'required|numeric',
            'time'           => 'required|string',
            'visit_number'   => 'required|numeric',

        ]);
        $data = $request->except('_token', 'avatar', 'service_ids');

        if ($request->has('avatar')) {
            $image         = $this->storeImages($request->avatar, 'contract_packages');
            $data['image'] = 'storage/images/contract_packages' . '/' . $image;
        }

        $ContractPackage = ContractPackage::updateOrCreate($data);
        $services_ids    = $request->service_ids;
        foreach ($services_ids as $services_id) {
            ContractPackagesService::create([
                'contract_packages_id' => $ContractPackage->id,
                'service_id'           => $services_id,
            ]);
        }

        session()->flash('success');
        return redirect()->route('dashboard.contract_packages.index');
    }

    protected function edit($id)
    {
        $ContractPackage  = ContractPackage::query()->where('id', $id)->first();
        $services         = Service::where('active', 1)->get()->pluck('title', 'id');
        $selectedServices = ContractPackagesService::where('contract_packages_id', $id)->pluck('service_id');
        return view('dashboard.contract_packages.edit', compact('ContractPackage', 'services', 'selectedServices'));
    }
    protected function update(Request $request, $id)
    {
        $request->validate = ([
            'name_ar'        => 'required',
            'name_en'        => 'required',
            'avatar'         => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'description_ar' => 'required',
            'description_en' => 'required',
            'service_ids'    => 'required|array',
            'service_ids.*'  => 'required',
            'price'          => 'required|numeric',
            'time'           => 'required|string',
            'visit_number'   => 'required|numeric',

        ]);
        $ContractPackage = ContractPackage::find($id);
        $data            = $request->except('_token', 'avatar', 'service_ids');

        if ($request->has('avatar')) {
            $image         = $this->storeImages($request->avatar, 'contract_packages');
            $data['image'] = 'storage/images/contract_packages' . '/' . $image;
        }

        ContractPackagesService::where('contract_packages_id', $id)->delete();

        $services_ids = $request->service_ids;
        foreach ($services_ids as $services_id) {
            ContractPackagesService::create([
                'contract_packages_id' => $ContractPackage->id,
                'service_id'           => $services_id,
            ]);
        }

        $ContractPackage->update($data);

        session()->flash('success');
        return redirect()->route('dashboard.contract_packages.index');
    }

    protected function destroy($id)
    {
        $ContractPackage = ContractPackage::query()->find($id);
        $ContractPackage->delete();
        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];
    }

    protected function change_status(Request $request)
    {
        $ContractPackage = ContractPackage::query()->where('id', $request->id)->first();
        if ($request->active == "false") {
            $ContractPackage->active = 0;
        } else {
            $ContractPackage->active = 1;
        }
        $ContractPackage->save();
        return response('success');
    }
}
