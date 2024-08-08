<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Comentario extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = 'comentario';

    protected $fillable = [
        'nombre_usuario',
        'calificacion',
        'detalles',
        'id_atraccion'
    ];

    public function atraccion()
    {
        return $this->belongsTo(Atraccion::class);
    }
}
