<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('categorias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('estado');
            $table->timestamps();
        });

        Schema::create('cursos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->integer('capacidad');
            $table->string('codigo');
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')->references('id')->on('categorias')
                ->onUpdate('cascade')->onDelete('cascade');
            
            $table->timestamps();
        });

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cursos');
        

    }
}
