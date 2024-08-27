<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray($request)
  {
    return [
      'order' => [
        'id' => $this->id,
        'bread' => $this->bread ? $this->bread->name : null,
        'meat' => $this->meat ? $this->meat->name : null,
        'optional' => $this->optional ? $this->optional->name : null,
        'note' => $this->note,
        'status' => $this->status,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        'customer' => [
          'id' => $this->customer->id,
          'name' => $this->customer->name,
          'phone_number' => $this->customer->phone_number,
          'address' => $this->customer->address,
          'created_at' => $this->customer->created_at,
          'updated_at' => $this->customer->updated_at,
        ],
      ]
    ];
  }
}
