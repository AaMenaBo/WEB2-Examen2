@extends('layouts.app')
@section('content')
    <h1 class="text-center">Cantidad de comentarios por atracción</h1>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad de comentarios</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($atracciones as $atraccion)
                        <tr>
                            <td>{{ $atraccion->titulo }}</td>
                            <td>{{ $atraccion->comentarios->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection