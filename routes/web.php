<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\SeaShoreControllers;
use App\Http\Controllers\TailorMadeController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DaytoursController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home'])->name('home');
    /* DayTours Controller*/
Route::get('/Daytours', [DaytoursController::class, 'index'])->name('DayTours.index');
Route::get('/Daytours/{Category:slug}', [DaytoursController::class, 'view'])->name('DayTours.view');
Route::get('/Daytours/{Category:slug}/{Tour:title}', [DaytoursController::class, 'Tour'])->name('DayTours.Tour');
/* TourPackages Controller*/

Route::get('/TourPackages', [\App\Http\Controllers\TourPackageController::class, 'index'])->name('TourPackages.index');
Route::get('/TourPackages/{Category:slug}', [\App\Http\Controllers\TourPackageController::class, 'view'])->name('TourPackages.view');
Route::get('/TourPackages/{Category:slug}/{Tour:title}', [\App\Http\Controllers\TourPackageController::class, 'Tour'])->name('TourPackages.Tour');

/* SafariAdventures Controller*/
Route::get('/SafariAdventuresTours', [\App\Http\Controllers\SafariAdventures::class,'index'])->name('SafariAdventures.index');
Route::get('/SafariAdventuresTours/{Tour:slug}', [\App\Http\Controllers\SafariAdventures::class,'Tour'])->name('SafariAdventures.Tour');

/*SeaShoreAdventrues Controllers*/

Route::get('/SeaShoreTours', [SeaShoreControllers::class, 'index'])->name('SeaShoreTours.index');

Route::get('/SeaShoreTours/{Tour:slug}', [\App\Http\Controllers\SeaShoreControllers::class,'Tour'])->name('SeaShoreTours.Tour');


Route::get('/BestDestination/{location}', [\App\Http\Controllers\BestDController::class, 'index'])->name('BestDestination.index');
/* Tailor Made Tours */

Route::get('/TailorMade',[TailorMadeController::class,'index'])->name('TailorMade.index');
Route::post('/TailorMade/submit',[TailorMadeController::class,'submitting'])->name('TailorMade.post');

/* About */
Route::get('/about', function () {
    return view('about');
})->name('about');

/* TransferService */

Route::get("/TransferService",[TransferController::class,'index'])->name('Transfer.index');
Route::post("/TransferService/submit",[TransferController::class,'submitting'])->name('Transfer.post');
/* Contact Form */
Route::get('/Contact',[\App\Http\Controllers\ContactController::class,'index'])->name('Contact.index');
Route::post('/Contact/submit',[\App\Http\Controllers\ContactController::class,'submitting'])->name('Contact.post');
/*Booking Controller*/
Route::post('/checkout/{tour}',[\App\Http\Controllers\BookingController::class,'index'])->name('booking.checkout'); //tour should be as paramater passed to controller

Route::post('/checkout/{tour}/confirm',[\App\Http\Controllers\BookingController::class,'confirm'])->name('booking.confirm');

/*Blog*/
Route::resource('/Blog',BlogController::class)->only(['index','show']);
Route::get('/Blog/{Blog}/{attract}',[BlogController::class,'Attraction'])->name('Attraction');

/*Layover Tours*/
Route::get('/LayoverTours',[\App\Http\Controllers\LayoverController::class,'index'])->name('LayoverTours.index');
Route::get('/LayoverTours/{Tour:slug}',[\App\Http\Controllers\LayoverController::class,'Tour'])->name('LayoverTours.Tour');

/*TourCreation Controller*/

Route::get('/TourCreation',[\App\Http\Controllers\TourCreationController::class,'index'])->name('TourCreation.index');
Route::post('/TourCreation/submit',[\App\Http\Controllers\TourCreationController::class,'show'])->name('TourCreation.show');



/*Paypal Controller */

Route::get('/paypal/create', [PaypalController::class, 'createPayment'])->name('paypal.create');
Route::get('/paypal/success', [PaypalController::class, 'successPayment'])->name('paypal.success');
Route::get('/paypal/cancel', [PaypalController::class, 'cancelPayment'])->name('paypal.cancel');


