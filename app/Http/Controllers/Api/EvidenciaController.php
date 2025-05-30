<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Evidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvidenciaController extends Controller
{
    public function index() {
        return Evidencia::with('corte')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'corte_id' => 'required|exists:cortes,id',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
        ]);

        // Guardar imagen en storage/app/public/evidencias
        $ruta = $request->file('foto')->store('evidencias', 'public');

        // Crear evidencia con la ruta de la imagen
        $evidencia = Evidencia::create([
            'corte_id' => $request->corte_id,
            'foto_url' => $ruta,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
        ]);

        return response()->json([
            'mensaje' => 'Evidencia guardada correctamente',
            'evidencia' => $evidencia
        ], 201);
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
