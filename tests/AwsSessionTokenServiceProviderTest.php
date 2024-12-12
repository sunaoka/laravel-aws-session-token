<?php

namespace Sunaoka\LaravelAwsSessionToken\Tests;

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

        $app['config']->set('services.ses', [
            'key' => 'key',
            'secret' => 'secret',
            'region' => 'us-east-1',
        ]);

        $app['config']->set('aws-session-token', [
            'enable' => true,
            'keys' => ['services.ses'],
        ]);

        $_SERVER['AWS_SESSION_TOKEN'] = 'dummy-session-token';
    }

    public function test_register(): void
    {
        self::assertSame('dummy-session-token', config('services.ses.token'));
    }
}
