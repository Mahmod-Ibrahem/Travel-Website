<?php

use Illuminate\Support\Facades\Route;
use Modules\Tour\Http\Controllers\DayTourController;
use Modules\Tour\Http\Controllers\TourPackageController;

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

Route::group([], function () {
    /* DayTours Controller*/
    Route::get('/day-tours', [DayTourController::class, 'index'])->name('day-tours.index');
    Route::get('/day-tours/{Tour:title}', [DayTourController::class, 'view'])->name('day-tours.view');
    /* TourPackages Controller*/

    Route::get('/tour-packages', [TourPackageController::class, 'index'])->name('tour-packages.index');
    Route::get('/tour-packages/{Tour:title}', [TourPackageController::class, 'view'])->name('tour-packages.view');
});
