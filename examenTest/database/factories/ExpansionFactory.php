<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expansion>
 */
class ExpansionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->realTextBetween(1.10),
            'precio' => 110.00,
            'fecha' => fake()->date(),
            'descripcion' => fake()->realTextBetween(1, 10),
            'cantidad-cartas' => 121,
            'id-ex' => fake()->realTextBetween(1, 10)
        ];
    }
}
