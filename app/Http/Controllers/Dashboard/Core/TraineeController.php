<?php
namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Rate;
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
        $specs  = cache()->remember('specs', 60, fn() => Specialization::all());

        // Static nationalities data
        $nationalities = [
            "فلبين"     => "1",
            "اندونيسيا" => "2",
            "الهند"     => "3",
            "تايلند"    => "4",
            "ماليزيا"   => "5",
            "باكستان"   => "6",
            "مصر"       => "7",
        ];

        // Handle AJAX request for DataTables
        if ($request->ajax()) {
            $traineesQuery = Technician::query()
                ->with(['group', 'specialization', 'traineeRates']) // Eager load relationships
                ->where('is_trainee', 1);                           // Filter only trainees

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
                'draw'            => $request->input('draw'),
                'recordsTotal'    => Technician::count(), // Total number of technicians
                'recordsFiltered' => $filteredRecords,
                'data'            => $trainees->map(function ($trainee) {
                    // Fetch the related RateTrainee record once
                    $rateTrainee = RateTrainee::where('trainee_id', $trainee->id)->first();

                    return [
                        'id'         => '<a href="' . route('dashboard.core.technician.details', ['id' => $trainee->id]) . '">' . $trainee->id . '</a>',
                        'name'       => '<a href="#">' . e($trainee->name) . '</a>',
                        'rate'       => '<a href="#">' . ($rateTrainee?->rate ? $rateTrainee->rate->{app()->getLocale() == 'en' ? 'name_en' : 'name_ar'} : '') . '</a>',

                        'file'       => optional($rateTrainee)->upload_file
                        ? '<a href="' . asset(optional($rateTrainee)->upload_file) . '" target="_blank" class="btn btn-primary">
                         <i class="fas fa-file-pdf"></i> عرض المرفق
                            </a>'
                        : 'لم يتم اضافة مرفق',
                        'start_date' => $trainee->training_start_date ?? '',
                        'end_date'   => $trainee->training_end_date ?? '',

                        'note'       => '<a href="#">' . optional($rateTrainee)->note . '</a>',
                        'status'     => '
                            <label class="switch s-outline s-outline-info mb-4 mr-2">
                                <input type="checkbox" id="customSwitchtech" data-id="' . $trainee->id . '" ' . ($trainee->is_trainee ? '' : 'checked') . '>
                                <span class="slider round"></span>
                            </label>',
                        'control'    => '
                            <button type="button" id="edit-tech" class="btn btn-primary btn-sm edit"
                                data-id="' . $trainee->id . '"
                                data-name="' . e($trainee->name) . '"
                                data-user_name="' . e($trainee->user_name) . '"
                                data-rate="' . ($rateTrainee?->rate ? $rateTrainee->rate->{app()->getLocale() == 'en' ? 'name_en' : 'name_ar'} : '') . '"
                                data-note="' . optional($rateTrainee)->note . '"
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

        $locale = app()->getLocale();

        $ratings = Rate::all();

        return view('dashboard.core.trainees.index', compact('groups', 'specs', 'nationalities', 'ratings'));
    }

    public function showTechnicianDetails($id)
    {
                                                                                      // Fetch technician details
        $technician = Technician::with(['group', 'specialization'])->findOrFail($id); // Eager load related data
        $visits     = Visit::where('assign_to_id', $technician->id)
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
            'name'                => 'required|String|min:3',
            'phone'               => 'required|unique:technicians,phone',
            'user_name'           => ['required', 'regex:/^[^\s]+$/', 'unique:technicians,user_name'],
            'password'            => ['required', 'confirmed', Password::min(4)],
            'spec_id'             => 'required|exists:specializations,id',
            'country_id'          => 'required',
            'identity_id'         => 'required|Numeric|unique:technicians,identity_id',
            'birth_date'          => 'nullable|Date',
            'training_start_date' => 'required|Date',
            'training_end_date'   => 'required|Date',
            'wallet_id'           => 'required',
            'address'             => 'nullable|String',
            'group_id'            => 'nullable',
            'image'               => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'active'              => 'nullable|in:on,off',
        ];
        $validated = Validator::make($request->all(), $rules, ['user_name.regex' => 'يجب أن لا يحتوي اسم المستخدم على أي مسافات']);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        $validated = $validated->validated();

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/images/trainees/'), $filename);
            $validated['image'] = 'storage/images/trainees' . '/' . $filename;
        }
        $trainee = Technician::query()->create($validated);
        $trainee->update([
            'is_trainee' => 1,
            'active'     => 0,
            'country_id' => 1,
        ]);
        session()->flash('success', __('api.add_trainee'));
        return redirect()->back();

    }
    protected function update(Request $request, $id)
    {
        $tech = Technician::findOrFail($id);

        // Validation rules
        $rules = [
            'name'        => 'required|string|min:3',
            'email'       => 'nullable|email|unique:technicians,email,' . $id,
            'phone'       => 'nullable|unique:technicians,phone,' . $id,
            'user_name'   => ['nullable', 'regex:/^[^\s]+$/', 'unique:technicians,user_name,' . $id],
            'spec_id'     => 'nullable|exists:specializations,id',
            'country_id'  => 'nullable',
            'identity_id' => 'nullable|numeric',
            'birth_date'  => 'nullable|date',
            'wallet_id'   => 'nullable',
            'address'     => 'nullable|string',
            'rate_id'     => 'nullable|exists:rates,id',

            'group_id'    => 'nullable',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'upload_file' => 'nullable|file|mimes:jpeg,jpg,png,gif,pdf',
            'active'      => 'nullable|in:on,off',
            'is_trainee'  => 'nullable|in:on,off',
            'password'    => ['nullable', 'confirmed', Password::min(4)],
        ];

        $validated = Validator::make($request->all(), $rules, ['user_name.regex' => 'يجب أن لا يحتوي اسم المستخدم على أي مسافات']);
        if ($validated->fails()) {
            return redirect()->to(route('dashboard.core.technician.index'))->withErrors($validated->errors());
        }

        $validated = $validated->validated();

        // Preserve existing data for nullable fields if request data is null
        $validated = array_merge([
            'email'       => $tech->email,
            'phone'       => $tech->phone,
            'user_name'   => $tech->user_name,
            'spec_id'     => $tech->spec_id,
            'country_id'  => $tech->country_id,
            'identity_id' => $tech->identity_id,
            'birth_date'  => $tech->birth_date,
            'wallet_id'   => $tech->wallet_id,
            'address'     => $tech->address,
            'group_id'    => $tech->group_id,
        ], $validated);

        // Handle is_trainee and active fields
        $validated['is_trainee'] = $request->has('is_trainee') ? ($request->is_trainee == 'on' ? 1 : 0) : $tech->is_trainee;
        $validated['active']     = $request->has('active') ? ($request->active == 'on' ? 1 : 0) : $tech->active;

        // Handle image upload
        if ($request->hasFile('image')) {
            if (File::exists(public_path($tech->image))) {
                File::delete(public_path($tech->image));
            }
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move(storage_path('app/public/images/trainees/'), $filename);
            $validated['image'] = 'storage/images/trainees/' . $filename;
        } else {
            $validated['image'] = $tech->image; // Preserve existing image if no new one is uploaded
        }

                                                                   // Handle file upload
        $path = $tech->traineeRates->first()->upload_file ?? null; // Use first() to retrieve the first traineeRate instance
        if ($request->hasFile('upload_file')) {
            // Delete the old file if it exists
            if ($path && File::exists(public_path($path))) {
                File::delete(public_path($path));
            }
            $uploadFile = $request->file('upload_file');
            $filename   = time() . '.' . $uploadFile->getClientOriginalExtension();
            $uploadFile->move(storage_path('app/public/images/trainees/'), $filename);
            $path = 'storage/images/trainees/' . $filename;
        }

        // Update or create the trainee rating
        if ($request->has('rate') || $request->has('note') || $request->has('upload_file')) {
            RateTrainee::updateOrCreate(
                ['trainee_id' => $tech->id],
                [
                    'rate_id'     => $request->rate ?? optional($tech->traineeRates->first())->rate_id,
                    'note'        => $request->get('note', optional($tech->traineeRates->first())->note),
                    'upload_file' => $path,
                ]
            );
        }

        unset($validated['upload_file']); // Ensure 'upload_file' is not included

        // Update technician data
        $tech->update($validated);

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
            'msg'     => __("dash.deleted_success"),
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
