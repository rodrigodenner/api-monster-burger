<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

  protected $fillable = ['note', 'customer_id', 'bread_id', 'meat_id', 'optional_id', 'status'];

  // Relacionamento: um pedido pertence a um cliente
  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }

  // Relacionamento: um pedido tem um tipo de pão
  public function bread()
  {
    return $this->belongsTo(Bread::class);
  }

  // Relacionamento: um pedido tem um tipo de carne
  public function meat()
  {
    return $this->belongsTo(Meat::class);
  }

  // Relacionamento: um pedido pode ter um opcional
  public function optional()
  {
    return $this->belongsTo(Optional::class);
  }

  // Método para obter o status em português usando a classe dedicada
  public function getStatusInPortugueseAttribute()
  {
    return OrderStatus::getTranslatedStatus($this->status);
  }
}
