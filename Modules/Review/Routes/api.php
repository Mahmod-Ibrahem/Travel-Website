<?php

use Illuminate\Support\Facades\Route;
use Modules\Review\Http\Controllers\Api\ReviewController;

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
    Route::apiResource('reviews', ReviewController::class)->names('review');
});
