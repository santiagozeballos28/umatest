<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistorialPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_preguntas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pregunta');
            $table->timestamps();
            $table->integer('nota_id')->unsigned();
            $table->foreign('nota_id')->references('id')->on('notas')
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
        Schema::drop('historial_preguntas');
    }
}
