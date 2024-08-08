@extends('layouts.app')
@section('content')
    <h1>Atracciones que exhiben {{ $especie->nombre }}</h1>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Calificación Promedio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especie->atracciones as $atraccion)
                <tr>
                    <td>{{ $atraccion->titulo }}</td>
                    <td>{{ $atraccion->calificacion_promedio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection