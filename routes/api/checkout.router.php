<?php

use App\Http\Controllers\Api\Checkout\CartController;
use App\Http\Controllers\Api\Checkout\v2\CheckoutController;
use App\Http\Controllers\Api\v2\Checkout\CartController as CartControllerV2;

Route::prefix('carts')->group(function () {
    Route::post('add_to_cart', [CartController::class, 'add_to_cart']);
    Route::get('/', [CartController::class, 'index']);
    Route::get('delete', [CartController::class, 'delete_cart']);
    Route::get('/get_avail_times_from_date', [CartController::class, 'getAvailableTimesFromDate']);
    Route::post('/update_cart', [CartController::class, 'updateCart']);
    Route::post('control_cart_item', [CartController::class, 'controlItem']);
});

// Start Version 2 routes
Route::prefix('v2/carts')->group(function () {
    Route::get('/get_avail_times_from_date', [CartControllerV2::class, 'getAvailableTimesFromDate']);
});

// End Version 2 routes

Route::get('address', [CheckoutController::class, 'index']);
Route::post('add-address', [CheckoutController::class, 'addAddress']);

Route::get('get-areas', [CheckoutController::class, 'getArea']);

Route::get('checkTimeDate', [CheckoutController::class, 'checkTimeDate']);

Route::prefix('checkout')->group(function () {

    Route::post('/', [CheckoutController::class, 'checkout']);

    Route::post('paid', [CheckoutController::class, 'paid']);
});
