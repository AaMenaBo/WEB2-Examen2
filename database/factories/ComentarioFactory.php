<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'atraccion_id' => fake()->numberBetween(1, 10),
            'nombre_usuario' => fake()->name(),
            'calificacion' => fake()->numberBetween(1, 5),
            'detalles' => fake()->text(),
        ];
    }
}
