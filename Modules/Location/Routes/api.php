<?php

use Illuminate\Support\Facades\Route;
use Modules\Location\Http\Controllers\Api\LocationController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->group(function () {
    /* Locations */
    Route::apiResource('/locations', LocationController::class);
    Route::get('/get-location-for-translation/{location}', [LocationController::class, 'getLocationForTranslation']);
    Route::put('/create-location-translation/{location}', [LocationController::class, 'createLocationTranslation']);
});
