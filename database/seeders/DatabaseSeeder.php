<?php

namespace Database\Seeders;

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
            'name' => 'nabil',
            'email' => 'test@gmail.com',
            'password' => 'Jaijai2010',
            'salaire' => 44,
            'salaire_date' => 12,
            'budget' => 100
        ]);
        User::factory()->create([
            'name' => 'jai',
            'email' => 'admin@gmail.com',
            'password' => 'Jaijai2010',
            'role' => 'admin'
        ]);
    }
}
