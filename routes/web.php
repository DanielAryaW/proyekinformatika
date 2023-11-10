<?php

use App\Http\Controllers\ClientController;
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

// routes/web.php

Route::prefix('client')->name('client.')->group(function () {
    Route::view('/forget-password', 'back.pages.client.auth.forget-password')->name('client.forget-password');
    Route::post('/forget-password', [ClientController::class, 'forgotPassword'])->name('client.forgot-password');

});



