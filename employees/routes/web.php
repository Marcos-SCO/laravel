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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('dashboard/users', App\Http\Controllers\Backend\User\UserController::class)
->names([
    'index' => 'dashboard.user.index',
    'create' => 'dashboard.user.create',
    'store' => 'dashboard.user.store',
    'edit' => 'dashboard.user.edit',
    'update' => 'dashboard.user.update',
    'destroy' => 'dashboard.user.delete',
]);

Route::put('dashboard/users/{user}/password', [App\Http\Controllers\Backend\User\UserPassword::class, 'update'])->name('dashboard.user.change.password');
