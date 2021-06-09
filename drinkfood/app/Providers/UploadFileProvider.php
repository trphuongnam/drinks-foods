<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UploadFileService;

class UploadFileProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UploadFileService::class, function($uploadFile){
            return new UploadFileService;
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
