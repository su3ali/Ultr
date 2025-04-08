<?php

use App\Http\Controllers\Dashboard\SettingsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'settings'], function () {
    Route::get('/', [SettingsController::class, 'index'])->name('settings')->middleware('permission:view_setting');
    Route::post('/', [SettingsController::class, 'update'])->middleware('permission:update_setting');


    Route::get('country/change_status', 'Settings\CountryController@change_status')->name('country.change_status');
    Route::resource('country', 'Settings\CountryController');

    Route::get('city/change_status', 'Settings\CityController@change_status')->name('city.change_status');
    Route::resource('city', 'Settings\CityController');

    Route::get('region/viewRegion/{id}', 'Settings\RegionController@viewRegion')->name('region.viewRegion')->middleware('permission:view_regions');
    Route::get('region/change_status', 'Settings\RegionController@change_status')->name('region.change_status')->middleware('permission:view_regions');
    Route::resource('region', 'Settings\RegionController')->middleware('permission:view_regions');

    Route::get('faqs/change_status', 'Settings\FaqsController@change_status')->name('faqs.change_status');
    Route::resource('faqs', 'Settings\FaqsController');

    Route::resource('banners', 'Banners\BannersController')->middleware('permission:view_banners');
    Route::get('banners/change_status/change', 'Banners\BannersController@change_status')->name('banners.change_status')->middleware('permission:view_banners');
    Route::post('banners/get/image', 'Banners\BannersController@getImage')->name('banners.getImage')->middleware('permission:view_banners');
    Route::post('banners/image/upload', 'Banners\BannersController@uploadImage')->name('banners.uploadImage')->middleware('permission:view_banners');
    Route::post('banners/delete/image', 'Banners\BannersController@deleteImage')->name('banners.deleteImage')->middleware('permission:view_banners');
});
