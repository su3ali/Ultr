<?php

Route::resource('car_client', 'Cars\CarClientController');
Route::resource('car_model', 'Cars\CarModelController');
Route::resource('car_type', 'Cars\CarTypeController');
Route::get('getModel', 'Cars\CarClientController@getModelByType')->name('car.getModel');

Route::get('/user/{user}/cars', function ($userId) {
    $cars = \App\Models\CarClient::select('id', 'Plate_number')
        ->where('user_id', $userId)
        ->get();

    return response()->json($cars);
});
