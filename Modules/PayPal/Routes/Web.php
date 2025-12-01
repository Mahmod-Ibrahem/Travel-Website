<?php

use Illuminate\Support\Facades\Route;
use Modules\PayPal\Http\Controllers\PayPalController;

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

Route::middleware('paypal.config')->group(function () {
    Route::get('/payment/{id}', [PaypalController::class, 'createPayment'])->name('paypal.create');
    Route::get('/paypal/success', [PaypalController::class, 'successPayment'])->name('paypal.success');
    Route::get('/paypal/cancel', [PaypalController::class, 'cancelPayment'])->name('paypal.cancel');
});
