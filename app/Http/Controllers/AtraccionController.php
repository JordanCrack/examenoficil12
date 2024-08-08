<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraccion;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraccion;

class AtraccionController extends Controller
{
    public function index()
    {
        $atracciones = Atraccion::with('especie')->get();

        foreach ($atracciones as $atraccion) {
            $atraccion->calificacion_promedio = $atraccion->calificacionPromedio();
        }

        return view('atracciones.index', compact('atracciones'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:50',
            'descripcion' => 'required|max:50',
            'id_especie' => 'required|exists:especie,id'
        ]);

        $atraccion = Atraccion::findOrFail($id);
        $atraccion->update($request->all());

        return response()->json(['message' => 'Atracción actualizada con éxito'], 200);
    }
}
