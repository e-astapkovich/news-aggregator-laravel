<?php

namespace App\Http\Controllers;

trait CategoriesTrait {
    public function getCategories(): array {
        $categories = [];
        $categoriesCount = 5;

        for ($i = 1; $i <= $categoriesCount; $i++) {
            $categories[] = [
                'id' => $i,
                'name' => "category-{$i}"
            ];
        };

        return $categories;
    }
}
