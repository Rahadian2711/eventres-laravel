<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;

// Homepage
Route::get('/', [EventController::class, 'index'])->name('home');

// Artist routes
Route::get('/artis', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artis/{slug}', [ArtistController::class, 'show'])->name('artists.show');

// Konser page
Route::get('/konser', [EventController::class, 'concerts'])->name('concerts.index');

//Detail event
Route::get('/events/{slug}', [EventController::class, 'show'])
    ->name('events.show');

//payment page
Route::get('/payment/{order}', [PaymentController::class, 'show'])
    ->name('payment.show');

Route::middleware('auth')->group(function () {
    Route::post('/payment/{order}/charge', [PaymentController::class, 'charge'])
        ->name('payment.charge');

    Route::get('/payment/{order}/status', [PaymentController::class, 'checkStatus'])
        ->name('payment.status');
});

//Route Order
Route::post('/orders', [OrderController::class, 'store'])
    ->name('orders.store');


//Route Checkout
Route::middleware('auth')->group(function () {

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Profil
    Route::get('/profil',           [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profil/update',   [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // Tiket Saya
    Route::prefix('tiket-saya')->name('tickets.')->group(function () {
        Route::get('/',         [TicketController::class, 'index'])->name('index');
        Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');
    });

    // Riwayat Pembayaran
    Route::prefix('riwayat-pembayaran')->name('history.')->group(function () {
        Route::get('/',        [OrderHistoryController::class, 'index'])->name('index');
        Route::get('/{order}', [OrderHistoryController::class, 'show'])->name('show');
    });

});

Route::post(
    '/midtrans/notification',
    [PaymentController::class, 'notification']
)->name('midtrans.notification');


// Breeze auth routes (sudah ada dari Breeze install)
require __DIR__.'/auth.php';