<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Atraccion extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = 'atraccions';


    protected $fillable = [
        'titulo',
        'descripcion',
        'id_especie'
    ];
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_atraccion');
    }

    public function especie()
    {
        return $this->belongsTo(Especie::class, 'id_especie');
    }
}
