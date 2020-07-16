<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],

        'mahasiswa' => [
            'driver' => 'session',
            'provider' => 'mahasiswa',
        ],

        'apimahasiswa' => [
            'driver' => 'token',
            'provider' => 'mahasiswa',
            'hash' => false,
        ],

        'dpa' => [
            'driver' => 'session',
            'provider' => 'dpa',
        ],

        'apidpa' => [
            'driver' => 'token',
            'provider' => 'dpa',
            'hash' => false,
        ],

        'superadmin' => [
            'driver' => 'session',
            'provider' => 'superadmin',
        ],

        'apisuperadmin' => [
            'driver' => 'token',
            'provider' => 'superadmin',
            'hash' => false,
        ],

        'fakultas' => [
            'driver' => 'session',
            'provider' => 'fakultas',
        ],

        'apifakultas' => [
            'driver' => 'token',
            'provider' => 'fakultas',
            'hash' => false,
        ],

        'prodi' => [
            'driver' => 'session',
            'provider' => 'prodi',
        ],

        'apiprodi' => [
            'driver' => 'token',
            'provider' => 'prodi',
            'hash' => false,
        ],

        'dppai' => [
            'driver' => 'session',
            'provider' => 'dppai',
        ],

        'apidppai' => [
            'driver' => 'token',
            'provider' => 'dppai',
            'hash' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'mahasiswa' => [
            'driver' => 'eloquent',
            'model' => App\Login_Mahasiswa::class,
        ],
        'dpa' => [
            'driver' => 'eloquent',
            'model' => App\Login_Dpa::class,
        ],
        'superadmin' => [
            'driver' => 'eloquent',
            'model' => App\Login_SuperAdmin::class,
        ],
        'fakultas' => [
            'driver' => 'eloquent',
            'model' => App\Login_Fakultas::class,
        ],
        'prodi' => [
            'driver' => 'eloquent',
            'model' => App\Login_Prodi::class,
        ],
        'dppai' => [
            'driver' => 'eloquent',
            'model' => App\Login_DPPAI::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
