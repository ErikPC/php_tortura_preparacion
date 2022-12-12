<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Node\Expr\Cast\Double;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carta>
 */
class CartaFactory extends Factory
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
            'precio' => 0.50,
            'texto' => fake()->realTextBetween(1, 10),
            'rareza' => fake()->realTextBetween(1, 10),
        ];
    }
}
