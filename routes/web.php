<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PancakeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ToppingController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SaleController;

// Route untuk Pancake
Route::resource('pancakes', PancakeController::class);

// Route untuk Customer
Route::resource('customers', CustomerController::class);

// Route untuk Topping
Route::resource('toppings', ToppingController::class);

// Route untuk Size
Route::resource('sizes', SizeController::class);

// Route untuk Sale
Route::resource('sales', SaleController::class);
