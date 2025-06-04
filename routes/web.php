<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;

use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome/Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->middleware('guest');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/chats', [ChatController::class, 'index'])->name('chats');
    Route::get('/chat/{id}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/message/{id}', [ChatController::class, 'storeMessage'])->name('chat.storeMessage');
    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
    Route::get('/orders/info/{id}', [OrderController::class, 'info'])->name('orders.info');
    Route::delete('/orders/destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::get('/services/info/{id}', [ServiceController::class, 'info_id'])->name('service.info');
    Route::get('/services/info', [ServiceController::class, 'info'])->name('services.info');
    Route::get('/services/add_to_cart/{id}', [ServiceController::class, 'add_to_cart'])->name('services.add_to_cart');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart', [CartController::class, 'calculate'])->name('cart.calculate');
    Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');
    Route::put('/cart/{service_id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{service_id}', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['admin', 'verified'])->group(function () {
    Route::get('/admin_panel', [AdminController::class, 'index'])->name('admin_panel.index');
    Route::get('/admin_panel/order/{id}', [AdminController::class, 'show'])->name('admin_panel.order.show');
});

require __DIR__ . '/auth.php';
