<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->middleware('guest');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/chats', [ChatController::class, 'index'])->name('chats');
    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
    Route::get('/orders/info/{id}', [OrderController::class, 'info'])->name('orders.info');
    
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::get('/services/info/{id}', [ServiceController::class, 'info_id'])->name('service.info');
    Route::get('/services/info', [ServiceController::class, 'info'])->name('services.info');
    Route::get('/services/add_to_cart/{id}', [ServiceController::class, 'add_to_cart'])->name('services.add_to_cart');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');
    Route::put('/cart/{service}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{service}', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
