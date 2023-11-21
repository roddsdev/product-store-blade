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

Route::get('/', 'ProductsController@index')->name('main');

Route::resource('products', ProductsController::class);

Route::resource('manufacturers', ManufacturersController::class);

Route::resource('categories', CategoriesController::class);
