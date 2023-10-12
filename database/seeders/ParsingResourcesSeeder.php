<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParsingResourcesSeeder extends Seeder
{
    private $resources = [
        ['url' => 'https://lenta.ru/rss'],
        ['url' => 'https://news.rambler.ru/rss/tech/'],
        ['url' => 'https://news.rambler.ru/rss/games/'],
        ['url' => 'https://news.rambler.ru/rss/starlife/'],
        ['url' => 'https://news.rambler.ru/rss/articles/'],
    ];

    public function run(): void
    {
        DB::table('parsing_resources')->insert($this->resources);
    }
}
