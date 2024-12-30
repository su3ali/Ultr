<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // public function index()
    // {
    //     $user = User::select('id', 'first_name', 'last_name', 'active', 'city_id', 'phone')
    //         ->with('city')
    //         ->get();
    //     if (request()->ajax()) {

    //         // $user = User::with('city')->get();
    //         return DataTables::of($user)
    //             ->addColumn('name', function ($user) {
    //                 $name = $user->first_name . ' ' . $user->last_name;
    //                 return $name;
    //             })
    //             ->addColumn('city_name', function ($user) {

    //                 return $user->city?->title;
    //             })
    //             ->addColumn('status', function ($user) {
    //                 $checked = '';
    //                 if ($user->active == 1) {
    //                     $checked = 'checked';
    //                 }
    //                 return '<label class="switch s-outline s-outline-info  mb-4 mr-2">
    //                     <input type="checkbox" id="customSwitch4" data-id="' . $user->id . '" ' . $checked . '>
    //                     <span class="slider round"></span>
    //                     </label>';
    //             })
    //             ->addColumn('controll', function ($user) {

    //                 $html = '
    //                 <a href="' . route('dashboard.core.address.index', 'id=' . $user->id) . '" class="mr-2 btn btn-outline-primary btn-sm"><i class="far fa-address-book fa-2x"></i> </a>
    //                 <a href="' . route('dashboard.core.customer.edit', $user->id) . '" class="mr-2 btn btn-outline-warning btn-sm"><i class="far fa-edit fa-2x"></i> </a>

    //                             <a data-href="' . route('dashboard.core.customer.destroy', $user->id) . '" data-id="' . $user->id . '" class="mr-2 btn btn-outline-danger btn-delete btn-sm">
    //                         <i class="far fa-trash-alt fa-2x"></i>
    //                 </a>
    //                             ';

    //                 return $html;
    //             })
    //             ->rawColumns([
    //                 'name',
    //                 'status',
    //                 'controll',
    //             ])
    //             ->make(true);
    //     }

    //     return view('dashboard.core.customers.index');
    // }

    public function index(Request $request)
    {
        // Check if the request is an AJAX request
        if ($request->ajax()) {
            // Fetch users with relevant data
            $usersQuery = User::select('id', 'first_name', 'last_name', 'active', 'city_id', 'phone')
                ->with('city');

            // Apply search filter if provided
            if ($request->filled('search.value')) {
                $search = $request->input('search.value');
                $usersQuery->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%$search%")
                        ->orWhere('first_name', 'LIKE', "%$search%")
                        ->orWhere('last_name', 'LIKE', "%$search%")
                        ->orWhere('phone', 'LIKE', "%$search%")
                        ->orWhereHas('city', function ($cityQuery) use ($search) {
                            $cityQuery->where('title_ar', 'LIKE', "%$search%");
                        });
                });
            }

            // Get total records before pagination
            $totalRecords = $usersQuery->count();

            // Apply pagination
            $users = $usersQuery
                ->orderBy('created_at', 'desc')
                ->skip($request->input('start', 0)) // Skip records based on DataTables pagination
                ->take($request->input('length', 10)) // Take the number of records specified
                ->get();

            // Prepare DataTables response
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $totalRecords,
                'data' => $users->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->first_name . ' ' . $user->last_name,
                        'city_name' => $user->city?->title ?? 'N/A',
                        'phone' => $user->phone
                        ? '<a href="https://api.whatsapp.com/send?phone=' . $user->phone . '" target="_blank" class="whatsapp-link">' . $user->phone . '</a>'
                        : 'N/A',
                        'status' => '<label class="switch s-outline s-outline-info mb-4 mr-2">
                                        <input type="checkbox" id="customSwitch4" data-id="' . $user->id . '" ' . ($user->active ? 'checked' : '') . '>
                                        <span class="slider round"></span>
                                    </label>',
                        'controll' => '
                            <a href="' . route('dashboard.core.address.index', ['id' => $user->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                                <i class="far fa-address-book fa-2x"></i>
                            </a>
                            <a href="' . route('dashboard.core.customer.edit', $user->id) . '" class="mr-2 btn btn-outline-warning btn-sm">
                                <i class="far fa-edit fa-2x"></i>
                            </a>
                            <a data-href="' . route('dashboard.core.customer.destroy', $user->id) . '" data-id="' . $user->id . '" class="mr-2 btn btn-outline-danger btn-delete btn-sm">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </a>',
                    ];
                }),
            ]);
        }

        // Render the initial view for non-AJAX requests
        return view('dashboard.core.customers.index');
    }

    public function create()
    {
        $cities = City::where('active', 1)->get()->pluck('title', 'id');

        return view('dashboard.core.customers.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'nullable|email|max:255|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone',
            'active' => 'nullable|in:on,off',
            'city_id' => 'nullable|exists:cities,id',
        ]);

        $data = $request->except('_token', 'active');
        $data['active'] = 1;
        User::query()->create($data);

        session()->flash('success');
        return redirect()->route('dashboard.core.customer.index');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $cities = City::where('active', 1)->get()->pluck('title', 'id');
        return view('dashboard.core.customers.edit', compact('user', 'cities'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'nullable|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|numeric|unique:users,phone,' . $id,
            'active' => 'nullable|in:on,off',
            'city_id' => 'nullable|exists:cities,id',

        ]);
        $data = $request->except('_token', 'active');

        $data['active'] = 1;

        $user = User::find($id);
        $user->update($data);
        session()->flash('success');
        return redirect()->route('dashboard.core.customer.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return [
            'success' => true,
            'msg' => __("dash.deleted_success"),
        ];
    }

    public function change_status(Request $request)
    {
        $admin = User::where('id', $request->id)->first();
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
