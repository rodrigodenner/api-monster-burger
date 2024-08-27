<?php

namespace App\Enums;

class OrderStatus
{
  const STATUSES = [
    'Order Received' => 'Pedido Recebido',
    'In Preparation' => 'Em Preparo',
    'Ready for Delivery/Pickup' => 'Pronto para Entrega/Retirada',
    'In Transit' => 'Em Transporte',
    'Completed' => 'Concluído',
    'Cancelled' => 'Cancelado',
  ];

  /**
   * Traduz o status do pedido para português.
   *
   * @param string $status
   * @return string
   */
  public static function getTranslatedStatus(string $status): string
  {
    return self::STATUSES[$status] ?? $status;
  }
}
