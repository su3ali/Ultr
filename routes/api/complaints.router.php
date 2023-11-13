<?php

use App\Http\Controllers\Api\Core\ComplaintController;

Route::post('complaints/store', [ComplaintController::class, 'store']);
