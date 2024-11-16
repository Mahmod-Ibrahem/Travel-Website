<?php

use App\Http\Controllers\DaytoursController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PopularDestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'home'])->name('home');
Route::resource('/Daytours', DaytoursController::class);
Route::get('Tours/{tour}', [DaytoursController::class, 'Tour'])->name('Tour');
Route::get('/PoularDestinationTours/{Dest}',[PopularDestController::class,'popDest'])->name('PopularDest');
