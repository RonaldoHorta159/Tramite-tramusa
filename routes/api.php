<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DocumentoController;
use App\Http\Controllers\Api\SeguimientoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('documentos', DocumentoController::class);
Route::apiResource('documentos.seguimientos', SeguimientoController::class)
    ->shallow();
