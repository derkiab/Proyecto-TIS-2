<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('subtotal');
            $table->integer('impuesto');
            $table->integer('total');
            // $table->date('fecha_pedido');
            $table->boolean('estado')->default(0);
            $table->timestamps(); // Agregar esta línea


            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
                        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
