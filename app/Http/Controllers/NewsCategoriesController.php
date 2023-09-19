<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsCategoriesController extends Controller
{
    public function index() {

        $categories = DB::table('categories')->get();

        return view('news-categories.categoriesList', [
            'categories' => $categories
        ]);
    }

    public function show(int $id) {

        $newsByCategory = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name as categoryName')
            ->where('category_id', $id)
            ->get();

        return view('news.index', [
            'newsList' => $newsByCategory
        ]);
    }
}
