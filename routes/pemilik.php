<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PesananController;

Route::prefix('pemilik')->name('pemilik.')->group(function () {
    Route::middleware(['guest:pemilik', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'back.pages.pemilik.auth.login')->name('login');
        Route::view('/Login', 'Login')->name('Login');
        Route::post('/login_handler', [PemilikController::class, 'loginHandler'])->name('login_handler');
    });

    Route::middleware(['auth:pemilik', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'back.pages.pemilik.home')->name('home');
        Route::view('/laporanTransaksi', 'back.pages.pemilik.laporanTransaksi')->name('laporanTransaksi');
        Route::post('/logout_handler', [PemilikController::class, 'logoutHandler'])->name('logout_handler');

        Route::get('/laporanTransaksi', [PesananController::class, 'showpemilikPesanan'])->name('laporanTransaksi');
    });
});