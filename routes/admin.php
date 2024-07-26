<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EntrepreneursController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;


Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('entrepreneurs', EntrepreneursController::class)->names('admin.entrepreneurs');
Route::resource('products', ProductController::class)->names('admin.products');
Route::resource('services', ServiceController::class)->names('admin.services');


