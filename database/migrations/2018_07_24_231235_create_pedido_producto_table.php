<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned()->nullable();
             $table->foreign('pedido_id')->references('id')->on('pedidos')
            ->onUpdate('cascade')->onDelete('set null');


            $table->integer('comida_id')->unsigned()->nullable();
             $table->foreign('comida_id')->references('id')->on('comidas')
            ->onUpdate('cascade')->onDelete('set null');
            

            $table->integer('cantidad')->unsigned();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_producto');
    }
}
