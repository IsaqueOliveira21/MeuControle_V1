<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conta>
 */
class ContaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipoConta = ['POUPANÇA','CORRENTE','INVESTIMENTO'];
        return [
            'user_id' => rand(1, 25),
            'tipo' => $tipoConta[rand(0, count($tipoConta) - 1)],
            'nome_conta' => fake()->creditCardType(),
            'saldo' => fake()->randomFloat(2, 100, 3000),
            'ativo' => 1,
            'dia_fechamento' => fake()->date(),
            'dia_vencimento' => fake()->date(),
            'limite' => rand(1500, 5000),
        ];
    }
}
