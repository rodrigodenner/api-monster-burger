<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Optional;
use Illuminate\Http\Request;

class OptionalController extends Controller
{
  public function index(Optional $optional)
  {
    $optional = $optional->all();
    if($optional->isEmpty()){
      return response()->json(['message' => 'Nenhum item opcional cadastrado'], 404);
    }
    return response()->json($optional->all());
  }
}
