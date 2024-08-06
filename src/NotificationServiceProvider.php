<?php

namespace Ahmedeid46\Firebase;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Notification::class, function ($app) {
            return new Notification();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/notification.php' => config_path('ae_notification.php'),
        ], 'config');
    }
}