<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::all();

        return response()->json([
            'message' => 'Lista de roles obtenida correctamente.',
            'data' => $roles
        ], 200);
    }

    public function store(Request $request)
    {
        $rol = Rol::create($request->all());

        return response()->json([
            'message' => 'Rol creado correctamente.',
            'data' => $rol
        ], 201);
    }

    public function show(Rol $rol)
    {
        return response()->json([
            'message' => 'Detalle del rol obtenido correctamente.',
            'data' => $rol
        ], 200);
    }

    public function update(Request $request, Rol $rol)
    {
        $rol->update($request->all());

        return response()->json([
            'message' => 'Rol actualizado correctamente.',
            'data' => $rol
        ], 200);
    }

    public function destroy(Rol $rol)
    {
        $rol->delete();

        return response()->json([
            'message' => 'Rol eliminado correctamente.',
            'data' => null
        ], 200);
    }
}
