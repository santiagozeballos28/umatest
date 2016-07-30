<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function(Blueprint $table) {
            $table->increments('id');
            $table->string('mensaje');
            $table->dateTime('fecha');
            $table->timestamps();
            $table->integer('id_foro')->unsigned();
            $table->integer('id_user')->unsigned();

            $table->foreign('id_foro')->references('id')->on('foros')
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
        Schema::drop('comentarios');
    }
}
