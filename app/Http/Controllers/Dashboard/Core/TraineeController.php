<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Specialization;
use App\Models\Technician;
use App\Models\Visit;
use App\Traits\imageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class TraineeController extends Controller
{
    use imageTrait;

    public function index(Request $request)
    {
        // Cache groups and specializations for efficiency
        $groups = cache()->remember('groups', 60, fn() => Group::all());
        $specs = cache()->remember('specs', 60, fn() => Specialization::all());

        // Handle AJAX request for DataTables
        if ($request->ajax()) {
            $traineesQuery = Technician::query()
                ->with(['group', 'specialization']) // Eager load relationships
                ->where('is_trainee', 1); // Filter only trainees

            // Apply filters
            if ($request->filled('group_id') && $request->group_id !== 'all') {
                $traineesQuery->where('group_id', $request->group_id);
            }

            if ($request->filled('spec_id') && $request->spec_id !== 'all') {
                $traineesQuery->where('spec_id', $request->spec_id);
            }

            // Apply search functionality
            if ($request->filled('search.value')) {
                $searchTerm = $request->input('search.value');
                $traineesQuery->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'LIKE', "%$searchTerm%")
                        ->orWhere('phone', 'LIKE', "%$searchTerm%")
                        ->orWhere('identity_id', 'LIKE', "%$searchTerm%")
                        ->orWhere('email', 'LIKE', "%$searchTerm%");
                });
            }

            // Get filtered records count
            $filteredRecords = $traineesQuery->clone()->count();

            // Paginate results
            $trainees = $traineesQuery
                ->skip($request->input('start', 0))
                ->take($request->input('length', 10))
                ->get();

            // Prepare DataTables response
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => Technician::count(), // Total number of technicians
                'recordsFiltered' => $filteredRecords,
                'data' => $trainees->map(function ($trainee) {
                    return [
                        'id' => '<a href="' . route('dashboard.core.technician.details', ['id' => $trainee->id]) . '">' . $trainee->id . '</a>',
                        'name' => '<a href="#">' . e($trainee->name) . '</a>',
                        'rate' => '<a href="#">' . ($trainee?->traineeRates->id) . '</a>',
                        'note' => '<a href="#">' . e($trainee?->traineeRates->id) . '</a>',
                        'status' => '
                            <label class="switch s-outline s-outline-info mb-4 mr-2">
                                <input type="checkbox" id="customSwitchtech" data-id="' . $trainee->id . '" ' . ($trainee->active ? 'checked' : '') . '>
                                <span class="slider round"></span>
                            </label>',
                        'control' => '
                            <button type="button" id="edit-tech" class="btn btn-primary btn-sm edit"
                                data-id="' . $trainee->id . '"
                                data-name="' . e($trainee->name) . '"
                                data-user_name="' . e($trainee->user_name) . '"
                                data-email="' . e($trainee->email) . '"
                                data-phone="' . e($trainee->phone) . '"
                                data-specialization="' . e($trainee->spec_id) . '"
                                data-active="' . e($trainee->active) . '"
                                data-group_id="' . e($trainee->group_id) . '"
                                data-country_id="' . e($trainee->country_id) . '"
                                data-address="' . e($trainee->address) . '"
                                data-wallet_id="' . e($trainee->wallet_id) . '"
                                data-birth_date="' . e($trainee->birth_date) . '"
                                data-identity_number="' . e($trainee->identity_id) . '"
                                data-image="' . asset($trainee->image) . '"
                                data-toggle="modal" data-target="#editTechModel">
                                <i class="far fa-edit fa-2x"></i>
                            </button>
                            <a data-table_id="html5-extension" data-href="' . route('dashboard.core.trainee.destroy', $trainee->id) . '"
                                data-id="' . $trainee->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete delete_tech">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </a>',
                    ];
                }),
            ]);
        }

        // Static nationalities data
        $nationalities = [
            "فلبين" => "1",
            "اندونيسيا" => "2",
            "الهند" => "3",
            "تايلند" => "4",
            "ماليزيا" => "5",
            "باكستان" => "6",
            "مصر" => "7",
        ];

        return view('dashboard.core.trainees.index', compact('groups', 'specs', 'nationalities'));
    }

    public function showTechnicianDetails($id)
    {
        // Fetch technician details
        $technician = Technician::with(['group', 'specialization'])->findOrFail($id); // Eager load related data
        $visits = Visit::where('assign_to_id', $technician->id)
            ->orderBy('created_at', 'desc') // Order by created_at in descending order
            ->paginate(10);

        // Pass the technician data to the view
        return view('dashboard.core.trainees.details', compact('technician', 'visits'));

    }

    /**
     * @throws ValidationException
     */
    protected function store(Request $request): RedirectResponse
    {

        $rules = [
            'name' => 'required|String|min:3',
            'email' => 'required|Email|unique:technicians,email',
            'phone' => 'required|unique:technicians,phone',
            'user_name' => ['required', 'regex:/^[^\s]+$/', 'unique:technicians,user_name'],
            'password' => ['required', 'confirmed', Password::min(4)],
            'spec_id' => 'required|exists:specializations,id',
            'country_id' => 'required',
            'identity_id' => 'required|Numeric',
            'birth_date' => 'required|Date',
            'wallet_id' => 'required',
            'address' => 'required|String',
            'group_id' => 'nullable',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'active' => 'nullable|in:on,off',
        ];
        $validated = Validator::make($request->all(), $rules, ['user_name.regex' => 'يجب أن لا يحتوي اسم المستخدم على أي مسافات']);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        $validated = $validated->validated();
        if ($validated['active'] && $validated['active'] == 'on') {
            $validated['active'] = 1;
        } else {
            $validated['active'] = 0;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/images/technicians/'), $filename);
            $validated['image'] = 'storage/images/technicians' . '/' . $filename;
        }
        Technician::query()->create($validated);
        session()->flash('success');
        return redirect()->back();
    }
    protected function update(Request $request, $id)
    {
        $tech = Technician::query()->where('id', $id)->first();
        $rules = [
            'name' => 'required|String|min:3',
            'email' => 'required|Email|unique:technicians,email,' . $id,
            'phone' => 'required|unique:technicians,phone,' . $id,
            'user_name' => ['required', 'regex:/^[^\s]+$/', 'unique:technicians,user_name,' . $id],
            'spec_id' => 'required|exists:specializations,id',
            'country_id' => 'required',
            'identity_id' => 'required|Numeric',
            'birth_date' => 'required|Date',
            'wallet_id' => 'required',
            'address' => 'required|String',
            'group_id' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'active' => 'nullable|in:on,off',
            'password' => ['nullable', 'confirmed', Password::min(4)],
        ];
        $validated = Validator::make($request->all(), $rules, ['user_name.regex' => 'يجب أن لا يحتوي اسم المستخدم على أي مسافات']);
        if ($validated->fails()) {;
            return redirect()->to(route('dashboard.core.technician.index'))->withErrors($validated->errors());}
        $validated = $validated->validated();
        if ($validated['active'] && $validated['active'] == 'on') {
            $validated['active'] = 1;
        } else {
            $validated['active'] = 0;
        }
        if ($request->hasFile('image')) {
            if (File::exists(public_path($tech->image))) {
                File::delete(public_path($tech->image));
            }
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/images/technicians/'), $filename);
            $validated['image'] = 'storage/images/technicians' . '/' . $filename;
        }
        $tech->update($validated);
        session()->flash('success');
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
            'msg' => __("dash.deleted_success"),
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
        return response('success');
    }
}
