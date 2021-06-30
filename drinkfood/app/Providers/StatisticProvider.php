<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\StatisticService;

class StatisticProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StatisticService::class, function(){
            return new StatisticService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
