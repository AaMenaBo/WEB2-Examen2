@extends('layouts.app')
@section('content')

<h1>Comentarios por dos valores </h1>
<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Calificación</th>
                    <th>Acciones </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($atracciones as $atraccion)
                    <tr>
                        <td>{{ $atraccion->titulo }}</td>
                        <td>{{ $atraccion->descripcion }}</td>
                        <td>{{ $atraccion->calificacion_promedio }}</td>

                        <td>
                            <div>
                                <a href="{{ url('/atracciones/comentarios?min=1&max=5') }}"
                                    class="btn btn-primary mb-2">Comentarios entre valores</a>
                                <a href="{{ url('/atracciones/1/comentarios') }}" class="btn btn-primary mb-2">Cantidad de
                                    Comentarios de Atracción</a>
                                <a href="{{ url('/especies/1/atracciones') }}" class="btn btn-primary mb-2">Atracciones que
                                    exhiben Especie </a>
                                <a href="{{ url('/especies/1/calificacion_promedio') }}"
                                    class="btn btn-primary mb-2">Calificación Promedio de Atracciones que exhiben Especie </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection