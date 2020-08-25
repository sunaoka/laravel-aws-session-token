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
        if (!isset($_SERVER['LAMBDA_TASK_ROOT'])) {
            return;
        }

        $keys = Config::get('aws-session-token.keys', []);
        foreach ($keys as $key) {
            if (Config::has($key)) {
                Config::set("{$key}.token", env('AWS_SESSION_TOKEN'));
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
            [__DIR__ . '/../config/aws-session-token.php' => config_path('aws-session-token.php')],
            'aws-session-token-config'
        );
    }
}
