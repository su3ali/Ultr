<?php

use App\Http\Controllers\Dashboard\Coupons\CouponsController;

Route::get('coupons/viewSingleCoupon', [CouponsController::class, 'viewSingle'])->name('coupons.viewSingleCoupon');
Route::resource('coupons', 'Coupons\CouponsController');
Route::get('coupons/change_status/change', 'Coupons\CouponsController@change_status')->name('coupons.change_status');

// apply on bookings
Route::post('/dashboard/bookings/apply-coupon', [CouponsController::class, 'applyCoupon'])->name('bookings.applyCoupon');
