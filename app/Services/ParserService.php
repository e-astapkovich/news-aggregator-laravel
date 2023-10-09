<?php

namespace App\Services;

use App\Services\Interfaces\IParser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements IParser
{
    private string $link;

    public function setLink(string $url): IParser
    {
        $this->link = $url;
        return $this;
    }

    public function saveParseData(): void
    {
        $parser = XMLParser::load($this->link);

        $news = $parser->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,description,author,pubDate,category,enclosure::url]'],
        ]);

        dd($news);
    }
}
