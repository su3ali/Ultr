<?php

use App\Http\Controllers\Api\Checkout\v2\PaymentController;

Route::prefix('v1/payments')->group(function () {

    Route::post('/callback', [PaymentController::class, 'store']);

});
