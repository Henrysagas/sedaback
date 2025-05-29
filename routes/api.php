<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ZonaController;
use App\Http\Controllers\Api\CorteController;
use App\Http\Controllers\Api\EvidenciaController;
use App\Http\Controllers\Api\HistorialController;

// Rutas API RESTful
Route::apiResource('roles', RolController::class);
Route::apiResource('usuarios', UserController::class);
Route::apiResource('zonas', ZonaController::class);
Route::apiResource('cortes', CorteController::class);
Route::apiResource('historiales', HistorialController::class);

// Rutas personalizadas para Evidencias
Route::get('evidencias', [EvidenciaController::class, 'index']);
Route::post('evidencias', [EvidenciaController::class, 'store']);
Route::get('evidencias/{evidencia}', [EvidenciaController::class, 'show']);
Route::put('evidencias/{evidencia}', [EvidenciaController::class, 'update']);
Route::delete('evidencias/{evidencia}', [EvidenciaController::class, 'destroy']);

// Ruta especial para subir evidencia con imagen (archivo)
Route::post('subir-evidencia', [EvidenciaController::class, 'subirEvidencia']);
