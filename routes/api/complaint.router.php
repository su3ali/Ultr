<?php

use App\Http\Controllers\Api\Complaint\ComplaintController;
use App\Http\Controllers\Dashboard\ComplaintType\ComplaintTypeController;

Route::prefix('complaints')->group(function () {
    Route::post('/store', [ComplaintController::class, 'store']);
    Route::get('/', [ComplaintController::class, 'index']);

    Route::get('/types', [ComplaintTypeController::class, 'allType']);

});
