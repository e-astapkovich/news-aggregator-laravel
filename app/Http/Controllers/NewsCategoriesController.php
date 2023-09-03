<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsCategoriesController extends Controller
{
    use CategoriesTrait;
    use NewsTrait;

    public function index() {
        return view('news-categories.categoriesList', [
            'categories' => $this->getCategories()
        ]);
    }

    public function show(int $id) {

        $news = $this->getNews();
        $newsByCategory = [];

        foreach ($news as $new) {
            if ($new['category_id'] == $id) {
                $newsByCategory[] = $new;
            }
        }

        return view('news.index', [
            'news' => $newsByCategory
        ]);
    }
}
