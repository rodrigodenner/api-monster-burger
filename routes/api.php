<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\BreadController;
use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\Api\v1\MeatController;
use App\Http\Controllers\Api\v1\OptionalController;
use App\Http\Controllers\Api\v1\OrderController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
  Route::get('/bread', [BreadController::class, 'index']);
  Route::get('/meat', [MeatController::class, 'index']);
  Route::get('/optional', [OptionalController::class, 'index']);

  // Create & Login Costumer
  Route::post('/costumer/create',[CustomerController::class,'store']);
  Route::post('/costumer/login', [AuthController::class, 'login']);

  //Order
  Route::get('/orders', [OrderController::class, 'index']);
  Route::post('/orders', [OrderController::class, 'store']);

});


