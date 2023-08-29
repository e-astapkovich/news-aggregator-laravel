<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index() {
        // return 'Show list of news';
        // return $this->getNews();
        return \view('news.index', [
            'news' => $this->getNews()
        ]);
    }

    public function show(int $id) {
        // return "New with #ID " . $id;
        return $this->getNews($id);
    }
}
