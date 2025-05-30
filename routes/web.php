<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Controladores API
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ZonaController;
use App\Http\Controllers\Api\CorteController;
use App\Http\Controllers\Api\EvidenciaController;
use App\Http\Controllers\Api\HistorialController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

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
Route::post('subir-evidencia', [EvidenciaController::class, 'subirEvidencia']);

require __DIR__.'/auth.php';
