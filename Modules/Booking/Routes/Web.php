<?php

use Illuminate\Support\Facades\Route;
use Modules\Booking\Http\Controllers\BookingController;

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


/*Booking Controller*/

Route::post('/checkout/{tour}', [BookingController::class, 'store'])->name('booking.checkout'); //tour should be as paramater passed to controller

Route::post('/checkout/{tour}/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
