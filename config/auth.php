<?php

return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'seller' => [
            'driver' => 'session',
            'provider' => 'sellers',
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'audit' => [
            'driver' => 'session',
            'provider' => 'audits',
        ],

        'staff' => [
            'driver' => 'session',
            'provider' => 'staff',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'sellers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Seller::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'audits' => [
            'driver' => 'eloquent',
            'model' => App\Models\Audit::class,
        ],

        'staff' => [
            'driver' => 'eloquent',
            'model' => App\Models\Staff::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'sellers' => [
            'provider' => 'sellers',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'audits' => [
            'provider' => 'audits',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'staff' => [
            'provider' => 'staff',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
