<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\web\HomeController@index')->name('/');
Route::get('/get-single-product/{id}', 'App\Http\Controllers\web\HomeController@getSingleProduct');
Route::get('/add-to-cart/{id}', 'App\Http\Controllers\web\HomeController@addToCart');
// Route::get('/products', 'App\Http\Controllers\web\HomeController@products')->name('products');
Route::get('/product-single/{id}', 'App\Http\Controllers\web\HomeController@productSingle')->name('product-single');
Route::get('/getTotalProductsCat', 'App\Http\Controllers\web\HomeController@getTotalProductsCat')->name('getTotalProductsCat');
Route::get('/getProductlistAjax', 'App\Http\Controllers\web\HomeController@getProductlistAjax')->name('getProductlistAjax');