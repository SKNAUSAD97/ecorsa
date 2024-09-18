<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function(){
    Route::post('addUser', [App\Http\Controllers\apiController::class, 'addUser'])->name('addUser');
    Route::get('delete-user/{id}', [App\Http\Controllers\apiController::class, 'deleteUser']);
    Route::get('user', [App\Http\Controllers\apiController::class, 'getUser']);
    Route::post('store-word', [App\Http\Controllers\apiController::class, 'storeWord'])->name('store-word');
    Route::get('get-word', [App\Http\Controllers\apiController::class, 'getWord'])->name('get-word');
    Route::get('product', [App\Http\Controllers\productController::class, 'product'])->name('product');
    // Category Section
    Route::post('add-category', [App\Http\Controllers\api\CategoryController::class, 'addCategory'])->name('add-category');
    Route::get('categories', [App\Http\Controllers\api\CategoryController::class, 'categories'])->name('categories');
    Route::get('delete-category/{id}', [App\Http\Controllers\api\CategoryController::class, 'deleteCategory'])->name('delete-category');
    // Subcategory Section
    Route::post('add-subcategory', [App\Http\Controllers\api\CategoryController::class, 'addSubCategory'])->name('add-subcategory');
    Route::get('subcategories', [App\Http\Controllers\api\CategoryController::class, 'subcategories'])->name('subcategories');
    Route::get('delete-subcategory/{id}', [App\Http\Controllers\api\CategoryController::class, 'deleteSubcategory'])->name('delete-subcategory');
    Route::get('get-subcategory-bycategoryid/{id}', [App\Http\Controllers\api\CategoryController::class, 'getSubcategoryByCategory'])->name('get-subcategory-bycategoryid');

    // Shop Section
    Route::post('add-shop', [App\Http\Controllers\api\CategoryController::class, 'addShop'])->name('add-shop');
    Route::get('shops', [App\Http\Controllers\api\CategoryController::class, 'shops'])->name('shops');
    Route::get('delete-shop/{id}', [App\Http\Controllers\api\CategoryController::class, 'deleteShop'])->name('delete-shop');

     // Product Section
     Route::post('add-product', [App\Http\Controllers\api\ProductController::class, 'addProduct'])->name('add-product');
     Route::get('products', [App\Http\Controllers\api\ProductController::class, 'products'])->name('products');
     Route::get('delete-product/{id}', [App\Http\Controllers\api\ProductController::class, 'deleteProduct'])->name('delete-product');
});

Route::post('login', [App\Http\Controllers\apiController::class, 'loginSubmit'])->name('login');
Route::post('loginNew', [App\Http\Controllers\apiController::class, 'loginSubmit'])->name('login');