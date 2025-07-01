<?php
namespace App\Http\Controllers\Dashboard\BusinessProject;

use App\Models\Day;
use App\Models\City;
use App\Models\Group;
use App\Models\Shift;
use App\Models\Visit;
use App\Models\Region;
use App\Models\Country;
use App\Models\Technician;
use App\Traits\imageTrait;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\AdminClientProject;
use App\Http\Controllers\Controller;
use App\Models\TechnicianWorkingDay;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\BusinessProject\ClientProject;

class BusinessTechnicianController extends Controller
{
    use imageTrait;

    public function index(Request $request)
    {

        $admin = auth()->user()->hasRole('admin');
        if ($admin) {
            $clientProjects = ClientProject::select('id', 'name_ar', 'name_en')->get();
        } else {
            $clientProjectsIds = AdminClientProject::where('admin_id', auth()->user()->id)->pluck('client_project_id')->toArray();

        }

        $groups = cache()->remember('groups', 60, fn() => Group::all());
        $specs  = cache()->remember('specs', 60, fn() => Specialization::all());
        $days   = Day::where('is_active', 1)->get(['id', 'name_ar', 'name']);

        if ($request->ajax()) {

            // Build the base query
            $techniciansQuery = Technician::where('active', 1)->where('is_business', 1)
                ->whereIn('client_project_id', $clientProjectsIds)
                ->where('is_trainee', Technician::TECHNICIAN)
                ->with(['group.region', 'specialization', 'workingDays']);

            if ($request->has('date_filter') && $request->date_filter == 'today') {
                // If the date filter is 'today', add the workingToday scope
                $techniciansQuery = Technician::where('active', 1)
                    ->where('is_business', 1)
                    ->whereIn('client_project_id', $clientProjectsIds)

                    ->with(['group', 'specialization', 'workingDays'])
                    ->workingToday();
            } else {
                $techniciansQuery = Technician::where('is_business', 1)
                    ->whereIn('client_project_id', $clientProjectsIds)

                    ->where('is_trainee', Technician::TECHNICIAN)
                    ->with(['group', 'specialization', 'workingDays']);
            }

            // Group filter
            if ($request->filled('group_id') && $request->group_id !== 'all') {
                $techniciansQuery->where('group_id', $request->group_id);
            }

            // Specialization filter
            if ($request->filled('spec_id') && $request->spec_id !== 'all') {
                $techniciansQuery->where('spec_id', $request->spec_id);
            }

            // Search filter
            if ($request->filled('search.value')) {
                $search = $request->input('search.value');
                $techniciansQuery->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%")
                        ->orWhere('phone', 'LIKE', "%$search%")
                        ->orWhere('identity_id', 'LIKE', "%$search%")
                        ->orWhere('email', 'LIKE', "%$search%");
                });
            }

            // Clone for filtered count
            $filteredRecords = (clone $techniciansQuery)->count();

            // Pagination
            $technicians = $techniciansQuery
                ->skip($request->input('start', 0))
                ->take($request->input('length', 10))
                ->get();

