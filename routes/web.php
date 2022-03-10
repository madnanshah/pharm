<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

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
    return view('auth/login');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => 'auth'], function () {
    
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@dashboard');

    Route::get('products', 'App\Http\Controllers\ProductController@index');
    Route::get('products/add', 'App\Http\Controllers\ProductController@add')->name('products.add');
    Route::post('products/store', 'App\Http\Controllers\ProductController@store');
    Route::get('products/all', 'App\Http\Controllers\ProductController@getAll')->name('products.all');

    Route::get('vendorProducts', 'App\Http\Controllers\VendorProductController@index');
    Route::get('vendorProducts/all', 'App\Http\Controllers\VendorProductController@all')->name('vendorProducts.all');
});