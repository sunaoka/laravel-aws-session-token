<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable or not
    |--------------------------------------------------------------------------
    */
    'enable' => env('ENABLE_AWS_SESSION_TOKEN', true),

    /*
    |--------------------------------------------------------------------------
    | Config key name to add AWS_SESSION_TOKEN
    |--------------------------------------------------------------------------
    */

    'keys' => [
        'aws.credentials',              // aws/aws-sdk-php-laravel
        'cache.stores.dynamodb',        // Cache Stores
        'filesystems.disks.s3',         // Filesystem Disks
        'queue.connections.sqs',        // Queue Connections
        'services.ses',                 // Third Party Services
    ],
];
