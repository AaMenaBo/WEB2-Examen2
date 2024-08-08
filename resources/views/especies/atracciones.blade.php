@extends('layouts.app')
@section('content')
    <h1>Atracciones que exhiben {{ $especie->nombre }}</h1>
    <ul>
        @foreach($especie->atracciones as $atraccion)
            <li>
                {{ $atraccion->titulo }} - Calificación Promedio: {{ $atraccion->calificacion_promedio }}
            </li>
        @endforeach
    </ul>

@endsection