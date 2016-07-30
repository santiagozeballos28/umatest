<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBitacoraCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_cursos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->dateTime('fecha');
            $table->string('accion');
            $table->string('nuevo');
            $table->string('viejo');
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
        Schema::drop('bitacora_cursos');
    }
}
