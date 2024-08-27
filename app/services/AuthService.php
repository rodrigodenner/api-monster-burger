<?php

namespace App\services;

class AuthService
{
  public function login(array $credentials)
  {
    $login = [
      'email' => $credentials['email'],
      'password' => $credentials['password']
    ];

    if (!$token = auth()->attempt($login)) {
      return null;
    }

    return [
      'Access_Token' => $token,
      'Token_Type' => 'Bearer',
    ];
  }
}
