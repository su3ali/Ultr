<?php
namespace App\Http\Controllers\Dashboard\Reports;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CustomerReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {

        $date  = $request->query('date');
        $date2 = $request->query('date2');

        $usersQuery = User::query()
            ->withCount('orders') // Keep default 'orders_count'
            ->leftJoin('cities', 'cities.id', '=', 'users.city_id')
            ->addSelect([
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
                        'id'           => $user->id,
'name' => '<a href="' . route('dashboard.customer.orders', $user->id) . '" class="text-primary" title="عرض الطلبات">' . $user->first_name . ' ' . $user->last_name . '</a>',

                        'city_name'    => $user->city_name ?? 'N/A',
                        'phone'        => $user->phone
                        ? '<a href="https://api.whatsapp.com/send?phone=' . $user->phone . '" target="_blank" class="whatsapp-link" title="فتح في الواتساب">' . $user->phone . '</a>'
                        : 'N/A',
                        'orders_count' => $user->orders_count ?? 0,

                        'created_at'   => optional($user->created_at)->format('Y-m-d'),
                        'status'       => '<label class="switch s-outline s-outline-info mb-4 mr-2">
                                        <input type="checkbox" id="customSwitch4" data-id="' . $user->id . '" ' . ($user->active ? 'checked' : '') . '>
                                        <span class="slider round"></span>
                                    </label>',
                        'controll'     => ''
                        // <a href="' . route('dashboard.core.address.index', ['id' => $user->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                        //     <i class="far fa-address-book fa-2x"></i>
                        // </a>
                        // <a href="' . route('dashboard.core.customer.edit', $user->id) . '" class="mr-2 btn btn-outline-warning btn-sm">
                        //     <i class="far fa-edit fa-2x"></i>
                        // </a>
                        // <a data-href="' . route('dashboard.core.customer.destroy', $user->id) . '" data-id="' . $user->id . '" class="mr-2 btn btn-outline-danger btn-delete btn-sm">
                        //     <i class="far fa-trash-alt fa-2x"></i>
                        // </a>'
                        ,
                    ];
                }),
            ]);
        }
        return view('dashboard.reports.customer');
    }

}
