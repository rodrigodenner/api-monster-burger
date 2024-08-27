<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('note')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('bread_id');
            $table->unsignedBigInteger('meat_id');
            $table->unsignedBigInteger('optional_id')->nullable();
            $table->foreign('customer_id')
                ->references('id')->on('customers');
            $table->foreign('bread_id')->references('id')
                ->on('breads');
            $table->foreign('meat_id')->references('id')
                ->on('meats');
            $table->foreign('optional_id')->references('id')
                ->on('optionals');
          $table->enum('status', [
            'Order Received', // Pedido Recebido
            'In Preparation', // Em Preparo
            'Ready for Delivery/Pickup', // Pronto para Entrega/Retirada
            'In Transit', // Em Transporte
            'Completed', // Concluído
            'Cancelled' // Cancelado
          ])->default('Order Received'); // Status padrão é 'Order Received'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
