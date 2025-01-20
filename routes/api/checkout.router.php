<?php

use App\Http\Controllers\Api\Checkout\CartController;
use App\Http\Controllers\Api\Checkout\CheckoutController;
use App\Http\Controllers\Api\Checkout\v2\CheckoutController as CheckoutControllerV2 ;
use App\Http\Controllers\Api\Checkout\v2\CartController as CartControllerV2;
use App\Http\Controllers\Api\Techn\home\VisitsController;


Route::prefix('carts')->group(function () {
    Route::post('add_to_cart', [CartController::class, 'add_to_cart']);
    Route::get('/', [CartController::class, 'index']);
    Route::get('delete', [CartController::class, 'delete_cart']);
    Route::get('/get_avail_times_from_date', [CartController::class, 'getAvailableTimesFromDate']);
    Route::post('/update_cart', [CartController::class, 'updateCart']);
    Route::post('control_cart_item', [CartController::class, 'controlItem']);
});
Route::prefix('v2/carts')->group(function () {
    Route::post('/update_cart', [CartControllerV2::class, 'updateCart']);
});

// Start Version 2 routes
Route::prefix('v2/carts')->group(function () {
    Route::get('/get_avail_times_from_date', [CartControllerV2::class, 'getAvailableTimesFromDate']);
});

Route::get('test', [CheckoutControllerV2::class, 'test'])->name('test');

// End Version 2 routes

Route::get('address', [CheckoutController::class, 'index']);
Route::post('add-address', [CheckoutController::class, 'addAddress']);

Route::get('get-areas', [CheckoutController::class, 'getArea']);

Route::prefix('v2/')->group(function () {
    Route::get('checkTimeDate', [CheckoutControllerV2::class, 'checkTimeDate'])->name('get_avail_times_from_date');
});

Route::get('checkTimeDate', [CheckoutController::class, 'checkTimeDate']);

Route::prefix('checkout')->group(function () {

    Route::post('/', [CheckoutController::class, 'checkout']);

    Route::post('paid', [CheckoutController::class, 'paid']);
});

Route::prefix('v2/checkout')->group(function () {

    Route::post('/', [CheckoutControllerV2::class, 'checkout']);

});

