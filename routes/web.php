<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
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

Route::get('/create', function () {
    return view('create');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/category_cr', function () {
    return view('create_category');
});


Route::get('/search',[PostController::class,'search']);

Route::resource('/post',PostController::class);

Route::resource('/category',CategoryController::class);