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
use App\Models\Shift;
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

    // public function index()
    // {

    //     $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();

    //     if (request()->ajax()) {
    //         $date = \request()->query('date');
    //         $date2 = \request()->query('date2');
    //         $bookings = Booking::query()->whereHas('address', function ($query) use ($regionIds) {
    //             $query->whereIn('region_id', $regionIds);
    //         })->with(['visit.group', 'visit.status', 'order.services.category', 'package', 'service.category.groups', 'customer', 'order.transaction'])->where('is_active', 1)->where('type', 'service')->with(['order', 'customer', 'service', 'group', 'booking_status']);

    //         if (request()->page) {
    //             $now = Carbon::now('Asia/Riyadh')->toDateString();
    //             $bookings->where('booking_status_id', '!=', 2)->whereDate('date', '=', $now);
    //         }

    //         if (\request()->query('type') == 'package') {
    //             // $bookings = Booking::query()->where('is_active', 1)->where('type', 'contract')->with(['order', 'customer', 'service', 'group', 'booking_status']);
    //             $bookings = Booking::query()->whereHas('address', function ($query) use ($regionIds) {
    //                 $query->whereIn('region_id', $regionIds);
    //             })->where('is_active', 1)->where('type', 'contract')->with(['order', 'customer', 'service', 'group', 'booking_status']);
    //         }
    //         if (\request()->query('status')) {
    //             $va = \request()->query('status');
    //             $bookings->Where('booking_status_id', $va);
    //         }
    //         if ($date) {
    //             $carbonDate = \Carbon\Carbon::parse($date)->timezone('Asia/Riyadh');
    //             $formattedDate = $carbonDate->format('Y-m-d');
    //             $order = $bookings->where('date', '>=', $formattedDate);
    //         }
    //         if ($date2) {

    //             $carbonDate2 = \Carbon\Carbon::parse($date2)->timezone('Asia/Riyadh');
    //             $formattedDate2 = $carbonDate2->format('Y-m-d');
    //             $order = $bookings->where('date', '<=', $formattedDate2);
    //         }
    //         $visits = Visit::query()->pluck('booking_id')->toArray();
    //         $bookings->get();
    //         return DataTables::of($bookings)
    //             ->addColumn('customer', function ($row) {
    //                 return $row->customer?->first_name . ' ' . $row->customer?->last_name;
    //             })
    //             ->addColumn('customer_phone', function ($row) {
    //                 return $row->customer?->phone;
    //             })
    //             ->addColumn('service', function ($row) {
    //                 if (\request()->query('type') == 'package') {
    //                     $service = $row->package?->name;
    //                     return $service;
    //                 }
    //                 $services = $row->order->services->where('category_id', $row->category_id);
    //                 $html = '';
    //                 foreach ($services as $service) {
    //                     $html .= '<button class="btn-sm btn-primary">' . $service->title . '</button>';
    //                 }
    //                 return $html;
    //             })
    //             ->addColumn('time', function ($row) {
    //                 return Carbon::parse($row->time)->timezone('Asia/Riyadh')->format('g:i A');
    //             })
    //             ->addColumn('group', function ($row) {
    //                 return $row->visit?->group?->name;
    //             })
    //             ->addColumn('status', function ($row) {
    //                 return $row->visit?->status?->name_ar;
    //             })
    //             ->addColumn('control', function ($row) use ($visits) {
    //                 $data = $row->service_id;
    //                 if (\request()->query('type') == 'package') {
    //                     $data = $row->package_id;
    //                 }
    //                 if (!in_array($row->id, $visits)) {
    //                     $html = '

    //                     <button type="button" id="add-work-exp" class="btn btn-sm btn-primary card-tools edit" data-address_id = "' . $row->user_address_id . '"  data-id="' . $row->id . '" data-category_id="' . $row->category_id . '"  data-service_id="' . $data . '" data-type="' . \request()->query('type') . '"
    //                               data-toggle="modal" data-target="#addGroupModel">
    //                         اضافة فريق
    //                    </button>';
    //                 } else {
    //                     $html = '
    //                     <button type="button" id="add-work-exp" class="btn btn-sm btn-primary card-tools edit" data-address_id = "' . $row->user_address_id . '" data-visit_id="' . $row->visit?->id . '" data-id="' . $row->id . '" data-category_id="' . $row->category_id . '"  data-service_id="' . $data . '" data-type="' . \request()->query('type') . '"
    //                               data-toggle="modal" data-target="#changeGroupModel">
    //                         تغيير الفريق
    //                    </button>';
    //                 }
    //                 $html .= '<a data-table_id="html5-extension" data-href="' . route('dashboard.bookings.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
    //                         <i class="far fa-trash-alt fa-2x"></i>
    //                 </a>';
    //                 return $html;
    //             })
    //             ->rawColumns([
    //                 //  'visit_id',
    //                 //  'order',
    //                 'customer',
    //                 'customer_phone',
    //                 'service',
    //                 'group',
    //                 'status',
    //                 'control',
    //             ])
    //             ->make(true);
    //     }
    //     $visitsStatuses = VisitsStatus::query()->get()->pluck('name', 'id');
    //     $statuses = BookingStatus::get()->pluck('name', 'id');

    //     return view('dashboard.bookings.index', compact('visitsStatuses', 'statuses'));
    // }

    public function index(Request $request)
    {

        $regionIds = Auth()->user()->regions->pluck('region_id')->toArray();
        // $bookings = Booking::query()->whereHas('address', function ($query) use ($regionIds) {
        //     $query->whereIn('region_id', $regionIds);
        // })->with(['visit.group', 'visit.status', 'order.services.category', 'package', 'service.category.groups', 'customer', 'order.transaction'])
        //     ->where('is_active', 1)->where('type', 'service')->with(['order', 'customer', 'service', 'group', 'booking_status']);
        // $bookings = $bookings->orderBy('created_at', 'desc')->skip($request->input('start', 0))
        //     ->take($request->input('length', 10))
        //     ->get();
        // dd($bookings->first()->visit->group->id);

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

            // Add search functionality
            // Apply search filter
            if ($request->filled('search.value')) {
                $search = $request->input('search.value');
                $bookings->where(function ($query) use ($search) {

                    $query->WhereHas('customer', function ($query) use ($search) {
                        $query->Where('first_name', 'LIKE', "%$search%")
                            ->orWhere('phone', 'LIKE', "%$search%");
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
                    $html .= '
                    <a data-table_id="html5-extension"
                       data-href="' . route('dashboard.bookings.destroy', $row->id) . '"
                       data-id="' . $row->id . '"
                       class="mr-2 btn btn-outline-danger btn-sm btn-delete btn-sm delete_tech">
                       <i class="far fa-trash-alt fa-2x"></i>
                    </a>';

                    // Return the generated HTML
                    return [
                        'id' => $row->id,
                        'customer' => $row->customer?->first_name . ' ' . $row->customer?->last_name,
                        'customer_phone' => $row->customer?->phone,
                        'service' => \request()->query('type') == 'package'
                        ? $row->package?->name
                        : $row->order->services->where('category_id', $row->category_id)->map(function ($service) {
                            return '<button class="btn-sm btn-primary">' . $service->title . '</button>';
                        })->join(' '),
                        'time' => Carbon::parse($row->time)->timezone('Asia/Riyadh')->format('g:i A'),
                        'group' => $row->visit?->group?->name,
                        'status' => $row->visit?->status?->name_ar,
                        'date' => $row->date,
                        'quantity' => $row->quantity,
                        'notes' => $row->notes,
                        'control' => $html, // Add the generated HTML directly here
                    ];
                }),
            ]);

        }

        $visitsStatuses = VisitsStatus::query()->get()->pluck('name', 'id');
        $statuses = BookingStatus::get()->pluck('name', 'id');

        return view('dashboard.bookings.index', compact('visitsStatuses', 'statuses'));
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
            $group = Group::where('active', 1)->whereIn('id', $groupIds)->whereHas('regions', function ($qu) use ($address) {
                $qu->where('region_id', $address->region_id);
            })->get()->pluck('name', 'id')->toArray();
            // $groups = Group::where('active', 1)->whereIn('id', $groupIds)->get();

            $dayIndex = Carbon::parse()->timezone('Asia/Riyadh')->dayOfWeek;
            $adjustedIndex = ($dayIndex == 5) ? 1 : ($dayIndex == 6 ? 7 : $dayIndex + 2);
            // Ensure $adjustedIndex is cast to a string
            $shift = Shift::whereTime('start_time', '<', $request->time)
                ->whereTime('end_time', '>', $request->time)
                ->whereJsonContains('group_id', (string) $request->group_id) // Cast to string for JSON comparison
                ->whereJsonContains('day_id', (string) $adjustedIndex) // Cast to string for JSON comparison
                ->where('is_active', 1)->first();

            // return $shift;
            if ($shift) {
                // Pull the group_id from the shift and convert it to an array (assuming it's stored as a JSON array)
                $groupIds = $shift->pluck('group_id')->toArray();

                // Optionally, convert the values to integers if necessary
                $groupIds = json_decode($groupIds[0], true); // Decoding the JSON to an array
                $groupIds = array_map('intval', $groupIds); // Convert the values to integers

                $booking_id = Booking::whereHas('category', function ($qu) use ($category_id) {
                    $qu->where('category_id', $category_id);
                })->where('date', $request->date)->pluck('id')->toArray();

                // return $shift;

                $bookSetting = BookingSetting::where('service_id', $request->service_id)->first();

                // Start time as a string
                $start_time = $request->time;

                // Calculate the total duration (service duration + buffering time)
                $duration = $bookSetting->service_duration;

                // Create a Carbon instance for the start time
                $start_time = Carbon::createFromFormat('H:i:s', $start_time);

                // Add the total duration in minutes to the start time
                $end_time = $start_time->addMinutes($duration * $request->quantity)->format('H:i:s');
                // return $end_time;

                $takenIds =
                Visit::where('start_time', '<', $end_time)
                    ->where('end_time', '>', $start_time)
                    ->activeVisits()->whereIn('booking_id', $booking_id)
                    ->whereNotIn('visits_status_id', [5, 6])
                    ->whereIn('assign_to_id', $groupIds)->pluck('assign_to_id')->toArray();

                $availableShiftGroupsIds = array_diff($groupIds, $takenIds);

                $group = Group::where('active', 1)->whereIn('id', $availableShiftGroupsIds)
                    ->whereHas('regions', function ($qu) use ($address) {
                        $qu->where('region_id', $address->region_id);
                    })->get()->pluck('name', 'id')->toArray();

            }

            // error_log("BBBBBBB");
            // error_log(sizeof($groups));
            // foreach ($groups as $key => $value){
            //     error_log($value);
            // }
            // dd($group);
        }

        return response($group);
    }
    // {

    //     $groupIds = CategoryGroup::where('category_id', $request->category_id)->pluck('group_id')->toArray();
    //     $address = UserAddresses::where('id', $request->address_id)->first();
    //     $booking = Booking::where('id', $request->booking_id)->first();
    //     $booking_id = Booking::whereHas('address', function ($qu) use ($address) {
    //         $qu->where('region_id', $address->region_id);
    //     })->whereHas('category', function ($qu) use ($request) {
    //         $qu->where('category_id', $request->category_id);
    //     })->where('date', $booking->date)->pluck('id')->toArray();
    //     $activeGroups = Group::where('active', 1)->pluck('id')->toArray();
    //     $takenIds = Visit::where('start_time', $booking->time)->whereIn('booking_id', $booking_id)->whereIn('assign_to_id', $activeGroups)->get();
    //     $group = Group::where('active', 1)->whereIn('id', $groupIds)->whereNotIn('id', $takenIds)->whereHas('regions', function ($qu) use ($address) {
    //         $qu->where('region_id', $address->region_id);
    //     })->get()->pluck('name', 'id')->toArray();

    //     foreach($group as $te){
    //         error_log($te->name);
    //     }
    //     return response($group);

    // //     if ($request->type == 'package') {

    // //         $package = ContractPackage::where('id', $request->service_id)->first();

    // //         $service = Service::where('id', $package->service_id)->first('category_id');

    // //         $groupIds = CategoryGroup::where('category_id', $service->category_id)->pluck('group_id')->toArray();

    // //         $address = UserAddresses::where('id', $request->address_id)->first();

    // //         $group = Group::where('active', 1)->whereIn('id', $groupIds)->whereHas('regions', function ($qu) use ($address) {
    // //             $qu->where('region_id', $address->region_id);
    // //         })->get()->pluck('name', 'id')->toArray();
    // //     } else {
    // //         $groupIds = CategoryGroup::where('category_id', $request->category_id)->pluck('group_id')->toArray();
    // //         $address = UserAddresses::where('id', $request->address_id)->first();
    // //         $booking = Booking::where('id', $request->booking_id)->first();
    // //         $booking_id = Booking::whereHas('address', function ($qu) use ($address) {
    // //             $qu->where('region_id', $address->region_id);
    // //         })->whereHas('category', function ($qu) use ($request) {
    // //             $qu->where('category_id', $request->category_id);
    // //         })->where('date', $booking->date)->pluck('id')->toArray();
    // //         $activeGroups = Group::where('active', 1)->pluck('id')->toArray();
    // //         $takenIds = Visit::where('start_time', $booking->time)->whereIn('booking_id', $booking_id)->whereIn('assign_to_id', $activeGroups)->get();
    // //         $group = Group::where('active', 1)->whereIn('id', $groupIds)->whereNotIn('id', $takenIds)->whereHas('regions', function ($qu) use ($address) {
    // //             $qu->where('region_id', $address->region_id);
    // //         })->get()->pluck('name', 'id')->toArray();
    // //     }
    // //     foreach($group as $te){
    // //         error_log($te->name);
    // //     }
    // //     return response($group);
    // // }
}
