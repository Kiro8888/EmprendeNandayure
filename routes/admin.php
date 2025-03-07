<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EntrepreneurshipsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\WaitingEntrepreuserController;
use App\Http\Controllers\Admin\ControlFoodController; // Asegúrate de que esta línea sea correcta
use App\Http\Controllers\Admin\OpenAIController;

Route::get('/', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');
// Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'create', 'store'])->names('admin.users');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('entrepreneurship', EntrepreneurshipsController::class)->names('admin.entrepreneurships');
Route::resource('products', ProductController::class)->names('admin.products');
Route::resource('services', ServiceController::class)->names('admin.services');
Route::resource('events', EventController::class)->names('admin.events');

Route::resource('waiting_entrepreneur', WaitingEntrepreuserController::class)->names('admin.waiting_entrepreneur');


Route::post('admin/waiting-entrepreneur/{user}/activate', [WaitingEntrepreuserController::class, 'activate'])->name('admin.waiting_entrepreneur.activate');
Route::delete('admin/waiting-entrepreneur/{user}', [WaitingEntrepreuserController::class, 'destroy'])->name('admin.waiting_entrepreneur.destroy');

Route::get('/controlfood', [ControlFoodController::class, 'index'])->name('admin.control_food');

Route::post('/api/openai', [OpenAIController::class, 'getResponse']);

