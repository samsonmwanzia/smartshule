<?php

return [

    'api' => [
        'base_uri' => env('MPESA_API_BASE_URL'),
    ],
    'mpesa' => [
        'c2b' => [
            'consumer_key' => env('MPESA_C2B_CONSUMER_KEY'),
            'consumer_secret' => env('MPESA_C2B_CONSUMER_SECRET'),
            'shortcode' => env('MPESA_C2B_SHORTCODE'),

            // Lipa na mpesa keys
            'passkey' => env('MPESA_C2B_PASSKEY'),
        ],
    ],

    'statement' => [
        //positive statements
        'mpesa' => 1,
        'cash' => 2,
        'manual_deposit' => 3,


        //admin
        'admin' => [
            'job_payment_fee' => 1,
        ],

        //translations
        'translate' => [
            //positive translations
            "s_1" => "Mpesa Deposit",
            "s_2" => "CASH Payment",
            "s_3" => "Admin Funding",


            //negative translations
            "s_n1" => "Holding Cash for Job",
            "s_n2" => "Payment for Job Uploaded",
            "s_n3" => "User Withdrawal",
            "s_n4" => "Job Payment Fee",

            //admin
            'admin' => [
                's_1' => "Client Job Payment",
            ],
        ],
    ],
];
