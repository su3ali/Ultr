<?php

use App\Http\Controllers\Api\Core\CustomerComplaintController;


Route::post('complaints/store', [CustomerComplaintController::class, 'store']);
