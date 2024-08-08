@extends('layouts.app')
@section('content')
    <h1>Clasificación promedio de atracciones que exhiben {{ $especie->nombre }}</h1>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Clasificación promedio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($especies as $especie)
                        <tr>
                            <td>{{ $especie->nombre }}</td>
                            <td>{{ $especie->calificacion_promedio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection