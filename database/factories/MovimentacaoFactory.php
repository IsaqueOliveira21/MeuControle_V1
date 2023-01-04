<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimentacao>
 */
class MovimentacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipo = ['ENTRADA', 'SAIDA'];
        $formaPagamento = ['A VISTA', 'DEBITO', 'CREDITO', 'PIX', 'TRANSFERENCIA'];
        $recorrencia = ['NAO RECORRENTE','DIARIO','SEMANAL','MENSAL','ANUAL'];
        return [
            'user_id' => rand(1, 25),
            'conta_id' => rand(1, 25),
            'amigo_id' => rand(1, 25),
            'data' => fake()->date(),
            'tipo' => $tipo[rand(0, count($tipo) - 1)],
            'forma_pagamento' => $formaPagamento[rand(0, count($formaPagamento) - 1)],
            'descricao' => substr(fake()->text(), 15, 200),
            'parcelado' => rand(1, 12),
            'valor_total' => fake()->randomFloat(2, 1000, 3000),
            'recorrencia' => $recorrencia[rand(0, count($recorrencia) - 1)],
            'observacao' => substr(fake()->text(), 15, 200),
        ];
    }
}