            // Format DataTables JSON response
            $data = $technicians->map(function ($row) {
                $whatsAppLink = $row->phone
                ? '<a href="https://api.whatsapp.com/send?phone=' .
                (preg_match('/^05/', $row->phone) ? '966' . substr($row->phone, 1) : $row->phone) .
                '" target="_blank" class="whatsapp-link" title="فتح في الواتساب">' . $row->phone . '</a>'
                : 'N/A';

                $imageTag = $row->image
                ? '<img class="img-fluid" style="width: 85px;" src="' . asset($row->image) . '"/>'
                : __('dash.no_image');

                $specName =
                $row->specialization?->name ?? '';

                $projectName = $row->clientProject?->name ?? '';

                $statusToggle = '
                <label class="switch s-outline s-outline-info mb-4 mr-2">
                    <input type="checkbox" id="customSwitchtech" data-id="' . $row->id . '" ' . ($row->active ? 'checked' : '') . '>
                    <span class="slider round"></span>
                </label>';

                $control = '';

                if (auth()->user()->hasRole('admin')) {
                    $dayIds   = TechnicianWorkingDay::where('technician_id', $row->id)->pluck('day_id')->toArray();
                    $floorIds = $row->floors->pluck('id')->toArray();
                    $imageUrl = $row->image ? asset($row->image) : '';

                    $control .= '
    <button type="button" id="edit-tech" class="btn btn-primary btn-sm edit"
        data-id="' . $row->id . '"
        data-name="' . $row->name . '"
        data-user_name="' . $row->user_name . '"
        data-email="' . $row->email . '"
        data-phone="' . $row->phone . '"
        data-specialization="' . $row->spec_id . '"
        data-active="' . $row->active . '"
        data-group_id="' . $row->group_id . '"
        data-country_id="' . $row->country_id . '"
        data-address="' . $row->address . '"
        data-day_id=\'' . json_encode($dayIds) . '\'
        data-wallet_id="' . $row->wallet_id . '"
        data-birth_date="' . $row->birth_date . '"
        data-identity_number="' . $row->identity_id . '"
        data-image="' . $imageUrl . '"
        data-is_business="' . $row->is_business . '"
        data-client_project_id="' . $row->client_project_id . '"
        data-branch_id="' . $row->branch_id . '"
        data-floor_ids=\'' . json_encode($floorIds) . '\'
        data-toggle="modal"
        data-target="#editTechModel">
        <i class="far fa-edit fa-2x"></i>
    </button>';

                    $control .= '
    <a data-table_id="html5-extension"
       data-href="' . route('dashboard.businessTechnician.destroy', $row->id) . '"
       data-id="' . $row->id . '"
       class="mr-2 btn btn-outline-danger btn-sm btn-delete delete_tech">
        <i class="far fa-trash-alt fa-2x"></i>
    </a>';
                }

                return [
                    'id'      => '<a href="' . route('dashboard.businessTechnician.details', ['id' => $row->id]) . '">' . $row->id . '</a>',
                    'name'    => '<a href="#">' . $row->name . '</a>',
                    't_image' => $imageTag,
                    'spec'    => $specName,
                    'phone'   => $whatsAppLink,
                    'group'   => $row->group?->name,
                    'project' => $projectName,
                    'status'  => $statusToggle,
                    'control' => $control,
                ];
            });

