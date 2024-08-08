@extends('layouts.app')
@section('content')
<h1>Atracciones</h1>
    <ul>
        @foreach($atracciones as $atraccion)
            <li>
                {{ $atraccion->titulo }} - Calificación Promedio: {{ $atraccion->calificacion_promedio }}
            </li>
        @endforeach
    </ul

@endsection