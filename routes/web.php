<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Middleware\AdminMiddleware;



Route::get('/', [RouteController::class, 'Home']) ->name('home');

Route::get('/prod/{id}', [RouteController::class, 'showProduct'])->name('prod.show');
Route::resource('products', 'App\Http\Controllers\ProductController');