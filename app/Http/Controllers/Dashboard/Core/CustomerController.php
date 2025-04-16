<?php
namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(Request $request)
    {

        $date  = $request->query('date');
        $date2 = $request->query('date2');

        $usersQuery = User::query()
            ->leftJoin('cities', 'cities.id', '=', 'users.city_id')
            ->select([
                'users.id',
                'users.first_name',
                'users.last_name',
                'users.phone',
                'users.active',
                'users.created_at',
                'cities.title_ar as city_name',
            ]);

        if ($request->has('page')) {
            $now = Carbon::now('Asia/Riyadh')->toDateString();
            $usersQuery->whereDate('users.created_at', $now);
        }

        if ($date && $date2) {
            $start = Carbon::parse($date)->startOfDay()->timezone('Asia/Riyadh');
            $end   = Carbon::parse($date2)->endOfDay()->timezone('Asia/Riyadh');
            $usersQuery->whereBetween('users.created_at', [$start, $end]);
        } elseif ($date) {
            $start = Carbon::parse($date)->startOfDay()->timezone('Asia/Riyadh');
            $usersQuery->where('users.created_at', '>=', $start);
        } elseif ($date2) {
            $end = Carbon::parse($date2)->endOfDay()->timezone('Asia/Riyadh');
            $usersQuery->where('users.created_at', '<=', $end);
        }

        if ($request->ajax()) {
            if ($request->filled('search.value')) {
                $search = $request->input('search.value');
                $usersQuery->where(function ($query) use ($search) {
                    $query->where('users.id', 'LIKE', "%$search%")
                        ->orWhere('users.first_name', 'LIKE', "%$search%")
                        ->orWhere('users.last_name', 'LIKE', "%$search%")
                        ->orWhere('users.phone', 'LIKE', "%$search%")
                        ->orWhere('cities.title_ar', 'LIKE', "%$search%");
                });
            }

            $totalRecords = (clone $usersQuery)->count();

            $users = $usersQuery
                ->orderBy('users.created_at', 'desc')
                ->skip($request->input('start', 0))
                ->take($request->input('length', 10))
                ->get();

            return response()->json([
                'draw'            => $request->input('draw'),
                'recordsTotal'    => $totalRecords,
                'recordsFiltered' => $totalRecords,
                'data'            => $users->map(function ($user) {
                    return [
                        'id'         => $user->id,
                        'name'       => $user->first_name . ' ' . $user->last_name,
                        'city_name'  => $user->city_name ?? 'N/A',
                        'phone'      => $user->phone
                        ? '<a href="https://api.whatsapp.com/send?phone=' . $user->phone . '" target="_blank" class="whatsapp-link" title="فتح في الواتساب">' . $user->phone . '</a>'
                        : 'N/A',
                        'created_at' => optional($user->created_at)->format('Y-m-d'),
                        'status'     => '<label class="switch s-outline s-outline-info mb-4 mr-2">
                                        <input type="checkbox" id="customSwitch4" data-id="' . $user->id . '" ' . ($user->active ? 'checked' : '') . '>
                                        <span class="slider round"></span>
                                    </label>',
                        'controll'   => '
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

        return view('dashboard.core.customers.index');
    }

    // just  clints have orders on system
    public function withOrders(Request $request)
    {

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            $clientsWithOrders = User::whereHas('orders') // Filters users who have at least one order
                ->select('id', 'first_name', 'last_name', 'active', 'city_id', 'phone')
                ->with('city')
                ->withCount('orders')
                ->orderByDesc('orders_count');

            if ($request->filled('search.value')) {
                $search = $request->input('search.value');
                $clientsWithOrders->where(function ($query) use ($search) {
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
            $totalRecords = $clientsWithOrders->count();

            // Apply pagination
            $users = $clientsWithOrders
                ->orderBy('created_at', 'desc')
                ->skip($request->input('start', 0))   // Skip records based on DataTables pagination
                ->take($request->input('length', 10)) // Take the number of records specified
                ->get();

            // Prepare DataTables response
            return response()->json([
                'draw'            => $request->input('draw'),
                'recordsTotal'    => $totalRecords,
                'recordsFiltered' => $totalRecords,
                'data'            => $users->map(function ($user) {
                    return [
                        'id'             => $user->id,
                        'name'           => $user->first_name . ' ' . $user->last_name,
                        'region'         => 'N/A',
                        'phone'          => $user->phone
                        ? '<a href="https://api.whatsapp.com/send?phone=' . $user->phone . '" target="_blank" class="whatsapp-link" title="فتح في الواتساب">' . $user->phone . '</a>'
                        : 'N/A',
                        'orders_numbers' => $user->orders->count(),

                    ];
                }),
            ]);
        }

        // Render the initial view for non-AJAX requests
        return view('dashboard.core.customers.have-orders');
    }

    public function create()
    {
        $cities = City::where('active', 1)->get()->pluck('title', 'id');

        return view('dashboard.core.customers.create', compact('cities'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => 'required|string|max:100',
    //         'last_name'  => 'required|string|max:100',
    //         'email'      => 'nullable|email|max:255|unique:users,email',
    //         'phone'      => 'required|numeric|unique:users,phone',
    //         'active'     => 'nullable|in:on,off',
    //         'city_id'    => 'nullable|exists:cities,id',
    //     ]);

    //     $data           = $request->except('_token', 'active');
    //     $data['active'] = 1;
    //     User::query()->create($data);

    //     session()->flash('success');
    //     return redirect()->route('dashboard.core.customer.index');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'nullable|email|max:255|unique:users,email',
            'phone'      => 'required|numeric|unique:users,phone',
            'active'     => 'nullable|in:on,off',
            'city_id'    => 'nullable|exists:cities,id',
        ]);

        $data           = $request->except('_token', 'active');
        $data['active'] = 1;

        $user = User::create($data);

        if ($request->ajax()) {
            return response()->json([
                'status'  => true,
                'user_id' => $user->id,
                'message' => __('dash.saved_successfully'),
            ]);
        }

        session()->flash('success');
        return redirect()->route('dashboard.core.customer.index');
    }

    public function edit($id)
    {
        $user   = User::where('id', $id)->first();
        $cities = City::where('active', 1)->get()->pluck('title', 'id');
        return view('dashboard.core.customers.edit', compact('user', 'cities'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'nullable|email|max:255|unique:users,email,' . $id,
            'phone'      => 'required|numeric|unique:users,phone,' . $id,
            'active'     => 'nullable|in:on,off',
            'city_id'    => 'nullable|exists:cities,id',

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
            'msg'     => __("dash.deleted_success"),
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
    // Check if User  exists
    public function checkPhone(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|starts_with:966|digits:12',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            return response()->json([
                'exists'  => true,
                'user_id' => $user->id,
            ]);
        }

        return response()->json(['exists' => false]);
    }

}
