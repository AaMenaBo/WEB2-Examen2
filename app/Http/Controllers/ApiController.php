<?php

namespace App\Http\Controllers;

use App\Http\Resources\EspecieResource;
use App\Models\Atraccion;
use App\Models\Comentario;
use App\Models\Especie;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'atraccion_id' => 'required|exists:atraccions,id',
            'nombre_usuario' => 'required',
            'calificacion' => 'required',
            'detalles' => 'required',
        ]);
        $comentario = new Comentario();
        $comentario->fill($data);
        if (!$comentario->save()) {
            return response()->json(['message' => 'Error al crear el comentario'], 500);
        }
        return response()->json(['message' => 'Comentario creado'], 201);
    }
    public function list()
    {
        $especies = Especie::all();
        return EspecieResource::collection($especies);
    }
    public function update(Atraccion $atraccion, Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'especie_id' => 'required|exists:especies,id'

        ]);
        $atraccion->fill($data);
        if (!$atraccion->save()) {
            return response()->json(['message' => 'Error al actualizar la atraccion'], 500);
        }
        return response()->json(['message' => 'Atraccion actualizada'], 200);
    }
    public function getEspecie(Atraccion $atraccion)
    {
        $especie = $atraccion->especie;
        return new EspecieResource($especie);
    }
}
