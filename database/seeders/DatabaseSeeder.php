<?php

namespace Database\Seeders;

use App\Models\Atraccion;
use App\Models\Comentario;
use App\Models\Especie;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Especie::factory(10)->create();
        Atraccion::factory(10)->create();
        Comentario::factory(10)->create();
    }
}
