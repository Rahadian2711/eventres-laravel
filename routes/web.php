<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;

// Homepage
Route::get('/', [EventController::class, 'index'])->name('home');

//Detail event
Route::get('/events/{slug}', [EventController::class, 'show'])
    ->name('events.show');

//payment page
Route::get('/payment/{order}', [PaymentController::class, 'show'])
    ->name('payment.show');

Route::post(
    '/payment/create/{order}',
    [PaymentController::class, 'createTransaction']
)
    ->name('payment.create')
    ->middleware('auth');

//Route Order
Route::post('/orders', [OrderController::class, 'store'])
    ->name('orders.store');


//Route Checkout
Route::middleware('auth')->group(function () {

    Route::post(
        '/checkout',
        [CheckoutController::class, 'store']
    )->name('checkout.store');

});

Route::post(
    '/midtrans/notification',
    [PaymentController::class, 'notification']
)->name('midtrans.notification');


// Breeze auth routes (sudah ada dari Breeze install)
require __DIR__.'/auth.php';