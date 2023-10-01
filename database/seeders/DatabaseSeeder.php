<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            NewsSeeder::class
        ]);

        \App\Models\User::factory(3)->create();

        // Тестовый пользователь с правами админа
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123')
        ]);

        // Тестовый пользователь, обычный (не админ)
        \App\Models\User::factory()->create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => Hash::make('123'),
            'is_admin' => true
        ]);
    }
}
