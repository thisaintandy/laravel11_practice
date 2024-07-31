<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Para makita ket di nakalog in
Route::get('/product', [ProductController::class,'index'])->name('product.index');
Route::get('/products', [ProductController::class,'showAll'])->name('products.showAll');

// Product routes
Route::middleware('auth')->group(function () {
    Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
    Route::post('/product', [ProductController::class,'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class,'edit'])->name('product.edit');
    Route::put('/product/{product}', [ProductController::class,'update'])->name('product.update'); 
    Route::delete('/product/{product}', [ProductController::class, 'delete'])->name('product.delete');
});

//Add to Cart na yan
Route::get('/cart', [CartController::class, 'viewCart'])->name('products.viewCart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('/buy', [CartController::class, 'buy'])->name('buy');


Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

require __DIR__.'/auth.php';
