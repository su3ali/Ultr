<?php

namespace App\Http\Controllers\Dashboard\Appointments;

use App\Http\Controllers\Controller;
use App\Models\Day;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AppointmentsDaysController extends Controller
{
    //
    public function index()
    {
        if (request()->ajax()) {
            $days = Day::all();

            // Array for day names translation
            $arabicDays = [
                'Sunday' => 'الأحد',
                'Monday' => 'الإثنين',
                'Tuesday' => 'الثلاثاء',
                'Wednesday' => 'الأربعاء',
                'Thursday' => 'الخميس',
                'Friday' => 'الجمعة',
                'Saturday' => 'السبت',
            ];

            return DataTables::of($days)
                ->addColumn('name', function ($row) use ($arabicDays) {
                    // Translate the day name to Arabic
                    return $arabicDays[$row->name] ?? $row->name;
                })
                ->addColumn('status', function ($row) {
                    $checked = $row->is_active == 1 ? 'checked' : '';
                    return '<label class="switch s-outline s-outline-info  mb-4 mr-2">
                    <input type="checkbox" id="customSwitchStatus" data-id="' . $row->id . '" ' . $checked . '>
                    <span class="slider round"></span>
                    </label>';
                })
                ->rawColumns(['name', 'status'])
                ->make(true);
        }

        return view('dashboard.appointments.days.index');
    }

    protected function change_status(Request $request)
    {
        try {
            // Fetch the day record by ID
            $dayStatus = Day::findOrFail($request->id);

            $is_active = $request->is_active == 1 ? 1 : 0;

            $dayStatus->update(['is_active' => $is_active]);

            // Return a success response
            return response()->json([
                'status' => true,
                'message' => 'Status updated successfully.',
            ], 200);

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error updating day status:', ['error' => $e->getMessage()]);

            // Return an error response
            return response()->json([
                'status' => false,
                'message' => 'Failed to update status.',
            ], 500);
        }
    }

}
