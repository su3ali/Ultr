<?php
namespace App\Http\Controllers\Dashboard\Reports;

use App\Models\User;
use App\Models\Group;
use App\Models\Order;
use App\Models\Visit;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Technician;
use App\Models\OrderService;
use Illuminate\Http\Request;
use App\Models\BookingSetting;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{

    protected function sales(Request $request)
    {
        if ($request->ajax()) {
            $date           = $request->query('date');
            $date2          = $request->query('date2');
            $service        = $request->query('service');
            $payment_method = $request->query('payment_method');
            $tech_id        = $request->query('tech_filter');

            if (! $date && ! $date2) {
                return DataTables::of(collect())->make(true);
            }

            $orderQuery = Order::with([
                'services.category',
                'user',
                'transaction',
                'userAddress.region',
                'bookings.visit.group',
            ])
                ->where('is_active', 1)
                ->where(function ($query) {
                    $query->where('status_id', 4)
                        ->orWhereHas('transaction', fn($q) => $q->where('payment_method', '!=', 'cache'));
                })
                ->when($payment_method && $payment_method !== 'all', fn($q) =>
                    $q->whereHas('transaction', fn($q2) => $q2->where('payment_method', $payment_method))
                )
                ->when($service && $service !== 'all', fn($q) =>
                    $q->whereHas('services', fn($q2) => $q2->where('service_id', $service))
                )
                ->when($tech_id && $tech_id !== 'all', fn($q) =>
                    $q->whereHas('bookings.visit.group', fn($q2) => $q2->where('id', $tech_id))
                )
                ->when($date && $date2, function ($q) use ($date, $date2) {
                    $start = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh')->startOfDay();
                    $end   = \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh')->endOfDay();
                    $q->whereBetween('created_at', [$start, $end]);
                })
                ->when($date && ! $date2, fn($q) =>
                    $q->where('created_at', '>=', \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh')->startOfDay())
                )
                ->when(! $date && $date2, fn($q) =>
                    $q->where('created_at', '<=', \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh')->endOfDay())
                );

            return DataTables::of($orderQuery)
                ->addColumn('id', fn($row) => $row->id)
                ->addColumn('booking_id', fn($row) => optional($row->bookings->first())->id ?? '')
                ->addColumn('tech_name', fn($row) =>
                    optional($row->bookings->first())->visit?->group?->{app()->getLocale() === 'ar' ? 'name_ar' : 'name_en'} ?? ''
                )
                ->addColumn('user_name', fn($row) => $row->user?->first_name . ' ' . $row->user?->last_name)
                ->addColumn('created_at', fn($row) =>
                    \Carbon\Carbon::parse($row->created_at)->timezone('Asia/Riyadh')->format('Y-m-d')
                )
                ->addColumn('service', fn($row) =>
                    $row->services->map(fn($item) =>
                        '<button class="btn-sm btn-primary">' . $item->title_ar . '</button>'
                    )->implode(' ')
                )
                ->addColumn('service_number', fn($row) => $row->services->count())
                ->addColumn('price', fn($row) => number_format(($row->total / 115 * 100), 2))
                ->addColumn('payment_method', fn($row) => match ($row->transaction?->payment_method ?? '') {
                    'cache', 'cash' => __('api.payment_method_cach'),
                    'wallet' => __('api.payment_method_wallet'),
                    'mada'   => __('api.payment_method_network'),
                    default  => __('api.payment_method_visa'),
                })
                ->addColumn('total', fn($row) => $row->total)
                ->addColumn('region', fn($row) => optional($row->userAddress?->region)->title ?? '')
                ->rawColumns([
                    'booking_id', 'tech_name', 'user_name', 'created_at', 'service', 'service_number',
                    'price', 'payment_method', 'total', 'region',
                ])
                ->make(true);
        }

        $total = Order::where('is_active', 1)
            ->where(function ($q) {
                $q->where('status_id', 4)
                    ->orWhereHas('transaction', fn($q2) => $q2->where('payment_method', '!=', 'cache'));
            })->sum('total');

        $tax      = $total * 0.15;
        $services = Service::pluck(app()->getLocale() == 'ar' ? 'title_ar' : 'title_en', 'id');
        $groups   = Group::select('id', 'name_ar', 'name_en')->orderBy('name_ar')->get();

        return view('dashboard.reports.sales', compact('total', 'tax', 'services', 'groups'));
    }

    protected function updateSummary(Request $request)
    {
        $date           = $request->date;
        $date2          = $request->date2;
        $payment_method = $request->payment_method;
        $service        = $request->service;
        $orderQuery     = Order::query();

        if ($date) {

            $carbonDate    = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
            $formattedDate = $carbonDate->format('Y-m-d H:i:s');
            $orderQuery->where('created_at', '>=', $formattedDate);
        }

        if ($date2) {

            $carbonDate2    = \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh');
            $formattedDate2 = $carbonDate2->format('Y-m-d H:i:s');
            $carbonDate     = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
            $formattedDate  = $carbonDate->format('Y-m-d H:i:s');
            $orderQuery->where([['created_at', '>=', $formattedDate], ['created_at', '<=', $formattedDate2]]);
        }

        if ($payment_method && $payment_method != 'all') {

            $orderQuery->whereHas('transaction', function ($q) use ($payment_method) {
                $q->where('payment_method', $payment_method);
            });
        }
        if ($service && $service != 'all') {

            $orders_ids = OrderService::where('service_id', $service)->get()->pluck('order_id')->toArray();
            $orderQuery->whereIn('id', $orders_ids);
        }

        // Calculate the total, tax, and tax-subtotal
        $total = $orderQuery->where('is_active', 1)->where(function ($query) {
            $query->Where('status_id', '=', 4)->orWhereHas('transaction', function ($q) {
                $q->where('payment_method', '!=', 'cache');
            });
        })->sum('total');
        $total    = ($total / 115 * 100);
        $taxRate  = 0.15; // 15% tax rate
        $tax      = $total * $taxRate;
        $taxTotal = $total + $tax;

        // Return the summary values as JSON
        return response()->json([
            'total'    => $total,
            'tax'      => $tax,
            'taxTotal' => $taxTotal,
        ]);
    }

    protected function contractSales(Request $request)
    {
        if (request()->ajax()) {
            $order = Contract::query();
            $date  = $request->date;
            if ($date) {
                $carbonDate    = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
                $formattedDate = $carbonDate->format('Y-m-d H:i:s');
                $order         = $order->where('created_at', '=', $formattedDate);
            }

            $order = $order->get();
            return DataTables::of($order)
                ->addColumn('contract_number', function ($row) {
                    return $row->id;
                })
                ->addColumn('user_name', function ($row) {
                    return $row->user?->first_name . '' . $row->user?->last_name;
                })
                ->addColumn('package', function ($row) {
                    return $row->package?->name;
                })
                ->addColumn('price', function ($row) {
                    return $row->price;
                })
                ->addColumn('payment_method', function ($row) {
                    return $row->payment_method;
                })

                ->rawColumns([
                    'contract_number',
                    'user_name',
                    'category',
                    'price',
                    'payment_method',
                ])
                ->make(true);
        }
        return view('dashboard.reports.contractSales');
    }

    protected function customers()
    {
        if (request()->ajax()) {
            $order = User::all();
            return DataTables::of($order)
                ->addColumn('user_name', function ($row) {
                    return $row->first_name . '' . $row->last_name;
                })
                ->addColumn('city', function ($row) {
                    $city = $row->address->first();
                    return $city->address ?? '';
                })
                ->addColumn('phone', function ($row) {
                    return $row->phone;
                })
                ->addColumn('email', function ($row) {
                    return $row->email;
                })->addColumn('service_count', function ($row) {
                $order_ids = $row->orders()->with('transaction', function ($q) {
                    $q->where('payment_result', 'success');
                })->pluck('id');

                $services_count = OrderService::whereIn('order_id', $order_ids)->count();
                return $services_count;
            })->addColumn('point', function ($row) {
                return $row->point;
            })

                ->rawColumns([
                    'user_name',
                    'city',
                    'phone',
                    'email',
                    'service_count',
                    'point',

                ])
                ->make(true);
        }
        return view('dashboard.reports.customers');
    }

    protected function technicians()
    {
        try {
            if (request()->ajax()) {
                $technicians = Technician::with(['group', 'rates'])
                    ->where('is_trainee', 0)
                    ->whereNull('training_start_date')
                    ->whereNotNull('fcm_token')
                    ->whereNotNull('email')
                    ->whereNotNull('group_id')
                    ->get();

                return DataTables::of($technicians)
                    ->addColumn('user_name', fn($row) => $row->name ?? 'N/A')
                    ->addColumn('phone', fn($row) => $row->phone ?? 'N/A')
                    ->addColumn('email', fn($row) => $row->email ?? 'N/A')
                    ->addColumn('group', fn($row) => optional($row->group)->name ?? 'N/A')
                    ->addColumn('service_count', function ($row) {
                        $booking_ids = Visit::where('assign_to_id', $row->group_id)
                            ->where('visits_status_id', 5)
                            ->pluck('booking_id')
                            ->toArray();

                        $order_ids = Booking::whereIn('id', $booking_ids)
                            ->pluck('order_id')
                            ->toArray();

                        return OrderService::whereIn('order_id', $order_ids)->count();
                    })
                    ->addColumn('point', fn($row) => $row->point ?? 0)
                    ->addColumn('rate', function ($row) {
                        $avgRate = $row->rates->pluck('rate')->avg();
                        return $avgRate !== null ? number_format($avgRate, 2) : '0.00';
                    })
                    ->addColumn('late', function ($row) {
                        try {
                            $visits = Visit::where('assign_to_id', $row->group_id)
                                ->where('visits_status_id', 5)
                                ->get();

                            if ($visits->isEmpty()) {
                                return '0.00';
                            }

                            $booking_ids = $visits->pluck('booking_id');
                            $order_ids   = Booking::whereIn('id', $booking_ids)->pluck('order_id');
                            $service_ids = OrderService::whereIn('order_id', $order_ids)->pluck('service_id');

                            if ($service_ids->isEmpty()) {
                                return '0.00';
                            }

                            $SumServiceDuration = BookingSetting::whereIn('service_id', $service_ids)
                                ->sum('service_duration');

                            $total_duration = 0;

                            foreach ($visits as $visit) {
                                if (! empty($visit->start_time) && ! empty($visit->end_time)) {
                                    try {
                                        // Validate time format before parsing
                                        if (! preg_match('/^\d{2}:\d{2}:\d{2}$/', $visit->start_time) ||
                                            ! preg_match('/^\d{2}:\d{2}:\d{2}$/', $visit->end_time)) {
                                            throw new \Exception("Invalid time format for visit ID: {$visit->id}");
                                        }

                                        $start_time = Carbon::parse($visit->start_time)->timezone('Asia/Riyadh');
                                        $end_time   = Carbon::parse($visit->end_time)->timezone('Asia/Riyadh');

                                        $total_duration += $end_time->diffInMinutes($start_time);
                                    } catch (\Exception $e) {
                                        Log::error("Skipping visit ID {$visit->id} due to invalid time format", [
                                            'start_time' => $visit->start_time,
                                            'end_time'   => $visit->end_time,
                                            'error'      => $e->getMessage(),
                                        ]);
                                        continue; // Skip this visit and move to the next one
                                    }
                                }
                            }

                            $sum   = $SumServiceDuration - $total_duration;
                            $total = count($service_ids) > 0 ? $sum / count($service_ids) : 0;

                            return number_format(max($total, 0), 2);
                        } catch (\Exception $e) {
                            Log::error("Error calculating lateness for technician ID: {$row->id}", [
                                'error' => $e->getMessage(),
                            ]);
                            return "Error (Tech ID: {$row->id})";
                        }
                    })
                    ->rawColumns([
                        'user_name',
                        'phone',
                        'email',
                        'group',
                        'service_count',
                        'point',
                        'rate',
                        'late',
                    ])
                    ->make(true);
            }

            return view('dashboard.reports.technicians');
        } catch (\Exception $e) {
            Log::error('Error in technicians() method', ['error' => $e->getMessage()]);
            return response()->json([
                'error' => 'Internal Server Error',
            ], 500);
        }
    }

    protected function services()
    {
        if (request()->ajax()) {
            $order = Service::all();
            return DataTables::of($order)
                ->addColumn('name', function ($row) {
                    return $row->title;
                })
                ->addColumn('category', function ($row) {
                    return $row->category?->title;
                })
                ->addColumn('service_count', function ($row) {
                    $services_count = OrderService::whereHas('orders', function ($q) {
                        $q->whereHas('bookings', function ($q) {
                            $q->whereHas('visit', function ($q) {
                                $q->where('visits_status_id', 5);
                            });
                        });
                    })->where('service_id', $row->id)->count();
                    return $services_count;
                })->addColumn('rate', function ($row) {
                return number_format($row->rates->pluck('rate')->avg(), '2');
            })

                ->rawColumns([
                    'name',
                    'category',
                    'service_count',
                    'rate',

                ])
                ->make(true);
        }
        return view('dashboard.reports.services');
    }
}
