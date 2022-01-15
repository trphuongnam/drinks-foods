<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LoginService;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\LoginService', function($LoginService){
            return new LoginService();
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
