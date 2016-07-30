<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_examen');
            $table->boolean('estado_examen');
            $table->date('fecha_examen');
            $table->integer('puntaje_totalm');
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
        Schema::drop('examens');
    }
}
