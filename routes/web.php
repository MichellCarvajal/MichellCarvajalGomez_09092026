<?php

use App\Http\Controllers\ElectroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Landing & Shop routes (Electro Template)
Route::get('/', [ElectroController::class, 'index'])->name('home');
Route::get('/shop', [ElectroController::class, 'shop'])->name('shop');
Route::get('/product-details', [ElectroController::class, 'single'])->name('single');
Route::get('/bestseller', [ElectroController::class, 'bestseller'])->name('bestseller');
Route::get('/cart', [ElectroController::class, 'cart'])->name('cart');
Route::post('/cart/update', [ElectroController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [ElectroController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [ElectroController::class, 'checkout'])->name('checkout');
Route::get('/contact', [ElectroController::class, 'contact'])->name('contact');
Route::get('/404', [ElectroController::class, 'notfound'])->name('notfound');

// Admin Dashboard (adminHMD Template)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
