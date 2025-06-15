<?php
use App\Http\Controllers\Dashboard\Client\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\Client\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Dashboard\Client\Auth\NewPasswordController;
use App\Http\Controllers\Dashboard\Client\Auth\PasswordResetLinkController;

Route::prefix('client')->name('client.')->group(function () {

    // Guests only
    Route::middleware('guest:client_admin')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'loginForm'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'doLogin'])->name('login.submit');

        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    });

    // Authenticated only
    Route::middleware('auth:client_admin')->group(function () {
        Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])->name('password.confirm.submit');

        // You can change this to GET if you prefer consistency with admin logout
        Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->middleware('auth:client_admin')
            ->name('logout');
    });

});
