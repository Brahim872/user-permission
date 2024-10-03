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
        $this->mergeConfigFrom(__DIR__.'/config/userpermission.php', 'userpermission');
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
            __DIR__.'/config/userpermission.php' => config_path('userpermission.php'),
        ], 'userpermission');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}
