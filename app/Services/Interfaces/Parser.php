<?php

namespace App\Services\Interfaces;

interface Parser
{
    public function setLink(string $url): Parser;
    public function saveParseData(): void;
}
