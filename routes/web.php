<?php

use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';

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
Route::resource('', 'App\Http\Controllers\IndexController');

Route::resource('home', 'App\Http\Controllers\IndexController');

Route::resource('markets', 'App\Http\Controllers\MarketController');

Route::resource('users', 'App\Http\Controllers\UserController');

Route::resource('sales', 'App\Http\Controllers\SaleController');

Route::resource('types', 'App\Http\Controllers\TypeController');

