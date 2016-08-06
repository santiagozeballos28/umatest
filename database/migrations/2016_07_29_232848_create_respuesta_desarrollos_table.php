<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRespuestaDesarrollosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_desarrollos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('respuesta');
            $table->integer('calificacion');
            $table->integer('id_user');
            $table->timestamps();
            $table->integer('examen_id')->unsigned();
            
            $table->integer('pregunta_id')->unsigned();

            $table->foreign('examen_id')->references('id')->on('examens')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('pregunta_id')->references('id')->on('preguntas')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('respuesta_desarrollos');
    }
}
