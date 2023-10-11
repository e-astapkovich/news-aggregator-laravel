<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Services\ParserService;
use App\Services\Interfaces\IParser;
use Illuminate\Http\Request;
// use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    private static array $newsSources = [
        "https://news.rambler.ru/rss/tech/",
        "https://news.rambler.ru/rss/games/",
        "https://news.rambler.ru/rss/starlife/",
        "https://lenta.ru/rss",
    ];

    public function __invoke(Request $request, IParser $parserService)
    {
        foreach (self::$newsSources as $url)
        {
            $parserService->setLink($url)->saveParseData();
        }
    }
}
