<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array {
        $categoriesQty = 10;
        $categories = [];
        for ($i = 0; $i <=$categoriesQty; $i++) {
            $categoryNameId = $i+1;
            $categories[] = [
                'name' => "category-$categoryNameId",
                'description' => fake()->text(50),
                'created_at' => now()
            ];
        }
        return $categories;
    }
}
