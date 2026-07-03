<?php

namespace App\Providers;

use CloudinaryLabs\CloudinaryLaravel\CloudinaryEngine;
use Illuminate\Support\ServiceProvider;
use Cloudinary\Configuration\Configuration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(CloudinaryEngine::class, function ($app) {
        $config = new Configuration();
        $config->cloud->cloudName = 'doi71x3cs';
        $config->cloud->apiKey = '237572357969624';
        $config->cloud->apiSecret = 'PqZm2poZ1bD7CHC5V_nxB2-FLes';
        
        return new CloudinaryEngine($config);
    });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        config(['cloudinary.cloud_name' => 'doi71x3cs']);
        config(['cloudinary.api_key' => '237572357969624']);
        config(['cloudinary.api_secret' => 'PqZm2poZ1bD7CHC5V_nxB2-FLes']);
    }
}
