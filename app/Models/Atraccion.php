<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atraccion extends Model
{
    use HasFactory;
    protected $table = 'atraccions';


    protected $fillable = [
        'titulo',
        'descripcion',
        'especie_id'
    ];
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }
}
