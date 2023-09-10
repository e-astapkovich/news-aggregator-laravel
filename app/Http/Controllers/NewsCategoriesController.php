<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsCategoriesController extends Controller
{
    use NewsTrait;

    public function index() {
        return view('news-categories.categoriesList', [
            'categories' => $this->getCategories()
        ]);
    }

    public function show(int $id) {

        return view('news.index', [
            'newsList' => $this->getNewsByCategory($id)
        ]);
    }
}
