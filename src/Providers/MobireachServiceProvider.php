<?php

namespace Arifsajal\MobireachSmsGateway\Providers;

use Arifsajal\MobireachSmsGateway\Services\MobireachServices;
use Illuminate\Support\ServiceProvider;

class MobireachServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // Register the service the package provides.
        $this->app->singleton('mobireachsmsgateway', function ($app) {
            return new MobireachServices();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['mobireachsmsgateway'];
    }
}
