<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'stripe' => [
        'model'  => 'User',
        'secret' => '',
    ],

    'github' => [
        'client_id'     => 'e1202fe34826caf60dfd',
        'client_secret' => '0ac56f9f509372074cbdd526aa2a9c1af7597509',
        'redirect'      => 'http://socialite.tokenly.dev:8035/login'
    ],

    'tokenly' => [
        'client_id'     => 'lusULPFd8OiqTfCY',
        'client_secret' => 'QZVxkFW9dL5ucKuQnYFZW5KewhmjBVMe',
        'redirect'      => 'http://socialite.tokenly.dev:8035/login'
    ],

];
