<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add-products', function () {
    $categories = Category::all()->pluck('name','id');
    return view('/add-products', ['categories' => $categories]);
});
//Route::view('/add-products','add-products');
Route::get('/index', [App\Http\Controllers\ProductController::class, 'index'])->name('product-listing');
Route::post('/product/get-sub-products', [App\Http\Controllers\ProductController::class, 'getSubCategory'])->name('/product/get-sub-products');
Route::get('/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'editProductView']);
Route::get('/product/{id}/delete', [App\Http\Controllers\ProductController::class, 'deleteProduct']);
Route::post('/save', [App\Http\Controllers\ProductController::class, 'saveProduct'])->name('save');
Route::post('/product/{id}/update', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('save');
