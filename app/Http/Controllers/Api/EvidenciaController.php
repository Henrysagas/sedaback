<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvidenciaController extends Controller
{
    public function index()
    {
        $evidencias = Evidencia::with('corte')->get();

        return response()->json([
            'message' => 'Lista de evidencias obtenida correctamente.',
            'data' => $evidencias
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'corte_id' => 'required|exists:cortes,id',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
        ]);

        $ruta = $request->file('foto')->store('evidencias', 'public');

        $evidencia = Evidencia::create([
            'corte_id' => $request->corte_id,
            'foto_url' => $ruta,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ]);

        return response()->json([
            'message' => 'Evidencia guardada correctamente.',
            'data' => $evidencia
        ], 201);
    }

    public function show(Evidencia $evidencia)
    {
        $evidencia->load('corte');

        return response()->json([
            'message' => 'Detalle de la evidencia obtenido correctamente.',
            'data' => $evidencia
        ], 200);
    }

    public function update(Request $request, Evidencia $evidencia)
    {
        $evidencia->update($request->all());

        return response()->json([
            'message' => 'Evidencia actualizada correctamente.',
            'data' => $evidencia
        ], 200);
    }

    public function destroy(Evidencia $evidencia)
    {
        $evidencia->delete();

        return response()->json([
            'message' => 'Evidencia eliminada correctamente.',
            'data' => null
        ], 200);
    }
}
