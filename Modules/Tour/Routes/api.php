<?php

use Illuminate\Support\Facades\Route;
use Modules\Tour\Http\Controllers\Api\TourController;
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
    Route::apiResource('/products', TourController::class);
    Route::delete('/products/deleteImage/{id}', [TourController::class, 'deleteImage']);
    Route::put('/addImageToTour/{id}', [TourController::class, 'addImages']);
    Route::get('/getNonTranslatedTours', [TourController::class, 'getNonTranslatedTours']);
    Route::post('/translateNewTour', [TourController::class, 'translateNewTour']);
    Route::put('/updateTranslationOfTour/{id}', [TourController::class, 'receiveAndUpdateTourTranslation']);
});
