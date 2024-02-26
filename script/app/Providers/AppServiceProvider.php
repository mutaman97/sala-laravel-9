<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        TODO - Package removed by mutaman
//        if ($this->app->isLocal()) {
//            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
//        }
        // ...
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    Paginator::useBootstrap();
    //added by mutaman to disable lazy loading and force eager loading
    // Model::preventLazyLoading(!app()->isProduction());
    // end

    // DB::whenQueryingForLongerThan(500, function (Connection $connection) {
    // Log::warning("Database queries exceeded 5 seconds on {$connection->getName()}");

        // or notify the development team...
    // });
    }
}
