<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Users
// Route::apiResource('/users', [\App\Http\Controllers\UserController::class]);

Route::get('/', [ProductController::class, 'index']);
Route::get('/detail/{id}', [ProductController::class, 'show'])->name('productDetail');
Route::get('/search', [ProductController::class, 'search'])->name('searchProduct');
Route::get('/cartList', [ProductController::class, 'cartList'])->name('cartList');
Route::post('/addToCart', [ProductController::class, 'addToCart'])->name('addToCart');
Route::post('/removeFromCart/{id}', [ProductController::class, 'removeProduct'])->name('removeProduct');

Route::get('/login',  function () {
    return view('login');
});
Route::get('/logout',  [UserController::class, 'destroy']);
Route::post('/login', [UserController::class, 'login'])->name('login');
