<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
 public function index() {
        return Historial::with(['corte', 'tecnico'])->get();
    }

    public function store(Request $request) {
        return Historial::create($request->all());
    }

    public function show(Historial $historial) {
        return $historial->load(['corte', 'tecnico']);
    }

    public function update(Request $request, Historial $historial) {
        $historial->update($request->all());
        return $historial;
    }

    public function destroy(Historial $historial) {
        $historial->delete();
        return response()->noContent();
    }
}
