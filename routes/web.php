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
    return view('Login');
});

Route::view('/example-page', 'example-page');
Route::view('/Login', 'Login');
//Route::post('/pesan', 'ClientController@pesan')->name('client.pesan');

Route::group(['middleware' => 'auth'], function () {
    Route::get('paketjasa/{id}', 'Paket_controller@edit');
    Route::put('paket-laundry/{id}', 'Paket_controller@update');
});
