<?php

use Illuminate\Support\Facades\Route;


/* About */

Route::get('/about', function () {
    return view('about');
})->name('about');
