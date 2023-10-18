<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsCategoriesController extends Controller
{
    public function index() {

        $categories = Category::paginate(20);

        return view('news-categories.categoriesList', [
            'categories' => $categories
        ]);
    }

    public function show(int $id) {

        $newsByCategory = News::query()
            ->with('category')
            ->where('category_id', $id)
            ->paginate(2);

        return view('news.index', [
            'newsList' => $newsByCategory
        ]);
    }
}
