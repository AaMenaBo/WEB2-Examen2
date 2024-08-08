<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraccion;
use App\Models\Comentario;
use App\Models\Especie;
use Illuminate\Support\Facades\DB;

class AtraccionController extends Controller
{
    public function index()
    {
        $atracciones = Atraccion::with('comentarios')
            ->get()
            ->map(function ($atraccion) {
                $atraccion->calificacion_promedio = $atraccion->comentarios->avg('calificación');
                return $atraccion;
            });

        return view('atracciones.index', compact('atracciones'));
    }

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
        return response()->json(['message' => 'Comentario creado'],201);
    }


    public function comentariosEntreValores(Request $request)
    {
        $min = $request->query('min');
        $max = $request->query('max');

        $comentarios = Comentario::whereBetween('calificación', [$min, $max])->get();

        return view('comentarios.entre_valores', compact('comentarios'));
    }

    public function cantidadComentarios($id)
    {
        $atracciones = Atraccion::all();
        return view('atracciones.cantidad_comentarios', ['atracciones' => $atracciones]);
    }

    public function atraccionesPorEspecie(Especie $especie)
    {
        dd($especie);
        return view('especies.atracciones', compact('especie'));
    }


    public function calificacionPromedioPorEspecie($id)
    {
        $especie = Especie::find($id);
        //$atracciones= $especie->atracciones;

        $calificacion_promedio = DB::table('atracciones')
            ->join('comentarios', 'atracciones.id', '=', 'comentarios.atraccion_id')
            ->where('atracciones.especie_id', $id)
            ->avg('comentarios.calificación');

        return view('especies.calificacion_promedio', compact('especie', 'calificacion_promedio'));
    }
}