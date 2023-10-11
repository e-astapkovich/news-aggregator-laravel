<?php

namespace App\Services;

use App\Services\Interfaces\IParser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\Category;
use App\Models\News;
use App\Enums\News\Status;
use Illuminate\Support\Carbon;

class ParserService implements IParser
{
    private string $link;
    private array $parsedData;

    public function setLink(string $url): IParser
    {
        $this->link = $url;
        return $this;
    }

    public function saveParseData(): void
    {
        $parser = XMLParser::load($this->link);

        $this->parsedData = $parser->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'newsList' => ['uses' => 'channel.item[title,description,author,pubDate,category,enclosure::url]'],
        ]);

        foreach ($this->parsedData['newsList'] as $newsItem) {

            News::firstOrCreate(
                [
                    'title' => $newsItem['title'],
                ],
                [
                    'description' => $newsItem['description'],
                    'category_id' => Category::firstOrCreate(['name' => $newsItem['category']])->id,
                    'author' => $newsItem['author'],
                    'image' => $newsItem['enclosure::url'] ?? $this->parsedData['image'],
                    'status' => Status::ACTIVE->value,
                    'created_at' => now(),                                                          // дата создания ЗАПИСИ в БД
                    'publication_date' => Carbon::create($newsItem['pubDate'])->toDateTimeString() // дата публикации новости в источнике
                ]
            );
        }

        $this->parsedData = [];
    }
}
