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

    'stripe' => [
        'key' => 'pk_test_51Ix9f1E3RfDK1kNTR53rUV5bu0DrQrIDGABfHJ63JQfUTl2Dw3YH44LQ9aMFct37Kkn27RLHxECypebxt3tyzL9q00sU4HeKgt',
        'secret' => 'sk_test_51Ix9f1E3RfDK1kNT5fw6mg6kGVtgnd7N9nt0YqG8doPTmTxQG1M7jAEp0LpREbyENxcI2XdAvBcF4vfcLUvVrYyg00IhttLtAn'
    ],

];
