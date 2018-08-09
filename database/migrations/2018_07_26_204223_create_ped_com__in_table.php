<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedComInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ped_com_in', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('pedcom_id')->unsigned()->nullable();
             $table->foreign('pedcom_id')->references('id')->on('pedido_producto')
            ->onUpdate('cascade')->onDelete('set null');


            $table->integer('ingrediente_id')->unsigned()->nullable();
             $table->foreign('ingrediente_id')->references('id')->on('ingredientes')
            ->onUpdate('cascade')->onDelete('set null');
            

            

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
        Schema::dropIfExists('ped_com_in');
    }
}
