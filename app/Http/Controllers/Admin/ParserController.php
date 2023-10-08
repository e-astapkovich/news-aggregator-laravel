<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Services\ParserService;
use App\Services\Interfaces\IParser;
use Illuminate\Http\Request;
// use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function __invoke(Request $request, IParser $parserService)
    {
        $url = "https://lenta.ru/rss";
        $url2 = "https://news.rambler.ru/rss/tech/";

        $parserService->setLink($url2)->saveParseData();
    }
}
