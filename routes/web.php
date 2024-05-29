<?php

use App\Http\Controllers\BbsController;
use App\Http\Controllers\TovarController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;


Route::get('/', [BbsController::class, 'index'])->name('index');
Route::get('/category/{categoryId?}', [BbsController::class, 'index'])->name('tovarBycategory');
Auth::routes(); 
Route::get('/product/{bb}', [App\Http\Controllers\BbsController::class, 'product'])->name('product');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']) ->name('home'); 
Route::get('/search', [App\Http\Controllers\BbsController::class, 'search'])->name('search');
Route::get('/addToCart', [App\Http\Controllers\BbsController::class, 'addCart'])->name('addToCart');
Route::get('/addCart', [App\Http\Controllers\BbsController::class, 'addToCart'])->name('addCart');
Route::post('/makeOrder', [App\Http\Controllers\BbsController::class, 'makeOrder'])->name('makeOrder');
Route::post('/update-cart-quantity', [App\Http\Controllers\BbsController::class, 'updateCartQuantity'])->name('updateCartQuantity');
Route::delete('/removeCart', [App\Http\Controllers\BbsController::class, 'removeCart'])->name('removeCart');



Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_panel');

    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('tovar', App\Http\Controllers\Admin\TovarController::class);
    Route::resource('order', App\Http\Controllers\Admin\OrderController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});







