<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Meat;
use Illuminate\Http\Request;

class MeatController extends Controller
{
  public function index(Meat $meat)
  {
    $meat = $meat->all();

    if($meat->isEmpty()){
      return response()->json(['message' => 'Nenhuma carne cadastrada'], 404);
    }

    return response()->json($meat->all());
  }
}
