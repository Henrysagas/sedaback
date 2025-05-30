<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index()
    {
        $historiales = Historial::with(['corte', 'tecnico'])->get();

        return response()->json([
            'message' => 'Lista de historiales obtenida correctamente.',
            'data' => $historiales
        ], 200);
    }

    public function store(Request $request)
    {
        $historial = Historial::create($request->all());

        return response()->json([
            'message' => 'Historial creado correctamente.',
            'data' => $historial
        ], 201);
    }

    public function show(Historial $historial)
    {
        $historial->load(['corte', 'tecnico']);

        return response()->json([
            'message' => 'Detalle del historial obtenido correctamente.',
            'data' => $historial
        ], 200);
    }

    public function update(Request $request, Historial $historial)
    {
        $historial->update($request->all());

        return response()->json([
            'message' => 'Historial actualizado correctamente.',
            'data' => $historial
        ], 200);
    }

    public function destroy(Historial $historial)
    {
        $historial->delete();

        return response()->json([
            'message' => 'Historial eliminado correctamente.',
            'data' => null
        ], 200);
    }
}
