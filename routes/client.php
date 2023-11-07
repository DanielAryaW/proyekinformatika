<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;


Route::prefix('client')->name('client.')->group(function () {
    Route::middleware(['guest:client'])->group(function () {
        Route::view('/login', 'back.pages.client.auth.login')->name('login');
        Route::post('/login_handler', [ClientController::class, 'loginHandler'])->name('login_handler');
        Route::view('/register', 'back.pages.client.auth.register')->name('register');
        Route::post('/create', [ClientController::class, 'create'])->name('create');
        Route::post('/check', [ClientController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:client'])->group(function () {
        Route::view('/home', 'back.pages.client.home')->name('home');
        Route::view('/pesan', 'back.pages.client.pesan')->name('pesan');
        Route::view('/transaksi', 'back.pages.client.transaksi')->name('transaksi');
        Route::post('/logout_handler', [ClientController::class, 'logoutHandler'])->name('logout_handler');
        Route::get('/add-new', [ClientController::class, 'add'])->name('add');
    });

});