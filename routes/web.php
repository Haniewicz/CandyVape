<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\FlavourController;


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
    Route::post('/dashboard/storage/new_product', [StorageController::class, 'new_product'])->name('new_product_post');
    Route::get('/dashboard/storage/new_category', [CategoryController::class, 'index'])->name('new_category');
    Route::post('/dashboard/storage/new_category', [CategoryController::class, 'insert'])->name('new_category_post');
    Route::get('dashboard/storage/new_brand', [BrandController::class, 'index'])->name('new_brand');
    Route::post('dashboard/storage/new_brand', [BrandController::class, 'insert'])->name('new_brand_post');
    Route::get('dashboard/storage/new_flavour', [FlavourController::class, 'index'])->name('new_flavour');
    Route::post('dashboard/storage/new_flavour', [FlavourController::class, 'insert'])->name('new_flavour_post');

    //AJAX API calls
    Route::post('/dashboard/storage/update_product', [StorageController::class, 'update_product'])->name('update_product');
    Route::post('/dashboard/storage/delete_product', [StorageController::class, 'delete_product'])->name('delete_product');
    Route::post('/dashboard/storage/get_brands', [StorageController::class, 'get_brands'])->name('get_brands');
    Route::post('/dashboard/storage/get_flavours', [StorageController::class, 'get_flavours'])->name('get_flavours');
});
