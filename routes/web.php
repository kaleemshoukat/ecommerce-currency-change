<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductsController::class, 'index'])->name('index');
Route::get('/change-currency/{id}', [ProductsController::class, 'changeCurrency'])->name('changeCurrency');
Route::post('/add-to-cart', [ProductsController::class, 'addToCart'])->name('addToCart');
