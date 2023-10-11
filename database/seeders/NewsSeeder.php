<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\News\Status;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array {
        $newsQty = 20;
        $news = [];
        for ($i = 0; $i <=$newsQty; $i++) {
            $newId = $i+1;
            $news[] = [
                'title' => "title-$newId",
                'description' => fake()->text(50),
                'category_id' => fake()->randomDigitNotNull(),
                'author' => fake()->userName(),
                'image' => 'https://dummyimage.com/150',
                'status' => Status::ACTIVE->value,
                'created_at' => now()
            ];
        }
        return $news;
    }
}
