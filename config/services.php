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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    // Paiements: Moov Money
    'moov' => [
        'base_url' => env('MOOV_BASE_URL', ''),
        'merchant_id' => env('MOOV_MERCHANT_ID', ''),
        'api_key' => env('MOOV_API_KEY', ''),
        'secret' => env('MOOV_SECRET', ''),
        'callback_url' => env('MOOV_CALLBACK_URL', env('APP_URL').'/webhooks/moov'),
    ],

    // Paiements: Mixx by Yas
    'mixx' => [
        'base_url' => env('MIXX_BASE_URL', ''),
        'merchant_id' => env('MIXX_MERCHANT_ID', ''),
        'api_key' => env('MIXX_API_KEY', ''),
        'secret' => env('MIXX_SECRET', ''),
        'callback_url' => env('MIXX_CALLBACK_URL', env('APP_URL').'/webhooks/mixx'),
    ],

];
