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

Route::put('dashboard/users/{user}/password', [App\Http\Controllers\Backend\User\UserPassword::class, 'update'])->name('dashboard.user.change.password');

Route::resource('dashboard/users', App\Http\Controllers\Backend\User\UserController::class)
->names([
    'index' => 'dashboard.user.index',
    'create' => 'dashboard.user.create',
    'store' => 'dashboard.user.store',
    'edit' => 'dashboard.user.edit',
    'update' => 'dashboard.user.update',
    'destroy' => 'dashboard.user.delete',
]);

Route::resource('dashboard/countries', App\Http\Controllers\Backend\Country\CountryController::class)
->names([
    'index' => 'dashboard.country.index',
    'create' => 'dashboard.country.create',
    'store' => 'dashboard.country.store',
    'edit' => 'dashboard.country.edit',
    'update' => 'dashboard.country.update',
    'destroy' => 'dashboard.country.delete',
]);

Route::resource('dashboard/states', App\Http\Controllers\Backend\State\StateController::class)
->names([
    'index' => 'dashboard.state.index',
    'create' => 'dashboard.state.create',
    'store' => 'dashboard.state.store',
    'edit' => 'dashboard.state.edit',
    'update' => 'dashboard.state.update',
    'destroy' => 'dashboard.state.delete',
]);


