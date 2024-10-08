<?php

namespace Brahim872\UserPermission;

use Illuminate\Support\ServiceProvider;

class UserPermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register config file
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the configuration file
        $this->publishes([
            __DIR__ . '/database/seeders/' => database_path('seeders'),
            __DIR__ . '/database/migrations/' => database_path('migrations'),
        ], 'userpermission');


        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}
