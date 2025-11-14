<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    /*Blog*/
    Route::get('/Blog', [\Modules\Blog\Http\Controllers\Web\BlogController::class, 'index'])->name('Blog.index');
    Route::get('/Blog/{city:slug}', [\Modules\Blog\Http\Controllers\Web\BlogController::class, 'show'])->name('Blog.show');
    Route::get('/Blog/{city:slug}/{blog:slug}', [\Modules\Blog\Http\Controllers\Web\BlogController::class, 'Attraction'])->name('Blog.attraction');
});
