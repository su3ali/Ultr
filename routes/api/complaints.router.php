<?php

use App\Http\Controllers\CustomerComplaintController;

Route::post('complaints/store', [CustomerComplaintController::class, 'store']);
