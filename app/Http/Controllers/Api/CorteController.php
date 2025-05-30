<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Corte;
use Illuminate\Http\Request;

class CorteController extends Controller
{
    public function index()
    {
        $cortes = Corte::with(['zona', 'tecnico'])->get();

        return response()->json([
            'message' => 'Lista de cortes obtenida correctamente.',
            'data' => $cortes
        ], 200);
    }

    public function store(Request $request)
    {
        $corte = Corte::create($request->all());

        return response()->json([
            'message' => 'Corte creado correctamente.',
            'data' => $corte
        ], 201);
    }

    public function show(Corte $corte)
    {
        $corte->load(['zona', 'tecnico', 'evidencias', 'historial']);

        return response()->json([
            'message' => 'Detalle del corte obtenido correctamente.',
            'data' => $corte
        ], 200);
    }

    public function update(Request $request, Corte $corte)
    {
        $corte->update($request->all());

        return response()->json([
            'message' => 'Corte actualizado correctamente.',
            'data' => $corte
        ], 200);
    }

    public function destroy(Corte $corte)
    {
        $corte->delete();

        return response()->json([
            'message' => 'Corte eliminado correctamente.',
            'data' => null
        ], 200);
    }
}
