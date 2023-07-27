<?php

use App\Http\Controllers\ComprasController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VapesController;
use App\Http\Controllers\VentasController;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('marcas', MarcaController::class);
Route::apiResource('vapes', VapesController::class);
Route::apiResource('usuarios', UsuariosController::class);
Route::apiResource('ventas', VentasController::class);
Route::apiResource('compras', ComprasController::class);
