<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['role:client'])->group(function () {
    Route::get('/client-dashboard', 'ClientController@index');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin-dashboard', 'AdminController@index');
});

Route::middleware(['role:owner'])->group(function () {
    Route::get('/owner-dashboard', 'OwnerController@index');
});

// web.php
Route::post('/login', 'Auth\LoginController@login')->name('login');


Route::view('/example-page', 'example-page');
Route::view('/example-auth', 'example-auth');