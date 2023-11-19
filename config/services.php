<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '1053468212150318',
        'client_secret' => 'd6e713528de6175b54eeca702af045e8',
        'redirect' => 'https://www.azadfisheries.com/callback/facebook',
    ],
    
    'google' => [
        'client_id' => '235764354378-23bb36ts1h7g4d6c1j2hugmpf0v1nrv6.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://azadfisheries.com/auth/google/callback',
    ],

];
