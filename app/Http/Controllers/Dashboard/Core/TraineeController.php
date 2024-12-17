<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\RateTrainee;
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
                ->with(['group', 'specialization', 'traineeRates']) // Eager load relationships
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
                        'rate' => '<a href="#">' . optional(RateTrainee::where('trainee_id', $trainee->id)->first())->rate . '</a>',
                        'file' => $trainee->upload_file
                        ? '<img class="img-fluid" style="width: 85px;" src="' . asset($trainee->upload_file) . '"/>'
                        : 'لم يتم اضافة صورة',
                        'note' => '<a href="#">' . optional(RateTrainee::where('trainee_id', $trainee->id)->first())->note . '</a>',
                        'status' => '
                            <label class="switch s-outline s-outline-info mb-4 mr-2">
                                <input type="checkbox" id="customSwitchtech" data-id="' . $trainee->id . '" ' . ($trainee->is_trainee ? '' : 'checked') . '>
                                <span class="slider round"></span>
                            </label>',
                        'control' => '
                            <button type="button" id="edit-tech" class="btn btn-primary btn-sm edit"
                                data-id="' . $trainee->id . '"
                                data-name="' . e($trainee->name) . '"
                                data-user_name="' . e($trainee->user_name) . '"
                                data-rate="' . optional(RateTrainee::where('trainee_id', $trainee->id)->first())->rate . '"
                                data-note="' . optional(RateTrainee::where('trainee_id', $trainee->id)->first())->note . '"
                                data-email="' . e($trainee->email) . '"
                                data-phone="' . e($trainee->phone) . '"
                                data-specialization="' . e($trainee->spec_id) . '"
                                data-active="' . e($trainee->active) . '"
                                data-is_trainee="' . e($trainee->is_trainee) . '"
                                data-group_id="' . e($trainee->group_id) . '"
                                data-country_id="' . e($trainee->country_id) . '"
                                data-address="' . e($trainee->address) . '"
                                data-wallet_id="' . e($trainee->wallet_id) . '"
                                data-birth_date="' . e($trainee->birth_date) . '"
                                data-identity_number="' . e($trainee->identity_id) . '"
                                data-image="' . asset($trainee->image) . '"
                                data-toggle="modal" data-target="#editTechModel">
                                <i class="far fa-star fa-2x"></i>

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

        $ratings = ['ممتاز جدا', 'ممتاز', 'جيد جدا', 'جيد', 'سيئ'];

        return view('dashboard.core.trainees.index', compact('groups', 'specs', 'nationalities', 'ratings'));
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
            'phone' => 'required|unique:technicians,phone',
            'user_name' => ['required', 'regex:/^[^\s]+$/', 'unique:technicians,user_name'],
            'password' => ['required', 'confirmed', Password::min(4)],
            'spec_id' => 'required|exists:specializations,id',
            'country_id' => 'required',
            'identity_id' => 'required|Numeric',
            'birth_date' => 'nullable|Date',
            'wallet_id' => 'required',
            'address' => 'nullable|String',
            'group_id' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'active' => 'nullable|in:on,off',
        ];
        $validated = Validator::make($request->all(), $rules, ['user_name.regex' => 'يجب أن لا يحتوي اسم المستخدم على أي مسافات']);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        $validated = $validated->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/images/technicians/'), $filename);
            $validated['image'] = 'storage/images/technicians' . '/' . $filename;
        }
        $trainee = Technician::query()->create($validated);
        $trainee->update([
            'is_trainee' => 1,
            'active' => 0,
            'country_id' => 1,
        ]);
        session()->flash('success', __('تم إنشاء متدرب بنجاح'));
        return redirect()->back();

    }
    protected function update(Request $request, $id)
    {
        // dd($request->all());
        $tech = Technician::query()->where('id', $id)->first();
        $rules = [
            'name' => 'required|String|min:3',
            'email' => 'nullable|Email|unique:technicians,email,' . $id,
            'phone' => 'nullable|unique:technicians,phone,' . $id,
            'user_name' => ['nullable', 'regex:/^[^\s]+$/', 'unique:technicians,user_name,' . $id],
            'spec_id' => 'nullable|exists:specializations,id',
            'country_id' => 'nullable',
            'identity_id' => 'requnullableired|Numeric',
            'birth_date' => 'nullable|Date',
            'wallet_id' => 'nullable',
            'address' => 'nullable|String',
            'group_id' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'upload_file' => 'nullable|image|mimes:jpeg,jpg,png,gif,pdf',

            'active' => 'nullable|in:on,off',
            'is_trainee' => 'nullable|in:on,off',
            'password' => ['nullable', 'confirmed', Password::min(4)],
        ];
        $validated = Validator::make($request->all(), $rules, ['user_name.regex' => 'يجب أن لا يحتوي اسم المستخدم على أي مسافات']);
        if ($validated->fails()) {;
            return redirect()->to(route('dashboard.core.technician.index'))->withErrors($validated->errors());}
        $validated = $validated->validated();

        $ratings = ['ممتاز جدا', 'ممتاز', 'جيد جدا', 'جيد', 'سيئ'];

        $validatedData = $request->validate([
            'rate' => ['required', 'in:' . implode(',', $ratings)],
        ]);
        if ($request->has('is_trainee')) {
            // Validate and set 'active'
            if ($validated['is_trainee'] && $validated['is_trainee'] == 'on') {
                $validated['is_trainee'] = 1;
                // If active is 1, set 'is_trainee' to 0
                $validated['is_trainee'] = 0;
            } else {
                $validated['is_trainee'] = 0;
            }
        }

        if ($request->has('active')) {
            // Validate and set 'active'
            if ($validated['active'] && $validated['active'] == 'on') {
                $validated['active'] = 1;
                // If active is 1, set 'is_trainee' to 0
                $validated['active'] = 0;
            } else {
                $validated['active'] = 0;
            }
        }
        $path = '';

        if ($request->hasFile('image')) {
            if (File::exists(public_path($tech->image))) {
                File::delete(public_path($tech->image));
            }
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/images/trainees/'), $filename);
            $validated['image'] = 'storage/images/trainees' . '/' . $filename;
        }

        if ($request->hasFile('upload_file')) {
            if (File::exists(public_path($tech->upload_file))) {
                File::delete(public_path($tech->upload_file));
            }
            $image = $request->file('upload_file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->upload_file->move(storage_path('app/public/images/trainees/'), $filename);
            $path = 'storage/images/trainees' . '/' . $filename;
        }

        if ($request->has('rate') || $request->has('note') || $request->has('upload_file')) {
            RateTrainee::updateOrCreate(
                ['trainee_id' => $tech->id],
                [
                    'rate' => $request->get('rate'),
                    'note' => $request->get('note') ?? '',
                    'upload_file' => $path,

                ]
            );
        }

        session()->flash('success', __('api.trainee_rate_update'));
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

        if ($request->is_trainee == 'true') {
            error_log(1);
            Technician::query()->where('id', $request->id)->update(['is_trainee' => 0]);
            Technician::query()->where('id', $request->id)->update(['active' => 1]);

        } else {
            error_log(2);
            Technician::query()->where('id', $request->id)->update(['is_trainee' => 1]);
            Technician::query()->where('id', $request->id)->update(['active' => 0]);

        }

        session()->flash('success', __('api.trainee_upgrade'));
        return redirect()->back();

    }
}
