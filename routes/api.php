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

// Ruta básica para probar que las API funcionan
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Agregar aquí las rutas para los roles y permisos
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

Route::middleware('auth:api')->group(function () {
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('permissions', PermissionController::class);
});
