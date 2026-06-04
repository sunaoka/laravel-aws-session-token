<?php

namespace Sunaoka\LaravelAwsSessionToken\Tests;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase;
use Sunaoka\LaravelAwsSessionToken\AwsSessionTokenServiceProvider;

class AwsSessionTokenServiceProviderTest extends TestCase
{
    /**
     * @param  Application  $app
     */
    protected function getPackageProviders($app): array
    {
        return [
            AwsSessionTokenServiceProvider::class,
        ];
    }

    /**
     * @param  Application  $app
     */
    protected function resolveApplicationConfiguration($app): void
    {
        parent::resolveApplicationConfiguration($app);

        $_SERVER['AWS_SESSION_TOKEN'] = 'dummy-session-token';
    }

    /**
     * @param  Application  $app
     */
    protected function defineEnvironment($app): void
    {
        tap($app['config'], static function (Repository $config) {
            $config->set('aws-session-token', [
                'enable' => true,
                'keys' => ['services.ses'],
            ]);
        });
    }

    public function test_register(): void
    {
        self::assertSame('dummy-session-token', config('services.ses.token'));
    }
}
