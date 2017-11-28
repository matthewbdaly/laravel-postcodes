<?php

namespace Matthewbdaly\LaravelPostcodes\Providers;

use Illuminate\Support\ServiceProvider;
use Matthewbdaly\Postcode\Client;

/**
 * Service provider for the postcode service
 */
class PostcodeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config.php' => config_path('sms.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Matthewbdaly\Postcode\Contracts\Client', function ($app) {
            $client = new Client;
            $client->setKey($app['config']['postcode']['api_key']);
            return $client;
        });
    }
}
