<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltaImagenAComidaTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('comidas', function(Blueprint $table)
        {
            $table->string('imagen')->nullable()->after('detalle');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comidas', function(Blueprint $table)
        {
            $table->dropColumn('imagen');
        });
    }
}
