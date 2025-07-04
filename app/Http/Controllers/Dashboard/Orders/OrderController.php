<?php
namespace App\Http\Controllers\Dashboard\Orders;

use App\Helpers\ActivityLogger;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\Category;
use App\Models\City;
use App\Models\ComplaintType;
use App\Models\CustomerComplaint;
use App\Models\CustomerComplaintImage;
use App\Models\CustomerComplaintReply;
use App\Models\CustomerComplaintStatus;
use App\Models\Group;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\OrderStatus;
use App\Models\Service;
use App\Models\User;
use App\Models\UserAddresses;
use App\Models\Visit;
use App\Services\Wallet\WalletRefundService;
use App\Traits\schedulesTrait;
use Auth;
use Carbon\CarbonInterval;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    use schedulesTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

            // $ordersQuery = Order::with([
            //     'user', 'bookings', 'transaction', 'status',
            //     'bookings.visit.status', 'services.category',
            // ])
            //     ->whereHas('userAddress', fn($query) => $query->whereIn('region_id', $regionIds))
            //     ->when($request->search_value, function ($query, $searchTerm) {
            //         $query->where(function ($q) use ($searchTerm) {
            //             $q->where('id', 'like', "%{$searchTerm}%")
            //                 ->orWhere('total', 'like', "%{$searchTerm}%")
            //                 ->orWhere('created_at', 'like', "%{$searchTerm}%")
            //                 ->orWhere('user_id', 'like', "%{$searchTerm}%")
            //                 ->orWhereHas('user', fn($q) => $q->where('first_name', 'like', "%{$searchTerm}%"));
            //         });
            //     })
            //     ->when($request->ajax(), function ($query) use ($request) {
            //         if ($request->status) {
            //             $query->where('status_id', $request->status);
            //         }
            //         if ($request->page) {
            //             $query->where('status_id', '!=', 5)
            //                 ->whereDate('created_at', Carbon::now('Asia/Riyadh')->toDateString());
            //         }
            //         $query->where('is_active', 1);
            //     })
            //     ->orderByDesc('created_at');

            // Add 2 Hours For Day

            $startOfDay = Carbon::now('Asia/Riyadh')->startOfDay();
            $endOfDay   = Carbon::now('Asia/Riyadh')->copy()->addDay()->startOfDay()->addHours(2);

            $ordersQuery = Order::with([
                'user', 'bookings', 'transaction', 'status',
                'bookings.visit.status', 'services.category',
            ])
                ->whereHas('userAddress', fn($query) => $query->whereIn('region_id', $regionIds))
                ->when($request->search_value, function ($query, $searchTerm) {
                    $query->where(function ($q) use ($searchTerm) {
                        $q->where('id', 'like', "%{$searchTerm}%")
                            ->orWhere('total', 'like', "%{$searchTerm}%")
                            ->orWhere('created_at', 'like', "%{$searchTerm}%")
                            ->orWhere('user_id', 'like', "%{$searchTerm}%")
                            ->orWhereHas('user', fn($q) => $q->where('first_name', 'like', "%{$searchTerm}%"));
                    });
                })
                ->when($request->ajax(), function ($query) use ($request, $startOfDay, $endOfDay) {
                    if ($request->status) {
                        $query->where('status_id', $request->status);
                    }
                    if ($request->page) {
                        $query->where('status_id', '!=', 5)
                            ->whereBetween('created_at', [$startOfDay, $endOfDay]);
                    }
                    $query->where('is_active', 1);
                })
                ->orderByDesc('created_at');

            $date  = $request->query('date');
            $date2 = $request->query('date2');

            if ($date && $date2) {
                // Use whereBetween for both dates
                $carbonDate  = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
                $carbonDate2 = \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh');
                $ordersQuery->whereBetween('created_at', [
                    $carbonDate->startOfDay(),
                    $carbonDate2->endOfDay(),
                ]);
            } elseif ($date) {
                $carbonDate = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
                $ordersQuery->where('created_at', '>=', $carbonDate->startOfDay());
            } elseif ($date2) {
                $carbonDate2 = \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh');
                $ordersQuery->where('created_at', '<=', $carbonDate2->endOfDay());
            }

            return DataTables::of($ordersQuery)
            // ->addColumn('booking_id', fn($row) => optional($row->bookings->first())->id ?? '')
                ->addColumn('user', fn($row) => $row->user?->first_name . ' ' . $row->user?->last_name)
                ->addColumn('phone', fn($row) => $row->user?->phone
                    ? '<a href="https://api.whatsapp.com/send?phone=' . $row->user->phone . '" target="_blank" class="whatsapp-link" title="فتح في الواتساب">' . $row->user->phone . '</a>'
                    : 'N/A')
                ->addColumn('service', function ($row) {
                    return $row->services->unique('id')->map(fn($service) =>
                        '<button class="btn-sm btn-primary">' . $service->title . '</button>'
                    )->implode(' ');
                })
                ->addColumn('quantity', fn($row) => $row?->orderServices?->sum('quantity'))
                ->addColumn('total', function ($row) {
                    return number_format($row->total, 2);
                })
                ->addColumn('payment_method', fn($row) => match ($row->transaction?->payment_method) {
                    'cache', 'cash' => __('api.payment_method_cach'),
                    'wallet' => __('api.payment_method_wallet'),
                    'mada'   => __('api.payment_method_network'),
                    default  => __('api.payment_method_visa'),
                })
                ->addColumn('region', fn($row) => optional($row->userAddress?->region)->title ?? '')
                ->addColumn('status', fn($row) => app()->getLocale() === 'ar'
                    ? optional($row->bookings?->first()?->visit?->status)->name_ar
                    : optional($row->bookings?->first()?->visit?->status)->name_en)
                ->addColumn('created_at', fn($row) => $row->created_at->timezone('Asia/Riyadh')->format("Y-m-d"))
                ->addColumn('control', function ($row) {
                    $html = '';

                    // Confirm order button
                    if ($row->status_id == 2) {
                        $html .= '<a href="' . route('dashboard.order.confirmOrder', ['id' => $row->id]) . '"
                                        class="btn btn-outline-primary btn-sm mr-2"
                                        title="تأكيد الطلب">
                                        <i class="far fa-thumbs-up fa-2x"></i>
                                    </a>';
                    }

                    // Show bookings modal
                    $html .= '<button type="button"
                                        class="btn btn-outline-primary btn-sm mr-2"
                                        data-id="' . $row->id . '"
                                        data-toggle="modal"
                                        data-target="#changeGroupModel"
                                        title="عرض مواعيد الحجز">
                                        <i class="fas fa-clock fa-2x"></i>
                                </button>';

                    // Order details
                    $html .= '<a href="' . route('dashboard.order.orderDetail', ['id' => $row->id]) . '"
                                    class="btn btn-outline-primary btn-sm mr-2"
                                    title="عرض تفاصيل الطلب">
                                    <i class="far fa-eye fa-2x"></i>
                                </a>';

                    // Service details
                    $html .= '<a href="' . route('dashboard.order.showService', ['id' => $row->id]) . '"
                                    class="btn btn-outline-info btn-sm mr-2"
                                    title="عرض الخدمات">
                                    <i class="fas fa-tools fa-2x"></i>
                                </a>';

                    // Delete (Super Admin only)
                    if (auth()->user()->id == 1 && auth()->user()->first_name == 'Super Admin') {
                        $html .= '<a href="javascript:void(0);"
                                        data-table_id="html5-extension"
                                        data-href="' . route('dashboard.orders.destroy', $row->id) . '"
                                        data-id="' . $row->id . '"
                                        class="btn btn-outline-danger btn-sm mr-2 btn-delete delete_tech"
                                        title="حذف الطلب">
                                        <i class="far fa-trash-alt fa-2x"></i>
                                    </a>';
                    }

                    // Reschedule (Super Admin or permission)
                    if (
                        (auth()->user()->id == 1 && auth()->user()->first_name == 'Super Admin') ||
                        auth()->user()->can('view_Reschedule_orders')
                    ) {
                        $html .= '<a href="javascript:void(0);"
                                        class="btn btn-outline-warning btn-sm mr-2 open-reschedule"
                                        data-id="' . $row->id . '"
                                        data-toggle="modal"
                                        data-target="#rescheduleModal"
                                        title="إعادة جدولة الطلب">
                                        <i class="fas fa-calendar-alt fa-2x"></i>
                                    </a>';
                    }

                    return $html;
                })

                ->rawColumns(['booking_id', 'user', 'phone', 'service', 'quantity', 'total', 'payment_method', 'region', 'status', 'created_at', 'control'])
                ->make(true);
        }

        $statuses = OrderStatus::pluck('name_ar', 'id');
        return view('dashboard.orders.index', compact('statuses'));
    }

    public function ordersToday()
    {

        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

        if (request()->ajax()) {
            // $orders = Order::query()->whereHas('userAddress', function ($query) use ($regionIds) {
            //     $query->whereIn('region_id', $regionIds);
            // })->with(['user', 'transaction', 'status', 'bookings.visit.status', 'services.category']);

            // $now = Carbon::now('Asia/Riyadh')->toDateString();
            // $orders->whereDate('created_at', '=', $now);

            // Orders for the current day and also orders for the first 3 hours of the next day
            $now       = Carbon::now('Asia/Riyadh')->toDateString();
            $tomorrow  = Carbon::tomorrow('Asia/Riyadh')->toDateString();
            $startTime = Carbon::tomorrow('Asia/Riyadh')->startOfDay();
            $endTime   = $startTime->copy()->addHours(2);

            $orders = Order::query()
                ->whereHas('userAddress', function ($query) use ($regionIds) {
                    $query->whereIn('region_id', $regionIds);
                })
                ->with(['user', 'transaction', 'status', 'bookings.visit.status', 'services.category'])
                ->where(function ($query) use ($now, $tomorrow, $startTime, $endTime) {
                    $query->whereDate('created_at', $now)
                        ->orWhere(function ($subQuery) use ($tomorrow, $startTime, $endTime) {
                            $subQuery->whereDate('created_at', $tomorrow)
                                ->whereBetween('created_at', [$startTime, $endTime]);
                        });
                });

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
                ->addColumn('phone', function ($row) {
                    return $row->user?->phone
                    ? '<a href="https://api.whatsapp.com/send?phone=' . $row->user->phone . '" target="_blank" class="whatsapp-link" title="فتح في الواتساب">' . $row->user->phone . '</a>'
                    : 'N/A';
                })
                ->addColumn('service', function ($row) {
                    $services = $row->services->unique();
                    $html     = '';
                    foreach ($services as $service) {
                        $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                    }

                    return $html;
                })
                ->addColumn('quantity', function ($row) {
                    $qu = $row->services->pluck('pivot.quantity')->toArray();
                    return array_sum($qu);
                })
                ->addColumn('total', function ($row) {
                    return number_format($row->total, 2);
                })

                ->addColumn('payment_method', function ($row) {
                    $payment_method = $row->transaction?->payment_method;
                    if ($payment_method == "cache" || $payment_method == "cash") {
                        return __('api.payment_method_network');
                    } else if ($payment_method == "wallet") {
                        return __('api.payment_method_wallet');
                    } else {
                        return __('api.payment_method_visa');
                    }

                })
                ->addColumn('region', function ($row) {
                    return optional($row->userAddress?->region)->title ?? '';
                })

                ->addColumn('status', function ($row) {
                    return $row->bookings?->first()?->visit?->status->name_ar;
                })
                ->addColumn('created_at', function ($row) {
                    $date = Carbon::parse($row->created_at)->timezone('Asia/Riyadh');

                    return $date->format("Y-m-d");
                })

                ->addColumn('control', function ($row) {
                    $html = '';

                    // Confirm order button
                    if ($row->status_id == 2) {
                        $html .= '<a href="' . route('dashboard.order.confirmOrder', ['id' => $row->id]) . '"
                                    class="btn btn-outline-primary btn-sm mr-2"
                                    title="تأكيد الطلب">
                                    <i class="far fa-thumbs-up fa-2x"></i>
                                  </a>';
                    }

                    // Show bookings modal
                    $html .= '<button type="button"
                                    class="btn btn-outline-primary btn-sm mr-2"
                                    data-id="' . $row->id . '"
                                    data-toggle="modal"
                                    data-target="#changeGroupModel"
                                    title="عرض مواعيد الحجز">
                                    <i class="fas fa-clock fa-2x"></i>
                              </button>';

                    // Order details
                    $html .= '<a href="' . route('dashboard.order.orderDetail', ['id' => $row->id]) . '"
                                class="btn btn-outline-primary btn-sm mr-2"
                                title="عرض تفاصيل الطلب">
                                <i class="far fa-eye fa-2x"></i>
                              </a>';

                    // Service details
                    $html .= '<a href="' . route('dashboard.order.showService', ['id' => $row->id]) . '"
                                class="btn btn-outline-info btn-sm mr-2"
                                title="عرض الخدمات">
                                <i class="fas fa-tools fa-2x"></i>
                              </a>';

                    // Delete (Super Admin only)
                    if (auth()->user()->id == 1 && auth()->user()->first_name == 'Super Admin') {
                        $html .= '<a href="javascript:void(0);"
                                    data-table_id="html5-extension"
                                    data-href="' . route('dashboard.orders.destroy', $row->id) . '"
                                    data-id="' . $row->id . '"
                                    class="btn btn-outline-danger btn-sm mr-2 btn-delete delete_tech"
                                    title="حذف الطلب">
                                    <i class="far fa-trash-alt fa-2x"></i>
                                  </a>';
                    }

                    // Reschedule (Super Admin or permission)
                    if (
                        (auth()->user()->id == 1 && auth()->user()->first_name == 'Super Admin') ||
                        auth()->user()->can('delete_orders')
                    ) {
                        $html .= '<a href="javascript:void(0);"
                                    class="btn btn-outline-warning btn-sm mr-2 open-reschedule"
                                    data-id="' . $row->id . '"
                                    data-toggle="modal"
                                    data-target="#rescheduleModal"
                                    title="إعادة جدولة الطلب">
                                    <i class="fas fa-calendar-alt fa-2x"></i>
                                  </a>';
                    }

                    return $html;
                })

                ->rawColumns([
                    'booking_id',
                    'user',
                    'phone',
                    'service',
                    'quantity',
                    'payment_method',
                    'region',
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

            // $now    = Carbon::now('Asia/Riyadh')->toDateString();
            // $orders = Order::where('status_id', 5)->where('is_active', 1)->where(function ($qu) use ($now) {
            //     $qu->whereDate('created_at', $now)->orWhereDate('updated_at', $now);
            // })->whereHas('userAddress', function ($query) use ($regionIds) {
            //     $query->whereIn('region_id', $regionIds);
            // });

                                                                          //  orders for the current day, as well as orders created or updated within the first 3 hours of the next day,
            $now       = Carbon::now('Asia/Riyadh')->toDateString();      // تاريخ اليوم
            $tomorrow  = Carbon::tomorrow('Asia/Riyadh')->toDateString(); // تاريخ اليوم التالي
            $startTime = '00:00:00';                                      // بداية اليوم التالي
            $endTime   = '03:00:00';                                      // أول 3 ساعات من اليوم التالي

            $orders = Order::where('status_id', 5)
                ->where('is_active', 1)
                ->where(function ($qu) use ($now, $tomorrow, $startTime, $endTime) {
                    // الطلبات الخاصة باليوم الحالي
                    $qu->whereDate('created_at', $now)
                        ->orWhereDate('updated_at', $now)

                    // الطلبات الخاصة بأول 3 ساعات من اليوم التالي فقط
                        ->orWhere(function ($q) use ($tomorrow, $startTime, $endTime) {
                            $q->whereDate('created_at', $tomorrow)
                                ->whereTime('created_at', '>=', $startTime)
                                ->whereTime('created_at', '<', $endTime);
                        })
                        ->orWhere(function ($q) use ($tomorrow, $startTime, $endTime) {
                            $q->whereDate('updated_at', $tomorrow)
                                ->whereTime('updated_at', '>=', $startTime)
                                ->whereTime('updated_at', '<', $endTime);
                        });
                })
                ->whereHas('userAddress', function ($query) use ($regionIds) {
                    $query->whereIn('region_id', $regionIds);
                })
                ->orderByDesc('updated_at') // الأحدث بناءً على التحديث
                ->orderByDesc('created_at') // الأحدث بناءً على الإنشاء (احتياطيًا)
                ->get();

            return DataTables::of($orders)
            // ->addColumn('booking_id', function ($row) {
            //     $booking = $row->bookings->first();
            //     return $booking ? $booking->id : '';
            // })
                ->addColumn('user', function ($row) {
                    return $row->user?->first_name . ' ' . $row->user?->last_name;
                })
                ->addColumn('phone', function ($row) {
                    return $row->user?->phone
                    ? '<a href="https://api.whatsapp.com/send?phone=' . $row->user->phone . '" target="_blank" class="whatsapp-link" title="فتح في الواتساب">' . $row->user->phone . '</a>'
                    : 'N/A';
                })
                ->addColumn('service', function ($row) {
                    $qu           = OrderService::where('order_id', $row->id)->get()->pluck('service_id')->toArray();
                    $services_ids = array_unique($qu);
                    $services     = Service::whereIn('id', $services_ids)->get();
                    $html         = '';
                    foreach ($services as $service) {
                        $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                    }

                    return $html;
                })
                ->addColumn('quantity', function ($row) {
                    $qu = OrderService::where('order_id', $row->id)->get()->pluck('quantity')->toArray();

                    return array_sum($qu);
                })

                ->addColumn('cancelled_by', function ($row) {
                    // Get the first booking
                    $firstBooking = $row->bookings->first();

                    // Check if the first booking has a visit and a cancellation reason
                    $cancelReason = $firstBooking?->visit?->cancelReason;

                    return $cancelReason?->is_for_tech === 1 ? "الفني" : "العميل";
                })
                ->addColumn('payment_method', function ($row) {
                    $payment_method = $row->transaction?->payment_method;
                    if ($payment_method == "cache" || $payment_method == "cash") {
                        return __('api.payment_method_network');
                    } else if ($payment_method == "wallet") {
                        return __('api.payment_method_wallet');
                    } else {
                        return __('api.payment_method_visa');
                    }
                })

                ->addColumn('region', function ($row) {
                    return optional($row->userAddress?->region)->title ?? '';
                })
                ->addColumn('status', function ($row) {

                    return $row->status?->name;
                })
                ->addColumn('created_at', function ($row) {
                    $date = Carbon::parse($row->created_at)->timezone('Asia/Riyadh');

                    return $date->format("Y-m-d");
                })
                ->addColumn('updated_at', function ($row) {
                    $date = Carbon::parse($row->updated_at)->timezone('Asia/Riyadh');

                    return $date->format("Y-m-d");
                })
                ->addColumn('control', function ($row) {
                    $html = '';

                    // Confirm button
                    if ($row->status_id == 2) {
                        $html .= '<a href="' . route('dashboard.order.confirmOrder', ['id' => $row->id]) . '"
                                    class="mr-2 btn btn-outline-success btn-sm"
                                    title="تأكيد الطلب">
                                    <i class="fas fa-check-circle fa-2x mx-1"></i>
                                 </a>';
                    }

                    // View order details
                    $html .= '<a href="' . route('dashboard.order.orderDetail', ['id' => $row->id]) . '"
                                  class="mr-2 btn btn-outline-info btn-sm"
                                  title="عرض تفاصيل الطلب">
                                  <i class="far fa-eye fa-2x"></i>
                              </a>';

                    // Show services
                    $html .= '<a href="' . route('dashboard.order.showService', ['id' => $row->id]) . '"
                                  class="mr-2 btn btn-outline-primary btn-sm"
                                  title="عرض الخدمات">
                                  <i class="fas fa-tools fa-2x"></i>
                              </a>';

                    // Delete button with permission check

                    if ((Auth()->user()->id == 1 && Auth()->user()->first_name == 'Super Admin') || Auth::user()->can('delete_orders')) {
                        $html .= '<a data-table_id="html5-extension"
                                      data-href="' . route('dashboard.orders.destroy', $row->id) . '"
                                      data-id="' . $row->id . '"
                                      class="mr-2 btn btn-outline-danger btn-sm btn-delete delete_tech"
                                      title="حذف الطلب">
                                      <i class="far fa-trash-alt fa-2x"></i>
                                  </a>';
                    }

                    if ((Auth()->user()->id == 1 && Auth()->user()->first_name == 'Super Admin') || Auth::user()->can('orders_change_status')) {

                        $html .= '<button type="button"
                            class="btn btn-sm btn-outline-warning change-status-btn"
                            data-id="' . $row->id . '"
                            data-current-status="' . $row->status_id . '"
                            title="' . __('dash.change_status') . '">
                            <i class="fas fa-exchange-alt fa-2x"></i>
                        </button>';
                    }

                    // if (Auth()->user()->id == 1 && Auth()->user()->first_name == 'Super Admin' || Auth::user()->can('delete_orders')) {
                    //     $html .= '<a href="javascript:void(0);"
                    //                class="mr-2 btn btn-outline-danger btn-sm open-reschedule"
                    //                data-id="' . $row->id . '"
                    //                data-toggle="modal"
                    //                data-target="#rescheduleModal"
                    //                title="إعادة جدولة الطلب">
                    //                 <i class="fas fa-calendar-alt fa-2x"></i>
                    //               </a>';
                    // }

                    return $html;
                })
                ->rawColumns([

                    'user',
                    'phone',
                    'service',
                    'quantity',
                    'cancelled_by',
                    'payment_method',
                    'region',
                    'status',
                    'created_at',
                    'updated_at',
                    'control',
                ])
                ->make(true);
        }
        $statuses = OrderStatus::all()->pluck('name', 'id');

        $changeableStatusIds = [3, 4];

        $orderStatusOptions = $statuses->only($changeableStatusIds);

        return view('dashboard.orders.canceled_orders_today', compact('statuses', 'orderStatusOptions'));
    }

    // Late Orders
    public function lateOrders(Request $request)
    {
        $regionIds = auth()->user()->regions->pluck('region_id')->toArray();
        $now       = Carbon::now('Asia/Riyadh');
        $today     = $now->toDateString();

        // Late orders for TODAY only
        $orders = Order::lateToServe($now, onlyToday: true)
            ->with([
                'user',
                'bookings.visits',
                'status',
                'userAddress.region',
                'orderServices',
                'transaction',
            ])
            ->whereHas('bookings', fn($q) => $q->whereDate('date', $today))
            ->get();

        $totalOrders    = $orders->count();
        $filteredOrders = $orders;

        if ($request->ajax()) {
            if ($request->status) {
                $filteredOrders = $filteredOrders->filter(fn($order) => $order->status_id == $request->status);
            }

            return DataTables::of($filteredOrders)
                ->addColumn('user', fn($row) => optional($row->user)->first_name . ' ' . optional($row->user)->last_name)
                ->addColumn('phone', fn($row) => $row->user?->phone
                    ? '<a href="https://api.whatsapp.com/send?phone=' . $row->user->phone . '" target="_blank" class="whatsapp-link">' . $row->user->phone . '</a>'
                    : 'N/A')
            // ->addColumn('service', function ($row) {
            //     $serviceIds = $row->orderServices->pluck('service_id')->unique();
            //     $services   = \App\Models\Service::whereIn('id', $serviceIds)->get();
            //     return $services->map(fn($s) => '<button class="btn-sm btn-primary">' . $s->title . '</button>')->implode('');
            // })
            // ->addColumn('quantity', fn($row) => $row->orderServices->sum('quantity'))
                ->addColumn('total', fn($row) => $row->total ? (fmod($row->total, 1) == 0 ? (int) $row->total : number_format($row->total, 2)) : '')

            // technician
                ->addColumn('technician', function ($row) {
                    $booking = $row->bookings->first();

                    return optional($booking?->visit?->group)->name ?? '-';
                })

                ->addColumn('status', fn($row) => app()->getLocale() === 'ar'
                    ? optional($row->bookings?->first()?->visit?->status)->name_ar
                    : optional($row->bookings?->first()?->visit?->status)->name_en)
                ->addColumn('date', function ($row) {

                    return $row->created_at
                    ? Carbon::parse($row->created_at)->locale('ar')->timezone('Asia/Riyadh')->format('Y-m-d')
                    : '-';
                })
                ->addColumn('booking_day', function ($row) {
                    $booking = $row->bookings->first();
                    return $booking && $booking->date
                    ? Carbon::parse($booking->date)->locale('ar')->timezone('Asia/Riyadh')->format('Y-m-d')
                    : '-';
                })
                ->addColumn('booking_time', function ($row) {
                    $booking = $row->bookings->first();

                    return $booking && $booking->visit && $booking->visit->start_time
                    ? Carbon::parse($booking->visit->start_time)->format('h:i A') // 12-hour format with AM/PM
                    : '-';
                })

                ->addColumn('payment_method', function ($row) {
                    return match ($row->transaction?->payment_method) {
                        'cache', 'cash' => __('api.payment_method_network'),
                        'wallet' => __('api.payment_method_wallet'),
                        default  => __('api.payment_method_visa'),
                    };
                })
                ->addColumn('region', fn($row) => optional($row->userAddress?->region)->title)
                ->addColumn('control', function ($row) {
                    $html = '';
                    if ($row->status_id == 2) {
                        $html .= '<a href="' . route('dashboard.order.confirmOrder', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm" title="تأكيد الطلب">
                                <i class="far fa-thumbs-up fa-2x mx-1"></i></a>';
                    }
                    $html .= '<a href="' . route('dashboard.order.orderDetail', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm" title="عرض تفاصيل الطلب">
                            <i class="far fa-eye fa-2x"></i></a>';
                    $html .= '<a href="' . route('dashboard.order.showService', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm" title="عرض الخدمات">
                            <i class="fas fa-tools fa-2x"></i></a>';
                    if (auth()->user()->hasRole('admin') || auth()->user()->can('delete_orders')) {
                        $html .= '<a data-table_id="html5-extension" data-href="' . route('dashboard.orders.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete delete_tech" title="حذف الطلب">
                                <i class="far fa-trash-alt fa-2x"></i></a>';
                    }
                    if (auth()->user()->hasRole('admin') || auth()->user()->can('orders_change_status')) {
                        $html .= '<button type="button" class="btn btn-sm btn-outline-warning change-status-btn"
                                data-id="' . $row->id . '" data-current-status="' . $row->status_id . '"
                                title="' . __('dash.change_status') . '">
                                <i class="fas fa-exchange-alt fa-2x"></i></button>';
                    }
                    return $html;
                })
                ->rawColumns(['user', 'phone', 'total', 'technician', 'status', 'date', 'booking_day', 'booking_time', 'payment_method', 'region', 'control'])
                ->with([
                    'recordsTotal'    => $totalOrders,
                    'recordsFiltered' => $filteredOrders->count(),
                ])
                ->make(true);
        }

        $statuses            = OrderStatus::pluck('name_' . app()->getLocale(), 'id');
        $changeableStatusIds = [3, 4, 5];
        $orderStatusOptions  = $statuses->only($changeableStatusIds);

        return view('dashboard.orders.late_orders', compact('statuses', 'orderStatusOptions'));
    }

    public function canceledOrders(Request $request)
    {
        $regionIds = auth()->user()->regions->pluck('region_id')->toArray();

        // Base query for canceled orders
        $ordersQuery = Order::query()
            ->where('status_id', 5)
            ->where('is_active', 1)
            ->whereHas('userAddress', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            })
            ->with(['user', 'status', 'bookings.visit.status', 'bookings.visit', 'services.category', 'userAddress'])
            ->orderByDesc('updated_at');

        // Handle AJAX DataTable
        if ($request->ajax()) {
            if ($request->filled('status')) {
                $ordersQuery->where('status_id', $request->status);
            }

            if ($request->filled('page')) {
                $now = now('Asia/Riyadh')->toDateString();
                $ordersQuery->whereDate('created_at', $now);
            }

            return DataTables($ordersQuery)
                ->addColumn('user', fn($row) => $row->user?->first_name . ' ' . $row->user?->last_name)
                ->addColumn('phone', function ($row) {
                    return $row->user?->phone
                    ? '<a href="https://api.whatsapp.com/send?phone=' . $row->user->phone . '" target="_blank" class="whatsapp-link" title="فتح في الواتساب">' . $row->user->phone . '</a>'
                    : 'N/A';
                })

                // 🔍 Enable search on user name
                ->filterColumn('user', function ($query, $keyword) {
                    $query->whereHas('user', function ($q) use ($keyword) {
                        $q->where('first_name', 'like', "%{$keyword}%")
                            ->orWhere('last_name', 'like', "%{$keyword}%");
                    });
                })

                // 🔍 Enable search on user phone
                ->filterColumn('phone', function ($query, $keyword) {
                    $query->whereHas('user', function ($q) use ($keyword) {
                        $q->where('phone', 'like', "%{$keyword}%");
                    });
                })

                ->addColumn('service', function ($row) {
                    $services = Service::whereIn('id', OrderService::where('order_id', $row->id)->pluck('service_id')->unique())->get();
                    return $services->map(fn($service) => '<button class="btn-sm btn-primary">' . e($service->title) . '</button>')->implode(' ');
                })
                ->addColumn('quantity', function ($row) {
                    return OrderService::where('order_id', $row->id)->sum('quantity');
                })
                ->addColumn('cancelled_by', function ($row) {
                    $cancelReason = optional($row->bookings->first()?->visit)->cancelReason;
                    return $cancelReason?->is_for_tech ? 'الفني' : 'العميل';
                })
                ->addColumn('total', function ($row) {
                    return $row->total ? (fmod($row->total, 1) === 0.0 ? (int) $row->total : number_format($row->total, 2)) : '';
                })
                ->addColumn('status', fn($row) => $row->status?->name)
                ->addColumn('region', fn($row) => optional($row->userAddress?->region)->title ?? '')
                ->addColumn('created_at', fn($row) => Carbon::parse($row->created_at)->locale('ar')->timezone('Asia/Riyadh')->format("Y-m-d"))
                ->addColumn('updated_at', fn($row) => Carbon::parse($row->updated_at)->locale('ar')->timezone('Asia/Riyadh')->format("Y-m-d"))
                ->addColumn('control', function ($row) {
                    $html = '';

                    if ($row->status_id == 2) {
                        $html .= '<a href="' . route('dashboard.order.confirmOrder', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-success btn-sm" title="تأكيد الطلب"><i class="fas fa-check-circle fa-2x mx-1"></i></a>';
                    }

                    $html .= '<a href="' . route('dashboard.order.orderDetail', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-info btn-sm" title="عرض تفاصيل الطلب"><i class="far fa-eye fa-2x"></i></a>';
                    $html .= '<a href="' . route('dashboard.order.showService', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm" title="عرض الخدمات"><i class="fas fa-tools fa-2x"></i></a>';

                    if ((auth()->id() == 1 && auth()->user()->first_name === 'Super Admin') || auth()->user()->can('delete_orders')) {
                        $html .= '<a data-table_id="html5-extension" data-href="' . route('dashboard.orders.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete delete_tech" title="حذف الطلب"><i class="far fa-trash-alt fa-2x"></i></a>';
                    }

                    if ((auth()->id() == 1 && auth()->user()->first_name === 'Super Admin') || auth()->user()->can('orders_change_status')) {
                        $html .= '<button type="button" class="btn btn-sm btn-outline-warning change-status-btn" data-id="' . $row->id . '" data-current-status="' . $row->status_id . '" title="' . __('dash.change_status') . '"><i class="fas fa-exchange-alt fa-2x"></i></button>';
                    }

                    return $html;
                })
                ->rawColumns([
                    'user', 'phone', 'service', 'quantity', 'cancelled_by',
                    'total', 'status', 'region', 'created_at', 'updated_at', 'control',
                ])
                ->make(true);
        }

        // Initial page load (non-AJAX)
        $statuses            = OrderStatus::pluck('name_ar', 'id');
        $changeableStatusIds = [3, 4];
        $orderStatusOptions  = $statuses->only($changeableStatusIds);

        return view('dashboard.orders.canceled_orders', compact('statuses', 'orderStatusOptions'));
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
        $customerComplaint       = CustomerComplaint::with('complaintReply')->findOrFail(request()->id);
        $customerComplaintImages = CustomerComplaintImage::where('customer_complaints_id', $customerComplaint->id)->get();
        $user                    = User::where('id', $customerComplaint->user_id)->first();
        $order                   = Order::where('id', $customerComplaint->order_id)->first();
        $category_ids            = $order->services->pluck('category_id')->toArray();
        $category_ids            = array_unique($category_ids);
        $categories              = Category::whereIn('id', $category_ids)->get();

        $locale   = Config::get('app.locale'); // Get the current locale
        $statuses = CustomerComplaintStatus::query()
            ->select('id', "name_{$locale} as name")
            ->get()
            ->pluck('name', 'id');

        // dd($customerComplaint->complaintReply);

        return view('dashboard.orders.show_complaint', compact('categories', 'statuses', 'customerComplaint', 'customerComplaintImages', 'user', 'order'));
    }
    public function complaints(Request $request)
    {
        $withRelations = [
            'user',
            'complaintType',
            'status',
            'order.bookings.visits.group',
            'order.bookings.address.region',
        ];

        if ($request->ajax()) {
            $customerComplaints = CustomerComplaint::with($withRelations)
                ->when($request->complaintType, fn($query) =>
                    $query->where('complaint_type_id', $request->complaintType)
                )
                ->when($request->status, fn($query) =>
                    $query->where('customer_complaints_status_id', $request->status)
                )
                ->when($request->from_date && $request->to_date, function ($query) use ($request) {
                    $from = Carbon::parse($request->from_date)->startOfDay();
                    $to   = Carbon::parse($request->to_date)->endOfDay();
                    $query->whereBetween('created_at', [$from, $to]);
                })
                ->when($request->from_date && ! $request->to_date, function ($query) use ($request) {
                    $from = Carbon::parse($request->from_date)->startOfDay();
                    $query->where('created_at', '>=', $from);
                })
                ->when(! $request->from_date && $request->to_date, function ($query) use ($request) {
                    $to = Carbon::parse($request->to_date)->endOfDay();
                    $query->where('created_at', '<=', $to);
                })

                ->orderBy('created_at', 'desc')
                ->get();

            return DataTables::of($customerComplaints)
                ->addColumn('order_id', fn($row) => $row->order_id ?? 'N/A')

                ->addColumn('booking_no', fn($row) =>
                    optional($row->order?->bookings?->first())->id ?? 'N/A'
                )

                ->addColumn('zone_name', fn($row) =>
                    optional($row->order?->bookings?->first()?->address?->region)->title ?? 'N/A'
                )

                ->addColumn('customer_name', fn($row) =>
                    $row->user ? $row->user->first_name . ' ' . $row->user->last_name : 'N/A'
                )

                ->addColumn('tech_name', fn($row) =>
                    optional($row->order?->bookings?->first()?->visits?->first()?->group)->name ?? 'N/A'
                )

                ->addColumn('customer_phone', function ($row) {
                    $phone = $row->user?->phone ?? 'N/A';
                    return $phone !== 'N/A'
                    ? '<a href="https://wa.me/' . $phone . '" target="_blank" class="whatsapp-link" title="فتح الواتساب">
                            <span class="phone-number">' . $phone . '</span>
                            <i class="fab fa-whatsapp whatsapp-icon"></i>
                        </a>'
                    : $phone;
                })

                ->addColumn('status', fn($row) => $row->status?->name_ar ?? 'N/A')

                ->addColumn('complaintType', fn($row) => $row->complaintType?->name_ar ?? 'N/A')

                ->addColumn('complaint_text', fn($row) => $row->text ?? 'No text provided')

                ->addColumn('complaint_images', fn($row) =>
                    $row->images ? implode(', ', $row->images) : 'No images'
                )

                ->addColumn('complaint_video', fn($row) => $row->video ?? 'No video')

                ->addColumn('created_at', fn($row) =>
                    $row->created_at->timezone('Asia/Riyadh')->format("Y-m-d")
                )

                ->addColumn('control', fn($row) =>
                    '<a href="' . route('dashboard.order.complaintDetails', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                    <i class="far fa-eye fa-2x"></i>
                </a>'
                )

                ->rawColumns([
                    'customer_name',
                    'customer_phone',
                    'status',
                    'complaintType',
                    'complaint_text',
                    'complaint_images',
                    'complaint_video',
                    'created_at',
                    'control',
                ])
                ->make(true);
        }

        $locale        = app()->getLocale();
        $orderByColumn = $locale === 'ar' ? 'name_ar' : 'name_en';

        $complaintTypes = ComplaintType::orderBy($orderByColumn)->get();
        $statuses       = CustomerComplaintStatus::orderBy($orderByColumn)->get();

        return view('dashboard.orders.complaints', compact('complaintTypes', 'statuses'));
    }

    public function complaintsToday(Request $request)
    {
        $withRelations = [
            'user',
            'complaintType',
            'status',
            'order.bookings.visits.group',
            'order.bookings.address.region',
        ];

        if ($request->ajax()) {
            $startOfToday = now()->startOfDay();
            $endOfToday   = now()->endOfDay();

            $customerComplaints = CustomerComplaint::with($withRelations)
                ->whereBetween('created_at', [$startOfToday, $endOfToday])
                ->when($request->complaintType, fn($query) =>
                    $query->where('complaint_type_id', $request->complaintType)
                )
                ->when($request->status, fn($query) =>
                    $query->where('customer_complaints_status_id', $request->status)
                )
                ->orderBy('created_at', 'desc')
                ->get();

            return DataTables::of($customerComplaints)
                ->addColumn('order_id', fn($row) => $row->order_id ?? 'N/A')
                ->addColumn('booking_no', fn($row) =>
                    optional($row->order?->bookings?->first())->id ?? 'N/A'
                )
                ->addColumn('zone_name', fn($row) =>
                    optional($row->order?->bookings?->first()?->address?->region)->title ?? 'N/A'
                )
                ->addColumn('customer_name', fn($row) =>
                    $row->user ? $row->user->first_name . ' ' . $row->user->last_name : 'N/A'
                )
                ->addColumn('tech_name', fn($row) =>
                    optional($row->order?->bookings?->first()?->visits?->first()?->group)->name ?? 'N/A'
                )
                ->addColumn('customer_phone', function ($row) {
                    $phone = $row->user?->phone ?? 'N/A';
                    return $phone !== 'N/A'
                    ? '<a href="https://wa.me/' . $phone . '" target="_blank" class="whatsapp-link" title="فتح الواتساب">
                            <span class="phone-number">' . $phone . '</span>
                            <i class="fab fa-whatsapp whatsapp-icon"></i>
                        </a>'
                    : $phone;
                })
                ->addColumn('status', fn($row) => $row->status?->name_ar ?? 'N/A')
                ->addColumn('complaintType', fn($row) => $row->complaintType?->name_ar ?? 'N/A')
                ->addColumn('complaint_text', fn($row) => $row->text ?? 'No text provided')
                ->addColumn('complaint_images', fn($row) =>
                    $row->images ? implode(', ', $row->images) : 'No images'
                )
                ->addColumn('complaint_video', fn($row) => $row->video ?? 'No video')
                ->addColumn('created_at', fn($row) =>
                    $row->created_at->timezone('Asia/Riyadh')->format("Y-m-d")
                )
                ->addColumn('control', fn($row) =>
                    '<a href="' . route('dashboard.order.complaintDetails', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                    <i class="far fa-eye fa-2x"></i>
                </a>'
                )
                ->rawColumns([
                    'customer_name',
                    'customer_phone',
                    'status',
                    'complaintType',
                    'complaint_text',
                    'complaint_images',
                    'complaint_video',
                    'created_at',
                    'control',
                ])
                ->make(true);
        }

        $locale        = app()->getLocale();
        $orderByColumn = $locale === 'ar' ? 'name_ar' : 'name_en';

        $complaintTypes = ComplaintType::orderBy($orderByColumn)->get();
        $statuses       = CustomerComplaintStatus::orderBy($orderByColumn)->get();

        return view('dashboard.orders.complaints_today', compact('complaintTypes', 'statuses'));
    }

    // complaintsResolved
    public function complaintsResolved(Request $request)
    {

        $withRelations = [
            'user',
            'complaintType',
            'status',
            'order.bookings.visits.group',
            'order.bookings.address.region',
        ];

        if ($request->ajax()) {
            $customerComplaints = CustomerComplaint::with($withRelations)
                ->where('customer_complaints_status_id', 3)
                ->when($request->complaintType, fn($query) =>
                    $query->where('complaint_type_id', $request->complaintType)
                )
                ->when($request->from_date && $request->to_date, function ($query) use ($request) {
                    $from = Carbon::parse($request->from_date)->startOfDay();
                    $to   = Carbon::parse($request->to_date)->endOfDay();
                    $query->whereBetween('created_at', [$from, $to]);
                })
                ->when($request->from_date && ! $request->to_date, function ($query) use ($request) {
                    $from = Carbon::parse($request->from_date)->startOfDay();
                    $query->where('created_at', '>=', $from);
                })
                ->when(! $request->from_date && $request->to_date, function ($query) use ($request) {
                    $to = Carbon::parse($request->to_date)->endOfDay();
                    $query->where('created_at', '<=', $to);
                })
                ->orderBy('created_at', 'desc')
                ->get();

            return DataTables::of($customerComplaints)
                ->addColumn('order_id', fn($row) => $row->order_id ?? 'N/A')
                ->addColumn('booking_no', fn($row) =>
                    optional($row->order?->bookings?->first())->id ?? 'N/A'
                )
                ->addColumn('zone_name', fn($row) =>
                    optional($row->order?->bookings?->first()?->address?->region)->title ?? 'N/A'
                )
                ->addColumn('customer_name', fn($row) =>
                    $row->user ? $row->user->first_name . ' ' . $row->user->last_name : 'N/A'
                )
                ->addColumn('tech_name', fn($row) =>
                    optional($row->order?->bookings?->first()?->visits?->first()?->group)->name ?? 'N/A'
                )
                ->addColumn('customer_phone', function ($row) {
                    $phone = $row->user?->phone ?? 'N/A';
                    return $phone !== 'N/A'
                    ? '<a href="https://wa.me/' . $phone . '" target="_blank" class="whatsapp-link" title="فتح الواتساب">
                                <span class="phone-number">' . $phone . '</span>
                                <i class="fab fa-whatsapp whatsapp-icon"></i>
                            </a>'
                    : $phone;
                })
                ->addColumn('status', fn($row) => $row->status?->name_ar ?? 'N/A')
                ->addColumn('complaintType', fn($row) => $row->complaintType?->name_ar ?? 'N/A')
                ->addColumn('complaint_text', fn($row) => $row->text ?? 'No text provided')
                ->addColumn('complaint_images', fn($row) => $row->images ? implode(', ', $row->images) : 'No images')
                ->addColumn('complaint_video', fn($row) => $row->video ?? 'No video')
                ->addColumn('created_at', fn($row) =>
                    $row->created_at->timezone('Asia/Riyadh')->format("Y-m-d")
                )
                ->addColumn('control', fn($row) =>
                    '<a href="' . route('dashboard.order.complaintDetails', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                        <i class="far fa-eye fa-2x"></i>
                    </a>'
                )
                ->rawColumns([
                    'customer_name',
                    'customer_phone',
                    'status',
                    'complaintType',
                    'complaint_text',
                    'complaint_images',
                    'complaint_video',
                    'created_at',
                    'control',
                ])
                ->make(true);
        }

        $locale        = app()->getLocale();
        $orderByColumn = $locale === 'ar' ? 'name_ar' : 'name_en';

        $complaintTypes = ComplaintType::orderBy($orderByColumn)->get();
        $statuses       = CustomerComplaintStatus::orderBy($orderByColumn)->get();

        return view('dashboard.orders.complaints_resolved', compact('complaintTypes', 'statuses'));
    }

    public function complaintsUnresolved(Request $request)
    {
        $withRelations = [
            'user',
            'complaintType',
            'status',
            'order.bookings.visits.group',
            'order.bookings.address.region',
        ];

        if ($request->ajax()) {
            $customerComplaints = CustomerComplaint::with($withRelations)
                ->whereIn('customer_complaints_status_id', [1, null])
                ->when($request->complaintType, fn($query) =>
                    $query->where('complaint_type_id', $request->complaintType)
                )
                ->when($request->from_date && $request->to_date, function ($query) use ($request) {
                    $from = Carbon::parse($request->from_date)->startOfDay();
                    $to   = Carbon::parse($request->to_date)->endOfDay();
                    $query->whereBetween('created_at', [$from, $to]);
                })
                ->when($request->from_date && ! $request->to_date, function ($query) use ($request) {
                    $from = Carbon::parse($request->from_date)->startOfDay();
                    $query->where('created_at', '>=', $from);
                })
                ->when(! $request->from_date && $request->to_date, function ($query) use ($request) {
                    $to = Carbon::parse($request->to_date)->endOfDay();
                    $query->where('created_at', '<=', $to);
                })
                ->orderBy('created_at', 'desc')
                ->get();

            return DataTables::of($customerComplaints)
                ->addColumn('order_id', fn($row) => $row->order_id ?? 'N/A')
                ->addColumn('booking_no', fn($row) =>
                    optional($row->order?->bookings?->first())->id ?? 'N/A'
                )
                ->addColumn('zone_name', fn($row) =>
                    optional($row->order?->bookings?->first()?->address?->region)->title ?? 'N/A'
                )
                ->addColumn('customer_name', fn($row) =>
                    $row->user ? $row->user->first_name . ' ' . $row->user->last_name : 'N/A'
                )
                ->addColumn('tech_name', fn($row) =>
                    optional($row->order?->bookings?->first()?->visits?->first()?->group)->name ?? 'N/A'
                )
                ->addColumn('customer_phone', function ($row) {
                    $phone = $row->user?->phone ?? 'N/A';
                    return $phone !== 'N/A'
                    ? '<a href="https://wa.me/' . $phone . '" target="_blank" class="whatsapp-link" title="فتح الواتساب">
                                <span class="phone-number">' . $phone . '</span>
                                <i class="fab fa-whatsapp whatsapp-icon"></i>
                            </a>'
                    : $phone;
                })
                ->addColumn('status', fn($row) => $row->status?->name_ar ?? 'N/A')
                ->addColumn('complaintType', fn($row) => $row->complaintType?->name_ar ?? 'N/A')
                ->addColumn('complaint_text', fn($row) => $row->text ?? 'No text provided')
                ->addColumn('complaint_images', fn($row) => $row->images ? implode(', ', $row->images) : 'No images')
                ->addColumn('complaint_video', fn($row) => $row->video ?? 'No video')
                ->addColumn('created_at', fn($row) =>
                    $row->created_at->timezone('Asia/Riyadh')->format("Y-m-d")
                )
                ->addColumn('control', fn($row) =>
                    '<a href="' . route('dashboard.order.complaintDetails', ['id' => $row->id]) . '" class="mr-2 btn btn-outline-primary btn-sm">
                        <i class="far fa-eye fa-2x"></i>
                    </a>'
                )
                ->rawColumns([
                    'customer_name',
                    'customer_phone',
                    'status',
                    'complaintType',
                    'complaint_text',
                    'complaint_images',
                    'complaint_video',
                    'created_at',
                    'control',
                ])
                ->make(true);
        }

        $locale        = app()->getLocale();
        $orderByColumn = $locale === 'ar' ? 'name_ar' : 'name_en';

        $complaintTypes = ComplaintType::orderBy($orderByColumn)->get();
        $statuses       = CustomerComplaintStatus::orderBy($orderByColumn)->get();

        return view('dashboard.orders.complaints_unresolved', compact('complaintTypes', 'statuses'));
    }

    public function complaintsAction(Request $request)
    {
        $rules = [
            'id'        => 'required|exists:customer_complaints,id',
            'status'    => 'required|exists:customer_complaint_statuses,id',
            'file_path' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'desc'      => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $customerComplaint = CustomerComplaint::findOrFail($request->id);

        if ($customerComplaint->customer_complaints_status_id !== (int) $request->status) {
            $customerComplaint->update(['customer_complaints_status_id' => $request->status]);
        }

        $path = null;
        if ($request->hasFile('file_path')) {
            $image    = $request->file('file_path');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path     = $image->storeAs('public/images/customerComplaint', $filename);
            $path     = Storage::url($path);
        }

        DB::transaction(function () use ($customerComplaint, $request, $path) {
            CustomerComplaintReply::create([
                'customer_complaint_id' => $customerComplaint->id,
                'admin_id'              => auth()->id(),
                'text'                  => $request->desc ?? '',
                'file_path'             => $path,
            ]);
        });

        return redirect()->back()->with('success', 'تم تحديث حالة الشكوى بنجاح ');
    }

    public function create()
    {
        $users      = User::all();
        $categories = Category::all();
        $services   = Service::all();

        $cities = City::where('active', 1)->get()->pluck('title', 'id');

        return view('dashboard.orders.create', compact('users', 'cities', 'categories', 'services'));
    }

    protected function store(Request $request): Factory | \Illuminate\Contracts\View\View  | RedirectResponse | \Illuminate\Contracts\Foundation\Application
    {
        $rules = [
            'user_id'        => 'required|exists:users,id',
            'service_id'     => 'array|required|exists:services,id',
            'service_id.*'   => 'required',
            'price'          => 'required',
            'payment_method' => 'required|in:visa,cache',
            'notes'          => 'nullable|String',
            'quantity'       => 'array|required',
            'quantity.*'     => 'required',
            'day'            => 'array|required',
            'day.*'          => 'required',
            'start_time'     => 'array|required',
            'start_time.*'   => 'required',
            'total'          => 'required',
            'all_quantity'   => 'required',
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        $data = [
            'user_id'         => $request->user_id,
            'total'           => $request->total,
            'sub_total'       => $request->total,
            'discount'        => 0,
            'status_id'       => 2,
            'payment_method'  => $request->payment_method,
            'notes'           => $request->notes,
            'quantity'        => $request->all_quantity,
            'user_address_id' => UserAddresses::where('user_id', $request->user_id)->where('is_default', 1)->first()->id ?? null,
        ];

        $order = Order::query()->create($data);
        foreach ($request->service_id as $key => $service_id) {
            $service       = Service::where('id', $request->service_id)->first('category_id');
            $order_service = [
                'order_id'    => $order->id,
                'service_id'  => $service_id,
                'price'       => $request->price[$key],
                'quantity'    => $request->quantity[$key],
                'category_id' => $service->category_id,
            ];

            OrderService::create($order_service);
        }
        //        $category_ids = Service::whereIn('id',$request->service_id)->get()->pluck('category_id');
        $category_ids = array_unique($request->category_id);
        foreach ($category_ids as $key => $category_id) {
            $last       = Booking::query()->latest()->first()?->id;
            $num        = $last ? $last + 1 : 1;
            $booking_no = 'dash2023/' . $num;
            $minutes    = 0;
            foreach (Service::with('BookingSetting')->whereIn('id', $request->service_id)->get() as $service) {
                $serviceMinutes = ($service->BookingSetting->service_duration)
                 * OrderService::where('service_id', $service->id)->where('order_id', $order->id)->first()->quantity;
                $minutes += $serviceMinutes;
            }
            $orderService = OrderService::where('service_id', $service->id)->where('order_id', $order->id)->get()->pluck('quantity')->toArray();
            $quantity     = array_sum($orderService);
            $booking      = [
                'booking_no'        => $booking_no,
                'user_id'           => $request->user_id,
                //                'service_id' => $request->service_id[$key],
                'order_id'          => $order->id,
                'user_address_id'   => $order->user_address_id,
                'booking_status_id' => 1,
                'category_id'       => $category_id,
                //            'group_id' => current($groups),
                'notes'             => $request->notes,
                'quantity'          => $quantity,
                'date'              => $request->day[$category_id],
                'type'              => 'service',
                'time'              => Carbon::createFromTimestamp($request->start_time[$category_id])->toTimeString(),
                'end_time'          => Carbon::createFromTimestamp($request->start_time[$category_id])->addMinutes($minutes)->toTimeString(),
            ];
            Booking::query()->create($booking);
        }

        session()->flash('success');
        return view('dashboard.orders.index');
    }

    public function edit($id)
    {
        $order      = Order::where('id', $id)->first();
        $users      = User::all();
        $categories = Category::all();
        $services   = Service::all();
        return view('dashboard.core.services.edit', compact('order', 'users', 'services', 'categories'));
    }

    protected function update(Request $request, $id)
    {
        $order = Order::query()->where('id', $id)->first();
        $rules = [
            'user_id'        => 'required|exists:users,id',
            'category_id'    => 'required|exists:categories,id',
            'service_id'     => 'required|exists:services,id',
            'price'          => 'required|Numeric',
            'payment_method' => 'required|in:visa,cache',
            'notes'          => 'nullable|String',
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
            'msg'     => __("dash.deleted_success"),
        ];
    }

    protected function customerStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:255|unique:users,email',
            'phone'      => 'required|numeric|unique:users,phone',
            'password'   => ['required', 'confirmed', Password::min(4)],
            'city_id'    => 'required|exists:cities,id',
        ]);

        $data = $request->except('_token', 'password_confirmation');

        $customer = User::query()->create($data);

        session()->flash('success');
        return [
            'success' => true,
            'data'    => $customer,
            'msg'     => __("dash.operation_success"),
        ];
    }

    protected function autoCompleteCustomer(Request $request)
    {
        $customers = [];
        if ($request->has('q')) {

            $search    = $request->q;
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
            'date'          => 'required|date',
            'service_ids'   => 'required|array',
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
        $oldMemory       = [];
        foreach ($times as $time) {
            $allTimes = [];
            foreach ($time as $t) {
                $allTimes[] = $t;
            }
            if (isset($oldMemory[0])) {
                $finalAvailTimes = array_intersect($allTimes, $oldMemory);
            } else {
                $oldMemory       = $allTimes;
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
        $order        = Order::with('bookings')->findOrFail(\request()->id);
        $userPhone    = User::where('id', $order->user_id)->first()->phone;
        $category_ids = $order->services->pluck('category_id')->toArray();
        $category_ids = array_unique($category_ids);
        $categories   = Category::whereIn('id', $category_ids)->get();
        return view('dashboard.orders.show', compact('userPhone', 'order', 'categories'));
    }

    public function getBookings($orderId)
    {
        $order    = Order::with('bookings.visit')->findOrFail($orderId);
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

    public function changeStatus(Request $request)
    {
        $request->validate([
            'order_id'  => 'required|exists:orders,id',
            'status_id' => 'required|exists:order_statuses,id',
        ]);

        $order = Order::findOrFail($request->order_id);

        $oldStatusId   = $order->status_id;
        $oldStatusName = optional($order->status)->name;
        $newStatusId   = $request->status_id;

        $order->status_id = $newStatusId;
        $order->save();

        $newStatusName = optional($order->status)->name;

        ActivityLogger::log(
            actionType: 'order_status_updated',
            model: $order,
            description: 'تم تغيير حالة الطلب',
            userId: auth()->id(),
            changes: [
                'from' => ['id' => $oldStatusId, 'name' => $oldStatusName],
                'to'   => ['id' => $newStatusId, 'name' => $newStatusName],
            ],
            meta: [
                'performed_at' => now('Asia/Riyadh')->toDateTimeString(),
                'url'          => request()->fullUrl(),
            ]
        );

        return response()->json([
            'success' => true,
            'msg'     => __("dash.updated_success"),
        ]);
    }

    public function customerOrders(Request $request, $customer_id)
    {
        $regionIds = auth()->user()->regions->pluck('region_id')->toArray();

        if ($request->ajax()) {
            $date   = $request->query('date');
            $date2  = $request->query('date2');
            $status = $request->query('status');

            $orders = Order::with(['status', 'transaction', 'services', 'bookings.address.region'])
                ->where('user_id', $customer_id)
                ->whereHas('bookings.address', fn($q) => $q->whereIn('region_id', $regionIds));

            // Optional Filters
            if ($status) {
                $orders->where('status_id', $status);
            }

            if ($date) {
                $orders->whereDate('created_at', '>=', Carbon::parse($date)->format('Y-m-d'));
            }

            if ($date2) {
                $orders->whereDate('created_at', '<=', Carbon::parse($date2)->format('Y-m-d'));
            }

            // Search Filter
            if ($request->filled('search.value')) {
                $search = $request->input('search.value');
                $orders->where(function ($q) use ($search) {
                    $q->where('id', 'like', "%$search%")
                        ->orWhereHas('status', fn($s) => $s->where('name_ar', 'like', "%$search%"))
                        ->orWhereHas('services', fn($s) => $s->where('title', 'like', "%$search%"));
                });
            }

            // Total before pagination
            $recordsTotal = Order::where('user_id', $customer_id)
                ->whereHas('bookings.address', fn($q) => $q->whereIn('region_id', $regionIds))
                ->count();

            $recordsFiltered = $orders->count();

            $orders = $orders->orderByDesc('created_at')
                ->skip($request->input('start', 0))
                ->take($request->input('length', 10))
                ->get();

            return response()->json([
                'draw'            => $request->input('draw'),
                'recordsTotal'    => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data'            => $orders->map(function ($order) {
                    return [
                        'id'         => $order->id,
                        'status'     => $order->status->name_ar ?? '<span class="text-muted">N/A</span>',
                        'total'      => number_format($order->total ?? 0, 2),
                        'created_at' => optional($order->created_at)->format('Y-m-d'),
                        'services'   => $order->services->map(fn($s) =>
                            '<span class="badge bg-primary me-1">' . e($s->title) . '</span>'
                        )->implode(' '),
                        'payment'    => match ($order->transaction->payment_method ?? '') {
                            'cash', 'cache' => '<span class="badge bg-success">شبكة</span>',
                            'wallet'     => '<span class="badge bg-primary">محفظة</span>',
                            default      => '<span class="badge bg-warning text-dark">فيزا</span>',
                        },
                        // 'actions'    => '<a href="' . route('dashboard.order.show', $order->id) . '" class="btn btn-outline-info btn-sm">عرض</a>',
                    ];
                }),
            ]);
        }

        $statuses = OrderStatus::pluck('name_ar', 'id');
        $user     = User::findOrFail($customer_id);
        return view('dashboard.orders.customer_orders', compact('statuses', 'customer_id', 'user'));
    }

    public function refund(Request $request, $id, WalletRefundService $service)
    {
        try {
            $order = Order::with('user')->findOrFail($id);
            $type  = $request->input('type', 'points');

            $service->handle($order, null, $type);

            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => __('dash.refund_success')]);
            }

            return back()->with('success', __('dash.refund_success'));

        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->validator->errors()->first(), // get first validation message
                ], 422);
            }

            return back()->with('error', $e->validator->errors()->first());
        } catch (\Throwable $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], 500);
            }

            return back()->with('error', $e->getMessage());
        }
    }

}
