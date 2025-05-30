<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index() {
        return Rol::all();
    }

    public function store(Request $request) {
        return Rol::create($request->all());
    }

    public function show(Rol $rol) {
        return $rol;
    }

    public function update(Request $request, Rol $rol) {
        $rol->update($request->all());
        return $rol;
    }

    public function destroy(Rol $rol) {
        $rol->delete();
        return response()->noContent();
    }
}
