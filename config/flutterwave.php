<?php

/*
 * This file is part of the Laravel Rave package.
 *
 * (c) Oluwole Adebiyi - Flamez <flamekeed@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

//    'publicKey' => 'FLWPUBK_TEST-100d7cda4dc3039029a816f9569ff8fe-X',//env('FLW_PUBLIC_KEY'),

//    'secretKey' => 'FLWSECK_TEST-49ad03ebe87f2158c4e3de0d1aafb30c-X',//env('FLW_SECRET_KEY'),
//    'secretHash' => 'FLWSECK_TESTc95896244d87',// env('FLW_SECRET_HASH', 'e22bdf844049cafe87a808b4'),

    /**
     * Public Key: Your Rave publicKey. Sign up on https://dashboard.flutterwave.com/ to get one from your settings page
     *
     */
    'publicKey' => 'FLWPUBK-dd95ecf014bdb56beef0f65e55212cd4-X',//env('FLW_PUBLIC_KEY'),

    /**
     * Secret Key: Your Rave secretKey. Sign up on https://dashboard.flutterwave.com/ to get one from your settings page
     *
     */
    'secretKey' => 'FLWSECK-e22bdf84404998b295d1c1e59beed246-X',//env('FLW_SECRET_KEY'),

    /**
     * Prefix: Secret hash for webhook
     *
     */
    'secretHash' => env('FLW_SECRET_HASH', 'e22bdf844049cafe87a808b4'),
];

