<?php

namespace App\Providers;

use App\Services\Interfaces\IParser;
use App\Services\Interfaces\ISocial;
use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IParser::class, ParserService::class);
        $this->app->bind(ISocial::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
