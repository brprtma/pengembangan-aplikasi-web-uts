<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('layouts.main');
//});



//Login Route
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//Route Group Auth
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('gedung', GedungController::class);
    Route::resource('user', UserController::class);
    Route::resource('parking', ParkingController::class);
    Route::get('/parking/{parking}/keluar', [ParkingController::class, 'keluar'])->name('parking.keluar');
    Route::put('/parking/{parking}/keluar', [ParkingController::class, 'out'])->name('parking.out');
});

