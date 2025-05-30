<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Corte;
use Illuminate\Http\Request;

class CorteController extends Controller
{
    public function index() {
        return Corte::with(['zona', 'tecnico'])->get();
    }

    public function store(Request $request) {
        return Corte::create($request->all());
    }

    public function show(Corte $corte) {
        return $corte->load(['zona', 'tecnico', 'evidencias', 'historial']);
    }

    public function update(Request $request, Corte $corte) {
        $corte->update($request->all());
        return $corte;
    }

    public function destroy(Corte $corte) {
        $corte->delete();
        return response()->noContent();
    }
}
