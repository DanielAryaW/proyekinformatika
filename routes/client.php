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

        // Route untuk memproses login
        Route::post('/login', [ClientController::class, 'postLogin'])->name('client.check');
    });

    Route::middleware(['auth:client', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'back.pages.client.home')->name('home');
        Route::view('/pesan', 'back.pages.client.pesan')->name('pesan');
        Route::view('/transaksi', 'back.pages.client.transaksi')->name('transaksi');

        Route::post('/logout_handler', [ClientController::class, 'logoutHandler'])->name('logout_handler');
        Route::get('/paketjasa', [JasaController::class, 'jasa'])->name('paketjasa');
        Route::get('/home', [JasaController::class, 'showJasas'])->name('home');

        // Client Pesan jasa
        Route::get('/pesan', [PesananController::class, 'showPesanan'])->name('pesan');
        Route::post('/pesan', [PesananController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PesananController::class, 'edit'])->name('edit');
        Route::put('/update{id}', [PesananController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PesananController::class, 'destroy'])->name('delete');

        Route::get('/transaksi', [PesananController::class, 'showClientPesanan'])->name('transaksi');

        // Client Bayar
        Route::post('/pesan{id}', [PesananController::class, 'payment'])->name('client.pesan');

    });
});