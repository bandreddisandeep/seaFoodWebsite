<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN','sandbox8c8d3b96379a42b2bd193d86de1sdsd045f6.mailgun.org'),
        'secret' => env('MAILGUN_SECRET','4fc222584bab89c52d2d137ece77f123-f7d0b107-4c9db4ef-sdsd'),
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'google' => [
        'client_id' => '1003477965757-r766dapmaqnfkl96543jsc3jf9b0vou1.apps.googleusercontent.com',
        'client_secret' => 'ZWSr1AAmHCZDozxCjueLrps8',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
];
