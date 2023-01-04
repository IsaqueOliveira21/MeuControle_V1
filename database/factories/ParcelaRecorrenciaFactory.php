<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParcelaRecorrencia>
 */
class ParcelaRecorrenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movimentacao_financeira_id' => rand(1, 25),
            'valor' => fake()->randomFloat(2, 1, 1000),
            'data_vencimento' => fake()->date(),
            'data_pagamento' => fake()->date(),
        ];
    }
}
