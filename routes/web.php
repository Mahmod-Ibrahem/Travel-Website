<?php

use App\Http\Controllers\SeaShoreControllers;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DaytoursController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PopularDestController;

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
