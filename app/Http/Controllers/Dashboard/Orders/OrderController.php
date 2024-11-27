<?php

namespace App\Http\Controllers\Dashboard\Orders;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\Category;
use App\Models\City;
use App\Models\CustomerComplaint;
use App\Models\CustomerComplaintImage;
use App\Models\Group;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\OrderStatus;
use App\Models\Service;
use App\Models\User;
use App\Models\UserAddresses;
use App\Models\Visit;
use App\Traits\schedulesTrait;
use Carbon\CarbonInterval;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    use schedulesTrait;
    // public function index(Request $request)
    // {

    //     // Get pagination data sent by DataTables
    //     $start = $request->input('start', 0); // Start index
    //     $length = $request->input('length', 10); // Page size

    //     $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

    //     // Start building the query
    //     $ordersQuery = Order::query()->
    //         whereHas('userAddress', function ($query) use ($regionIds) {
    //         $query->whereIn('region_id', $regionIds);
    //     })
    //         ->with(['user', 'transaction', 'status', 'bookings.visit.status', 'services.category']);
    //     // Apply search filter across all columns
    //     if ($request->has('search_value') && $request->search_value != '') {
    //         $searchTerm = $request->search_value;
    //         $ordersQuery->where(function ($query) use ($searchTerm) {
    //             $query->where('id', 'like', "%{$searchTerm}%")
    //                 ->orWhereHas('user', function ($q) use ($searchTerm) {
    //                     $q->where('first_name', 'like', "%{$searchTerm}%")
    //                         ->orWhere('last_name', 'like', "%{$searchTerm}%");
    //                 })
    //                 ->orWhereHas('services', function ($q) use ($searchTerm) {
    //                     $q->where('title', 'like', "%{$searchTerm}%");
    //                 })
    //                 ->orWhereHas('services', function ($q) use ($searchTerm) {
    //                     $q->where('title', 'like', "%{$searchTerm}%");
    //                 })
    //                 ->orWhere('total', 'like', "%{$searchTerm}%")
    //                 ->orWhere('payment_method', 'like', "%{$searchTerm}%")
    //                 ->orWhereHas('status', function ($q) use ($searchTerm) {
    //                     $q->where('name', 'like', "%{$searchTerm}%");
    //                 })
    //                 ->orWhereDate('created_at', 'like', "%{$searchTerm}%");
    //         });
    //     }

    //     // Filter based on request parameters for AJAX
    //     if (request()->ajax()) {
    //         // Filter by status and date if specified
    //         if (request()->status) {
    //             $ordersQuery->where('status_id', request()->status);
    //         }

    //         if (request()->page) {
    //             $now = Carbon::now('Asia/Riyadh')->toDateString();
    //             $ordersQuery->where('status_id', '!=', 5)->whereDate('created_at', '=', $now);
    //         }

    //         // Additional filtering to ensure only active orders are returned
    //         $ordersQuery->where('is_active', 1);
    //         // $ordersQuery->skip($start)
    //         //     ->take($length);

    //         // Get the filtered results
    //         return DataTables::of($ordersQuery)
    //             ->addColumn('booking_id', function ($row) {
    //                 return $row->bookings->first() ? $row->bookings->first()->id : '';
    //             })
    //             ->addColumn('user', function ($row) {
    //                 return $row->user?->first_name . ' ' . $row->user?->last_name;
    //             })
    //             ->addColumn('service', function ($row) {
    //                 $services = $row->services->unique('id'); // Ensure uniqueness based on ID
    //                 $html = '';
    //                 foreach ($services as $service) {
    //                     $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
    //                 }
    //                 return $html;
    //             })
    //             ->addColumn('quantity', function ($row) {
    //                 return $row->services->sum('pivot.quantity');
    //             })
    //             ->addColumn('payment_method', function ($row) {
    //                 return match ($row->transaction?->payment_method) {
    //                     'cache', 'cash' => 'شبكة',
    //                     'wallet' => 'محفظة',
    //                     default => 'فيزا',
    //                 };
    //             })
    //             ->addColumn('status', function ($row) {
    //                 return $row->bookings?->first()?->visit?->status->name_ar;
    //             })
    //             ->addColumn('created_at', function ($row) {
    //                 return Carbon::parse($row->created_at)->timezone('Asia/Riyadh')->format("Y-m-d H:i:s");
    //             })
    //             ->addColumn('control', function ($row) {
    //                 $html = '';
    //                 if ($row->status_id == 2) {
    //                     $html .= '<a href="' . route('dashboard.order.confirmOrder', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
    //                         <i class="far fa-thumbs-up fa-2x mx-1"></i> تأكيد
    //                     </a>';
    //                 }
    //                 $html .= '<button type="button" id="show-bookings" class="btn btn-sm btn-outline-primary" data-id="' . $row->id . '" data-toggle="modal" data-target="#changeGroupModel">
    //                     <i class="far fa-eye fa-2x"></i>
    //                 </button>
    //                 <a href="' . route('dashboard.order.orderDetail', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
    //                     <i class="far fa-eye fa-2x"></i>
    //                 </a>
    //                 <a href="' . route('dashboard.order.showService', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
    //                     <i class="far fa-eye fa-2x"></i>
    //                 </a>
    //                 <a data-table_id="html5-extension" data-href="' . route('dashboard.orders.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
    //                     <i class="far fa-trash-alt fa-2x"></i>
    //                 </a>';
    //                 return $html;
    //             })
    //             ->rawColumns(['booking_id', 'user', 'service', 'quantity', 'payment_method', 'status', 'created_at', 'control'])
    //             ->make(true);
    //     }

    //     $statuses = OrderStatus::all()->pluck('name', 'id');
    //     return view('dashboard.orders.index', compact('statuses', 'start', 'length'));
    // }
    public function index(Request $request)
    {
        // Get pagination data sent by DataTables
        $start = $request->input('start', 0); // Start index
        $length = $request->input('length', 10); // Page size

        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

        // Start building the query
        $ordersQuery = Order::query()
            ->whereHas('userAddress', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            })
            ->with(['user', 'bookings', 'transaction', 'status', 'bookings.visit.status', 'services.category']);

        $orders = $ordersQuery->get();
        // dd($orders->first()->bookings); // Should return orders filtered by region and matching search criteria

        if ($request->has('search_value') && $request->search_value != '') {
            $searchTerm = $request->search_value;
            $ordersQuery->where(function ($query) use ($searchTerm) {
                $query->where('id', 'like', "%{$searchTerm}%")
                    ->orWhereHas('user', function ($q) use ($searchTerm) {
                        $q->where('first_name', 'like', "%{$searchTerm}%")
                            ->orWhere('last_name', 'like', "%{$searchTerm}%");
                    })

                    ->orWhereHas('bookings', function ($q) use ($searchTerm) {
                        $q->where('id', 'like', "%{$searchTerm}%");
                    })
                    ->orWhere('total', 'like', "%{$searchTerm}%")
                    ->orWhereHas('status', function ($q) use ($searchTerm) {
                    })
                    ->orWhereDate('created_at', 'like', "%{$searchTerm}%");
            });
        }

        // Apply additional filters
        if ($request->ajax()) {
            if ($request->status) {
                $ordersQuery->where('status_id', $request->status);
            }

            if ($request->page) {
                $now = Carbon::now('Asia/Riyadh')->toDateString();
                $ordersQuery->where('status_id', '!=', 5)->whereDate('created_at', '=', $now);
            }

            $ordersQuery->where('is_active', 1);

            if ($length == -1) {
                $visits = $ordersQuery->get(); // Get all records without pagination
            } else {
                // Get paginated results
                $orders = $ordersQuery->skip($start)->take($length)->get();
            }

            // Debug: Log the fetched orders
            // \Log::info('Fetched Orders:', $orders->toArray());

            // Debug: Uncomment below to return the raw data
            // return response()->json($orders);

            return DataTables::of($ordersQuery)
                ->addColumn('booking_id', function ($row) {
                    return $row->bookings->first() ? $row->bookings->first()->id : '';
                })
                ->addColumn('user', function ($row) {
                    return $row->user?->first_name . ' ' . $row->user?->last_name;
                })
                ->addColumn('service', function ($row) {
                    $services = $row->services->unique('id');
                    $html = '';
                    foreach ($services as $service) {
                        $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                    }
                    return $html;
                })
                ->addColumn('quantity', function ($row) {
                    return $row->services->sum('pivot.quantity');
                })
                ->addColumn('payment_method', function ($row) {
                    return match ($row->transaction?->payment_method) {
                        'cache', 'cash' => 'شبكة',
                        'wallet' => 'محفظة',
                        default => 'فيزا',
                    };
                })
                ->addColumn('status', function ($row) {
                    return $row->bookings?->first()?->visit?->status->name_ar;
                })
                ->addColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->timezone('Asia/Riyadh')->format("Y-m-d H");
                })
                ->addColumn('control', function ($row) {
                    $html = '';
                    if ($row->status_id == 2) {
                        $html .= '<a href="' . route('dashboard.order.confirmOrder', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                        <i class="far fa-thumbs-up fa-2x mx-1"></i> تأكيد
                    </a>';
                    }
                    $html .= '<button type="button" id="show-bookings" class="btn btn-sm btn-outline-primary" data-id="' . $row->id . '" data-toggle="modal" data-target="#changeGroupModel">
                    <i class="far fa-eye fa-2x"></i>
                </button>
                <a href="' . route('dashboard.order.orderDetail', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                    <i class="far fa-eye fa-2x"></i>
                </a>
                <a href="' . route('dashboard.order.showService', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                    <i class="far fa-eye fa-2x"></i>
                </a>
                <a data-table_id="html5-extension" data-href="' . route('dashboard.orders.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
                    <i class="far fa-trash-alt fa-2x"></i>
                </a>';
                    return $html;
                })
                ->rawColumns(['booking_id', 'user', 'service', 'quantity', 'payment_method', 'status', 'created_at', 'control'])
                ->make(true);
        }

        // Return view
        $statuses = OrderStatus::all()->pluck('name', 'id');
        return view('dashboard.orders.index', compact('statuses', 'start', 'length'));
    }
    // public function index(Request $request)
    // {
    //     $start = $request->input('start', 0); // Start index
    //     $length = $request->input('length', 100); // Page size

    //     $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

    //     // Build the query
    //     $ordersQuery = Order::query()
    //         ->whereHas('userAddress', function ($query) use ($regionIds) {
    //             $query->whereIn('region_id', $regionIds);
    //         })
    //         ->with(['user', 'transaction', 'status', 'bookings.visit.status', 'services.category']);

    //     $totalRecords = $ordersQuery->count(); // Total unfiltered records

    //     // Apply filters if AJAX
    //     if ($request->ajax()) {
    //         // Apply filters for status or page if provided
    //         if ($request->status) {
    //             $ordersQuery->where('status_id', $request->status);
    //         }

    //         if ($request->page) {
    //             $now = Carbon::now('Asia/Riyadh')->toDateString();
    //             $ordersQuery->where('status_id', '!=', 5)->whereDate('created_at', '=', $now);
    //         }

    //         $ordersQuery->where('is_active', 1); // Additional filtering

    //         $totalFilteredRecords = $ordersQuery->count(); // Count after filtering

    //         // Apply pagination
    //         $paginatedOrders = $ordersQuery->skip($start)->take($length)->get();

    //         return DataTables::of($paginatedOrders)
    //             ->addColumn('booking_id', function ($row) {
    //                 return $row->bookings->first() ? $row->bookings->first()->id : '';
    //             })
    //             ->addColumn('user', function ($row) {
    //                 return $row->user?->first_name . ' ' . $row->user?->last_name;
    //             })
    //             ->addColumn('service', function ($row) {
    //                 $services = $row->services->unique('id');
    //                 $html = '';
    //                 foreach ($services as $service) {
    //                     $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
    //                 }
    //                 return $html;
    //             })
    //             ->addColumn('quantity', function ($row) {
    //                 return $row->services->sum('pivot.quantity');
    //             })
    //             ->addColumn('payment_method', function ($row) {
    //                 return match ($row->transaction?->payment_method) {
    //                     'cache', 'cash' => 'شبكة',
    //                     'wallet' => 'محفظة',
    //                     default => 'فيزا',
    //                 };
    //             })
    //             ->addColumn('status', function ($row) {
    //                 return $row->bookings?->first()?->visit?->status->name_ar;
    //             })
    //             ->addColumn('created_at', function ($row) {
    //                 return Carbon::parse($row->created_at)->timezone('Asia/Riyadh')->format("Y-m-d");
    //             })
    //             ->addColumn('control', function ($row) {
    //                 $html = '';
    //                 if ($row->status_id == 2) {
    //                     $html .= '<a href="' . route('dashboard.order.confirmOrder', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
    //                     <i class="far fa-thumbs-up fa-2x mx-1"></i> تأكيد
    //                 </a>';
    //                 }
    //                 $html .= '<button type="button" id="show-bookings" class="btn btn-sm btn-outline-primary" data-id="' . $row->id . '" data-toggle="modal" data-target="#changeGroupModel">
    //                 <i class="far fa-eye fa-2x"></i>
    //             </button>
    //             <a href="' . route('dashboard.order.orderDetail', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
    //                 <i class="far fa-eye fa-2x"></i>
    //             </a>
    //             <a href="' . route('dashboard.order.showService', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
    //                 <i class="far fa-eye fa-2x"></i>
    //             </a>
    //             <a data-table_id="html5-extension" data-href="' . route('dashboard.orders.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
    //                 <i class="far fa-trash-alt fa-2x"></i>
    //             </a>';
    //                 return $html;
    //             })
    //             ->rawColumns(['booking_id', 'user', 'service', 'quantity', 'payment_method', 'status', 'created_at', 'control'])
    //             ->setTotalRecords($totalRecords)
    //             ->setFilteredRecords($totalFilteredRecords)
    //             ->make(true);
    //     }

    //     $statuses = OrderStatus::all()->pluck('name', 'id');
    //     return view('dashboard.orders.index', compact('statuses', 'length', 'start', 'totalRecords'));
    // }

    public function ordersToday()
    {
        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

        if (request()->ajax()) {
            $orders = Order::query()->whereHas('userAddress', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            })->with(['user', 'transaction', 'status', 'bookings.visit.status', 'services.category']);

            $now = Carbon::now('Asia/Riyadh')->toDateString();
            $orders->whereDate('created_at', '=', $now);

            if (request()->status) {

                $orders->where('status_id', request()->status);
            }

            $orders->where('is_active', 1)->get();

            return DataTables::of($orders)
                ->addColumn('booking_id', function ($row) {
                    $booking = $row->bookings->first();
                    return $booking ? $booking->id : '';
                })
                ->addColumn('user', function ($row) {
                    return $row->user?->first_name . ' ' . $row->user?->last_name;
                })
                ->addColumn('service', function ($row) {
                    $services = $row->services->unique();
                    $html = '';
                    foreach ($services as $service) {
                        $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                    }

                    return $html;
                })
                ->addColumn('quantity', function ($row) {
                    $qu = $row->services->pluck('pivot.quantity')->toArray();
                    return array_sum($qu);
                })
                ->addColumn('payment_method', function ($row) {
                    $payment_method = $row->transaction?->payment_method;
                    if ($payment_method == "cache" || $payment_method == "cash") {
                        return "شبكة";
                    } else if ($payment_method == "wallet") {
                        return "محفظة";
                    } else {
                        return "فيزا";
                    }

                })
                ->addColumn('status', function ($row) {
                    return $row->bookings?->first()?->visit?->status->name_ar;
                })
                ->addColumn('created_at', function ($row) {
                    $date = Carbon::parse($row->created_at)->timezone('Asia/Riyadh');

                    return $date->format("Y-m-d H:i:s");
                })
                ->addColumn('control', function ($row) {

                    $html = '';
                    if ($row->status_id == 2) {
                        $html .= '<a href="' . route('dashboard.order.confirmOrder', 'id=' . $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
                            <i class="far fa-thumbs-up fa-2x mx-1"></i> تأكيد
                        </a>';
                    }
                    $html .= '
                    <button type="button" id="show-bookings" class="btn btn-sm btn-outline-primary" data-id="' . $row->id . '"
                        data-toggle="modal" data-target="#changeGroupModel">
                        <i class="far fa-eye fa-2x"></i>
                    </button>

                    <a href="' . route('dashboard.order.orderDetail', 'id=' . $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
                            <i class="far fa-eye fa-2x"></i>
                        </a>

                        <a href="' . route('dashboard.order.showService', 'id=' . $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
                            <i class="far fa-eye fa-2x"></i>
                        </a>
                                <a data-table_id="html5-extension" data-href="' . route('dashboard.orders.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
                            <i class="far fa-trash-alt fa-2x"></i>
                    </a>
                                ';

                    return $html;
                })
                ->rawColumns([
                    'booking_id',
                    'user',
                    'service',
                    'quantity',
                    'payment_method',
                    'status',
                    'created_at',
                    'control',
                ])
                ->make(true);
        }
        $statuses = OrderStatus::all()->pluck('name', 'id');
        return view('dashboard.orders.clients_orders_today', compact('statuses'));
    }

    public function canceledOrdersToday()
    {
        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

        if (request()->ajax()) {

            $now = Carbon::now('Asia/Riyadh')->toDateString();
            $orders = Order::where('status_id', 5)->where('is_active', 1)->where(function ($qu) use ($now) {
                $qu->whereDate('created_at', $now)->orWhereDate('updated_at', $now);
            })->whereHas('userAddress', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            });
            return DataTables::of($orders)
                ->addColumn('booking_id', function ($row) {
                    $booking = $row->bookings->first();
                    return $booking ? $booking->id : '';
                })
                ->addColumn('user', function ($row) {
                    return $row->user?->first_name . ' ' . $row->user?->last_name;
                })
                ->addColumn('service', function ($row) {
                    $qu = OrderService::where('order_id', $row->id)->get()->pluck('service_id')->toArray();
                    $services_ids = array_unique($qu);
                    $services = Service::whereIn('id', $services_ids)->get();
                    $html = '';
                    foreach ($services as $service) {
                        $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                    }

                    return $html;
                })
                ->addColumn('quantity', function ($row) {
                    $qu = OrderService::where('order_id', $row->id)->get()->pluck('quantity')->toArray();

                    return array_sum($qu);
                })
                ->addColumn('payment_method', function ($row) {
                    $payment_method = $row->transaction?->payment_method;
                    if ($payment_method == "cache" || $payment_method == "cash") {
                        return "شبكة";
                    } else if ($payment_method == "wallet") {
                        return "محفظة";
                    } else {
                        return "فيزا";
                    }

                })
                ->addColumn('status', function ($row) {

                    return $row->status?->name;
                })
                ->addColumn('created_at', function ($row) {
                    $date = Carbon::parse($row->created_at)->timezone('Asia/Riyadh');

                    return $date->format("Y-m-d H:i:s");
                })
                ->addColumn('updated_at', function ($row) {
                    $date = Carbon::parse($row->updated_at)->timezone('Asia/Riyadh');

                    return $date->format("Y-m-d H:i:s");
                })
                ->addColumn('control', function ($row) {

                    $html = '';
                    if ($row->status_id == 2) {
                        $html .= '<a href="' . route('dashboard.order.confirmOrder', 'id=' . $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
                            <i class="far fa-thumbs-up fa-2x mx-1"></i> تأكيد
                        </a>';
                    }
                    $html .= '
                    <a href="' . route('dashboard.order.orderDetail', 'id=' . $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
                            <i class="far fa-eye fa-2x"></i>
                        </a>

                        <a href="' . route('dashboard.order.showService', 'id=' . $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
                            <i class="far fa-eye fa-2x"></i>
                        </a>
                                <a data-table_id="html5-extension" data-href="' . route('dashboard.orders.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
                            <i class="far fa-trash-alt fa-2x"></i>
                    </a>
                                ';

                    return $html;
                })
                ->rawColumns([
                    'booking_id',
                    'user',
                    'service',
                    'quantity',
                    'payment_method',
                    'status',
                    'created_at',
                    'updated_at',
                    'control',
                ])
                ->make(true);
        }
        $statuses = OrderStatus::all()->pluck('name', 'id');
        return view('dashboard.orders.canceled_orders_today', compact('statuses'));
    }

    // public function canceledOrders()
    // {
    //     $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

    //     if (request()->ajax()) {

    //         $orders = Order::where('status_id', 5)->where('is_active', 1)
    //             ->whereHas('userAddress', function ($query) use ($regionIds) {
    //                 $query->whereIn('region_id', $regionIds);
    //             })->get();

    //         return DataTables::of($orders)
    //             ->addColumn('booking_id', function ($row) {
    //                 $booking = $row->bookings->first();
    //                 return $booking ? $booking->id : '';
    //             })
    //             ->addColumn('user', function ($row) {
    //                 return $row->user?->first_name . ' ' . $row->user?->last_name;
    //             })
    //             ->addColumn('service', function ($row) {
    //                 $qu = OrderService::where('order_id', $row->id)->get()->pluck('service_id')->toArray();
    //                 $services_ids = array_unique($qu);
    //                 $services = Service::whereIn('id', $services_ids)->get();
    //                 $html = '';
    //                 foreach ($services as $service) {
    //                     $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
    //                 }

    //                 return $html;
    //             })
    //             ->addColumn('quantity', function ($row) {
    //                 $qu = OrderService::where('order_id', $row->id)->get()->pluck('quantity')->toArray();

    //                 return array_sum($qu);
    //             })
    //             ->addColumn('status', function ($row) {

    //                 return $row->status?->name;
    //             })
    //             ->addColumn('created_at', function ($row) {
    //                 $date = Carbon::parse($row->created_at)->timezone('Asia/Riyadh');

    //                 return $date->format("Y-m-d H:i:s");
    //             })
    //             ->addColumn('updated_at', function ($row) {
    //                 $date = Carbon::parse($row->updated_at)->timezone('Asia/Riyadh');

    //                 return $date->format("Y-m-d H:i:s");
    //             })
    //             ->addColumn('control', function ($row) {

    //                 $html = '';
    //                 if ($row->status_id == 2) {
    //                     $html .= '<a href="' . route('dashboard.order.confirmOrder', 'id=' . $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
    //                         <i class="far fa-thumbs-up fa-2x mx-1"></i> تأكيد
    //                     </a>';
    //                 }
    //                 $html .= '
    //                 <a href="' . route('dashboard.order.orderDetail', 'id=' . $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
    //                         <i class="far fa-eye fa-2x"></i>
    //                     </a>

    //                     <a href="' . route('dashboard.order.showService', 'id=' . $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
    //                         <i class="far fa-eye fa-2x"></i>
    //                     </a>
    //                             <a data-table_id="html5-extension" data-href="' . route('dashboard.orders.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
    //                         <i class="far fa-trash-alt fa-2x"></i>
    //                 </a>
    //                             ';

    //                 return $html;
    //             })
    //             ->rawColumns([
    //                 'booking_id',
    //                 'user',
    //                 'service',
    //                 'quantity',
    //                 'status',
    //                 'created_at',
    //                 'updated_at',
    //                 'control',
    //             ])
    //             ->make(true);
    //     }
    //     $statuses = OrderStatus::all()->pluck('name', 'id');
    //     return view('dashboard.orders.canceled_orders', compact('statuses'));
    // }
    public function canceledOrders(Request $request)
    {
        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

        // Get pagination data sent by DataTables
        $start = $request->input('start', 0); // Start index
        $length = $request->input('length', 10); // Page size

        // Start building the query
        $ordersQuery = Order::query()
            ->where('status_id', 5) // Filter for canceled orders
            ->where('is_active', 1) // Ensure active orders are returned
            ->whereHas('userAddress', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            })
            ->with(['user', 'status', 'bookings.visit.status', 'services.category']);

        // Count total records before applying pagination
        $totalOrders = $ordersQuery->count();

        // Apply additional filtering and pagination
        if ($request->ajax()) {
            if ($request->status) {
                $ordersQuery->where('status_id', $request->status);
            }

            if ($request->page) {
                $now = Carbon::now('Asia/Riyadh')->toDateString();
                $ordersQuery->whereDate('created_at', '=', $now);
            }

            $orders = $ordersQuery->skip($start)
                ->take($length)
                ->get();

            return DataTables::of($orders)
                ->addColumn('booking_id', function ($row) {
                    $booking = $row->bookings->first();
                    return $booking ? $booking->id : '';
                })
                ->addColumn('user', function ($row) {
                    return $row->user?->first_name . ' ' . $row->user?->last_name;
                })
                ->addColumn('service', function ($row) {
                    $qu = OrderService::where('order_id', $row->id)->get()->pluck('service_id')->toArray();
                    $services_ids = array_unique($qu);
                    $services = Service::whereIn('id', $services_ids)->get();
                    $html = '';
                    foreach ($services as $service) {
                        $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                    }
                    return $html;
                })
                ->addColumn('quantity', function ($row) {
                    $qu = OrderService::where('order_id', $row->id)->get()->pluck('quantity')->toArray();
                    return array_sum($qu);
                })
                ->addColumn('status', function ($row) {
                    return $row->status?->name;
                })
                ->addColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->timezone('Asia/Riyadh')->format("Y-m-d H:i:s");
                })
                ->addColumn('updated_at', function ($row) {
                    return Carbon::parse($row->updated_at)->timezone('Asia/Riyadh')->format("Y-m-d H:i:s");
                })
                ->addColumn('control', function ($row) {
                    $html = '';
                    if ($row->status_id == 2) {
                        $html .= '<a href="' . route('dashboard.order.confirmOrder', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                        <i class="far fa-thumbs-up fa-2x mx-1"></i> تأكيد
                    </a>';
                    }
                    $html .= '
                    <a href="' . route('dashboard.order.orderDetail', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                        <i class="far fa-eye fa-2x"></i>
                    </a>
                    <a href="' . route('dashboard.order.showService', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                        <i class="far fa-eye fa-2x"></i>
                    </a>
                    <a data-table_id="html5-extension" data-href="' . route('dashboard.orders.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
                        <i class="far fa-trash-alt fa-2x"></i>
                    </a>
                ';
                    return $html;
                })
                ->rawColumns([
                    'booking_id',
                    'user',
                    'service',
                    'quantity',
                    'status',
                    'created_at',
                    'updated_at',
                    'control',
                ])
                ->with([
                    'recordsTotal' => $totalOrders, // Total records count (without filtering)
                    'recordsFiltered' => $totalOrders, // Filtered count (same here, as no additional filters applied)
                ])
                ->make(true);
        }

        // Non-AJAX request (Initial page load)
        $statuses = OrderStatus::all()->pluck('name', 'id');
        return view('dashboard.orders.canceled_orders', compact('statuses'));
    }

    public function showService()
    {

        if (request()->ajax()) {

            $orders = OrderService::where('order_id', request()->query('id'))->get();
            return DataTables::of($orders)
                ->addColumn('service', function ($row) {
                    return $row->service?->title;
                })
                ->addColumn('quantity', function ($row) {
                    return $row->quantity;
                })
                ->addColumn('price', function ($row) {
                    return $row->price;
                })

                ->rawColumns([
                    'service',
                    'quantity',
                    'price',
                ])
                ->make(true);
        }

        return view('dashboard.orders.showService');
    }
    protected function complaintDetails()
    {
        $customerComplaint = CustomerComplaint::findOrFail(\request()->id);
        $customerComplaintImages = CustomerComplaintImage::where('customer_complaints_id', $customerComplaint->id)->get();
        $user = User::where('id', $customerComplaint->user_id)->first();
        $order = Order::where('id', $customerComplaint->order_id)->first();
        $category_ids = $order->services->pluck('category_id')->toArray();
        $category_ids = array_unique($category_ids);
        $categories = Category::whereIn('id', $category_ids)->get();
        return view('dashboard.orders.show_complaint', compact('categories', 'customerComplaint', 'customerComplaintImages', 'user', 'order'));
    }
    public function complaints()
    {

        if (request()->ajax()) {
            $customerComplaint = CustomerComplaint::all();

            return DataTables::of($customerComplaint)
                ->addColumn('customer_name', function ($row) {
                    return $row->user?->first_name . ' ' . $row->user?->last_name;
                })
                ->addColumn('customer_phone', function ($row) {
                    return $row->user?->phone;
                })
                ->addColumn('complaint_text', function ($row) {
                    return $row->text;
                })
                ->addColumn('complaint_images', function ($row) {
                    return "images";
                })
                ->addColumn('complaint_video', function ($row) {

                    return "video";
                })
                ->addColumn('created_at', function ($row) {
                    $date = Carbon::parse($row->created_at)->timezone('Asia/Riyadh');

                    return $date->format("Y-m-d H:i:s");
                })
                ->addColumn('control', function ($row) {

                    $html = '';
                    $html .= '
                    <a href="' . route('dashboard.order.complaintDetails', 'id=' . $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
                            <i class="far fa-eye fa-2x"></i>
                        </a>


                                ';

                    return $html;
                })
                ->rawColumns([

                    'customer_name',
                    'customer_phone',
                    'complaint_text',
                    'complaint_images',
                    'complaint_video',
                    'created_at',
                    'control',
                ])
                ->make(true);
        }
        return view('dashboard.orders.complaints', );
    }

    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        $services = Service::all();

        $cities = City::where('active', 1)->get()->pluck('title', 'id');

        return view('dashboard.orders.create', compact('users', 'cities', 'categories', 'services'));
    }

    protected function store(Request $request): Factory | \Illuminate\Contracts\View\View  | RedirectResponse | \Illuminate\Contracts\Foundation\Application
    {
        $rules = [
            'user_id' => 'required|exists:users,id',
            'service_id' => 'array|required|exists:services,id',
            'service_id.*' => 'required',
            'price' => 'required',
            'payment_method' => 'required|in:visa,cache',
            'notes' => 'nullable|String',
            'quantity' => 'array|required',
            'quantity.*' => 'required',
            'day' => 'array|required',
            'day.*' => 'required',
            'start_time' => 'array|required',
            'start_time.*' => 'required',
            'total' => 'required',
            'all_quantity' => 'required',
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        $data = [
            'user_id' => $request->user_id,
            'total' => $request->total,
            'sub_total' => $request->total,
            'discount' => 0,
            'status_id' => 2,
            'payment_method' => $request->payment_method,
            'notes' => $request->notes,
            'quantity' => $request->all_quantity,
            'user_address_id' => UserAddresses::where('user_id', $request->user_id)->where('is_default', 1)->first()->id ?? null,
        ];

        $order = Order::query()->create($data);
        foreach ($request->service_id as $key => $service_id) {
            $service = Service::where('id', $request->service_id)->first('category_id');
            $order_service = [
                'order_id' => $order->id,
                'service_id' => $service_id,
                'price' => $request->price[$key],
                'quantity' => $request->quantity[$key],
                'category_id' => $service->category_id,
            ];

            OrderService::create($order_service);
        }
        //        $category_ids = Service::whereIn('id',$request->service_id)->get()->pluck('category_id');
        $category_ids = array_unique($request->category_id);
        foreach ($category_ids as $key => $category_id) {
            $last = Booking::query()->latest()->first()?->id;
            $num = $last ? $last + 1 : 1;
            $booking_no = 'dash2023/' . $num;
            $minutes = 0;
            foreach (Service::with('BookingSetting')->whereIn('id', $request->service_id)->get() as $service) {
                $serviceMinutes = ($service->BookingSetting->service_duration)
                 * OrderService::where('service_id', $service->id)->where('order_id', $order->id)->first()->quantity;
                $minutes += $serviceMinutes;
            }
            $orderService = OrderService::where('service_id', $service->id)->where('order_id', $order->id)->get()->pluck('quantity')->toArray();
            $quantity = array_sum($orderService);
            $booking = [
                'booking_no' => $booking_no,
                'user_id' => $request->user_id,
                //                'service_id' => $request->service_id[$key],
                'order_id' => $order->id,
                'user_address_id' => $order->user_address_id,
                'booking_status_id' => 1,
                'category_id' => $category_id,
                //            'group_id' => current($groups),
                'notes' => $request->notes,
                'quantity' => $quantity,
                'date' => $request->day[$category_id],
                'type' => 'service',
                'time' => Carbon::createFromTimestamp($request->start_time[$category_id])->toTimeString(),
                'end_time' => Carbon::createFromTimestamp($request->start_time[$category_id])->addMinutes($minutes)->toTimeString(),
            ];
            Booking::query()->create($booking);
        }

        session()->flash('success');
        return view('dashboard.orders.index');
    }

    public function edit($id)
    {
        $order = Order::where('id', $id)->first();
        $users = User::all();
        $categories = Category::all();
        $services = Service::all();
        return view('dashboard.core.services.edit', compact('order', 'users', 'services', 'categories'));
    }

    protected function update(Request $request, $id)
    {
        $order = Order::query()->where('id', $id)->first();
        $rules = [
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'service_id' => 'required|exists:services,id',
            'price' => 'required|Numeric',
            'payment_method' => 'required|in:visa,cache',
            'notes' => 'nullable|String',
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return redirect()->back()->with('errors', $validated->errors());
        }
        $validated = $validated->validated();
        $order->update($validated);
        session()->flash('success');
        return view('dashboard.orders.index');
    }

    protected function destroy($id)
    {
        $order = Order::find($id);
        $order->update([
            'is_active' => 0,
        ]);
        //  $order->delete();

        $bookings = Booking::where('order_id', $id)->get();
        foreach ($bookings as $booking) {
            $booking->update([
                'is_active' => 0,
            ]);
            $visits = Visit::where('booking_id', $booking->id)->get();
            foreach ($visits as $visit) {
                $visit->update([
                    'is_active' => 0,
                ]);
            }
        }

        return [
            'success' => true,
            'msg' => __("dash.deleted_success"),
        ];
    }

    protected function customerStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => ['required', 'confirmed', Password::min(4)],
            'city_id' => 'required|exists:cities,id',
        ]);

        $data = $request->except('_token', 'password_confirmation');

        $customer = User::query()->create($data);

        session()->flash('success');
        return [
            'success' => true,
            'data' => $customer,
            'msg' => __("dash.operation_success"),
        ];
    }

    protected function autoCompleteCustomer(Request $request)
    {
        $customers = [];
        if ($request->has('q')) {

            $search = $request->q;
            $customers = User::where('email', 'LIKE', "%$search%")
                ->orWhere('last_name', 'LIKE', "%$search%")
                ->orWhere('first_name', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($customers);
    }

    protected function autoCompleteService(Request $request)
    {
        $services = [];
        if ($request->has('q')) {

            $search = $request->q;
            if (app()->getLocale() == 'ar') {
                $services = Service::where('title_ar', 'LIKE', "%$search%")->get();
            } else {
                $services = Service::where('title_en', 'LIKE', "%$search%")->get();
            }
        }

        return response()->json($services);
    }

    protected function getServiceById(Request $request)
    {
        $service = Service::where('id', $request->service_id)->first();

        return response()->json($service);
    }

    protected function getAvailableTime(Request $request)
    {

        $rules = [
            'date' => 'required|date',
            'service_ids' => 'required|array',
            'service_ids.*' => 'required|exists:services,id',
        ];
        $request->validate($rules, $request->all());
        $itr = $request->itr;

        $day = Carbon::parse($request->date)->timezone('Asia/Riyadh')->locale('en')->dayName;

        $times = [];
        foreach ($request->service_ids as $service_id) {
            $bookSetting = BookingSetting::where('service_id', $service_id)->first();
            if ($bookSetting) {
                $get_time = $this->getTime($day, $bookSetting);
                if ($get_time == true) {
                    $times[] = CarbonInterval::minutes($bookSetting->service_duration + $bookSetting->buffering_time)
                        ->toPeriod(
                            \Carbon\Carbon::now('Asia/Riyadh')->setTimeFrom($bookSetting->service_start_time ?? Carbon::now('Asia/Riyadh')->startOfDay()),
                            Carbon::now('Asia/Riyadh')->setTimeFrom($bookSetting->service_end_time ?? Carbon::now('Asia/Riyadh')->endOfDay())
                        );
                }
            }
        }
        $finalAvailTimes = [];
        $oldMemory = [];
        foreach ($times as $time) {
            $allTimes = [];
            foreach ($time as $t) {
                $allTimes[] = $t;
            }
            if (isset($oldMemory[0])) {
                $finalAvailTimes = array_intersect($allTimes, $oldMemory);
            } else {
                $oldMemory = $allTimes;
                $finalAvailTimes = $allTimes;
            }
        }
        $notAvailable = Booking::whereIn('service_id', $request->service_ids)->where('date', $request->date)->where('booking_status_id', 1)->get();

        $service = Service::whereIn('id', $request->service_ids)->get();

        return view('dashboard.orders.schedules-times-available', compact('finalAvailTimes', 'notAvailable', 'service', 'itr'));
    }
    protected function confirmOrder()
    {
        $order = Order::with('bookings')->findOrFail(\request()->id);
        $order->update([
            'status_id' => 1,
        ]);

        session()->flash('success');
        return redirect()->back();
    }

    protected function orderDetail()
    {
        $order = Order::with('bookings')->findOrFail(\request()->id);
        $userPhone = User::where('id', $order->user_id)->first()->phone;
        $category_ids = $order->services->pluck('category_id')->toArray();
        $category_ids = array_unique($category_ids);
        $categories = Category::whereIn('id', $category_ids)->get();
        return view('dashboard.orders.show', compact('userPhone', 'order', 'categories'));
    }

    public function getBookings($orderId)
    {
        $order = Order::with('bookings.visit')->findOrFail($orderId);
        $bookings = $order->bookings;

        return DataTables::of($bookings)
            ->addColumn('booking_id', function ($booking) {
                return $booking->id;
            })
            ->addColumn('technican_name', function ($booking) {
                return $booking->visit->group->name_ar ?? null;
            })
            ->addColumn('date', function ($booking) {
                return $booking->date;
            })
            ->addColumn('time', function ($booking) {
                return Carbon::parse($booking->time)->format('g:ia');
            })
            ->addColumn('status', function ($booking) {
                return $booking->booking_status->name_ar;
            })
            ->rawColumns(['booking_id', 'technican_name', 'date', 'time', 'status'])
            ->make(true);
    }
}
