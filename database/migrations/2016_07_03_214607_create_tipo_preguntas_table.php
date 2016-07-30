<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_preguntas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->timestamps();
        });

         Schema::create('preguntas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_pregunta');
            $table->integer('puntaje_pregunta');
            $table->timestamps();

            $table->integer('tipo_pregunta_id')->unsigned();
            $table->integer('examen_id')->unsigned();

            $table->foreign('tipo_pregunta_id')->references('id')->on('tipo_preguntas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('examen_id')->references('id')->on('examens')
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
        Schema::drop('tipo_preguntas');
        Schema::drop('preguntas');
    }
}
