<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CostumerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'email' => $this->email,
      'phone_number' => $this->phone_number,
      'address' => $this->address,
    ];
  }
}
