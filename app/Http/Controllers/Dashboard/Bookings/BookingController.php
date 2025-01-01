<?php

namespace App\Http\Controllers\Dashboard\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingSetting;
use App\Models\BookingStatus;
use App\Models\CategoryGroup;
use App\Models\ContractPackage;
use App\Models\Group;
use App\Models\Order;
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

            $date = \request()->query('date');
            $date2 = \request()->query('date2');
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

            if (\request()->query('status')) {
                $va = \request()->query('status');
                $bookings->Where('booking_status_id', $va);
            }

            if ($date) {
                $carbonDate = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
                $formattedDate = $carbonDate->format('Y-m-d');
                $bookings->where('date', '>=', $formattedDate);
            }

            if ($date2) {
                $carbonDate2 = \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh');
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

            $bookings = $bookings->orderBy('created_at', 'desc')->skip($request->input('start', 0))
                ->take($request->input('length', 10))
                ->get();

            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $bookings->count(), // Total count of bookings
                'recordsFiltered' => $filteredRecords, // Adjust as per your filtering logic
                'data' => $bookings->map(function ($row) use ($visits) {
                    // Determine the service ID or package ID based on the 'type' query parameter
                    $data = \request()->query('type') == 'package' ? $row->package_id : $row->service_id;

                    // Initialize the HTML variable to store the button HTML
                    $html = '';

                    // Check if the row ID is not in the visits array
                    if (!in_array($row->id, $visits)) {
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
                        'id' => $row->id,
                        'order' => $row->visit?->booking?->order?->id ?? 'N/A',
                        'customer' => '<a href="' . route('dashboard.customer.bookings', ['customer_id' => $row->customer->id ?? '']) . '"
                class="customer-link"
                title="عرض حجوزات ' . ($row->customer?->first_name ?? '') . ' ' . ($row->customer?->last_name ?? '') . '">
                    ' . ($row->customer?->first_name ?? '') . ' ' . ($row->customer?->last_name ?? '') . '

                </a>',

                        'customer_phone' => $row->customer?->phone
                        ? '<a href="https://api.whatsapp.com/send?phone=' . $row->customer->phone . '" target="_blank" class="whatsapp-link">' . $row->customer->phone . '</a>'
                        : 'N/A',

                        'service' => \request()->query('type') == 'package'
                        ? $row->package?->name
                        : $row->order->services->where('category_id', $row->category_id)->map(function ($service) {
                            return '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                        })->join(' '),
                        'time' => $row->time ? Carbon::parse($row->time)->timezone('Asia/Riyadh')->format('g:i A') : 'N/A',

                        'group' => $row->visit?->group?->name ?? 'N/A',
                        'total' => isset($row->visit?->booking?->order?->total) && is_float($row->visit?->booking?->order?->total)
                        ? number_format($row->visit->booking->order->total, 2)
                        : 'N/A',
                        'status' => $row->visit?->status?->name_ar ?? 'N/A',
                        'new' => $row->visit?->status?->name_ar ?? 'N/A',
                        'date' => $row->date ?? 'N/A',
                        'quantity' => $row->quantity ?? 'N/A',
                        'payment_method' => match ($row->visit?->booking?->order?->transaction?->payment_method ?? 'N/A') {
                            'cache', 'cash' => '<i class="fas fa-money-bill-wave text-success" title="Cash Payment (Cash or Physical Money)" style="font-size: 1.2em; transition: transform 0.3s;" onmouseover="this.style.transform=\'scale(1.1)\';" onmouseout="this.style.transform=\'scale(1)\';"></i> شبكة', // Green with hover animation for cash
                            'wallet' => '<i class="fas fa-wallet text-primary" title="Wallet Payment (e.g., Digital Wallet)" style="font-size: 1.2em; transition: transform 0.3s;" onmouseover="this.style.transform=\'scale(1.1)\';" onmouseout="this.style.transform=\'scale(1)\';"></i> محفظة', // Blue with hover animation for wallet
                            default => '<i class="fas fa-credit-card text-warning" title="Credit Card Payment (Visa, MasterCard, etc.)" style="font-size: 1.2em; transition: transform 0.3s;" onmouseover="this.style.transform=\'scale(1.1)\';" onmouseout="this.style.transform=\'scale(1)\';"></i> فيزا', // Yellow with hover animation for credit card
                        },

                        'notes' => $row->notes ?? 'N/A',
                        'control' => $html ?? 'N/A',
                    ];
                }),
            ]);

        }

        $visitsStatuses = VisitsStatus::query()->get()->pluck('name', 'id');
        $statuses = BookingStatus::get()->pluck('name', 'id');

        return view('dashboard.bookings.index', compact('visitsStatuses', 'statuses'));
    }

    public function customerBookings(Request $request, $customer_id)
    {

        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

        if (request()->ajax()) {

            $date = \request()->query('date');
            $date2 = \request()->query('date2');
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
                $carbonDate = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
                $formattedDate = $carbonDate->format('Y-m-d');
                $bookings->where('date', '>=', $formattedDate);
            }

            if ($date2) {
                $carbonDate2 = \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh');
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
                'draw' => $request->input('draw'),
                'recordsTotal' => $bookings->count(), // Total count of bookings
                'recordsFiltered' => $filteredRecords, // Adjust as per your filtering logic
                'data' => $bookings->map(function ($row) use ($visits) {
                    // Determine the service ID or package ID based on the 'type' query parameter
                    $data = \request()->query('type') == 'package' ? $row->package_id : $row->service_id;

                    // Initialize the HTML variable to store the button HTML
                    $html = '';

                    // Check if the row ID is not in the visits array
                    if (!in_array($row->id, $visits)) {
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
                        'id' => $row->id,
                        'order' => $row->visit?->booking?->order?->id ?? 'N/A',
                        'customer' =>
                        ($row->customer?->first_name ?? '') . ' ' .
                        ($row->customer?->last_name ?? ''),

                        'customer_phone' => $row->customer?->phone ?? 'N/A',
                        'service' => \request()->query('type') == 'package'
                        ? $row->package?->name
                        : $row->order->services->where('category_id', $row->category_id)->map(function ($service) {
                            return '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                        })->join(' '),
                        'time' => $row->time ? Carbon::parse($row->time)->timezone('Asia/Riyadh')->format('g:i A') : 'N/A',

                        'group' => $row->visit?->group?->name ?? 'N/A',
                        'total' => isset($row->visit?->booking?->order?->total) && is_float($row->visit?->booking?->order?->total)
                        ? number_format($row->visit->booking->order->total, 2)
                        : 'N/A',
                        'status' => $row->visit?->status?->name_ar ?? 'N/A',
                        'new' => $row->visit?->status?->name_ar ?? 'N/A',
                        'date' => $row->date ?? 'N/A',
                        'quantity' => $row->quantity ?? 'N/A',
                        'payment_method' => match ($row->visit?->booking?->order?->transaction?->payment_method ?? 'N/A') {
                            'cache', 'cash' => '<i class="fas fa-money-bill-wave text-success" title="Cash Payment (Cash or Physical Money)" style="font-size: 1.2em; transition: transform 0.3s;" onmouseover="this.style.transform=\'scale(1.1)\';" onmouseout="this.style.transform=\'scale(1)\';"></i> شبكة', // Green with hover animation for cash
                            'wallet' => '<i class="fas fa-wallet text-primary" title="Wallet Payment (e.g., Digital Wallet)" style="font-size: 1.2em; transition: transform 0.3s;" onmouseover="this.style.transform=\'scale(1.1)\';" onmouseout="this.style.transform=\'scale(1)\';"></i> محفظة', // Blue with hover animation for wallet
                            default => '<i class="fas fa-credit-card text-warning" title="Credit Card Payment (Visa, MasterCard, etc.)" style="font-size: 1.2em; transition: transform 0.3s;" onmouseover="this.style.transform=\'scale(1.1)\';" onmouseout="this.style.transform=\'scale(1)\';"></i> فيزا', // Yellow with hover animation for credit card
                        },

                        'notes' => $row->notes ?? 'N/A',
                        'control' => $html ?? 'N/A',
                    ];
                }),
            ]);

        }

        $visitsStatuses = VisitsStatus::query()->get()->pluck('name', 'id');
        $statuses = BookingStatus::get()->pluck('name', 'id');

        return view('dashboard.bookings.customer-bookings', compact('visitsStatuses', 'statuses', 'customer_id'));
    }

    protected function create()
    {
        $orders = Order::all();
        $customers = User::all();
        $services = Service::all();
        $groups = Group::where('active', 1)->get();
        $statuses = BookingStatus::all();
        return view('dashboard.bookings.create', compact('orders', 'customers', 'services', 'groups', 'statuses'));
    }

    /**
     * @throws ValidationException
     */
    protected function store(Request $request): RedirectResponse
    {
        $rules = [
            'order_id' => 'required|exists:orders,id',
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'group_id' => 'required|exists:groups,id',
            'booking_status_id' => 'required|exists:booking_statuses,id',
            'notes' => 'nullable|String',
            'date' => 'required|Date',
            'time' => 'required|date_format:H:i',
        ];
        $validated = Validator::make($request->all(), $rules);
        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors());
        }
        $validated = $validated->validated();
        $last = Booking::query()->latest()->first()?->id;
        $validated['booking_no'] = 'dash2023/' . $last ? $last + 1 : 1;
        Booking::query()->create($validated);
        session()->flash('success');
        return redirect()->route('dashboard.bookings.index');
    }

    protected function edit($id)
    {
        $booking = Booking::query()->where('id', $id)->first();
        $orders = Order::all();
        $customers = User::all();
        $services = Service::all();
        $groups = Group::where('active', 1)->get();
        $statuses = BookingStatus::all();
        return view('dashboard.bookings.edit', compact('booking', 'orders', 'customers', 'services', 'groups', 'statuses'));
    }

    protected function update(Request $request, $id)
    {
        $inputs = $request->only('order_id', 'user_id', 'service_id', 'group_id', 'date', 'notes', 'booking_status_id');
        $inputs['time'] = Carbon::parse($request->time)->timezone('Asia/Riyadh')->format('H:i');
        $booking = Booking::query()->where('id', $id)->first();
        $rules = [
            'order_id' => 'required|exists:orders,id',
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'group_id' => 'required|exists:groups,id',
            'booking_status_id' => 'required|exists:booking_statuses,id',
            'notes' => 'nullable|String',
            'date' => 'required|Date',
            'time' => 'required|date_format:H:i',
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
            'msg' => __("dash.deleted_success"),
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

        // Return the data as a JSON response
        if ($request->type == 'package') {

            $package = ContractPackage::where('id', $request->service_id)->first();

            $service = Service::where('id', $package->service_id)->first('category_id');

            $groupIds = CategoryGroup::where('category_id', $service->category_id)->pluck('group_id')->toArray();

            $address = UserAddresses::where('id', $request->address_id)->first();

            $group = Group::where('active', 1)->whereIn('id', $groupIds)->whereHas('regions', function ($qu) use ($address) {
                $qu->where('region_id', $address->region_id);
            })->get()->pluck('name', 'id')->toArray();
        } else {
            $category_id = $request->category_id;
            $groupIds = CategoryGroup::where('category_id', $request->category_id)->pluck('group_id')->toArray();
            $address = UserAddresses::where('id', $request->address_id)->first();

            $dayIndex = Carbon::parse()->timezone('Asia/Riyadh')->dayOfWeek;
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
                where('start_time', '<', $end_time) // Visit starts before the passed end_time
                ->where('end_time', '>', $start_time) // Visit ends after the passed start_time
                ->activeVisits() // Assuming this is a custom scope for active visits
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

}
