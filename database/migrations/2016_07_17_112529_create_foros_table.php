<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foros', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('mensaje');
            $table->string('archivo');
            $table->dateTime('fecha');
            $table->timestamps();

            $table->integer('id_curso')->unsigned();
            $table->integer('id_user')->unsigned();

            $table->foreign('id_curso')->references('id')->on('cursos')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')
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
        Schema::drop('foros');
    }
}
