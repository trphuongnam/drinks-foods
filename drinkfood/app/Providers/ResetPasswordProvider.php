<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ResetPasswordService;

class ResetPasswordProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ResetPasswordService::class, function($resetPasswordService){
            return new ResetPasswordService;
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
