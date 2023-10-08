<?php

namespace App\Services\Interfaces;

interface IParser
{
    public function setLink(string $url): IParser;
    public function saveParseData(): void;
}
