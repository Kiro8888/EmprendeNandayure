<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientEventController;
use App\Http\Controllers\ClientProductServiceController;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/Dashboard', function () {
        return view('admin/index');
    })->name('dashboard');
});


Route::get('/', function () {
    // $usuarios = User::all(); 
     return view('home');
    // return view('home', compact('usuarios'));
});

Route::get('/events', [ClientEventController::class, 'index'])->name('client.events.index');
Route::get('/products-services', [ClientProductServiceController::class, 'index'])->name('client.products_services.index');
