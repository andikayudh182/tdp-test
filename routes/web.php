<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Car Route
Route::get('/Car', [App\Http\Controllers\CarController::class, 'index'])->middleware('auth')->name('CarHome');
Route::post('/Car', [App\Http\Controllers\CarController::class, 'store'])->middleware('auth')->name('AddCar');

// Rental Route
Route::get('/Rental', [App\Http\Controllers\RentalController::class, 'index'])->middleware('auth')->name('RentalHome');
Route::post('/Rental', [App\Http\Controllers\RentalController::class, 'store'])->middleware('auth')->name('AddRental');
Route::put('/Rental', [App\Http\Controllers\RentalController::class, 'update'])->middleware('auth')->name('UpdatePengembalian');


