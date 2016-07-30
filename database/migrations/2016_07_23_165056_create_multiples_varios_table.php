<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMultiplesVariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiples_varios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('respuesta');
            $table->boolean('correcta');
            $table->timestamps();

            $table->integer('pregunta_id')->unsigned();

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
        Schema::drop('multiples_varios');
    }
}
