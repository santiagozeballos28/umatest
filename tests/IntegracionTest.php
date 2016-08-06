<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IntegracionTest extends TestCase
{
    use DatabaseTransactions;


    public function testRegistro()
    {
        $this->visit('/auth/register')
        	 ->type('maria','name')
        	 ->type('parra','apellido')
        	 ->type('calle lanza #810','direccion')
        	 ->type(79778876,'telefono')
        	 ->type('F','genero')
        	 ->type('maria@gmail.com','email')
        	 ->type('mariaparra','password')
        	 ->type('mariaparra','password_confirmation')
        	 ->press('Registrar')
             ->seePageIs('/home');
    }

    public function testLoginIncorrecto()
    {
        $this->visit('/auth/login')
        	 ->type('maria@gmail.com','email')
        	 ->type('mariaparra','password')
        	 ->press('Ingresar')
             ->seePageIs('/auth/login');
    }

    public function testLoginCorrecto()
    {
        $this->visit('/auth/login')
        	 ->type('jhosmar@gmail.com','email')
        	 ->type('boliviano','password')
        	 ->press('Ingresar')
             ->seePageIs('/home');
    }

        public function testCrearExamen()
    {
        $this->visit('/auth/login')
        	 ->type('akirebilbao@gmail.com','email')
        	 ->type('patricia','password')
        	 ->press('Ingresar')
             ->seePageIs('/home')
             ->click('Mis Materias')
             ->seePageIs('admin/curso_dicta')
             ->click('Taller de Ingenieria de Software')
             ->seePageIs('admin/curso_dicta/1/vista_contenido_curso')
             ->click('Crear Examen')
             ->seePageIs('/gestor_examenes/examen/1/create')
             ->type('primer parcial','nombre_examen')
             ->type(100,'puntaje_totalm')
             ->press('Crear')
             ->seePageIs('/gestor_examenes/1/examen');
    }


}
