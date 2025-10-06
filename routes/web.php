<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;

// Основные страницы
Route::get('/', [HomeController::class, 'index']);
Route::view('/about', 'about');
Route::view('/contacts', 'contacts');
Route::view('/products', 'products');

// Новости
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'detail']);

// Product category pages
Route::get('/accelerometer', [ProductController::class, 'accelerometer']);
Route::get('/gyroscope', [ProductController::class, 'gyroscope']);
Route::get('/imu', [ProductController::class, 'imu']);

// Individual product pages
Route::get('/ACCEL/accelerometer/{id}', [ProductController::class, 'accelerometerProduct']);
Route::get('/GYROS/gyroscope/{name}', [ProductController::class, 'gyroscopeProduct']);
Route::get('/imu/{id}', [ProductController::class, 'imuProduct']);

// Alternative routes for backward compatibility
Route::get('/accel', [ProductController::class, 'accelerometer']);
Route::get('/gyros', [ProductController::class, 'gyroscope']);