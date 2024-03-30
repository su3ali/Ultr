<?php

// use App\Http\Controllers\Api\Techn\home\VisitsController;

Route::get('/clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";

});
// Route::get('/testest',[VisitsController::class, 'test'])->name('testest');

Route::get('/', function (){
    return redirect()->route('dashboard.home');
});

