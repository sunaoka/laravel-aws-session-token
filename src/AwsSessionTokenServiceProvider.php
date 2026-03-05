<?php

namespace Sunaoka\LaravelAwsSessionToken;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AwsSessionTokenServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__).'/config/aws-session-token.php',
            'aws-session-token'
        );

        if (! Config::get('aws-session-token.enable', true)) {
            return; // @codeCoverageIgnore
        }

        $keys = Config::get('aws-session-token.keys', []);
        foreach ($keys as $key) {
            if (Config::has($key)) {
                Config::set("{$key}.token", $_SERVER['AWS_SESSION_TOKEN'] ?? null);
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [__DIR__.'/../config/aws-session-token.php' => config_path('aws-session-token.php')],
            'aws-session-token-config'
        );
    }
}
