<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDesarrollosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('respuesta');
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
        Schema::drop('desarrollos');
    }
}
