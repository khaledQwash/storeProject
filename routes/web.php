<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;



//dashboard routes

Route::get('admin', function () {
    return view('layouts.admin');
});
Route::get('admin/product/create', function () {
    $categories = DB::table('categories')->get();
    return view('admin.products.create', compact('categories'));
});
Route::get('admin/product/update', function () {
    return view('admin.products.update');
});

Route::get('admin/product', [ProductController::class, 'index']);
Route::post('admin/product/create', [ProductController::class, 'create']);
Route::post('admin/product/delete/{id}', [ProductController::class, 'destroy']);
Route::post('admin/product/update/{id}', [ProductController::class, 'edit']);
Route::post('admin/product/update', [ProductController::class, 'update']);


Route::get('admin/category/create', function () {
    return view('admin.categories.create');
});
Route::get('admin/category/update', function () {
    return view('admin.categories.update');
});

Route::get('admin/category', [CategoryController::class, 'index']);
Route::post('admin/category/create', [CategoryController::class, 'create']);
Route::post('admin/category/delete/{id}', [CategoryController::class, 'destroy']);
Route::post('admin/category/update/{id}', [CategoryController::class, 'edit']);
Route::post('admin/category/update', [CategoryController::class, 'update']);


//front page routes

Route::get('/', [FrontController::class, 'index']);
Route::post('/', [FrontController::class, 'showFromCategory']);
