<?php

use Illuminate\Support\Facades\Route;


/* About */

Route::get('/about', function () {
    return view('about');
})->name('about');


/*Booking Controller*/
Route::post('/checkout/{tour}', [\App\Http\Controllers\BookingController::class, 'index'])->name('booking.checkout'); //tour should be as paramater passed to controller

Route::post('/checkout/{tour}/confirm', [\App\Http\Controllers\BookingController::class, 'confirm'])->name('booking.confirm');
