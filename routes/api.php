<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'getUser']);
    Route::apiResource('/categories', CategoryController::class);
    Route::get('/getNonTranslatedCategories', [CategoryController::class, 'getNonTranslatedCategories']);
    Route::post('/translateNewCategory', [CategoryController::class, 'translateNewCategory']);
    Route::put('/updateTranslationOfCategory/{id}', [CategoryController::class, 'receiveAndUpdateCategoryTranslation']);
    Route::apiResource('/products', ProductController::class);
    Route::delete('/products/deleteImage/{id}', [ProductController::class, 'deleteImage']);
    Route::put('/addImageToTour/{id}', [ProductController::class, 'addImages']);
    Route::get('/getNonTranslatedTours', [ProductController::class, 'getNonTranslatedTours']);
    Route::post('/translateNewTour', [ProductController::class, 'translateNewTour']);
    Route::put('/updateTranslationOfTour/{id}', [ProductController::class, 'receiveAndUpdateTourTranslation']);
    /* Faq*/
});

Route::post('/login', [AuthController::class, 'login']);
