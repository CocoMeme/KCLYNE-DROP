<?php

use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;



Route::get('/home', function () {
    $products = Product::all();
    return view('home', ['products' => $products]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//Route::post('/create-product', [ProductController::class, 'createProduct']);
Route::get('/home', [ProductController::class, 'showProducts']);

Route::get('/', [ProductController::class, 'showProducts'])->name('product.showProducts');
Route::post('/create-product', [ProductController::class, 'createProduct'])->name('product.create');


// FOR USERS
Route::get('/login-page', function () {
    return view('Users/login-page');
});

Route::get('/register-page', function () {
    return view('Users/register-page');
});


// FOR ADMIN
Route::get('/create-product', function () {
    return view('Products/create');
});

