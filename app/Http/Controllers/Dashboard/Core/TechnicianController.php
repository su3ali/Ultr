<?php
namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\BusinessProject\ClientProject;
use App\Models\City;
use App\Models\Country;
use App\Models\Day;
use App\Models\Group;
use App\Models\GroupRegion;
use App\Models\GroupTechnician;
use App\Models\Region;
use App\Models\Setting;
use App\Models\Shift;
use App\Models\Specialization;
use App\Models\Technician;
use App\Models\TechnicianWorkingDay;
use App\Models\Visit;
use App\Traits\imageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class TechnicianController extends Controller
{
    use imageTrait;

    public function index(Request $request)
    {

        $groups  = cache()->remember('groups', 60, fn() => Group::all());
        $specs   = cache()->remember('specs', 60, fn() => Specialization::all());
        $days    = Day::where('is_active', 1)->get(['id', 'name_ar', 'name']);
        $regions = cache()->remember('regions', 120, function () {
            return Region::all();
        });

        if ($request->ajax()) {

            // Build the base query
            $techniciansQuery = Technician::where('active', 1)->where('is_business', 0)
                ->with(['group.region', 'specialization', 'workingDays']);

            if ($request->has('date_filter') && $request->date_filter == 'today') {
                // If the date filter is 'today', add the workingToday scope
                $techniciansQuery = Technician::where('is_trainee', Technician::TECHNICIAN)
                    ->where('is_business', 0)
                    ->where('active', 1)
                    ->with(['group', 'specialization', 'workingDays'])
                    ->workingToday(); //
            } else {
                $techniciansQuery = Technician::where('is_trainee', Technician::TECHNICIAN)

                    ->with(['group', 'specialization', 'workingDays']);
            }

            // Group filter
            if ($request->filled('group_id') && $request->group_id !== 'all') {
                $techniciansQuery->where('group_id', $request->group_id);
            }

            // Region filter
            if ($request->filled('region_id') && $request->region_id !== 'all') {
                $techniciansQuery->whereHas('group.regions', function ($query) use ($request) {
                    $query->where('region_id', $request->region_id);
                });

            }
            // Shift filter
            if ($request->filled('shift_no') && $request->shift_no !== 'all') {
                // Get all shifts with this name
                $matchedShifts = Shift::where('shift_no', $request->shift_no)->get();

                $groupIds = [];

                foreach ($matchedShifts as $shift) {
                    $decoded = is_array($shift->group_id) ? $shift->group_id : json_decode($shift->group_id, true);
                    if (is_array($decoded)) {
                        $groupIds = array_merge($groupIds, $decoded);
                    }
                }

                $groupIds = array_unique($groupIds);

                if (! empty($groupIds)) {
                    $techniciansQuery->whereIn('group_id', $groupIds);
                }
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

                $locale   = app()->getLocale();
                $specName = $locale === 'ar'
                ? $row->specialization?->name_ar
                : $row->specialization?->name_en;

                $regionTitle  = $row->group?->region?->first()?->title ?? '';
                $workedDayIds = $row->workingDays->pluck('day_id')->toArray();

                $dayNames = Day::where('is_active', 1)
                    ->whereNotIn('id', $workedDayIds)
                    ->get([app()->getLocale() === 'ar' ? 'name_ar as name' : 'name']);

                $daysOff = $dayNames->map(function ($day) {
                    return '<span class="badge rounded-pill bg-primary text-white d-inline-flex align-items-center px-3 py-2">
                      ' . e($day->name) . '
                            </span>';

                })->implode(' ');

                $shiftNo = null;

                $shiftNo = __('dash.no_related_to_shift');

                if ($row->group) {
                    $groupId = (string) $row->group->id;

                    // If filtering by a specific shift name
                    if (request()->filled('shift_no') && request()->shift_no !== 'all') {
                        $targetShift = Shift::where('shift_no', request()->shift_no)
                            ->whereJsonContains('group_id', $groupId)
                            ->first();

                        if ($targetShift) {
                            $shiftNo = $targetShift->shift_no;
                        }
                    } else {
                        // Fallback: show first related shift if not filtering
                        $firstShift = Shift::whereJsonContains('group_id', $groupId)->first();
                        if ($firstShift) {
                            $shiftNo = $firstShift->shift_no;
                        }
                    }
                }

                $statusToggle = '
                <label class="switch s-outline s-outline-info mb-4 mr-2">
                    <input type="checkbox" id="customSwitchtech" data-id="' . $row->id . '" ' . ($row->active ? 'checked' : '') . '>
                    <span class="slider round"></span>
                </label>';

                $control = '';

                // Check for Edit permission
                if (auth()->user()->hasRole('admin') || auth()->user()->can('update_technicians')) {
                    $dayIds = TechnicianWorkingDay::where('technician_id', $row->id)->pluck('day_id')->toArray();
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
                        data-image="' . ($row->image ? asset($row->image) : '') . '"
                        data-toggle="modal"
                        data-target="#editTechModel">
                        <i class="far fa-edit fa-2x"></i>
                    </button>';
                }

                // Check for Delete permission (only admin)
                if (auth()->user()->hasRole('admin')) {
                    $control .= '
                        <a data-table_id="html5-extension"
                        data-href="' . route('dashboard.core.technician.destroy', $row->id) . '"
                        data-id="' . $row->id . '"
                        class="mr-2 btn btn-outline-danger btn-sm btn-delete delete_tech">
                            <i class="far fa-trash-alt fa-2x"></i>
                        </a>';
                }

                return [
                    'id'       => '<a href="' . route('dashboard.core.technician.details', ['id' => $row->id]) . '">' . $row->id . '</a>',
                    'name'     => '<a href="#">' . $row->name . '</a>',
                    't_image'  => $imageTag,
                    'spec'     => $specName,
                    'phone'    => $whatsAppLink,
                    'group'    => $row->group?->name,
                    'days_off' => $daysOff,
                    'shift_no' => $shiftNo,
                    'region'   => $regionTitle,
                    'status'   => $statusToggle,
                    'control'  => $control,
                ];
            });

            return response()->json([
                'draw'            => $request->input('draw'),
                'recordsTotal'    => $techniciansQuery->count(),
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
        $shifts = Shift::select('id', 'shift_no')->distinct()->get();

        $clientProjects = ClientProject::select('id', 'name_ar', 'name_en')->get();

        $countries = Country::where('active', 1)->get()->pluck('title', 'id');
        $cities    = City::where('active', 1)->get();
        $regions   = Region::where('active', 1)
            ->where('title_ar', '!=', 'old')
            ->get();

        return view('dashboard.core.technicians.index', compact(
            'groups', 'specs', 'days', 'nationalities', 'clientProjects', 'regions', 'shifts', 'cities', 'countries'
        ));

    }

    public function techniciansOffToday(Request $request)
    {
        $groups = cache()->remember('groups', 60, fn() => Group::all());
        $specs  = cache()->remember('specs', 60, fn() => Specialization::all());
        $days   = Day::where('is_active', 1)->get(['id', 'name_ar', 'name']);

        if ($request->ajax()) {
            $techniciansQuery = Technician::offToday()
                ->where('is_trainee', Technician::TECHNICIAN)
                ->where('is_business', 0)
                ->with(['group.region', 'specialization', 'workingDays'])
            ;

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

            $filteredRecords = (clone $techniciansQuery)->count();

            $technicians = $techniciansQuery
                ->skip($request->input('start', 0))
                ->take($request->input('length', 10))
                ->get();

            $data = $technicians->map(function ($row) {
                $whatsAppLink = $row->phone
                ? '<a href="https://api.whatsapp.com/send?phone=' .
                (preg_match('/^05/', $row->phone) ? '966' . substr($row->phone, 1) : $row->phone) .
                '" target="_blank" class="whatsapp-link" title="فتح في الواتساب">' . $row->phone . '</a>'
                : 'N/A';

                $imageTag = $row->image
                ? '<img class="img-fluid" style="width: 85px;" src="' . asset($row->image) . '"/>'
                : __('dash.no_image');

                $locale      = app()->getLocale();
                $specName    = $locale === 'ar' ? $row->specialization?->name_ar : $row->specialization?->name_en;
                $regionTitle = $row->group?->region?->first()?->title ?? '';

                $statusToggle = '<label class="switch s-outline s-outline-info mb-4 mr-2">
                <input type="checkbox" id="customSwitchtech" data-id="' . $row->id . '" ' . ($row->active ? 'checked' : '') . '>
                <span class="slider round"></span>
            </label>';

                $control = '';
                if (auth()->user()->hasRole('admin')) {
                    $dayIds = TechnicianWorkingDay::where('technician_id', $row->id)->pluck('day_id')->toArray();
                    $control .= '<button type="button" id="edit-tech" class="btn btn-primary btn-sm edit"
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
                    data-image="' . ($row->image ? asset($row->image) : '') . '"
                    data-toggle="modal"
                    data-target="#editTechModel">
                    <i class="far fa-edit fa-2x"></i>
                </button>';

                    $control .= '<a data-table_id="html5-extension"
                    data-href="' . route('dashboard.core.technician.destroy', $row->id) . '"
                    data-id="' . $row->id . '"
                    class="mr-2 btn btn-outline-danger btn-sm btn-delete delete_tech">
                    <i class="far fa-trash-alt fa-2x"></i>
                </a>';
                }

                return [
                    'id'      => '<a href="' . route('dashboard.core.technician.details', ['id' => $row->id]) . '">' . $row->id . '</a>',
                    'name'    => '<a href="#">' . $row->name . '</a>',
                    't_image' => $imageTag,
                    'spec'    => $specName,
                    'phone'   => $whatsAppLink,
                    'group'   => $row->group?->name,
                    'region'  => $regionTitle,
                    'status'  => $statusToggle,
                    'control' => $control,
                ];
            });

            return response()->json([
                'draw'            => $request->input('draw'),
                'recordsTotal'    => Technician::offToday()->count(),
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
        $countries = Country::where('active', 1)->get()->pluck('title', 'id');
        $cities    = City::where('active', 1)->get();
        $regions   = Region::where('active', 1)
            ->where('title_ar', '!=', 'old')
            ->get();
        $clientProjects = ClientProject::select('id', 'name_ar', 'name_en')->get();

        $shifts = Shift::select('id', 'shift_no')->distinct()->get();

        return view('dashboard.core.technicians.off_today', compact(
            'groups', 'specs', 'days', 'nationalities', 'clientProjects', 'cities', 'regions', 'countries', 'shifts'
        ));
    }

    public function showTechnicianDetails($id)
    {
                                                                                      // Fetch technician details
        $technician = Technician::with(['group', 'specialization'])->findOrFail($id); // Eager load related data
        $visits     = Visit::where('assign_to_id', $technician->id)
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->paginate(10);

        // Pass the technician data to the view
        return view('dashboard.core.technicians.details', compact('technician', 'visits'));

    }

    protected function store(Request $request)
    {
        $setting      = Setting::first();
        $defaultImage = $setting->logo;

        // Validation Rules
        $rules = [
            'name'         => 'required|string|min:3',
            'email'        => 'required|email',
            'phone'        => 'required|unique:technicians,phone',
            'user_name'    => ['required', 'regex:/^[^\s]+$/', 'unique:technicians,user_name'],
            'password'     => ['required', 'confirmed', Password::min(4)],
            'spec_id'      => 'required|exists:specializations,id',
            'city_id'      => 'nullable|exists:cities,id',
            'identity_id'  => 'required|numeric',
            'wallet_id'    => 'required',
            'group_id'     => 'nullable|exists:groups,id',
            'image'        => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'active'       => 'nullable|in:on,off',
            'is_business'  => 'nullable|in:0,1',
            'birth_date'   => 'nullable|date',
            'address'      => 'nullable|string',
            'day_id'       => 'nullable|array',
            'region_ids'   => 'nullable|array',
            'region_ids.*' => 'exists:regions,id',

        ];

        if ($request->is_business == 1) {
            $rules['client_project_id'] = 'required|exists:client_projects,id';
            $rules['branch_id']         = 'required|exists:client_project_branches,id';
            $rules['floor_ids']         = 'required|array';
            $rules['floor_ids.*']       = 'exists:client_project_branch_floors,id';
        }

        $validator = Validator::make($request->all(), $rules, [
            'user_name.regex' => 'يجب أن لا يحتوي اسم المستخدم على أي مسافات',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $validated = $validator->validated();

        $validated['active']      = isset($validated['active']) && $validated['active'] == 'on' ? 1 : 0;
        $validated['is_business'] = $request->is_business == 1;

        $days      = $request->day_id ?? [];
        $floorIds  = $request->floor_ids ?? [];
        $regions   = $request->region_ids ?? [];
        $countryId = 1;

        // Upload Image
        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/images/technicians/'), $filename);
            $validated['image'] = 'storage/images/technicians/' . $filename;
        } else {
            $validated['image'] = $defaultImage;
        }

        $validated['country_id'] = $countryId;

        // Prevent array values and extra fields
        unset($validated['day_id'], $validated['region_ids'], $validated['floor_ids'], $validated['city_id']);

        // Create technician
        $technician = Technician::create($validated);

        // Auto-create group if not provided
        if (empty($validated['group_id'])) {
            $group = Group::create([
                'name_en'       => $validated['name'],
                'name_ar'       => $validated['name'],
                'technician_id' => $technician->id,
                'country_id'    => $countryId,
                'city_id'       => $request->city_id ?? null,
            ]);

            foreach ($regions as $regionId) {
                GroupRegion::create([
                    'group_id'  => $group->id,
                    'region_id' => $regionId,
                ]);
            }

            $validated['group_id'] = $group->id;
        }

        $technician->update([
            'group_id' => $group->id,
        ]);

        // Assign technician to group
        GroupTechnician::create([
            'group_id'      => $validated['group_id'],
            'technician_id' => $technician->id,
        ]);

        if ($request->filled('shift_ids')) {
            foreach ($request->shift_ids as $shiftId) {
                $shift = Shift::find($shiftId);

                if ($shift) {
                    // Ensure it's always an array of strings
                    $groupIds = json_decode($shift->group_id, true) ?? [];

                    $validatedGroupId = (string) $validated['group_id']; // ensure it's a string

                    if (! in_array($validatedGroupId, $groupIds)) {
                        $groupIds[] = $validatedGroupId;

                        //  Encode as JSON with double-quoted string values
                        $shift->group_id = json_encode(array_map('strval', $groupIds));
                        $shift->save();
                    }
                }
            }
        }

        // Save working days
        if (! empty($days)) {
            $workingDays = array_map(function ($dayId) use ($technician) {
                return [
                    'technician_id' => $technician->id,
                    'day_id'        => $dayId,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ];
            }, $days);

            TechnicianWorkingDay::insert($workingDays);
        }

        // Attach business floors
        if ($request->is_business == 1) {
            $technician->update([
                'client_project_id' => $request->client_project_id,
                'branch_id'         => $request->branch_id,
            ]);
            $technician->floors()->sync($floorIds);
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
            'address'     => 'nullable|String',
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

        if ($request->filled('shift_ids')) {
            $selectedShiftIds = array_map('intval', $request->shift_ids);
            $groupId          = (string) $tech->group_id;

            // 1. Get all shifts currently assigned to this group
            $existingShifts = Shift::where('group_id', 'like', "%$groupId%")->get();

            // 2. Remove this group from any shifts not in the new selection
            foreach ($existingShifts as $shift) {
                if (! in_array($shift->id, $selectedShiftIds)) {
                    $groupIds        = json_decode($shift->group_id, true) ?? [];
                    $groupIds        = array_filter($groupIds, fn($id) => $id != $groupId);
                    $shift->group_id = json_encode(array_values($groupIds));
                    $shift->save();
                }
            }

            // 3. Add the group to new selected shifts if not already present
            $selectedShifts = Shift::whereIn('id', $selectedShiftIds)->get();
            foreach ($selectedShifts as $shift) {
                $groupIds = json_decode($shift->group_id, true) ?? [];
                if (! in_array($groupId, $groupIds)) {
                    $groupIds[]      = $groupId;
                    $shift->group_id = json_encode(array_map('strval', $groupIds));
                    $shift->save();
                }
            }
        }

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
        if ($request->active == 'true') {
            error_log(1);
            Technician::query()->where('id', $request->id)->update(['active' => 1]);
        } else {
            error_log(2);
            Technician::query()->where('id', $request->id)->update(['active' => 0]);
        }
        return response('success', __('dash.updated_success'));
    }
}
