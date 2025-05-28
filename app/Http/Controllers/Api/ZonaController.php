<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
public function index() {
        return Zona::all();
    }

    public function store(Request $request) {
        return Zona::create($request->all());
    }

    public function show(Zona $zona) {
        return $zona;
    }

    public function update(Request $request, Zona $zona) {
        $zona->update($request->all());
        return $zona;
    }

    public function destroy(Zona $zona) {
        $zona->delete();
        return response()->noContent();
    }

}
