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

  public function show($id)
  {
    $orders = Order::with(['customer', 'bread', 'meat', 'optional'])->find($id)->first();
    if (!$orders) {
      return response()->json(['message' => 'Pedido não encontrado'], 404);
    }
    return response()->json(new OrderResource($orders), 200);
  }

  public function update(Request $request, $id)
  {
    $order = Order::find($id);
    if (!$order) {
      return response()->json(['message' => 'Pedido não encontrado'], 404);
    }

    $order->update($request->all());
    return new OrderResource($order);
  }

  public function destroy($id)
  {
    $order = Order::find($id);
    if (!$order) {
      return response()->json(['message' => 'Pedido não encontrado'], 404);
    }

    $order->delete();
    return response()->json(['message' => 'Pedido deletado com sucesso'], 200);
  }
}
