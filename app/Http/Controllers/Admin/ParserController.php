<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\ParsingResource;
use App\Services\Interfaces\IParser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, IParser $parserService)
    {
        $parsingResources = ParsingResource::get(['url']);

        foreach ($parsingResources as $resource)
        {
            dispatch(new NewsParsingJob($resource->url));
        }
        return redirect()->route('admin.news.index')->with('success', "Парсинг новостей запущен в фоновом режиме");
    }
}
