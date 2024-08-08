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

    public function comentariosEntreValores(Request $request)
    {
        $min = $request->query('min');
        $max = $request->query('max');

        $comentarios = Comentario::whereBetween('calificación', [$min, $max])->get();

        return view('comentarios.entre_valores', compact('comentarios'));
    }

    public function cantidadComentarios($id)
    {
        $atraccion = Atraccion::withCount('comentarios')->find($id);

        return view('atracciones.cantidad_comentarios', compact('atraccion'));
    }

    public function atraccionesPorEspecie($id)
    {
        $especie = Especie::with('atracciones')->find($id);

        return view('especies.atracciones', compact('especie'));
    }

    public function calificacionPromedioPorEspecie($id)
    {
        $especie = Especie::find($id);

        $calificacion_promedio = DB::table('atraccions')
            ->join('comentarios', 'atraccions.id', '=', 'comentarios.id_atraccion')
            ->where('atraccions.id_especie', $id)
            ->avg('comentarios.calificación');

        return view('especies.calificacion_promedio', compact('especie', 'calificacion_promedio'));
    }
}