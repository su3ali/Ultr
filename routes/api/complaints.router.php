<?php

use App\Http\Controllers\Api\CustomerComplaint\CustomerComplaintController;

Route::post('complaints/store', [CustomerComplaintController::class, 'store']);
