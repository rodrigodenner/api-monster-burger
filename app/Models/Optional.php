<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    use HasFactory;

  protected $fillable = ['name'];

  // Relacionamento: um opcional pode estar em muitos pedidos
  public function orders()
  {
    return $this->hasMany(Order::class);
  }
}
