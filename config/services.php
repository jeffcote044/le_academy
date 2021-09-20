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
    'payu' => [
        'base_uri' => env('PAYU_BASE_URI'),
        'api_uri' => env('PAYU_API_URI'),
        'account_id' => env('PAYU_BASE_ACCOUNT_ID'),
        'merchant_id' => env('PAYU_BASE_MERCHANT_ID'),
        'key' => env('PAYU_KEY'),
        'secret' => env('PAYU_SECRET'),
        'base_currency' => env('PAYU_CURRENCY'),
        'test' => env('PAYU_IS_TEST'),
        'response_page' => env('PAYU_RESPONSE'),
        'confirmation_page' => env('PAYU_CONFIRMATION'),
    ],
    'paypal' => [

        'business' => env('PAYPAL_BUSINESS'),
        'currency_code' => env('PAYPAL_CURRENCY'),
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'client_secret' => env('PAYPAL_CLIENT_SECRET'),
        'base_uri' => env('PAYPAL_BASE_URI')
    ],
    'epayco' => [
        'client_id' => env('EPAYCO_CLIENT_ID'),
        'p_key' => env('EPAYCO_P_KEY'),
        'public_key' => env('EPAYCO_PUBLIC_KEY'),
        'private_key' => env('EPAYCO_PRIVATE_KEY')
    ],
];
