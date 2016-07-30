<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCursoDictasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_dictas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('grupo');
            $table->timestamps();
            $table->integer('curso_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('curso_id')->references('id')->on('cursos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::drop('curso_dictas');
    }
}
