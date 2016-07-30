<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntregadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

          Schema::create('enviados', function(Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_limite');
             $table->integer('id_tarea')->unsigned();
            $table->foreign('id_tarea')->references('id')->on('tareas')
            ->onUpdate('cascade')->onDelete('cascade');
            //$table->timestamps();
        });

        Schema::create('entregados', function(Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion_tarea')->nullable();
            $table->string('archivo')->nullable();
            $table->dateTime('fecha');
            $table->integer('puntaje')->nullable();
            $table->timestamps();


           $table->integer('id_user')->unsigned();
           $table->integer('id_enviado')->unsigned();


            $table->foreign('id_user')->references('id')->on('users')
             ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_enviado')->references('id')->on('enviados')
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
        Schema::drop('enviados');
        Schema::drop('entregados');
    }
}
