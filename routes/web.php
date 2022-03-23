<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/redirect', [HomeController::class, 'redirect'])->name('home.redirect');
Route::get('/', [HomeController::class, 'index'])->name('home');

// categories
Route::middleware('auth')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/trashed-categories', [CategoryController::class, 'trash'])->name('categories.trashed');
    Route::get('/trashed-categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('/trashed-categories/{category}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
});

// products
Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/trashed-products', [ProductController::class, 'trash'])->name('products.trashed');
    Route::get('/trashed-products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('/trashed-products/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');
});

// sizes
Route::middleware('auth')->group(function () {
    Route::get('/sizes', [SizeController::class, 'index'])->name('sizes.index');
    Route::get('/sizes/create', [SizeController::class, 'create'])->name('sizes.create');
    Route::post('/sizes', [SizeController::class, 'store'])->name('sizes.store');
    Route::get('/sizes/{size}', [SizeController::class, 'show'])->name('sizes.show');
    Route::get('/sizes/{size}/edit', [SizeController::class, 'edit'])->name('sizes.edit');
    Route::patch('/sizes/{size}', [SizeController::class, 'update'])->name('sizes.update');
    Route::delete('/sizes/{size}', [SizeController::class, 'destroy'])->name('sizes.destroy');
    Route::get('/trashed-sizes', [SizeController::class, 'trash'])->name('sizes.trashed');
    Route::get('/trashed-sizes/{size}/restore', [SizeController::class, 'restore'])->name('sizes.restore');
    Route::delete('/trashed-sizes/{size}/delete', [SizeController::class, 'delete'])->name('sizes.delete');
});

// colors
Route::middleware('auth')->group(function () {
    Route::get('/colors', [ColorController::class, 'index'])->name('colors.index');
    Route::get('/colors/create', [ColorController::class, 'create'])->name('colors.create');
    Route::post('/colors', [ColorController::class, 'store'])->name('colors.store');
    Route::get('/colors/{color}', [ColorController::class, 'show'])->name('colors.show');
    Route::get('/colors/{color}/edit', [ColorController::class, 'edit'])->name('colors.edit');
    Route::patch('/colors/{color}', [ColorController::class, 'update'])->name('colors.update');
    Route::delete('/colors/{color}', [ColorController::class, 'destroy'])->name('colors.destroy');
    Route::get('/trashed-colors', [ColorController::class, 'trash'])->name('colors.trashed');
    Route::get('/trashed-colors/{color}/restore', [ColorController::class, 'restore'])->name('colors.restore');
    Route::delete('/trashed-colors/{color}/delete', [ColorController::class, 'delete'])->name('colors.delete');
});

// colors
Route::middleware('auth')->group(function () {
    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');
    Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tags.edit');
    Route::patch('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
    Route::get('/trashed-tags', [TagController::class, 'trash'])->name('tags.trashed');
    Route::get('/trashed-tags/{tag}/restore', [TagController::class, 'restore'])->name('tags.restore');
    Route::delete('/trashed-tags/{tag}/delete', [TagController::class, 'delete'])->name('tags.delete');
});
