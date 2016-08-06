<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBitacoraExamenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_examenes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('usuario_bi');
            $table->string('accion_bi');
            $table->string('ip_bi');
            $table->string('tabla_bi');
            $table->dateTime('fecha_bi');
            $table->string('viejo');
            $table->string('nuevo');
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
        Schema::drop('bitacora_examenes');
    }
}
