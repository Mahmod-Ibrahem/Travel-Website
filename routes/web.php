<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DaytoursController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PopularDestController;

Route::get('/', [HomeController::class,'home'])->name('home');
Route::resource('/SeaShore', \App\Http\Controllers\SeaShoreTours::class);
Route::resource('/Daytours', DaytoursController::class);
Route::resource('/TourPackages', \App\Http\Controllers\TourPackageController::class);
Route::resource('/SafariAdventures', \App\Http\Controllers\SafariAdventures::class);
Route::get('Tours/{tour}', [DaytoursController::class, 'Tour'])->name('Tour');
