<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
  public function index()
  {
    $orders = Order::with(['customer', 'bread', 'meat', 'optional'])->get();
    return response()->json(OrderResource::collection($orders), 200);
  }

  public function store(Request $request)
  {
    $order = Order::create($request->all());
    return response()->json(new OrderResource($order), 201);
  }
}
