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
Route::resource('duenos',\App\Http\Controllers\DuenosController::class);
Route::resource('equipos',\App\Http\Controllers\EquiposController::class);
Route::resource('registros',\App\Http\Controllers\RegistrosController::class);
