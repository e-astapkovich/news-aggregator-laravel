<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(): View {

        $news = DB::table('news')->get();

        return view('news.index')
            ->with([
            'newsList' => $news
            // 'newsList' => [] // тест пустой страницы новостей
            ]
        );
    }

    public function show(int $id): View {

        $new = DB::table('news')->find($id);
        return view('news.show', [
            'new' => $new
        ]);
    }
}
