<?php

namespace App\Providers;

use App\DesignPatterns\Creational\Singleton\Contracts\AnotherConnection;
use App\DesignPatterns\Creational\Singleton\LaravelSingleton;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;
use Schema;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogPostObserver;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
      AnotherConnection::class => LaravelSingleton::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        BlogPost::observe(BlogPostObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }
        //
    }
}
