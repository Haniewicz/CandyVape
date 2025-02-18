<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StorageController;

Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'index'])->name('index');  
    Route::get('/register', [AuthController::class, 'register_view']);  
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});


Route::group(['middleware' => 'auth'], function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/storage', [StorageController::class, 'index'])->name('storage');
    Route::get('/dashboard/storage/new_product', [StorageController::class, 'new_product_view'])->name('new_product');
});
