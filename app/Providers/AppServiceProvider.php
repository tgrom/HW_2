<?php

namespace App\Providers;

use App\Contracts\Social;
use App\Serveses\ParserServes;
use App\Contracts\Parser;
use App\Serveses\SocialServes;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Parser::class, ParserServes::class);
        $this->app->bind(Social::class, SocialServes::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
