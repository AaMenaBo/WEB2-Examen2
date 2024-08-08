<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Especie extends Model
{
    use HasApiTokens, HasFactory;
    protected $table = 'especies';

    protected $fillable = [
        'nombre',
        'periodo',
        'descripcion'
    ];

    public function atracciones()
    {
        return $this->hasMany(Atraccion::class);
    }
}
