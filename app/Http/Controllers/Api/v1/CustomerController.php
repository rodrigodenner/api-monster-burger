<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CostumerResource;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomerController extends Controller
{
  public function store(CustomerRequest $request)
  {
    $validatedData = $request->validated();
    $validatedData['password'] = Hash::make($validatedData['password']);
    $customer = Customer::create($validatedData);

    // Gerar o token JWT
    $token = JWTAuth::fromUser($customer);

    // Obter o tempo de vida do token (TTL) em minutos
    $tokenTTL = auth()->factory()->getTTL();

    return (new CostumerResource($customer))->additional([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => $tokenTTL * 60
    ]);
  }
}

