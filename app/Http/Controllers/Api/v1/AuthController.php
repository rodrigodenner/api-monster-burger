<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\CostumerResource;
use App\services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function __construct(private AuthService $authService)
  {
    $this->authService = $authService;
  }

  public function login(AuthLoginRequest $authLoginRequest)
  {
    $credentials = $authLoginRequest->validated();
    $token = $this->authService->login($credentials);

    if (is_null($token)) {
      return response()->json(['message' => 'Email ou senha incorretos.'], 401);
    }

    $user = auth()->user();

    return (new CostumerResource($user))->additional(['meta' => $token]);
  }
}
