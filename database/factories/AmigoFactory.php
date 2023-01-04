<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amigo>
 */
class AmigoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 25),
            'nome' => fake()->name(),
            'telefone' => substr(fake()->unique()->phoneNumber(), 0, 15),
            'limite_emprestimo' => rand(1000, 2000),
        ];
    }
}
