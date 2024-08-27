<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Bread;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class BreadController extends Controller
{
  public function index(Bread $bread)
  {
    $bread = $bread->all();

    if($bread->isEmpty()){
      return response()->json(['message' => 'Nenhum pão cadastrado'], 404);
    }
    return response()->json($bread->all());
  }
}
