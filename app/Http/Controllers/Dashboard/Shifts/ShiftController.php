<?php

namespace App\Http\Controllers\Dashboard\Shifts;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Group;
use App\Models\Service;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Import the day model
use Yajra\DataTables\Facades\DataTables;

// Import the Shift model

class ShiftController extends Controller
{

    public function index(Request $request)
    {
        // Check if it's an AJAX request (for DataTables)
        if ($request->ajax()) {
            try {
                // Retrieve shifts with their related models (assuming relationships exist in Shift model)
                $shifts = Shift::with(['day', 'group', 'service'])->get();

                return DataTables::of($shifts)
                    ->addIndexColumn() // Adds an index column automatically
                    ->addColumn('day_name', function ($row) {
                        return $row->day ? $row->day->name : 'N/A'; // Handle null relationship
                    })
                    ->addColumn('group_name', function ($row) {
                        return $row->group ? $row->group->name : 'N/A'; // Handle null relationship
                    })
                    ->addColumn('service_name', function ($row) {
                        return $row->service ? $row->service->title : 'N/A';
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
                    ->rawColumns(['action']) // Enable HTML for the action column
                    ->make(true);
            } catch (\Exception $e) {
                // Log the error
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
        $days = Day::all(); // Fetch all days from the database
        $groups = Group::all(); // Fetch all groups from the database
        $services = Service::all(); // Fetch all services from the database

        return view('dashboard.appointments.shifts.create', compact('days', 'groups', 'services'));
    }

    // public function store(Request $request)
    // {
    //     // Validate input fields
    //     $request->validate([
    //         'day_id' => 'required|exists:days,id', // day_id must exist in the days table
    //         'group_id' => 'required|exists:groups,id', // group_id must exist in the groups table
    //         'service_id' => 'required|exists:services,id', // service_id must exist in the services table
    //         'start_time' => 'required|date_format:H:i', // Ensure start_time is in correct time format
    //         'end_time' => 'required|date_format:H:i|after:start_time', // Ensure end_time is valid and after start_time
    //         'is_active' => 'required|boolean', // Ensure is_active is either 1 or 0 (true or false)
    //     ]);

    //     // Generate a unique shift number
    //     do {
    //         $shift_no = 'shift-' . rand(1000, 9999);
    //     } while (Shift::where('shift_no', $shift_no)->exists());

    //     // Create the new shift with the unique shift number
    //     Shift::create([
    //         'day_id' => $request->day_id,
    //         'group_id' => $request->group_id,
    //         'service_id' => $request->service_id,
    //         'start_time' => $request->start_time,
    //         'end_time' => $request->end_time,
    //         'shift_no' => $shift_no, // Ensure uniqueness
    //         'is_active' => $request->is_active,
    //     ]);
    //     return redirect()->route('dashboard.shifts.index')->with('success', 'Shift created successfully');

    // }

    public function store(Request $request)
    {
        // Validate input fields
        $request->validate([
            'day_id' => 'required|exists:days,id', // day_id must exist in the days table
            'group_id' => 'required|exists:groups,id', // group_id must exist in the groups table
            'service_id' => 'required|exists:services,id', // service_id must exist in the services table
            'start_time' => 'required|date_format:H:i', // Ensure start_time is in correct time format
            'end_time' => 'required|date_format:H:i|after:start_time', // Ensure end_time is valid and after start_time
            'is_active' => 'required|boolean', // Ensure is_active is either 1 or 0 (true or false)
        ]);

        // Check for overlapping shifts for the same group and service on the same day
        $overlappingShifts = Shift::where('day_id', $request->day_id)
            ->where('group_id', $request->group_id)
            ->where('service_id', $request->service_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('start_time', '<', $request->start_time)
                            ->where('end_time', '>', $request->end_time);
                    });
            })->exists();

        if ($overlappingShifts) {
            return redirect()->back()->withErrors([
                'error' => __('dash.error_overlapping'),
            ]);
        }

        // Check if the group has overlapping shifts at the same time in other services
        $groupConflict = Shift::where('day_id', $request->day_id)
            ->where('group_id', $request->group_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('start_time', '<', $request->start_time)
                            ->where('end_time', '>', $request->end_time);
                    });
            })->exists();

        if ($groupConflict) {
            return redirect()->back()->withErrors([
                'error' => __('dash.error_overlapping_group'),
            ]);
        }

        // Generate a unique shift number
        do {
            $shift_no = 'shift-' . rand(1000, 9999);
        } while (Shift::where('shift_no', $shift_no)->exists());

        // Create the new shift with the unique shift number
        Shift::create([
            'day_id' => $request->day_id,
            'group_id' => $request->group_id,
            'service_id' => $request->service_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'shift_no' => $shift_no, // Ensure uniqueness
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('dashboard.shifts.index')->with('success', 'Shift created successfully');
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
        $services = Service::all(); // Retrieve the shift by its ID

        $groups = Group::all();
        $days = Day::all(); // Assuming you have a 'days' table

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
            'shift_no' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'is_active' => 'required|boolean',
        ]);

        // Find the shift by ID and update it
        $shift = Shift::findOrFail($id);
        $shift->update([
            'day_id' => $request->day_id,
            'shift_no' => $request->shift_no,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'is_active' => $request->is_active,
        ]);

        // Redirect back with success message
        return redirect()->route('dashboard.shifts.index')->with('success', 'تم تحديث الشيفت بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find and delete the shift
        $shift = Shift::findOrFail($id);
        $shift->delete();

        return response()->json(['success' => true, 'message' => __('dash.shift_deleted_successfully')]);
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
