<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ParserService;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function __invoke(Request $request, ParserService $parserService)
    {
        $url = "https://lenta.ru/rss";
        $url2 = "https://news.rambler.ru/rss/tech/";

        $parserService->setLink($url2)->saveParseData();
    }
}
