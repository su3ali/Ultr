<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Specialization;
use App\Models\Technician;
use App\Traits\imageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class TechnicianController extends Controller
{
    use imageTrait;

    public function index(Request $request)
    {
        // Cache groups and specializations if they don't change often
        $groups = cache()->remember('groups', 60, function () {
            return Group::all();
        });

        $specs = cache()->remember('specs', 60, function () {
            return Specialization::all();
        });

        if ($request->ajax()) {
            $techniciansQuery = Technician::query()->with(['group', 'specialization']); // Eager load related data

            // Apply filters
            if ($request->has('group_id') && $request->group_id !== 'all') {
                $techniciansQuery->where('group_id', $request->group_id);
            }

            if ($request->has('spec_id') && $request->spec_id !== 'all') {
                $techniciansQuery->where('spec_id', $request->spec_id);
            }

            // Apply search filter
            if ($request->filled('search.value')) {
                $search = $request->input('search.value');
                $techniciansQuery->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%")
                        ->orWhere('phone', 'LIKE', "%$search%")
                        ->orWhere('identity_id', 'LIKE', "%$search%")
                        ->orWhere('email', 'LIKE', "%$search%");
                });
            }

            // Get filtered total count
            $filteredRecords = $techniciansQuery->clone()->count();

            // Apply pagination
            $technicians = $techniciansQuery->skip($request->input('start', 0))
                ->take($request->input('length', 10))
                ->get();

            // Return DataTables response
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => Technician::count(), // Total count of technicians (unfiltered)
                'recordsFiltered' => $filteredRecords,
                'data' => $technicians->map(function ($row) {
                    return [
                        'id' => $row->id,
                        'name' => $row->name,
                        't_image' => '<img class="img-fluid" style="width: 85px;" src="' . asset($row->image) . '"/>',
                        'spec' => $row->specialization?->name,
                        'phone' => $row->phone,
                        'group' => $row->group?->name,
                        'status' => '
                            <label class="switch s-outline s-outline-info mb-4 mr-2">
                                <input type="checkbox" id="customSwitchtech" data-id="' . $row->id . '" ' . ($row->active ? 'checked' : '') . '>
                                <span class="slider round"></span>
                            </label>',
                        'control' => '
                            <button type="button" id="edit-tech" class="btn btn-primary btn-sm edit" data-id="' . $row->id . '" data-name="' . $row->name . '"
                                data-user_name="' . $row->user_name . '" data-email="' . $row->email . '" data-phone="' . $row->phone . '"
                                data-specialization="' . $row->spec_id . '" data-active="' . $row->active . '" data-group_id="' . $row->group_id . '"
                                data-country_id="' . $row->country_id . '" data-address="' . $row->address . '" data-wallet_id="' . $row->wallet_id . '"
                                data-birth_date="' . $row->birth_date . '" data-identity_number="' . $row->identity_id . '"
                                data-image="' . asset($row->image) . '" data-toggle="modal" data-target="#editTechModel">
                                <i class="far fa-edit fa-2x"></i>
                            </button>
                           <a data-table_id="html5-extension" data-href="' . route('dashboard.core.technician.destroy', $row->id) . '"
                             data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech"><i class="far fa-trash-alt fa-2x"></i></a>',

                    ];
                }),
            ]);
        }
        $nationalities = [
            "فلبين" => "1",
            "اندونيسيا" => "2",
            "الهند" => "3",
            "تايلند" => "4",
            "ماليزيا" => "5",
            "باكستان" => "6",
            "مصر" => "7",
        ];

        return view('dashboard.core.technicians.index', compact('groups', 'specs', 'nationalities'));

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
