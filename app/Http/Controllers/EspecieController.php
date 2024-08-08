<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;

class EspecieController extends Controller
{
    public function index()
    {
        $especies = Especie::all();
        return response()->json($especies);
    }

    public function atraccionesPorEspecie($id)
    {
        $especie = Especie::with('atracciones')->findOrFail($id);
        return response()->json($especie->atracciones);
    }

    public function calificacionPromedioPorEspecie($id)
    {
        $especie = Especie::with('atracciones.comentarios')->findOrFail($id);
        $promedio = $especie->atracciones->flatMap->comentarios->avg('calificación');
        return response()->json(['calificacion_promedio' => $promedio]);
    }
}
