<?php

use App\Http\Controllers\TailorMadeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TourController;


    /* DayTours Controller*/
Route::get('/Daytours', [TourController::class, 'index'])
    ->name('DayTours.index');
Route::get('/Daytours/{Category:slug}', [TourController::class, 'view'])->name('DayTours.view');
Route::get('/Daytours/{Category:slug}/{Tour:title}', [TourController::class, 'Tour'])->name('DayTours.Tour');
/* TourPackages Controller*/

Route::get('/TourPackages', [TourController::class, 'index'])->name('TourPackages.index');
Route::get('/TourPackages/{Category:slug}', [TourController::class, 'view'])->name('TourPackages.view');
Route::get('/TourPackages/{Category:slug}/{Tour:title}', [\App\Http\Controllers\TourController::class, 'Tour'])->name('TourPackages.Tour');




Route::get('/BestDestination/{location}', [\App\Http\Controllers\BestDController::class, 'index'])->name('BestDestination.index');
/* Tailor Made Tours */

Route::get('/TailorMade',[TailorMadeController::class,'index'])->name('TailorMade.index');
Route::post('/TailorMade/submit',[TailorMadeController::class,'submitting'])->name('TailorMade.post');

/* About */
Route::get('/about', function () {
    return view('about');
})->name('about');

/* Contact Form */
Route::get('/Contact',[\App\Http\Controllers\ContactController::class,'index'])->name('Contact.index');
Route::post('/Contact/submit',[\App\Http\Controllers\ContactController::class,'submitting'])->name('Contact.post');
/*Booking Controller*/
Route::post('/checkout/{tour}',[\App\Http\Controllers\BookingController::class,'index'])->name('booking.checkout'); //tour should be as paramater passed to controller

Route::post('/checkout/{tour}/confirm',[\App\Http\Controllers\BookingController::class,'confirm'])->name('booking.confirm');




