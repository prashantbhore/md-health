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
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'md_customer_registration' => [
            'driver' => 'session',
            'provider' => 'md_customer_registration',
        ],

        'md_health_medical_providers_registers' => [
            'driver' => 'session',
            'provider' => 'md_medical_provider_register',
        ],

        'md_health_medical_vendor_registers' => [
            'driver' => 'session',
            'provider' => 'md_vendor_register',
        ],

        'md_health_food_registers' => [
            'driver' => 'session',
            'provider' => 'md_food_register',
        ],

        'superadmin' => [
            'driver' => 'session',
            'provider' => 'md_super_admin',
        ],
        'commonuser' => [
            'driver' => 'session',
            'provider' => 'common_user_login',
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
            'model' => App\Models\User::class,
        ],
        'md_customer_registration' => [
            'driver' => 'eloquent',
            'model' => App\Models\CustomerRegistration::class,
        ],
        'md_medical_provider_register' => [
            'driver' => 'eloquent',
            'model' => App\Models\MedicalProviderRegistrater::class,
        ],

        'md_health_medical_vendor_registers' =>[
            'driver' => 'eloquent',
            'model' => App\Models\VendorRegister::class,
        ],

        'md_food_register' => [
            'driver' => 'eloquent',
            'model' => App\Models\MDFoodRegisters::class,
        ],

        'md_super_admin' => [
            'driver' => 'eloquent',
            'model' => App\Models\SuperAdmin::class,
        ],
        'common_user_login' => [
            'driver' => 'eloquent',
            'model' => App\Models\CommonUserLoginTable::class,
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
    | The expiry time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    | The throttle setting is the number of seconds a user must wait before
    | generating more password reset tokens. This prevents the user from
    | quickly generating a very large amount of password reset tokens.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
