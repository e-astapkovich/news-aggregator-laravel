<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(): View {

        // $news = News::all();
        $news = News::query()
            ->with('category')
            ->paginate(9);

        // $news = DB::table('news')
        //     ->join('categories', 'news.category_id', '=', 'categories.id')
        //     ->select('news.*', 'categories.name as categoryName')
        //     ->get();

        return view('news.index')
            ->with([
            'newsList' => $news
            // 'newsList' => [] // тест пустой страницы новостей
            ]
        );
    }

    public function show(News $news): View {

        // $new = DB::table('news')->find($id);

        // $news = News::find($id);

        return view('news.show')
            ->with(
                ['news' => $news]
            );
    }
}
