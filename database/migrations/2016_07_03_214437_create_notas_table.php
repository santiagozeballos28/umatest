<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function(Blueprint $table) {
            $table->increments('id');
           $table->integer('numero_preguntas');
            $table->integer('duracion');
            $table->integer('calificacion');
            $table->boolean('estado');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->string('archivo');
            $table->integer('puntaje_examen');
            $table->integer('numero_respuestas_correctas');
            $table->timestamps();
   
           $table->integer('user_id')->unsigned();
           $table->integer('examen_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::drop('notas');
    }
}
