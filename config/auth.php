<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Authentication Defaults
  |--------------------------------------------------------------------------
  |
  | This option defines the default authentication "guard" and password
  | reset "broker" for your application. You may change these values
  | as required, but they're a perfect start for most applications.
  |
  */

  'defaults' => [
    'guard' => 'api', // Mude de 'web' para 'api'
    'passwords' => 'users',
  ],

  /*
  |--------------------------------------------------------------------------
  | Authentication Guards
  |--------------------------------------------------------------------------
  |
  | Next, you may define every authentication guard for your application.
  | Of course, a great default configuration has been defined for you
  | which utilizes session storage plus the Eloquent user provider.
  |
  | All authentication guards have a user provider, which defines how the
  | users are actually retrieved out of your database or other storage
  | system used by the application. Typically, Eloquent is utilized.
  |
  | Supported: "session", "token", "jwt"
  |
  */

  'guards' => [
    'web' => [
      'driver' => 'session',
      'provider' => 'users',
    ],

    'api' => [
      'driver' => 'jwt', // Adicione este guard com o driver 'jwt'
      'provider' => 'users',
    ],
  ],

  /*
  |--------------------------------------------------------------------------
  | User Providers
  |--------------------------------------------------------------------------
  |
  | All authentication guards have a user provider, which defines how the
  | users are actually retrieved out of your database or other storage
  | system used by the application. Typically, Eloquent is utilized.
  |
  | If you have multiple user tables or models you may configure multiple
  | providers to represent each model / table. These providers may then
  | be assigned to any extra authentication guards you have defined.
  |
  | Supported: "database", "eloquent"
  |
  */

  'providers' => [
    'users' => [
      'driver' => 'eloquent',
      'model' => App\Models\Customer::class, // Certifique-se de apontar para o modelo correto
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
      'table' => 'password_reset_tokens', // Certifique-se de que esta tabela exista
      'expire' => 60,
      'throttle' => 60,
    ],
  ],

  /*
  |--------------------------------------------------------------------------
  | Password Confirmation Timeout
  |--------------------------------------------------------------------------
  |
  | Here you may define the number of seconds before a password confirmation
  | times out and the user is prompted to re-enter their password via the
  | confirmation screen. By default, the timeout lasts for three hours.
  |
  */

  'password_timeout' => 10800,

];
