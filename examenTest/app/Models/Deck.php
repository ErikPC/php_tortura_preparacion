<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo-deck',
        'cantidad-cartas',
        'precio',
        'id-deck'

    ];

    public function carta()
    {
        return $this->hasMany(Carta::class);
    }
}
