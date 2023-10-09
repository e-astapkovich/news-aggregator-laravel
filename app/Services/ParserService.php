<?php

namespace App\Services;

use App\Services\Interfaces\IParser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\Category;

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

        // Из спарсенного списка новостей извлекаем названия категорий, и если его нет в БД (таблица Categories), то добавляем
        $this->checkAndSaveCategories();

        dd($this->parsedData);
    }

    protected function checkAndSaveCategories(): void
    {
        foreach ($this->parsedData['newsList'] as $newsItem)
        {
            Category::firstOrCreate(
                ['name' => $newsItem['category']]
            );
        }
    }


}
