<?php

namespace App\Http\Controllers\Dashboard\Shifts;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Group;
use App\Models\Service;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB; // Import the day model
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

// Import the Shift model

class ShiftController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            try {
                // Retrieve shifts and decode JSON fields for service_id, group_id, and day_id
                $shifts = Shift::all()->map(function ($shift) {
                    // Decode the JSON fields to arrays
                    $shift->service_id = json_decode($shift->service_id, true);
                    $shift->group_id = json_decode($shift->group_id, true);
                    $shift->day_id = json_decode($shift->day_id, true);

                    // Fetch related services, groups, and days
                    $shift->service = Service::whereIn('id', $shift->service_id)->get()->pluck('title')->toArray(); // Use the title accessor
                    $shift->group = Group::whereIn('id', $shift->group_id)->pluck('name_ar')->toArray();
                    $shift->day = Day::whereIn('id', $shift->day_id)->get()->pluck('title')->toArray();

                    return $shift;
                });

                return DataTables::of($shifts)
                    ->addIndexColumn()
                    ->addColumn('day_name', function ($row) {
                        return !empty($row->day) ? implode(', ', $row->day) : 'N/A'; // Join day names as a string
                    })
                    ->addColumn('group_name', function ($row) {
                        return !empty($row->group) ? implode(', ', $row->group) : 'N/A'; // Join group names as a string
                    })
                    ->addColumn('service_name', function ($row) {
                        return !empty($row->service) ? implode(', ', $row->service) : 'N/A'; // Join service titles as a string
                    })
                    ->addColumn('shift_no', function ($row) {
                        return $row->shift_no;
                    })
                    ->addColumn('start_time', function ($row) {
                        return $row->start_time;
                    })
                    ->addColumn('end_time', function ($row) {
                        return $row->end_time;
                    })
                    ->addColumn('is_active', function ($row) {
                        $checked = '';
                        if ($row->is_active == 1) {
                            $checked = 'checked';
                        }
                        return $row->is_active; // Display active/inactive status
                    })
                    ->addColumn('action', function ($row) {
                        return '<a href="' . route('dashboard.shifts.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>
                            <a href="' . route('dashboard.shifts.show', $row->id) . '" class="btn btn-info btn-sm">View</a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            } catch (\Exception $e) {
                Log::error('Error fetching shifts: ' . $e->getMessage());
                return response()->json(['error' => 'Failed to retrieve shifts.'], 500);
            }
        }

        // Return the view for the shifts index page
        return view('dashboard.appointments.shifts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = Day::where('is_active', 1)->get();
        $groups = Group::where('active', 1)->get();
        $services = Service::where('active', 1)->get();

        return view('dashboard.appointments.shifts.create', compact('days', 'groups', 'services'));
    }

    // public function store(Request $request)
    // {
    //     // Validate input fields
    //     $request->validate([
    //         'day_id' => 'required|array',
    //         'day_id.*' => 'exists:days,id',
    //         'group_id' => 'required|array',
    //         'group_id.*' => 'exists:groups,id',
    //         'service_id' => 'required|array',
    //         'service_id.*' => 'exists:services,id',
    //         'start_time' => 'required|date_format:H:i',
    //         'end_time' => 'required|date_format:H:i|after:start_time',
    //         'is_active' => 'required|boolean',
    //     ]);

    //     // Prepare to check for overlapping shifts
    //     $dayIds = $request->day_id;
    //     $groupIds = $request->group_id;
    //     $startTime = $request->start_time;
    //     $endTime = $request->end_time;

    //     // Check for overlapping shifts
    //     $overlappingShifts = Shift::where(function ($query) use ($dayIds, $groupIds, $startTime, $endTime) {
    //         $query->where(function ($subQuery) use ($dayIds, $groupIds, $startTime, $endTime) {
    //             // Check for day_ids in JSON
    //             foreach ($dayIds as $dayId) {
    //                 $subQuery->orWhereRaw("JSON_CONTAINS(day_id, '\"$dayId\"')");
    //             }

    //             // Check for group_ids in JSON
    //             foreach ($groupIds as $groupId) {
    //                 $subQuery->orWhereRaw("JSON_CONTAINS(group_id, '\"$groupId\"')");
    //             }

    //             // Time overlap conditions
    //             $subQuery->where(function ($q) use ($startTime, $endTime) {
    //                 $q->where('start_time', '<', $endTime)
    //                     ->where('end_time', '>', $startTime);
    //             })
    //                 ->orWhere('start_time', '=', $startTime)
    //                 ->orWhere('end_time', '=', $endTime)
    //                 ->orWhere(function ($q) use ($startTime, $endTime) {
    //                     $q->where('start_time', '<=', $startTime)
    //                         ->where('end_time', '>=', $endTime);
    //                 })
    //                 ->orWhere(function ($q) use ($startTime, $endTime) {
    //                     $q->where('start_time', '>=', $startTime)
    //                         ->where('end_time', '<=', $endTime);
    //                 });
    //         });
    //     })->exists(); // Use exists() for a boolean return

    //     // If overlapping shifts are found, return an error
    //     if ($overlappingShifts) {
    //         return redirect()->back()->withErrors([
    //             'error' => __('dash.error_overlapping', [
    //                 'start' => $startTime,
    //                 'end' => $endTime,
    //             ]),
    //         ]);
    //     }

    //     // Generate a unique shift number
    //     $shift_no = 'shift-' . rand(1000, 9999);
    //     while (Shift::where('shift_no', $shift_no)->exists()) {
    //         $shift_no = 'shift-' . rand(1000, 9999); // Re-generate if already exists
    //     }

    //     // Create the new shift with the unique shift number
    //     Shift::create([
    //         'day_id' => json_encode($dayIds), // Store as JSON
    //         'group_id' => json_encode($groupIds), // Store as JSON
    //         'service_id' => json_encode($request->service_id), // Store as JSON
    //         'start_time' => $startTime,
    //         'end_time' => $endTime,
    //         'shift_no' => $shift_no,
    //         'is_active' => $request->is_active,
    //     ]);

    //     return redirect()->route('dashboard.shifts.index')->with('success', 'Shift created successfully');
    // }

    public function store(Request $request)
    {

        $language = session('locale', App::getLocale()); // Get the language from session

        $messages = [
            'day_id.required' => $language == 'ar' ? 'يرجى اختيار يوم واحد على الأقل.' : 'Please select at least one day.',
            'day_id.array' => $language == 'ar' ? 'يجب أن تكون الأيام في صيغة مصفوفة.' : 'The days must be in array format.',
            'day_id.*.exists' => $language == 'ar' ? 'يوم أو أكثر من الأيام المحددة غير صالح.' : 'One or more selected days are invalid.',

            'group_id.required' => $language == 'ar' ? 'يرجى اختيار مجموعة واحدة على الأقل.' : 'Please select at least one group.',
            'group_id.array' => $language == 'ar' ? 'يجب أن تكون المجموعات في صيغة مصفوفة.' : 'The groups must be in array format.',
            'group_id.*.exists' => $language == 'ar' ? 'مجموعة أو أكثر من المجموعات المحددة غير صالح.' : 'One or more selected groups are invalid.',

            'service_id.required' => $language == 'ar' ? 'يرجى اختيار خدمة واحدة على الأقل.' : 'Please select at least one service.',
            'service_id.array' => $language == 'ar' ? 'يجب أن تكون الخدمات في صيغة مصفوفة.' : 'The services must be in array format.',
            'service_id.*.exists' => $language == 'ar' ? 'خدمة أو أكثر من الخدمات المحددة غير صالحة.' : 'One or more selected services are invalid.',

            'start_time.required' => $language == 'ar' ? 'يرجى إدخال وقت البدء.' : 'Please enter a start time.',
            'start_time.date_format' => $language == 'ar' ? 'يجب أن يكون وقت البدء بتنسيق HH:mm.' : 'The start time must be in the format HH:mm.',

            'end_time.required' => $language == 'ar' ? 'يرجى إدخال وقت الانتهاء.' : 'Please enter an end time.',
            'end_time.date_format' => $language == 'ar' ? 'يجب أن يكون وقت الانتهاء بتنسيق HH:mm.' : 'The end time must be in the format HH:mm.',
            'end_time.after' => $language == 'ar' ? 'يجب أن يكون وقت الانتهاء بعد وقت البدء.' : 'The end time must be after the start time.',

            'is_active.required' => $language == 'ar' ? 'يرجى تحديد ما إذا كانت الورقة نشطة.' : 'Please specify whether the shift is active.',
            'is_active.boolean' => $language == 'ar' ? 'يجب أن يكون حالة النشاط إما صحيح أو خطأ.' : 'The active status must be true or false.',
        ];

// Validate the request with custom messages
        $request->validate([
            'day_id' => 'required|array',
            'day_id.*' => 'exists:days,id',
            'group_id' => 'required|array',
            'group_id.*' => 'exists:groups,id',
            'service_id' => 'required|array',
            'service_id.*' => 'exists:services,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'is_active' => 'required|boolean',
        ], $messages);

        // Retrieve input data
        $dayIds = $request->day_id;
        $groupIds = $request->group_id;
        $serviceIds = $request->service_id;
        $startTime = $request->start_time;
        $endTime = $request->end_time;

        // Check for overlapping shifts only if all criteria match
        $overlappingShifts = Shift::where(function ($query) use ($dayIds, $groupIds, $serviceIds, $startTime, $endTime) {
            // Loop through each combination of day, group, and service
            foreach ($dayIds as $dayId) {
                foreach ($groupIds as $groupId) {
                    foreach ($serviceIds as $serviceId) {
                        $query->orWhere(function ($subQuery) use ($dayId, $groupId, $serviceId, $startTime, $endTime) {
                            $subQuery->whereRaw("JSON_CONTAINS(day_id, '\"$dayId\"')")
                                ->whereRaw("JSON_CONTAINS(group_id, '\"$groupId\"')")
                                ->whereRaw("JSON_CONTAINS(service_id, '\"$serviceId\"')")
                                ->where(function ($timeQuery) use ($startTime, $endTime) {
                                    // Check for time overlap
                                    $timeQuery->where('start_time', '<', $endTime)
                                        ->where('end_time', '>', $startTime);
                                });
                        });
                    }
                }
            }
        })->exists();

        // If overlapping shifts are found, return an error
        if ($overlappingShifts) {
            return redirect()->back()->withErrors([
                'error' => __('dash.error_overlapping', [
                    'start' => $startTime,
                    'end' => $endTime,
                ]),
            ]);
        }

        // Generate a unique shift number
        $shift_no = 'shift-' . rand(1000, 9999);
        while (Shift::where('shift_no', $shift_no)->exists()) {
            $shift_no = 'shift-' . rand(1000, 9999); // Re-generate if already exists
        }

        // Create the new shift with the unique shift number
        Shift::create([
            'day_id' => json_encode($dayIds), // Store as JSON
            'group_id' => json_encode($groupIds), // Store as JSON
            'service_id' => json_encode($serviceIds), // Store as JSON
            'start_time' => $startTime,
            'end_time' => $endTime,
            'shift_no' => $shift_no,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('dashboard.shifts.index')->with('success', __('dash.Shift created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shift = Shift::findOrFail($id);

        return view('dashboard.appointments.shifts.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shift = Shift::findOrFail($id);
        $services = Service::where('active', 1)->get(); // Retrieve the shift by its ID

        $groups = Group::where('active', 1)->get();
        $days = Day::where('is_active', 1)->get(); // Assuming you have a 'days' table

        return view('dashboard.appointments.shifts.edit', compact('shift', 'days', 'services', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'day_id' => 'required|exists:days,id',
            'group_id' => 'required|exists:groups,id',
            'service_id' => 'required|exists:services,id',
            'shift_no' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'is_active' => 'required|boolean',
        ]);

        // Find the shift by ID and update it
        $shift = Shift::findOrFail($id);
        $shift->update([
            'day_id' => $request->day_id,
            'group_id' => $request->group_id,
            'service_id' => $request->service_id,
            'shift_no' => $request->shift_no,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'is_active' => $request->is_active,
        ]);

        // Redirect back with success message
        return redirect()->route('dashboard.shifts.index')->with('success', 'تم تحديث  المناوبة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $shift = Shift::findOrFail($id);
            $shift->delete();
            return response()->json(['message' => 'Shift deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete shift.'], 500);
        }
    }

    public function toggleStatus(Request $request, $id)
    {

        // Validate incoming request data
        $request->validate([
            'is_active' => 'required',
        ]);

        // Find the shift by ID
        $shift = Shift::findOrFail($id);

        if ($request->is_active == 'true' || $request->is_active == 1) {
            $active = 1;
        } else {
            $active = 0;
        }

        // Update the status
        $shift->is_active = $active;
        $shift->save();

        // Set a flash message in the session
        $message = $request->is_active ? 'Shift activated successfully.' : 'Shift deactivated successfully.';
        return redirect()->route('dashboard.shifts.index')->with('status', $message);
    }

}
