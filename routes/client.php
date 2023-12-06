<?php

use App\Http\Controllers\JasaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PesananController;

Route::prefix('client')->name('client.')->group(function () {
    Route::middleware(['guest:client', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'back.pages.client.auth.login')->name('login');
        Route::post('/login_handler', [ClientController::class, 'loginHandler'])->name('login_handler');
        Route::view('/Login', 'Login')->name('Login');
        Route::view('/forgot-password', 'back.pages.client.auth.forgot-password')->name('forgot-password');
        Route::post('/send-password-reset-link', [ClientController::class, 'sendPasswordResetLink'])->name('send-password-reset-link');
        Route::get('/password/reset/{token}', [ClientController::class, 'resetPassword'])->name('reset-password');
        Route::post('/reset-password-handler', [ClientController::class, 'resetPasswordHandler'])->name('reset-password-handler');
        Route::view('/register', 'back.pages.client.auth.register')->name('register');
        Route::post('/create', [ClientController::class, 'create'])->name('create');
        Route::post('/check', [ClientController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:client', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'back.pages.client.home')->name('home');
        Route::view('/pesan', 'back.pages.client.pesan')->name('pesan');
        Route::view('/transaksi', 'back.pages.client.transaksi')->name('transaksi');

        Route::post('/logout_handler', [ClientController::class, 'logoutHandler'])->name('logout_handler');
        Route::get('/paketjasa', [JasaController::class, 'jasa'])->name('paketjasa');
        Route::get('/home', [JasaController::class, 'showJasas'])->name('home');


        Route::get('/pesan', [PesananController::class, 'pesanan'])->name('pesan');
        Route::post('/home', [PesananController::class, 'store'])->name('client.pesan.store');
        Route::put('/update{id}', [PesananController::class, 'update'])->name('update');
    });
});