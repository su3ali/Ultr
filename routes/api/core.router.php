<?php

use App\Http\Controllers\Api\Core\ContactUsController;
use App\Http\Controllers\Api\Core\HomeController;
use App\Http\Controllers\Api\Core\ServiceController;

Route::prefix('home')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/city', [HomeController::class, 'getCity']);
    Route::get('/region/{id}', [HomeController::class, 'getRegions']);
    Route::get('/regions', [HomeController::class, 'getAllRegions']);
    Route::get('/update-user-address-region', [HomeController::class, 'findRegion']);
});

Route::prefix('services')->group(function () {
    Route::get('/all', [ServiceController::class, 'allServices']);
    Route::get('/most_ordered', [ServiceController::class, 'orderedServices']);
    Route::get('/services_from_category/{id}', [ServiceController::class, 'getServiceFromCategory']);
});

Route::get('contract_package_details/{id}', [ServiceController::class, 'ContractPackageDetails']);
Route::get('my_contract_packages', [ServiceController::class, 'MyContractPackages']);

Route::post('contactus', [ContactUsController::class, 'store']);
Route::post('home_search', [HomeController::class, 'search']);
Route::post('home_filter', [HomeController::class, 'filter']);
Route::post('contract_contact', [HomeController::class, 'contract_contact']);

Route::get('package/{id}', [ServiceController::class, 'PackageDetails']);


