<?php

// use App\Http\Controllers\Api\Techn\home\VisitsController;

use Illuminate\Support\Facades\DB;

Route::get('/delete_access_tokens', function () {
    try {
        DB::table('personal_access_tokens')->delete();
        return response()->json(['message' => 'All personal access tokens deleted successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to delete personal access tokens', 'details' => $e->getMessage()], 500);
    }
});

Route::get('/delete_fcm', function () {
    try {
        DB::table('users')->update(['fcm_token' => null]);
        DB::table('technicians')->update(['fcm_token' => null]);
        return response()->json(['message' => 'all FCM tokens deleted for all users and technicians'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to delete FCM tokens', 'details' => $e->getMessage()], 500);
    }
});

Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";
});
// Route::get('/testest',[VisitsController::class, 'test'])->name('testest');

Route::get('/', function () {
    return redirect()->route('dashboard.home');
});

Route::get('/admin/shifts-by-group/{groupId}', function ($groupId) {
    $shifts   = \App\Models\Shift::all();
    $shiftIds = [];

    foreach ($shifts as $shift) {
        $groupIds = json_decode($shift->group_id, true);
        if (is_array($groupIds) && in_array((string) $groupId, $groupIds)) {
            $shiftIds[] = $shift->id;
        }
    }

    return response()->json($shiftIds);
});
