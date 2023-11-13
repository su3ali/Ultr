<?php

use App\Http\Controllers\Api\Complaint\ComplaintController;

Route::post('complaints/store', [ComplaintController::class, 'store']);
