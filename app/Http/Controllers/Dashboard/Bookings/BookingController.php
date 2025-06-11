<?php
namespace App\Http\Controllers\Dashboard\Bookings;

use App\Helpers\ActivityLogger;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\BookingStatus;
use App\Models\CategoryGroup;
use App\Models\ContractPackage;
use App\Models\Coupon;
use App\Models\Group;
use App\Models\Order;
use App\Models\Region;
use App\Models\Service;
use App\Models\User;
use App\Models\UserAddresses;
use App\Models\Visit;
use App\Models\VisitsStatus;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{

    public function index(Request $request)
    {

        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

        if (request()->ajax()) {

            $date     = \request()->query('date');
            $date2    = \request()->query('date2');
            $bookings = Booking::query()->whereHas('address', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            })->with(['visit.group', 'visit.status', 'order.services.category', 'package', 'service.category.groups', 'customer', 'order.transaction'])
                ->where('is_active', 1)->where('type', 'service')->with(['order', 'customer', 'service', 'group', 'booking_status']);

            if (request()->page) {
                $now = Carbon::now('Asia/Riyadh')->toDateString();
                $bookings->where('booking_status_id', '!=', 2)->whereDate('date', '=', $now);
            }

            if (\request()->query('type') == 'package') {
                $bookings = Booking::query()->whereHas('address', function ($query) use ($regionIds) {
                    $query->whereIn('region_id', $regionIds);
                })->where('is_active', 1)->where('type', 'contract')->with(['order', 'customer', 'service', 'group', 'booking_status']);
            }

            if ($status = \request()->query('status')) {
                $bookings->whereHas('visit', function ($query) use ($status) {
                    $query->where('visits_status_id', $status);
                });
            }

            if ($date) {
                $carbonDate    = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
                $formattedDate = $carbonDate->format('Y-m-d');
                $bookings->where('date', '>=', $formattedDate);
            }

            if ($date2) {
                $carbonDate2    = \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh');
                $formattedDate2 = $carbonDate2->format('Y-m-d');
                $bookings->where('date', '<=', $formattedDate2);
            }

            if ($request->has('zone') && $request->zone !== 'all') {
                $zoneId = $request->zone;
                $bookings->whereHas('order.userAddress.region', function ($query) use ($zoneId) {
                    $query->where('region_id', $zoneId);
                });
            }

            // Apply search filter
            if ($request->filled('search.value')) {
                $search = $request->input('search.value');
                $bookings->where(function ($query) use ($search) {

                    $query->WhereHas('customer', function ($query) use ($search) {
                        $query->Where('first_name', 'LIKE', "%$search%")
                            ->orWhere('phone', 'LIKE', "%$search%");
                    })

                        ->orWhereHas('visit.booking.order', function ($query) use ($search) {
                            $query->where('id', 'LIKE', "%$search%");
                        })

                        ->orWhereHas('visit.group', function ($query) use ($search) {
                            $query->where('name_ar', 'LIKE', "%$search%");
                        })

                        ->orWhere('id', 'LIKE', "%$search%")
                        ->orWhere('date', 'LIKE', "%$search%");
                });
            }

            $visits = Visit::query()->pluck('booking_id')->toArray();

            $filteredRecords = $bookings->clone()->count();

            $bookings = $bookings->orderBy('created_at', 'desc')->skip($request->input('start', 0))
                ->take($request->input('length', 10))
                ->get();

            return response()->json([
                'draw'            => $request->input('draw'),
                'recordsTotal'    => $bookings->count(), // Total count of bookings
                'recordsFiltered' => $filteredRecords,   // Adjust as per your filtering logic
                'data'            => $bookings->map(function ($row) use ($visits) {
                    // Determine the service ID or package ID based on the 'type' query parameter
                    $data = \request()->query('type') == 'package' ? $row->package_id : $row->service_id;

                    // Initialize the HTML variable to store the button HTML
                    $html = '';

                    // Check if the row ID is not in the visits array
                    if (! in_array($row->id, $visits)) {
                        // If the row is not in visits, display the "Add Team" button
                        $html .= '
                        <button type="button" id="add-work-exp" class="btn btn-sm btn-primary card-tools edit"
                            data-address_id="' . $row->user_address_id . '"
                            data-id="' . $row->id . '"
                            data-category_id="' . $row->category_id . '"
                            data-service_id="' . $data . '"

                            data-type="' . \request()->query('type') . '"
                            data-toggle="modal" data-target="#addGroupModel">
                            اضافة فريق
                        </button>';
                    } else {
                        // If the row is in visits, display the "Change Team" button
                        $html .= '
                        <button type="button" id="add-work-exp" class="btn btn-sm btn-primary card-tools edit"
                            data-address_id="' . $row->user_address_id . '"
                            data-visit_id="' . ($row->visit ? $row->visit->id : '') . '"
                            data-id="' . $row->id . '"
                            data-category_id="' . $row->category_id . '"
                            data-service_id="' . $data . '"

                             data-date="' . $row->date . '"
                            data-time="' . Carbon::createFromTimestamp($row->time)->format('H:i:s') . '"
                            data-group_id="' . $row->visit?->group?->id . '"
                            data-quantity="' . $row->quantity . '"

                            data-type="' . \request()->query('type') . '"
                            data-toggle="modal" data-target="#changeGroupModel">
                            تغيير الفريق
                        </button>';
                    }

                    // Add delete button
                    if (Auth()->user()->id == 1 && Auth()->user()->first_name == 'Super Admin') {

                        $html .= '
                    <a data-table_id="html5-extension"
                       data-href="' . route('dashboard.bookings.destroy', $row->id) . '"
                       data-id="' . $row->id . '"
                       class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
                       <i class="far fa-trash-alt fa-2x"></i>
                    </a>';
                    }
                    if (auth()->user()->hasRole('admin') || auth()->user()->can('bookings_change_status')) {
                        $html .= '<button type="button" class="btn btn-sm btn-outline-warning change-status-btn"
                                data-id="' . $row->id . '" data-current-status="' . $row->status_id . '"
                                title="' . __('dash.change_status') . '">
                                <i class="fas fa-exchange-alt fa-2x"></i></button>';
                    }

                    // coupon
                    if (auth()->user()->hasRole('admin') || auth()->user()->can('apply_coupon')) {
                        $html .= '<button type="button" class="btn btn-sm btn-outline-warning apply-coupon-btn"
                        data-order_id="' . ($row->visit?->booking?->order?->id ?? '') . '"
                        data-booking_id="' . $row->id . '"
                        title="تطبيق كوبون">
                        <i class="fas fa-gift fa-2x coupon-icon"></i>
                    </button>';
                    }

                    // Return the generated HTML

                    return [
                        'id'             => $row->id,
                        'order'          => $row->visit?->booking?->order?->id ?? 'N/A',
                        'customer'       => '<a href="' . route('dashboard.customer.bookings', ['customer_id' => $row->customer->id ?? '']) . '"
                            class="customer-link"
                            title="عرض حجوزات ' . ($row->customer?->first_name ?? '') . ' ' . ($row->customer?->last_name ?? '') . '">
                                ' . ($row->customer?->first_name ?? '') . ' ' . ($row->customer?->last_name ?? '') . '

                            </a>',

                        'customer_phone' => $row->customer?->phone
                        ? '<a href="https://api.whatsapp.com/send?phone=' . $row->customer->phone . '" target="_blank" class="whatsapp-link">' . $row->customer->phone . '</a>'
                        : 'N/A',

                        'service'        => \request()->query('type') == 'package'
                        ? $row->package?->name
                        : $row->order->services->where('category_id', $row->category_id)->map(function ($service) {
                            return '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                        })->join(' '),
                        'time'           => $row->time ? Carbon::parse($row->time)->timezone('Asia/Riyadh')->format('g:i A') : 'N/A',

                        'group'          => $row->visit?->group?->name ?? 'N/A',
                        'total'          => isset($row->visit?->booking?->order?->total) && is_float($row->visit?->booking?->order?->total)
                        ? number_format($row->visit->booking->order->total, 2)
                        : 'N/A',
                        'status'         => app()->getLocale() === 'ar'
                        ? ($row->visit?->status?->name_ar ?? '')
                        : ($row->visit?->status?->name_en ?? ''),
                        'new'            => $row->visit?->status?->name_ar ?? 'N/A',
                        'date'           => $row->date ?? 'N/A',
                        'quantity'       => $row->quantity ?? 'N/A',
                        'zone'           => optional($row->order->userAddress?->region)->title ?? '',
                        'total'          => isset($row->visit?->booking?->order?->total) && is_numeric($row->visit->booking->order->total)
                        ? number_format((float) $row->visit->booking->order->total, 2)
                        : 'N/A',
                        'payment_method' => match ($row->visit?->booking?->order?->transaction?->payment_method ?? 'N/A') {
                            'cache', 'cash' => __('api.payment_method_cach'),
                            'wallet'         => __('api.payment_method_wallet'),
                            'mada'           => __('api.payment_method_network'),
                            default          => __('api.payment_method_visa'),
                        },

                        'notes'          => $row->notes ?? 'N/A',
                        'control'        => $html ?? 'N/A',
                    ];
                }),
            ]);

        }

        $zones = Region::where('title_ar', '!=', 'old')
            ->where('title_en', '!=', 'old')
            ->pluck(app()->getLocale() === 'ar' ? 'title_ar' : 'title_en', 'id');

        $visitsStatuses = VisitsStatus::query()->get()->pluck('name', 'id');
        $statuses       = BookingStatus::get()->pluck('name', 'id');

        $changeableStatusIds  = [6, 5];
        $bookingStatusOptions = $visitsStatuses->only($changeableStatusIds);

        // Coupon

        $today = Carbon::today();

        // Valid client coupons (not for employees, active, within date range)
        $clientCoupons = Coupon::where('active', 1)
            ->whereDate('start', '<=', $today)
            ->whereDate('end', '>=', $today)
            ->where('is_employee_only', 0) // only for clients
            ->pluck('code', 'id');

        $employeeCoupons = Coupon::where('active', 1)
            ->whereDate('start', '<=', $today)
            ->whereDate('end', '>=', $today)
            ->where('is_employee_only', 1)
            ->get(['id', 'code', 'title_ar']);

        return view('dashboard.bookings.index', compact('visitsStatuses', 'statuses', 'zones', 'bookingStatusOptions', 'clientCoupons', 'employeeCoupons'));
    }

    public function customerBookings(Request $request, $customer_id)
    {

        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

        if (request()->ajax()) {

            $date     = \request()->query('date');
            $date2    = \request()->query('date2');
            $bookings = Booking::query()
                ->where('user_id', $customer_id)->whereHas('address', function ($query) use ($regionIds) {
                $query->whereIn('region_id', $regionIds);
            })->with(['visit.group', 'visit.status', 'order.services.category', 'package', 'service.category.groups', 'customer', 'order.transaction'])
                ->where('is_active', 1)->where('type', 'service')->with(['order', 'customer', 'service', 'group', 'booking_status']);

            if (request()->page) {
                $now = Carbon::now('Asia/Riyadh')->toDateString();
                $bookings->where('booking_status_id', '!=', 2)->whereDate('date', '=', $now);
            }

            if (\request()->query('type') == 'package') {
                $bookings = Booking::query()->whereHas('address', function ($query) use ($regionIds) {
                    $query->whereIn('region_id', $regionIds);
                })->where('is_active', 1)->where('type', 'contract')->with(['order', 'customer', 'service', 'group', 'booking_status']);
            }

            if (\request()->query('status')) {
                $va = \request()->query('status');
                $bookings->Where('booking_status_id', $va);
            }

            if ($date) {
                $carbonDate    = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
                $formattedDate = $carbonDate->format('Y-m-d');
                $bookings->where('date', '>=', $formattedDate);
            }

            if ($date2) {
                $carbonDate2    = \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh');
                $formattedDate2 = $carbonDate2->format('Y-m-d');
                $bookings->where('date', '<=', $formattedDate2);
            }

            // Apply search filter
            if ($request->filled('search.value')) {
                $search = $request->input('search.value');
                $bookings->where(function ($query) use ($search) {

                    $query->WhereHas('customer', function ($query) use ($search) {
                        $query->Where('first_name', 'LIKE', "%$search%")
                            ->orWhere('phone', 'LIKE', "%$search%");
                    })

                        ->orWhereHas('visit.booking.order', function ($query) use ($search) {
                            $query->where('id', 'LIKE', "%$search%");
                        })

                        ->orWhereHas('visit.group', function ($query) use ($search) {
                            $query->where('name_ar', 'LIKE', "%$search%");
                        })

                        ->orWhere('id', 'LIKE', "%$search%")
                        ->orWhere('date', 'LIKE', "%$search%");
                });
            }

            $visits = Visit::query()->pluck('booking_id')->toArray();

            $filteredRecords = $bookings->clone()->count();

            $bookings = $bookings->where('user_id', $customer_id)->orderBy('created_at', 'desc')->skip($request->input('start', 0))
                ->take($request->input('length', 10))
                ->get();

            return response()->json([
                'draw'            => $request->input('draw'),
                'recordsTotal'    => $bookings->count(), // Total count of bookings
                'recordsFiltered' => $filteredRecords,   // Adjust as per your filtering logic
                'data'            => $bookings->map(function ($row) use ($visits) {
                    // Determine the service ID or package ID based on the 'type' query parameter
                    $data = \request()->query('type') == 'package' ? $row->package_id : $row->service_id;

                    // Initialize the HTML variable to store the button HTML
                    $html = '';

                    // Check if the row ID is not in the visits array
                    if (! in_array($row->id, $visits)) {
                        // If the row is not in visits, display the "Add Team" button
                        $html .= '
                        <button type="button" id="add-work-exp" class="btn btn-sm btn-primary card-tools edit"
                            data-address_id="' . $row->user_address_id . '"
                            data-id="' . $row->id . '"
                            data-category_id="' . $row->category_id . '"
                            data-service_id="' . $data . '"

                            data-type="' . \request()->query('type') . '"
                            data-toggle="modal" data-target="#addGroupModel">
                            اضافة فريق
                        </button>';
                    } else {
                        // If the row is in visits, display the "Change Team" button
                        $html .= '
                        <button type="button" id="add-work-exp" class="btn btn-sm btn-primary card-tools edit"
                            data-address_id="' . $row->user_address_id . '"
                            data-visit_id="' . ($row->visit ? $row->visit->id : '') . '"
                            data-id="' . $row->id . '"
                            data-category_id="' . $row->category_id . '"
                            data-service_id="' . $data . '"

                             data-date="' . $row->date . '"
                            data-time="' . Carbon::createFromTimestamp($row->time)->format('H:i:s') . '"
                            data-group_id="' . $row->visit?->group?->id . '"
                            data-quantity="' . $row->quantity . '"

                            data-type="' . \request()->query('type') . '"
                            data-toggle="modal" data-target="#changeGroupModel">
                            تغيير الفريق
                        </button>';
                    }

                    // Add delete button
                    if (Auth()->user()->id == 1 && Auth()->user()->first_name == 'Super Admin') {

                        $html .= '
                    <a data-table_id="html5-extension"
                       data-href="' . route('dashboard.bookings.destroy', $row->id) . '"
                       data-id="' . $row->id . '"
                       class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
                       <i class="far fa-trash-alt fa-2x"></i>
                    </a>';
                    }

                    // Return the generated HTML

                    return [
                        'id'             => $row->id,
                        'order'          => $row->visit?->booking?->order?->id ?? 'N/A',
                        'customer'       =>
                        ($row->customer?->first_name ?? '') . ' ' .
                        ($row->customer?->last_name ?? ''),

                        'customer_phone' => $row->customer?->phone ?? 'N/A',
                        'service'        => \request()->query('type') == 'package'
                        ? $row->package?->name
                        : $row->order->services->where('category_id', $row->category_id)->map(function ($service) {
                            return '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                        })->join(' '),
                        'time'           => $row->time ? Carbon::parse($row->time)->timezone('Asia/Riyadh')->format('g:i A') : 'N/A',

                        'group'          => $row->visit?->group?->name ?? 'N/A',
                        'total'          => isset($row->visit?->booking?->order?->total) && is_float($row->visit?->booking?->order?->total)
                        ? number_format($row->visit->booking->order->total, 2)
                        : 'N/A',
                        'status'         => $row->visit?->status?->name_ar ?? 'N/A',
                        'new'            => $row->visit?->status?->name_ar ?? 'N/A',
                        'date'           => $row->date ?? 'N/A',
                        'quantity'       => $row->quantity ?? 'N/A',
                        'payment_method' => match ($row->visit?->booking?->order?->transaction?->payment_method ?? 'N/A') {
                            'cache', 'cash' => '<i class="fas fa-money-bill-wave text-success" title="Cash Payment (Cash or Physical Money)" style="font-size: 1.2em; transition: transform 0.3s;" onmouseover="this.style.transform=\'scale(1.1)\';" onmouseout="this.style.transform=\'scale(1)\';"></i> شبكة',     // Green with hover animation for cash
                            'wallet'         => '<i class="fas fa-wallet text-primary" title="Wallet Payment (e.g., Digital Wallet)" style="font-size: 1.2em; transition: transform 0.3s;" onmouseover="this.style.transform=\'scale(1.1)\';" onmouseout="this.style.transform=\'scale(1)\';"></i> محفظة',           // Blue with hover animation for wallet
                            default          => '<i class="fas fa-credit-card text-warning" title="Credit Card Payment (Visa, MasterCard, etc.)" style="font-size: 1.2em; transition: transform 0.3s;" onmouseover="this.style.transform=\'scale(1.1)\';" onmouseout="this.style.transform=\'scale(1)\';"></i> فيزا', // Yellow with hover animation for credit card
                        },

                        'notes'          => $row->notes ?? 'N/A',
                        'control'        => $html ?? 'N/A',
                    ];
                }),
            ]);

        }

        $visitsStatuses = VisitsStatus::query()->get()->pluck('name', 'id');
        $statuses       = BookingStatus::get()->pluck('name', 'id');

        return view('dashboard.bookings.customer-bookings', compact('visitsStatuses', 'statuses', 'customer_id'));
    }

    protected function create()
    {
        $orders    = Order::all();
        $customers = User::all();
        $services  = Service::all();
        $groups    = Group::where('active', 1)->get();
        $statuses  = BookingStatus::all();
        return view('dashboard.bookings.create', compact('orders', 'customers', 'services', 'groups', 'statuses'));
    }

    /**
     * @throws ValidationException
     */
    protected function store(Request $request): RedirectResponse
    {
        $rules = [
            'order_id'          => 'required|exists:orders,id',
            'user_id'           => 'required|exists:users,id',
            'service_id'        => 'required|exists:services,id',
            'group_id'          => 'required|exists:groups,id',
            'booking_status_id' => 'required|exists:booking_statuses,id',
            'notes'             => 'nullable|String',
            'date'              => 'required|Date',
            'time'              => 'required|date_format:H:i',
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        $validated               = $validated->validated();
        $last                    = Booking::query()->latest()->first()?->id;
        $validated['booking_no'] = 'dash2023/' . $last ? $last + 1 : 1;
        Booking::query()->create($validated);
        session()->flash('success');
        return redirect()->route('dashboard.bookings.index');
    }

    protected function edit($id)
    {
        $booking   = Booking::query()->where('id', $id)->first();
        $orders    = Order::all();
        $customers = User::all();
        $services  = Service::all();
        $groups    = Group::where('active', 1)->get();
        $statuses  = BookingStatus::all();
        return view('dashboard.bookings.edit', compact('booking', 'orders', 'customers', 'services', 'groups', 'statuses'));
    }

    protected function update(Request $request, $id)
    {
        $inputs         = $request->only('order_id', 'user_id', 'service_id', 'group_id', 'date', 'notes', 'booking_status_id');
        $inputs['time'] = Carbon::parse($request->time)->timezone('Asia/Riyadh')->format('H:i');
        $booking        = Booking::query()->where('id', $id)->first();
        $rules          = [
            'order_id'          => 'required|exists:orders,id',
            'user_id'           => 'required|exists:users,id',
            'service_id'        => 'required|exists:services,id',
            'group_id'          => 'required|exists:groups,id',
            'booking_status_id' => 'required|exists:booking_statuses,id',
            'notes'             => 'nullable|String',
            'date'              => 'required|Date',
            'time'              => 'required|date_format:H:i',
        ];
        $validated = Validator::make($inputs, $rules);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        $validated = $validated->validated();
        $booking->update($validated);
        session()->flash('success');
        return redirect()->route('dashboard.bookings.index');
    }

    protected function destroy($id)
    {
        $booking = Booking::query()->find($id);
        $booking->update([
            'is_active' => 0,
        ]);
        $order = Order::where('id', $booking->order_id)->first();
        $order->update([
            'is_active' => 0,
        ]);
        $visits = Visit::where('booking_id', $id)->get();
        foreach ($visits as $visit) {
            $visit->update([
                'is_active' => 0,
            ]);
        }

        // $booking->delete();
        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];
    }

    protected function change_status(Request $request)
    {
        $bookingStatus = BookingStatus::query()->where('id', $request->id)->first();
        if ($request->active == "false") {
            $bookingStatus->active = 0;
        } else {
            $bookingStatus->active = 1;
        }
        $bookingStatus->save();
        return response('success');
    }

    protected function getGroupByService(Request $request)
    {

        $address = UserAddresses::where('id', $request->address_id)->first();

        $region_id = $address->region_id;

        // Return the data as a JSON response
        if ($request->type == 'package') {

            $package = ContractPackage::where('id', $request->service_id)->first();

            $service = Service::where('id', $package->service_id)->first('category_id');

            $groupIds = CategoryGroup::where('category_id', $service->category_id)->pluck('group_id')->toArray();

            $group = Group::where('active', 1)->whereIn('id', $groupIds)->whereHas('regions', function ($qu) use ($address) {
                $qu->where('region_id', $address->region_id);
            })->get()->pluck('name', 'id')->toArray();
        } else {
            $category_id = $request->category_id;
            $groupIds    = CategoryGroup::where('category_id', $request->category_id)->pluck('group_id')->toArray();
            $address     = UserAddresses::where('id', $request->address_id)->first();

            $dayIndex      = Carbon::parse()->timezone('Asia/Riyadh')->dayOfWeek;
            $adjustedIndex = ($dayIndex == 5) ? 1 : ($dayIndex == 6 ? 7 : $dayIndex + 2);
            // Ensure $adjustedIndex is cast to a string

            $groupIds = Group::groupInRegionCategory($address->region_id, [$category_id])->pluck('id')->toArray();

            // return $groupIds;

            $booking_id = Booking::whereHas('category', function ($qu) use ($category_id) {
                $qu->where('category_id', $category_id);
            })->where('date', $request->date)->pluck('id')->toArray();

            // return $shift;

            $bookSetting = BookingSetting::first();

            $start_time = $request->time;

            $duration = $bookSetting->service_duration;

            $formated_start_time = Carbon::createFromFormat('H:i:s', $start_time);

            $end_time = $formated_start_time->addMinutes($duration * $request->quantity)->format('H:i:s');

            $takenIds = Visit::
                where('start_time', '<', $end_time)   // Visit starts before the passed end_time
                ->where('end_time', '>', $start_time) // Visit ends after the passed start_time
                ->activeVisits()                      // Assuming this is a custom scope for active visits
                ->whereIn('booking_id', $booking_id)
                ->whereIn('assign_to_id', $groupIds)
                ->pluck('assign_to_id')
                ->toArray();

            $availableGroupsIds = array_diff($groupIds, $takenIds);

            if (empty($availableGroupsIds)) {
                return [];
            }
            // return $address;

            $availableGroups = Group::
                whereIn('id', $availableGroupsIds)
                ->pluck('name_ar', 'id')
                ->toArray();

            return response($availableGroups);

        }

    }
    // protected function getGroupByService(Request $request)
    // {
    //     $address   = UserAddresses::find($request->address_id);
    //     $region_id = $address?->region_id;

    //     if (! $region_id) {
    //         return response([]);
    //     }

    //     $dayOfWeek = Carbon::parse($request->date)->timezone('Asia/Riyadh')->dayOfWeek;
    //     $dayId     = match ($dayOfWeek) {
    //         6 => 1, // Saturday
    //         0 => 2, // Sunday
    //         1 => 3, // Monday
    //         2 => 4, // Tuesday
    //         3 => 5, // Wednesday
    //         4 => 6, // Thursday
    //         5 => 7, // Friday
    //     };

    //     $start_time = Carbon::createFromFormat('H:i:s', $request->time);
    //     $duration   = BookingSetting::first()?->service_duration ?? 30;
    //     $end_time   = $start_time->copy()->addMinutes($duration * $request->quantity)->format('H:i:s');

    //     // Resolve category_id from package or request
    //     if ($request->type === 'package') {
    //         $package     = ContractPackage::find($request->service_id);
    //         $category_id = Service::find($package?->service_id)?->category_id;
    //     } else {
    //         $category_id = $request->category_id;
    //     }

    //     if (! $category_id) {
    //         return response([]);
    //     }

    //     // Get all groups allowed by category and region
    //     $groupIds = CategoryGroup::where('category_id', $category_id)->pluck('group_id')->toArray();

    //     // Filter groups available by region and in working shift
    //     $availableGroups = Group::where('active', 1)
    //         ->whereIn('id', $groupIds)
    //         ->whereHas('regions', fn($q) => $q->where('region_id', $region_id))
    //         ->get();

    //     // Check shift match
    //     $availableGroupIds = $availableGroups->filter(function ($group) use ($dayId, $start_time, $end_time) {
    //         return Shift::whereJsonContains('group_id', $group->id)
    //             ->whereJsonContains('day_id', $dayId)
    //             ->whereTime('start_time', '<=', $start_time)
    //             ->whereTime('end_time', '>=', $end_time)
    //             ->exists();
    //     })->pluck('id')->toArray();

    //     if (empty($availableGroupIds)) {
    //         return response([]);
    //     }

    //     // Get overlapping bookings for the same category that conflict with time
    //     $bookingIds = Booking::whereHas('category', fn($q) => $q->where('category_id', $category_id))
    //         ->where('date', $request->date)
    //         ->pluck('id');

    //     $busyGroupIds = Visit::where('start_time', '<', $end_time)
    //         ->where('end_time', '>', $request->time)
    //         ->whereIn('booking_id', $bookingIds)
    //         ->whereIn('assign_to_id', $availableGroupIds)
    //         ->activeVisits()
    //         ->pluck('assign_to_id')
    //         ->toArray();

    //     $finalGroupIds = array_diff($availableGroupIds, $busyGroupIds);

    //     return Group::whereIn('id', $finalGroupIds)->pluck('name_ar', 'id');
    // }

    public function changeStatus(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'status_id'  => 'required|exists:visits_statuses,id',
        ]);

        $booking = Booking::with('visit.status')->findOrFail($request->booking_id);

        if (! $booking->visit) {
            return response()->json([
                'success' => false,
                'msg'     => __("dash.booking_not_found"),
            ], 404);
        }

        $visit = $booking->visit;

        $oldStatusId   = $visit->visits_status_id;
        $oldStatusName = optional($visit->status)->name;

        $newStatusId             = $request->status_id;
        $visit->visits_status_id = $newStatusId;
        $visit->save();

        // Load new status relation if needed
        $visit->load('status');
        $newStatusName = optional($visit->status)->name;

        // Log activity
        ActivityLogger::log(
            actionType: 'booking_status_updated',
            model: $booking,
            description: 'تم تغيير حالة الحجز',
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

}
