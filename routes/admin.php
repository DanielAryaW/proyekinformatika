<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\PesananController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'back.pages.admin.auth.login')->name('login');
        Route::post('/login_handler', [AdminController::class, 'loginHandler'])->name('login_handler');
        Route::view('/Login', 'Login')->name('Login');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'back.pages.admin.home')->name('home');


        // Admin Paket Jasa
        Route::view('/paketjasa', 'back.pages.admin.paketjasa')->name('paketjasa');
        Route::get('/paketjasa', [JasaController::class, 'jasa'])->name('paketjasa');
        Route::get('/add', [JasaController::class, 'create'])->name('add');
        Route::post('/add', [JasaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [JasaController::class, 'edit'])->name('edit');
        Route::put('/update{id}', [JasaController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [JasaController::class, 'destroy'])->name('delete');

        // Admin Manajemen pesan 
        Route::view('/manajemenPesan', 'back.pages.admin.manajemenPesan')->name('manajemenPesan');
        Route::get('/manajemenPesan', [PesananController::class, 'pesanan'])->name('manajemenPesan');
        Route::delete('/delete/{id}', [PesananController::class, 'destroy'])->name('delete');
        // Route::post('/manajemenPesan', [PesananController::class, 'updateStatus'])->name('manajemenPesan');

        Route::post('/manajemenPesan{id}', [PesananController::class, 'updateStatus'])->name('admin.manajemenPesan');


        // Admin logout
        Route::post('/logout_handler', [AdminController::class, 'logoutHandler'])->name('logout_handler');
    });
});