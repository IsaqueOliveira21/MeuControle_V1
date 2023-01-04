<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
         \App\Models\User::factory(25)->create();
         \App\Models\Conta::factory(25)->create();
         \App\Models\Amigo::factory(25)->create();
         \App\Models\Movimentacao::factory(25)->create();
         \App\Models\Transferencia::factory(25)->create();
         \App\Models\ParcelaRecorrencia::factory(25)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