            return response()->json([
                'draw'            => $request->input('draw'),
                'recordsTotal'    => Technician::count(),
                'recordsFiltered' => $filteredRecords,
                'data'            => $data,
            ]);
        }

        $nationalities = [
            "فلبين"     => "1",
            "اندونيسيا" => "2",
            "الهند"     => "3",
            "تايلند"    => "4",
            "ماليزيا"   => "5",
            "باكستان"   => "6",
            "مصر"       => "7",
        ];

        $clientProjects = ClientProject::select('id', 'name_ar', 'name_en')->get();

        $shifts = Shift::select('id', 'shift_no')->distinct()->get();

        $countries = Country::where('active', 1)->get()->pluck('title', 'id');
        $cities    = City::where('active', 1)->get();
        $regions   = Region::where('active', 1)
            ->where('title_ar', '!=', 'old')
            ->get();

        return view('dashboard.business_technicians.index', compact(
            'groups', 'specs', 'days', 'nationalities', 'clientProjects', 'shifts', 'countries', 'cities', 'regions'
        ));
    }

    public function showTechnicianDetails($id)
    {
        $technician = Technician::with(['group', 'specialization', 'clientProject', 'branch', 'floors'])->findOrFail($id);

        $visits = Visit::where('assign_to_id', $technician->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.business_technicians.details', compact('technician', 'visits'));
    }

    protected function store(Request $request)
    {

        $rules = [
            'day_id'      => 'required|array|exists:days,id',
            'name'        => 'required|string|min:3',
            'email'       => 'required|email|unique:technicians,email',
            'phone'       => 'required|unique:technicians,phone',
            'user_name'   => ['required', 'regex:/^[^\\s]+$/', 'unique:technicians,user_name'],
            'password'    => ['required', 'confirmed', Password::min(4)],
            'spec_id'     => 'required|exists:specializations,id',
            'country_id'  => 'required',
            'identity_id' => 'required|numeric',
            'birth_date'  => 'required|date',
            'wallet_id'   => 'required',
            'address'     => 'required|string',
            'group_id'    => 'nullable',
            'image'       => 'required|image|mimes:jpeg,jpg,png,gif',
            'active'      => 'nullable|in:on,off',
            'is_business' => 'nullable|in:0,1',
        ];

        // Add business-related rules if is_business is checked
        if ($request->is_business == 1) {
            $rules['client_project_id'] = 'required|exists:client_projects,id';
            $rules['branch_id']         = 'required|exists:client_project_branches,id';
            $rules['floor_ids']         = 'required|array';
            $rules['floor_ids.*']       = 'exists:client_project_branch_floors,id';
        }

        $validated = Validator::make($request->all(), $rules, [
            'user_name.regex' => 'يجب أن لا يحتوي اسم المستخدم على أي مسافات',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors())->withInput();
        }

        $validated = $validated->validated();

        // Convert active checkbox to boolean
        $validated['active'] = isset($validated['active']) && $validated['active'] == 'on' ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/images/technicians/'), $filename);
            $validated['image'] = 'storage/images/technicians/' . $filename;
        }

        // Extract and remove days from main array
        $days = $validated['day_id'];
        unset($validated['day_id']);

        // Set default is_business if not present
        $validated['is_business'] = $request->is_business == 1 ? true : false;

        // dd($validated);
        unset($validated['floor_ids']);

        // Create technician
        $technician = Technician::create($validated);

        // Save working days
        $workingDays = [];
        foreach ($days as $day) {
            $workingDays[] = [
                'technician_id' => $technician->id,
                'day_id'        => $day,
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }
        TechnicianWorkingDay::insert($workingDays);

        // If business, attach project/branch/floors
        if ($request->is_business == 1) {
            $technician->update([
                'client_project_id' => $request->client_project_id,
                'branch_id'         => $request->branch_id,
            ]);

            $technician->floors()->sync($request->floor_ids);
        }
        return redirect()->back()->with('success', __('dash.added_successfully'));
    }

    protected function update(Request $request, $id)
    {
        $tech  = Technician::query()->where('id', $id)->first();
        $rules = [
            'day_id'      => 'nullable|array|exists:days,id',
            'name'        => 'required|String|min:3',
            'email'       => 'required|Email|unique:technicians,email,' . $id,
            'phone'       => 'required|unique:technicians,phone,' . $id,
            'user_name'   => ['required', 'regex:/^[^\s]+$/', 'unique:technicians,user_name,' . $id],
            'spec_id'     => 'required|exists:specializations,id',
            'country_id'  => 'required',
            'identity_id' => 'required|Numeric',
            'birth_date'  => 'required|Date',
            'wallet_id'   => 'required',
            'address'     => 'required|String',
            'group_id'    => 'nullable',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'active'      => 'nullable|in:on,off',
            'password'    => ['nullable', 'confirmed', Password::min(4)],
        ];
        $validated = Validator::make($request->all(), $rules, ['user_name.regex' => 'يجب أن لا يحتوي اسم المستخدم على أي مسافات']);
        if ($validated->fails()) {;
            return redirect()->to(route('dashboard.core.technician.index'))->withErrors($validated->errors());}

        $validated = $validated->validated();

        $validated['active'] = (isset($validated['active']) && $validated['active'] == 'on') ? 1 : 0;

        if ($request->hasFile('image')) {
            if (File::exists(public_path($tech->image))) {
                File::delete(public_path($tech->image));
            }
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/images/technicians/'), $filename);
            $validated['image'] = 'storage/images/technicians' . '/' . $filename;
        }

        if ($request->day_id) {
            $newDays = $validated['day_id'];

            unset($validated['day_id']);

            $tech->update($validated);

            $currentWorkingDays = $tech->workingDays()->pluck('day_id')->toArray();

            $daysToAdd = array_diff($newDays, $currentWorkingDays);

            $daysToRemove = array_diff($currentWorkingDays, $newDays);

            if (! empty($daysToRemove)) {
                $tech->workingDays()->whereIn('day_id', $daysToRemove)->delete();
            }

            if (! empty($daysToAdd)) {
                $workingDays = [];
                foreach ($daysToAdd as $day) {
                    $workingDays[] = [
                        'technician_id' => $tech->id,
                        'day_id'        => $day,
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ];
                }
                TechnicianWorkingDay::insert($workingDays);
            }
        }

        $tech->update($validated);
        session()->flash('success', __('dash.update'));

        return redirect()->back();
    }

    protected function destroy($id)
    {
        $tech = Technician::find($id);
        if (File::exists(public_path($tech->image))) {
            File::delete(public_path($tech->image));
        }
        $tech->delete();
        return [
            'success' => true,
            'msg'     => __("dash.deleted_successfully"),
        ];
    }
    protected function changeStatus(Request $request)
    {
        $validated = $request->validate([
            'id'     => 'required|exists:technicians,id',
            'active' => 'required|in:true,false',
        ]);

        $isActive = filter_var($request->active, FILTER_VALIDATE_BOOLEAN);

        // Load the technician model including the group
        $technician = Technician::with('group')->findOrFail($request->id);

        // Update technician status
        $technician->update([
            'active' => $isActive ? Technician::ACTIVE : Technician::INACTIVE,
        ]);

        // If technician has a group, update it too
        if ($technician->group) {
            $technician->group->update([
                'active' => $isActive ? Group::ACTIVE : Group::INACTIVE,
            ]);
        }

        return response()->json([
            'status'  => true,
            'message' => __('dash.updated_success'),
        ]);
    }

}
