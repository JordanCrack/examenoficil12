<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_atraccion' => 'required|exists:atraccion,id',
            'nombre_usuario' => 'required|max:50',
            'calificación' => 'required|integer|between(1, 5)',
            'detalles' => 'required|max:100',
        ]);

        Comentario::create($request->all());

        return response()->json(['message' => 'Comentario guardado con éxito'], 201);
    }

    public function comentariosEntreValores($min, $max)
    {
        $comentarios = Comentario::whereBetween('calificación', [$min, $max])->get();
        return response()->json($comentarios);
    }

    public function cantidadComentariosAtraccion($id)
    {
        $cantidad = Comentario::where('id_atraccion', $id)->count();
        return response()->json(['cantidad' => $cantidad]);
    }
}
