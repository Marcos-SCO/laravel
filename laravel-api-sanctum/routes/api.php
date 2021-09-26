<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Student
use \App\Http\Controllers\StudentController;

Route::post('/register', [StudentController::class, 'store']);
Route::post('/login', [StudentController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', [StudentController::class, 'profile']);
    Route::delete('/logout', [StudentController::class, 'destroy']);
    
    // Project
    Route::apiResource('/project',\App\Http\Controllers\ProjectController::class);
});

// Route::apiResource('/register', \App\Http\Controllers\StudentController::class);