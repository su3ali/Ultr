<?php

use App\Http\Controllers\Dashboard\Bookings\BookingController;

Route::resource('bookings', 'Bookings\BookingController');

Route::get('customer.bookings/{customer_id}', 'Bookings\BookingController@customerBookings')->name('customer.bookings');

Route::resource('booking_statuses', 'Bookings\BookingStatusController');

Route::post('booking/change-status', 'Bookings\BookingController@changeStatus')->name('booking.changeStatus');

Route::get('booking_statuses/change_status/change', 'Bookings\BookingStatusController@change_status')->name('booking_statuses.change_status');

Route::resource('booking_setting', 'Bookings\BookingSettingController');

Route::get('get_group_by_service', 'Bookings\BookingController@getGroupByService')->name('getGroupByService');

Route::get('/bookings/{id}/logs', [BookingController::class, 'logs'])->name('bookings.logs');
