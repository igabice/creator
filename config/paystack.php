<?php

return [

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'publicKey' => 'pk_test_07b5ff647490b383aef78fa8c9e88cc5c56b11ca',

    /**
     * Secret Key From Paystack Dashboard
     *
     */
    'secretKey' => 'sk_test_30b4d82c5493b318df265073babf2fad97ab61d2',

    /**
     * Paystack Payment URL
     *
     */
    'paymentUrl' => getenv('PAYSTACK_PAYMENT_URL'),

    /**
     * Optional email address of the merchant
     *
     */
    'merchantEmail' => getenv('MERCHANT_EMAIL'),

];