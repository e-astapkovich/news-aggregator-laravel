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

            /**
             * Первичное заполнение таблицы источников новостей для парсинга
             */
             ParsingResourcesSeeder::class

            /**
             * Фейковые новости и категории
             * Использовались до того, как был создан ParserController
             */
            // CategorySeeder::class,
            // NewsSeeder::class

        ]);

        \App\Models\User::factory(3)->create();

        // Тестовый пользователь с правами админа
        \App\Models\User::factory()->create([
            'name' => 'Admin-1',
            'email' => 'admin-1@example.com',
            'password' => Hash::make('123'),
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin-2',
            'email' => 'admin-2@example.com',
            'password' => Hash::make('123'),
            'is_admin' => true
        ]);

        // Тестовый пользователь, обычный (не админ)
        \App\Models\User::factory()->create([
            'name' => 'User-1',
            'email' => 'user-1@example.com',
            'password' => Hash::make('123'),
        ]);
    }
}
