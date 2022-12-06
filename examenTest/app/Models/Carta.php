<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Carta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'texto',
        'rareza',
        'id-ex',
        'id-deck'
    ];

    public function deck()
    {
        return $this->belongsTo(Deck::class);
    }

    public function expansion()
    {
        return $this->belongsTo(Expansion::class);
    }
}
