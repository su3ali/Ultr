<?php
namespace App\Http\Controllers\Dashboard\BusinessProject;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Group;
use App\Models\GroupRegion;
use App\Models\GroupTechnician;
use App\Models\Region;
use App\Models\Technician;
use App\Traits\imageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class BusinessGroupsController extends Controller
{
    use imageTrait;

    public function index()
    {
        $technicians = Technician::where('is_business', 1)
            ->where('is_trainee', Technician::TECHNICIAN)
            ->get();
            $groups = Group::businessOnly()->get();
          


        if (request()->ajax()) {
            $groups = Group::businessOnly()->get();

            return DataTables::of($groups)
                ->addColumn('technician', function ($row) {
                    $technician = Technician::where('is_business', 1)
                        ->where('is_trainee', Technician::TECHNICIAN)
                        ->find($row->technician_id);

                    return $technician ? $technician->name : 'لا يوجد';
                })
                ->addColumn('g_name', fn($row) => $row->name)
                ->addColumn('status', function ($row) {
                    $checked = $row->active == 1 ? 'checked' : '';
                    return '<label class="switch s-outline s-outline-info mb-4 mr-2">
                    <input type="checkbox" id="customSwitch4" data-id="' . $row->id . '" ' . $checked . '>
                    <span class="slider round"></span>
                </label>';
                })
                ->addColumn('control', function ($row) {
                    $html = '<button type="button" id="edit-techGroup" class="btn btn-primary btn-sm card-tools edit"
                    data-id="' . $row->id . '"
                    data-name_ar="' . $row->name_ar . '"
                    data-name_en="' . $row->name_en . '"
                    data-technician_id="' . $row->technician_id . '"
                    data-technician_group_id="' . $row->technician_groups->pluck('technician_id') . '"
                    data-region_id="' . $row->regions->pluck('region_id') . '"
                    data-country_id="' . $row->country_id . '"
                    data-city_id="' . $row->city_id . '"
                    data-toggle="modal"
                    data-target="#editGroupTechModel">
                    <i class="far fa-edit fa-2x"></i>
                </button>';

                    if (auth()->user()->hasRole('admin')) {
                        $html .= '<a data-table_id="html5-extension"
                        data-href="' . route('dashboard.core.group.destroy', $row->id) . '"
                        data-id="' . $row->id . '"
                        class="mr-2 btn btn-outline-danger btn-sm btn-delete delete_tech">
                        <i class="far fa-trash-alt fa-2x"></i>
                    </a>';
                    }

                    return $html;
                })
                ->rawColumns(['technician', 'g_name', 'status', 'control'])
                ->make(true);
        }

        $countries = Country::pluck('title_ar', 'id');
        $cities    = City::pluck('title_ar', 'id');
        $regions   = Region::pluck('title_ar', 'id');

        return view('dashboard.business_groups.index', compact('technicians', 'countries', 'cities', 'regions'));
    }

    /**
     * @throws ValidationException
     */
    protected function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name_en'               => 'required|String|min:3|unique:groups,name_en',
            'name_ar'               => 'required|String|min:3|unique:groups,name_ar',
            'technician_id'         => 'nullable|exists:technicians,id',
            'technician_group_id'   => 'required|array|exists:technicians,id',
            'technician_group_id.*' => 'required',
            'country_id'            => 'required|exists:countries,id',
            'city_id'               => 'required|exists:cities,id',
            'region_id'             => 'required|array|exists:regions,id',
            'region_id.*'           => 'required',
        ]);

        $data  = $request->except('_token', 'technician_group_id', 'region_id');
        $group = Group::query()->create($data);
        foreach ($request->technician_group_id as $tehcn) {
            GroupTechnician::create([
                'group_id'      => $group->id,
                'technician_id' => $tehcn,
            ]);
        }

        foreach ($request->region_id as $region) {
            GroupRegion::create([
                'group_id'  => $group->id,
                'region_id' => $region,
            ]);
        }

        session()->flash('success');
        return redirect()->back();
    }
    protected function update(Request $request, $id)
    {
        $group = Group::query()->where('id', $id)->first();

        $request->validate([
            'name_en'               => 'required|String|min:3|unique:groups,name_en,' . $id,
            'name_ar'               => 'required|String|min:3|unique:groups,name_ar,' . $id,
            'technician_id'         => 'nullable|exists:technicians,id',
            'technician_group_id'   => 'required|array|exists:technicians,id',
            'technician_group_id.*' => 'required',
            'country_id'            => 'required|exists:countries,id',
            'city_id'               => 'required|exists:cities,id',
            'region_id'             => 'required|array|exists:regions,id',
            'region_id.*'           => 'required',
        ]);

        $data = $request->except('_token', 'technician_group_id', 'region_id');

        $group->update($data);
        GroupTechnician::where('group_id', $id)->delete();
        foreach ($request->technician_group_id as $tehcn) {
            GroupTechnician::create([
                'group_id'      => $group->id,
                'technician_id' => $tehcn,
            ]);
        }

        GroupRegion::where('group_id', $id)->delete();

        foreach ($request->region_id as $region) {
            GroupRegion::create([
                'group_id'  => $group->id,
                'region_id' => $region,
            ]);
        }
        session()->flash('success');
        return redirect()->back();
    }

    protected function destroy($id)
    {
        $group = Group::query()->find($id);
        $group->delete();
        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];
    }

    public function change_status(Request $request)
    {
        $admin = Group::where('id', $request->id)->first();
        if ($request->active == 'true') {
            $active = 1;
        } else {
            $active = 0;
        }

        $admin->active = $active;
        $admin->save();
        return response()->json(['sucess' => true]);
    }

}
