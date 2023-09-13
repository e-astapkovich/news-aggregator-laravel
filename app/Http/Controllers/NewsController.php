<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(): View {
        // return 'Show list of news';
        // return $this->getNews();

        return view('news.index')
            ->with([
            'newsList' => $this->getNews()
            // 'newsList' => [] // тест пустой страницы новостей
            ]
        );
    }

    public function show(int $id): View {
        // return "New with #ID " . $id;
        // return $this->getNews($id);
        return view('news.show', [
            'new' => $this->getNews($id)
        ]);
    }
}
