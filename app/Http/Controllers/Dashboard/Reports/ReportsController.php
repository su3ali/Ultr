<?php
namespace App\Http\Controllers\Dashboard\Reports;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Order;
use App\Models\OrderService;
use App\Models\Service;
use App\Models\Technician;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Log;
use Yajra\DataTables\DataTables;

class ReportsController extends Controller
{

    protected function sales(Request $request)
    {

        if (request()->ajax()) {
            $date           = $request->date;
            $date2          = $request->date2;
            $service        = $request->service;
            $payment_method = $request->payment_method;

            // Start the query
            $orderQuery = Order::with(['services.category', 'user', 'transaction', 'userAddress.region'])
                ->where('is_active', 1)
                ->where(function ($query) {
                    $query->where('status_id', 4)
                        ->orWhereHas('transaction', function ($q) {
                            $q->where('payment_method', '!=', 'cache');
                        });
                });

            // Apply date filters
            if ($date) {
                $carbonDate = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
                $orderQuery->where('created_at', '>=', $carbonDate->startOfDay());
            }

            if ($date2) {
                $carbonDate2 = \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh');
                $orderQuery->where('created_at', '<=', $carbonDate2->endOfDay());
            }

            // Apply payment method filter
            if ($payment_method) {
                $orderQuery->whereHas('transaction', function ($q) use ($payment_method) {
                    $q->where('payment_method', $payment_method);
                });
            }

            // Apply service filter
            if ($service) {
                $orderQuery->whereHas('services', function ($q) use ($service) {
                    $q->where('service_id', $service);
                });
            }

            // Initialize the DataTables collection
            $data = collect();

            // Execute the query and fetch results in chunks
            $orderQuery->chunk(100, function ($orders) use ($data) {
                foreach ($orders as $row) {
                    $data->push([
                        'order_number'   => $row->id,
                        'user_name'      => $row->user?->first_name . ' ' . $row->user?->last_name,
                        'created_at'     => Carbon::parse($row->created_at)->timezone('Asia/Riyadh')->format('Y-m-d'),

                        'service'        => $row->services->map(fn($item) => '<button class="btn-sm btn-primary">' . $item->title_ar . '</button>')->join(' '),
                        'service_number' => $row->services->count(),
                        'price'          => number_format(($row->total / 115 * 100), 2),
                        'payment_method' => match ($row->transaction?->payment_method ?? '') {
                            'cache', 'cash' => __('api.payment_method_cach'),
                            'wallet'         => __('api.payment_method_wallet'),
                            'mada'           => __('api.payment_method_network'),
                            default          => __('api.payment_method_visa'),
                        },
                        'total'          => $row->total,
                        'region'         => $row->userAddress?->region?->title ?? '',
                    ]);
                }
            });

            // Return the data in DataTables format
            return DataTables::of($data)
                ->rawColumns([
                    'order_number', 'user_name', 'created_at', 'service', 'service_number', 'price', 'payment_method', 'total', 'region',
                ])
                ->make(true);
        }

        // Calculate total and tax for non-AJAX request
        $total = Order::where('is_active', 1)
            ->where(function ($query) {
                $query->where('status_id', 4)
                    ->orWhereHas('transaction', function ($q) {
                        $q->where('payment_method', '!=', 'cache');
                    });
            })->sum('total');

        $tax      = $total * 0.15;
        $services = Service::all()->pluck('title', 'id');

        return view('dashboard.reports.sales', compact('total', 'tax', 'services'));
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
        if (! request()->ajax()) {
            return view('dashboard.reports.technicians');
        }

        try {
            // Fetch technicians with necessary relationships
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
                    $booking_ids = Visit::where('assign_to_id', $row->group_id ?? 0)
                        ->where('visits_status_id', 5)
                        ->pluck('booking_id');

                    $order_ids = Booking::whereIn('id', $booking_ids)->pluck('order_id');

                    return OrderService::whereIn('order_id', $order_ids)->count() ?? 0;
                })
                ->addColumn('point', fn($row) => $row->point ?? 0)
                ->addColumn('rate', function ($row) {
                    $averageRate = optional($row->rates)->pluck('rate')->avg();
                    return $averageRate !== null ? number_format($averageRate, 2) : '0.00';
                })
                ->addColumn('late', function ($row) {
                    try {
                        $visits = Visit::where('assign_to_id', $row->group_id ?? 0)
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
                        $date           = Carbon::today()->toDateString();

                        foreach ($visits as $visit) {
                            if (! empty($visit->start_time) && ! empty($visit->end_time)) {
                                try {
                                    $start_time = Carbon::parse("{$date} {$visit->start_time}")->timezone('Asia/Riyadh');
                                    $end_time   = Carbon::parse("{$date} {$visit->end_time}")->timezone('Asia/Riyadh');

                                    $total_duration += $end_time->diffInMinutes($start_time);
                                } catch (\Exception $e) {
                                    Log::error('Invalid time format in visit', [
                                        'visit_id'   => $visit->id,
                                        'start_time' => $visit->start_time,
                                        'end_time'   => $visit->end_time,
                                        'exception'  => $e->getMessage(),
                                    ]);
                                    session()->flash('error', 'Invalid time format detected. Some data may be inaccurate.');
                                }
                            }
                        }

                        if (count($service_ids) > 0) {
                            $total = ($SumServiceDuration - $total_duration) / count($service_ids);
                            return number_format(max($total, 0), 2);
                        }

                        return '0.00';
                    } catch (\Exception $e) {
                        Log::error('Error calculating late time: ', ['exception' => $e]);
                        session()->flash('error', 'An error occurred while calculating lateness.');
                        return '0.00';
                    }
                })
                ->rawColumns(['user_name', 'phone', 'email', 'group', 'service_count', 'point', 'rate', 'late'])
                ->make(true);
        } catch (\Exception $e) {
            Log::error('Error in technicians(): ', ['exception' => $e]);
            session()->flash('error', 'An unexpected error occurred.');
            return response()->json(['error' => 'Internal Server Error'], 500);
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
