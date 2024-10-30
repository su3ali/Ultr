<?php
use App\Http\Controllers\Dashboard\Shifts\ShiftController;

Route::resource('days_statuses', 'Appointments\AppointmentsDaysController');
Route::post('days_statuses/change_status/change', 'Appointments\AppointmentsDaysController@change_status')->name('days_statuses.change_status');

Route::post('/shifts/{id}/toggle-status', 'Shifts\ShiftController@toggleStatus')->name('shifts.toggleStatus');

Route::resource('shifts', 'Shifts\ShiftController');
// In routes/web.php or routes/api.php
Route::delete('dashboard/shifts/{id}', [ShiftController::class, 'destroy'])->name('dashboard.shifts.destroy');
