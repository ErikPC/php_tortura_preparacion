<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deck>
 */
class DeckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->realTextBetween(1, 10),
            'tipo-deck' => fake()->realTextBetween(1, 10),
            'cantidad-cartas' => 50,
            'precio' => 10.99,
            'id-deck' => fake()->realTextBetween(1, 10)
        ];
    }
}
