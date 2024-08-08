@extends('layouts.app')
@section('content')
    <h1>Comentarios entre valores</h1>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Comentario</th>
                        <th>Calificación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comentarios as $comentario)
                        <tr>
                            <td>{{ $comentario->nombre_usuario }}</td>
                            <td>{{ $comentario->calificacion }}</td>
                            <td>{{ $comentario->detalles}} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection