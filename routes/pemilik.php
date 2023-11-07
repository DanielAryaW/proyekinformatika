<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemilikController;

Route::prefix('pemilik')->name('pemilik.')->group(function () {
    Route::middleware(['guest:pemilik'])->group(function () {
        Route::view('/login', 'back.pages.pemilik.auth.login')->name('login');
        Route::post('/login_handler', [PemilikController::class, 'loginHandler'])->name('login_handler');
    });

    Route::middleware(['auth:pemilik'])->group(function () {
        Route::view('/home', 'back.pages.pemilik.home')->name('home');
        Route::post('/logout_handler', [PemilikController::class, 'logoutHandler'])->name('logout_handler');
    });
});