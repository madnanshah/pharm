<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', 'App\Http\Controllers\DashboardController@dashboard');
Route::get('products', 'App\Http\Controllers\Products\ProductsController@index');
Route::get('products/add', 'App\Http\Controllers\Products\ProductsController@add')->name('products.add');
Route::post('products/store', 'App\Http\Controllers\Products\ProductsController@store');

Route::get('products/all', 'App\Http\Controllers\Products\ProductsController@getAllProducts')->name('products.all');