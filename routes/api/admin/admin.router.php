<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\Auth\AuthController;
use App\Http\Controllers\Api\Admin\lang\LangController;
use App\Http\Controllers\Api\Checkout\v2\CartController;
use App\Http\Controllers\Api\Admin\home\VisitsController;
use App\Http\Controllers\Api\Settings\SettingsController;
use App\Http\Controllers\Api\Admin\Auth\AdminProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', [AuthController::class, 'login']);
Route::get('/getLang', [LangController::class, 'getLang']);


Route::middleware(['auth:sanctum', 'abilities:admin'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/notification', [AdminProfileController::class, 'getNotification']);

    
    Route::prefix('home')->group(function () {
        
        Route::get('/previousOrders', [VisitsController::class, 'previousOrders']);
        Route::get('/currentOrders', [VisitsController::class, 'currentOrders']);
        Route::get('/ordersByDateNow', [VisitsController::class, 'ordersByDateNow']);
        Route::get('order/{id}', [VisitsController::class, 'orderDetails']);
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index']);
    });
});
