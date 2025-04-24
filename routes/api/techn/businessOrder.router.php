<?php

use App\Http\Controllers\Api\BusinessOrder\BusinessOrderController;

Route::prefix('businessOrders')->group(function () {

    Route::get('/currentOrders', [BusinessOrderController::class, 'myCurrentOrders']);
    Route::get('/previousOrders', [BusinessOrderController::class, 'myPreviousOrders']);
    Route::get('/ordersByDateNow', [BusinessOrderController::class, 'myOrdersByDateNow']);
    Route::get('/{id}', [BusinessOrderController::class, 'orderDetails']);

    Route::post('/changeStatus', [BusinessOrderController::class, 'changeStatus']);

});
