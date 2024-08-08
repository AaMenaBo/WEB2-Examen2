<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtraccionController;




//Rutas de vistas atracciones
Route::get('/atracciones', [AtraccionController::class, 'index']);
Route::get('/atracciones/comentarios', [AtraccionController::class, 'comentariosEntreValores']);
Route::get('/atracciones/{id}/comentarios', [AtraccionController::class, 'cantidadComentarios']);
Route::get('/especies/{especie}/atracciones', [AtraccionController::class, 'atraccionesPorEspecie']);
Route::get('/especies/{id}/calificacion_promedio', [AtraccionController::class, 'calificacionPromedioPorEspecie']);
Route::post('/comentarios', [AtraccionController::class, 'store']);