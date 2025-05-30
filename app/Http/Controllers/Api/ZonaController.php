<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    public function index()
    {
        $zonas = Zona::all();

        return response()->json([
            'message' => 'Lista de zonas obtenida correctamente.',
            'data' => $zonas
        ], 200);
    }

    public function store(Request $request)
    {
        $zona = Zona::create($request->all());

        return response()->json([
            'message' => 'Zona creada correctamente.',
            'data' => $zona
        ], 201);
    }

    public function show(Zona $zona)
    {
        return response()->json([
            'message' => 'Detalle de la zona obtenido correctamente.',
            'data' => $zona
        ], 200);
    }

    public function update(Request $request, Zona $zona)
    {
        $zona->update($request->all());

        return response()->json([
            'message' => 'Zona actualizada correctamente.',
            'data' => $zona
        ], 200);
    }

    public function destroy(Zona $zona)
    {
        $zona->delete();

        return response()->json([
            'message' => 'Zona eliminada correctamente.',
            'data' => null
        ], 200);
    }
}
