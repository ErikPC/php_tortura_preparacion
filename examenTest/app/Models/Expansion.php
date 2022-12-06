<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expansion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'fecha',
        'descripcion',
        'cantidad-cartas',
        'id-ex'
    ];

    public function cartas()
    {
        return $this->hasMany(Carta::class);
    }
}
