<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transferencia>
 */
class TransferenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'conta_origem_id' => rand(1, 25),
            'conta_destino_id' => rand(1, 25),
            'data_hora' => fake()->dateTime(),
            'valor' => fake()->randomFloat(2, 1, 1000),
        ];
    }
}
