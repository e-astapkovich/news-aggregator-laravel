<?php

namespace App\Http\Controllers;

trait NewsTrait {
    public function getNews(int $id = null): array {

        $news = [];
        $newsQty = 10;
        if ($id === null) {
            for ($i = 1; $i < $newsQty; $i++) {
                $news[$i] = [
                    'id' => $i,
                    'category_id' => rand(1, 5),
                    'title' => \fake()->word(),
                    'description' => \fake()->text(20),
                    'created_at' => \now()->format('d-m-Y H:i')
                ];
            }

            return $news;
        }

        return [
                    'id' => $id,
                    'title' => \fake()->word(),
                    'description' => \fake()->text(20),
                    'created_at' => \now()->format('d-m-Y H:i')
                ];
    }
}
