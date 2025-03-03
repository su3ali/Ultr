<?php
namespace App\Http\Controllers\Dashboard\Visits;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\ContractPackage;
use App\Models\OrderService;
use App\Models\Service;
use App\Models\Technician;
use App\Models\Visit;
use App\Models\VisitsStatus;
use App\Notifications\SendPushNotification;
use App\Traits\NotificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class VisitsController extends Controller
{
    use NotificationTrait;

    protected function index(Request $request)
    {

        // Get the region IDs the user has access to
        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

        // Check if it's an AJAX request (DataTables)
        if ($request->ajax()) {
            // Start query
            $visit = Visit::query()->whereHas('booking.address', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            });

            // Check if the 'status' filter is applied
            if ($request->has('status') && $request->status !== 'all') {
                $visit->where('visits_status_id', $request->status);
            }

            // Only active visits
            $visit->where('is_active', 1)->orderBy('created_at', 'desc');

            // Apply search filter
            if ($request->filled('search.value')) {
                $search = $request->input('search.value');
                $visit->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%$search%")
                        ->orWhereHas('booking', function ($query) use ($search) {
                            $query->where('id', 'LIKE', "%$search%")
                                ->orWhere('date', 'LIKE', "%$search%");
                        })
                        ->orWhereHas('group', function ($query) use ($search) {
                            $query->where('name_ar', 'LIKE', "%$search%");
                        })
                        ->orWhere('start_time', 'LIKE', "%$search%")
                        ->orWhere('end_time', 'LIKE', "%$search%")
                        ->orWhere('duration', 'LIKE', "%$search%");
                });
            }

                                             // Get total records before pagination
            $totalRecords = $visit->count(); // Get total records matching the filters

                                                                // Apply pagination
            $visits = $visit->skip($request->input('start', 0)) // Skip the records for current page
                ->take($request->input('length', 10))               // Limit records per page
                ->get();

            // Return DataTables response in the required format
            return response()->json([
                'draw'            => $request->input('draw'),
                'recordsTotal'    => $totalRecords, // Total records in the database
                'recordsFiltered' => $totalRecords, // Total filtered records
                'data'            => $visits->map(function ($row) {
                    return [
                        'id'          => $row->id,
                        'booking_id'  => $row->booking?->id,
                        'date'        => $row->booking?->date,
                        'group_name'  => $row->group?->name,
                        'region_name' => optional($row->booking?->address)->region->title ?? '',
                        'start_time'  => \Carbon\Carbon::parse($row->start_time)->timezone('Asia/Riyadh')->format('g:i A'),
                        'end_time'    => \Carbon\Carbon::parse($row->end_time)->timezone('Asia/Riyadh')->format('g:i A'),
                        'duration'    => $row->duration,
                        'status'      => $row->status->name,
                        'control'     => '
                        <a href="' . route('dashboard.visits.show', $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
                            <i class="far fa-eye fa-2x"></i>
                        </a>',
                    ];
                }),
            ]);
        }

        // For non-AJAX requests (for initial page load)
        $statuses = VisitsStatus::all()->pluck('name', 'id');
        return view('dashboard.visits.index', compact('statuses'));
    }

    protected function visitsToday()
    {
        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

        if (request()->ajax()) {
            $visit = Visit::query()->whereHas('booking.address', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            });

            // $now = Carbon::now('Asia/Riyadh')->toDateString();

            // $visit->whereHas('booking', function ($qu) use ($now) {
            //     $qu->whereDate('date', '=', $now);
            // });

            $now       = Carbon::now('Asia/Riyadh')->toDateString();
            $tomorrow  = Carbon::tomorrow('Asia/Riyadh')->toDateString();
            $startTime = Carbon::tomorrow('Asia/Riyadh')->startOfDay()->toTimeString();
            $endTime   = Carbon::tomorrow('Asia/Riyadh')->startOfDay()->addHours(3)->toTimeString();

            $visit->whereHas('booking', function ($qu) use ($now, $tomorrow, $startTime, $endTime) {
                $qu->whereDate('date', '=', $now)
                    ->orWhere(function ($q) use ($tomorrow, $startTime, $endTime) {
                        $q->whereDate('date', '=', $tomorrow)
                            ->whereTime('time', '>=', $startTime)
                            ->whereTime('time', '<', $endTime);
                    });
            });

            if (request()->status) {

                $visit->where('visits_status_id', request()->status);
            }

            $visit->where('is_active', 1)->whereNotIn('visits_status_id', [5, 6])->get();

            return DataTables::of($visit)
                ->addColumn('booking_id', function ($row) {
                    return $row->booking?->id;
                })
                ->addColumn('date', function ($row) {
                    return $row->booking?->date;
                })
                ->addColumn('group_name', function ($row) {
                    return $row->group?->name ?? '';
                })
                ->addColumn('start_time', function ($row) {
                    return \Carbon\Carbon::parse($row->start_time)->timezone('Asia/Riyadh')->format('g:i A');
                })
                ->addColumn('end_time', function ($row) {
                    return \Carbon\Carbon::parse($row->end_time)->timezone('Asia/Riyadh')->format('g:i A');
                })
                ->addColumn('duration', function ($row) {
                    return $row->duration;
                })
                ->addColumn('region', function ($row) {
                    return optional($row->booking?->address)->region->title ?? '';
                })

                ->addColumn('status', function ($row) {
                    return $row->status->name;
                })
                ->addColumn('control', function ($row) {

                    $html = '
                    <a href="#" class="mr-2 btn btn-outline-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>

                                <a href="' . route('dashboard.visits.show', $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
                            <i class="far fa-eye fa-2x"></i>

                    </a>
                                ';

                    return $html;
                })
                ->rawColumns([
                    'booking_id',
                    'date',
                    'group_name',
                    'start_time',
                    'end_time',
                    'duration',
                    'region',
                    'status',
                    'control',
                ])
                ->make(true);
        }
        $statuses = VisitsStatus::all()->pluck('name', 'id');

        return view('dashboard.visits.visits_today', compact('statuses'));
    }

    protected function finishedVisitsToday()
    {
        if (request()->ajax()) {
            // $visit = Visit::query();

            // $now = Carbon::now('Asia/Riyadh')->toDateString();

            // $visit->whereDate('end_date', '=', $now);

            // if (request()->status) {

            //     $visit->where('visits_status_id', request()->status);
            // }

            // $visit->where('is_active', 1)->get();

            //  visits for the current day as well as visits that end within the first 3 hours of the next day.
            $visit = Visit::query();

            $now       = Carbon::now('Asia/Riyadh')->toDateString();
            $tomorrow  = Carbon::tomorrow('Asia/Riyadh')->toDateString();
            $startTime = Carbon::tomorrow('Asia/Riyadh')->startOfDay()->toTimeString();
            $endTime   = Carbon::tomorrow('Asia/Riyadh')->startOfDay()->addHours(3)->toTimeString();

            $visit->where(function ($query) use ($now, $tomorrow, $startTime, $endTime) {
                $query->whereDate('end_date', $now)
                    ->orWhere(function ($q) use ($tomorrow, $startTime, $endTime) {
                        $q->whereDate('end_date', $tomorrow)
                            ->whereTime('end_date', '>=', $startTime)
                            ->whereTime('end_date', '<', $endTime);
                    });
            });

            if (request()->has('status')) {
                $visit->where('visits_status_id', request()->status);
            }

            $visits = $visit->where('is_active', 1)->get();

            return DataTables::of($visit)

                ->addColumn('booking_id', function ($row) {
                    return $row->booking?->id;
                })
                ->addColumn('phone', function ($row) {
                    return $row->booking?->customer?->phone;
                })

                ->addColumn('date', function ($row) {
                    return $row->booking?->date;
                })
                ->addColumn('group_name', function ($row) {
                    return $row->group?->name;
                })
                ->addColumn('start_time', function ($row) {
                    return \Carbon\Carbon::parse($row->start_time)->timezone('Asia/Riyadh')->format('g:i A');
                })
                ->addColumn('end_time', function ($row) {
                    return \Carbon\Carbon::parse($row->end_time)->timezone('Asia/Riyadh')->format('g:i A');
                })
                ->addColumn('duration', function ($row) {
                    return $row->duration;
                })

                ->addColumn('region', function ($row) {
                    return optional($row->booking?->address)->region->title ?? '';
                })
                ->addColumn('status', function ($row) {
                    return $row->status->name;
                })
                ->addColumn('control', function ($row) {

                    $html = '
                    <a href="#" class="mr-2 btn btn-outline-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>

                                <a href="' . route('dashboard.visits.show', $row->id) . '" class="mr-2 btn btn-outline-primary btn-sm">
                            <i class="far fa-eye fa-2x"></i>

                    </a>
                                ';

                    return $html;
                })
                ->rawColumns([
                    'booking_id',
                    'phone',
                    'date',
                    'group_name',
                    'start_time',
                    'end_time',
                    'duration',
                    'region',
                    'status',
                    'control',
                ])
                ->make(true);
        }
        $statuses = VisitsStatus::all()->pluck('name', 'id');

        return view('dashboard.visits.finished_visits_today', compact('statuses'));
    }

    protected function store(Request $request)
    {
        $rules = [
            'booking_id'       => 'required|exists:bookings,id',
            'assign_to_id'     => 'required|exists:groups,id',
            'note'             => 'nullable',
            'visits_status_id' => 'required|exists:visits_statuses,id',
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        $validated = $validated->validated();

        $booking      = Booking::with('service.category')->where('id', $request->booking_id)->first();
        $semiBookings = Booking::query()->where('category_id', $booking->category_id)
            ->where('order_id', $booking->order_id)->get();
        $service_ids = $semiBookings->pluck('service_id')->toArray();
        if ($booking->type == 'contract') {
            $package         = ContractPackage::query()->where('id', $booking->package_id)->first();
            $bookingSettings = BookingSetting::query()->where('service_id', $package->service_id)->get();
        } else {
            $bookingSettings = BookingSetting::query()->whereIn('service_id', $service_ids)->get();
        }

        $start_time                    = Carbon::parse($booking->time)->timezone('Asia/Riyadh');
        $end_time                      = Carbon::parse($booking->end_time)->timezone('Asia/Riyadh');
        $validated['start_time']       = $start_time;
        $validated['end_time']         = $end_time;
        $validated['duration']         = $end_time->diffInMinutes($start_time);
        $validated['visite_id']        = rand(1111, 9999) . '_' . date('Ymd');
        $validated['visits_status_id'] = 1;
        Visit::query()->create($validated);

        $allTechn = Technician::where('group_id', $request->assign_to_id)->whereNotNull('fcm_token')->get();

        if (count($allTechn) > 0) {

            $title   = 'موعد زيارة جديد';
            $message = 'لديك موعد زياره جديد';

            foreach ($allTechn as $tech) {
                Notification::send(
                    $tech,
                    new SendPushNotification($title, $message)
                );
            }

            $techFcmArray  = $allTechn->pluck('fcm_token');
            $adminFcmArray = Admin::whereNotNull('fcm_token')->pluck('fcm_token');
            $FcmTokenArray = $techFcmArray->merge($adminFcmArray)->toArray();

            $notification = [
                'device_token' => $FcmTokenArray,
                'title'        => $title,
                'message'      => $message,
                'type'         => 'technician',
                'code'         => 1,
            ];

            $this->pushNotification($notification);
        }

        session()->flash('success');
        return redirect()->back();
    }

    public function show($id)
    {
        $visits      = Visit::where('id', $id)->first();
        $user        = $visits->booking->customer;
        $service_ids = OrderService::where('order_id', $visits->booking->order_id)->where('category_id', $visits->booking->category_id)->get()->pluck('service_id');
        $services    = Service::whereIn('id', $service_ids)->get()->pluck('title');

        $visit_status = VisitsStatus::where('active', 1)->get();

        return view('dashboard.visits.show', compact('visits', 'services', 'visit_status', 'user'));
    }

    protected function destroy($id)
    {
        $visit = Visit::find($id);
        $visit->update([
            'is_active' => 0,
        ]);

        $booking = Booking::where('id', $visit->booking_id)->first();
        $booking->update([
            'is_active' => 0,
        ]);
        $visits = Visit::where('booking_id', $booking->id)->get();
        foreach ($visits as $visit) {
            $visit->update([
                'is_active' => 0,
            ]);
        }

        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];
    }

    protected function update(Request $request, $id)
    {
        $visit = Visit::query()->where('id', $id)->first();
        $rules = [
            'booking_id'       => 'required|exists:bookings,id',
            'assign_to_id'     => 'required|exists:groups,id',
            'note'             => 'nullable',
            'visits_status_id' => 'required|exists:visits_statuses,id',
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }

        if ($visit->visits_status_id == 1) {
            $visit->update([
                'assign_to_id' => $request->assign_to_id,
            ]);
            /* $this->store($request); */
        } else if ($visit->visits_status_id == 6) {
            $allTechn = Technician::where('group_id', $visit->assign_to_id)->whereNotNull('fcm_token')->get();

            if (count($allTechn) > 0) {

                $title   = 'تغيير الفريق';
                $message = 'سيتم تغيير الفريق بسبب الغاء الطلب لاسباب فنيه';

                foreach ($allTechn as $tech) {
                    Notification::send(
                        $tech,
                        new SendPushNotification($title, $message)
                    );
                }

                $FcmTokenArray = $allTechn->pluck('fcm_token')->toArray();

                $notification = [
                    'device_token' => $FcmTokenArray,
                    'title'        => $title,
                    'message'      => $message,
                    'type'         => 'technician',
                    'code'         => 2,
                ];

                $this->pushNotification($notification);
            }
            /* $this->store($request); */
        } else {
            return redirect()->back()->withErrors(['visits_status_id' => 'يجب عليك تغيير حاله الزياره اولا']);
        }

        session()->flash('success');
        return redirect()->back();
    }

    public function getLocation(Request $request)
    {
        $visits = Visit::where('id', $request->id)->first();

        $latUser   = $visits->booking?->address?->lat;
        $longUser  = $visits->booking?->address?->long;
        $latTechn  = $visits->lat ?? 0;
        $longTechn = $visits->long ?? 0;

        $locations = [
            ['lat' => $latUser, 'lng' => $longUser],
            ['lat' => $latTechn, 'lng' => $longTechn],
        ];

        return response()->json($locations);
    }

    public function updateStatus(Request $request)
    {
        $visits = Visit::where('id', $request->id)->first();

        return response()->json($visits->visits_status_id);
    }
}
