<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_tarea');
            $table->string('descripcion')->nullable();
            $table->string('archivo')->nullable();
            $table->string('path_archivo')->nullable();
            $table->dateTime('fecha_creacion')->nullable();
            $table->integer('puntaje_total')->nullable();
            $table->timestamps();
            $table->integer('id_cursos')->unsigned();
            $table->foreign('id_cursos')->references('id')->on('cursos')
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
        Schema::drop('tareas');
    }
}
