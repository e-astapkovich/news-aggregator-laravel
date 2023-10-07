<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function __invoke(Request $request)
    {
        $url = "https://lenta.ru/rss";
        $url2 = "https://news.rambler.ru/rss/tech/";

        $xml = XmlParser::load($url2);
        $news = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,description,author,pubDate,category,enclosure::url]'],

        ]);

        dd($news);
    }
}
