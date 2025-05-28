<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evidencia;
use Illuminate\Http\Request;

class EvidenciaController extends Controller
{
public function index() {
        return Evidencia::with('corte')->get();
    }

    public function store(Request $request) {
        return Evidencia::create($request->all());
    }

    public function show(Evidencia $evidencia) {
        return $evidencia->load('corte');
    }

    public function update(Request $request, Evidencia $evidencia) {
        $evidencia->update($request->all());
        return $evidencia;
    }

    public function destroy(Evidencia $evidencia) {
        $evidencia->delete();
        return response()->noContent();
    }

}
