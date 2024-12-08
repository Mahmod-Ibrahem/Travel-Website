<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/products', ProductController::class);
    Route::delete('/products/deleteImage/{id}', [ProductController::class, 'deleteImage']);
});    Route::put('/addImageToTour/{id}', [ProductController::class, 'addImages']);

Route::post('/login', [AuthController::class, 'login']);


Route::post('test-upload', [\App\Http\Controllers\TestController::class, 'testUpload']);
