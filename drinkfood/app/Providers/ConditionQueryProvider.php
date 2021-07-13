<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ConditionQueryService;

class ConditionQueryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ConditionQueryService::class, function($conditionQuery){
            return new ConditionQueryService;
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
