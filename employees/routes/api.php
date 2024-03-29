<?php

use App\Http\Controllers\Api\EmployeeController;
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

Route::apiResource('employees', [EmployeeController::class])->names([
    'index' => 'api.employee.index',
    'create' => 'api.employee.create',
    'store' => 'api.employee.store',
    'edit' => 'api.employee.edit',
    'update' => 'api.employee.update',
    'destroy' => 'api.employee.delete',
]);
