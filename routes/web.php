<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EntrepreneurshipController;
use App\Http\Controllers\EntrepreneurshipDetailController;
use App\Http\Controllers\ClientEventController;
use App\Http\Controllers\ClientProductServiceController;
use App\Http\Controllers\ClientDetailsPSController;
use App\Http\Controllers\RegisterController;

// use App\Models\User; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [EventController::class, 'index'])->name('events.index');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () { Route::get('/dashboard', [HomeController::class, 'indexAdmin'], function () {return view('admin/index');})->name('dashboard');});

Route::get('/events', [ClientEventController::class, 'index'])->name('client.events.index');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/entrepreneurships/{id}', [EntrepreneurshipDetailController::class, 'show'])->name('entrepreneurships.show');

Route::get('/products', [ClientProductServiceController::class, 'indexProduct'])->name('client.products');
Route::get('/services', [ClientProductServiceController::class, 'indexService'])->name('client.services');

Route::get('/productt/{id}', [ClientDetailsPSController::class, 'showProduct'])->name('client.product_details');
Route::get('/service/{id}', [ClientDetailsPSController::class, 'showService'])->name('client.service_details');
Route::get('/sobreNosotros', function () {return view('client.sobre_nosotros');});
Route::post('/registerEmprendedor', [RegisterController::class, 'create'])->name('registerEmprendedor');
