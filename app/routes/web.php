<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\AppController;

Route::get('/', [AppController::class, 'home'])->name('home');
Route::get('/services', [AppController::class, 'services'])->name('services');
Route::get('/about', [AppController::class, 'about'])->name('about');

Route::get('/checkup', [AppController::class, 'checkup'])->name('checkup');
Route::get('/product/{id}', [AppController::class, 'showProduct'])->name('product.show');
