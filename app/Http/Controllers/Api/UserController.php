<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::with('rol')->get();

        return response()->json([
            'message' => 'Lista de usuarios obtenida correctamente.',
            'data' => $usuarios
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $usuario = User::create($data);

        return response()->json([
            'message' => 'Usuario creado correctamente.',
            'data' => $usuario
        ], 201);
    }

    public function show(User $user)
    {
        $user->load('rol');

        return response()->json([
            'message' => 'Detalle del usuario obtenido correctamente.',
            'data' => $user
        ], 200);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->except('password'));

        return response()->json([
            'message' => 'Usuario actualizado correctamente.',
            'data' => $user
        ], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'Usuario eliminado correctamente.',
            'data' => null
        ], 200);
    }
}
