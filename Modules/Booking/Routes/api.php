<?php

use Illuminate\Support\Facades\Route;
use Modules\Booking\Http\Controllers\Api\BookingController;

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
    Route::apiResource('bookings', BookingController::class)->names('bookings');
});
 
// // Routes for admin panel (without auth middleware for now)
// Route::prefix('bookings')->group(function () {
//     Route::get('/', [BookingController::class, 'index']);
//     Route::get('/{id}', [BookingController::class, 'show']);
//     Route::put('/{id}', [BookingController::class, 'update']);
//     Route::post('/{id}', [BookingController::class, 'update']); // For _method PUT
//     Route::delete('/{id}', [BookingController::class, 'destroy']);
// });
