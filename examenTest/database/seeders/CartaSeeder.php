<?php

namespace Database\Seeders;

use App\Models\Carta;
use App\Models\Deck;
use App\Models\Expansion;
use Database\Factories\ExpansionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expansion = Expansion::all()->toArray();
        $deck = Deck::all()->toArray();
        $iddeck = array_map(fn ($c): int => $c["id"], $deck);
        $idexpansion = array_map(fn ($c): int => $c["id"], $expansion);
        Carta::factory(10)->create(
            fn () => [
                "expansion_id" => 1,
                "deck_id" => 1
            ]
        );
    }
}
