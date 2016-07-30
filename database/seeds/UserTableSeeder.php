<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'admin',
            'apellido' => 'admin',
            'direccion' => 'c:/sucre #1111 ',
            'telefono' => '60000000',
            'genero' => 'm',
            'email' => 'admin@umss.edu',
            'password' => bcrypt('administrador')
            ]);


         factory(App\User::class)->create([
            'name' => 'patricia',
            'apellido' => 'rodriguez',
            'direccion' => 'c:/lanza #39 ',
            'telefono' => '70000000',
            'genero' => 'f',
            'email' => 'akirebilbao@gmail.com',
            'password' => bcrypt('patricia')
            ]);

         factory(App\User::class)->create([
            'name' => 'victor',
            'apellido' => 'rojas',
            'direccion' => 'c:/heroinas #46 ',
            'telefono' => '79705950',
            'genero' => 'm',
            'email' => 'vinchuca@gmail.com',
            'password' => bcrypt('vinchuca')
            ]);
        factory(App\User::class)->create([
            'name' => 'helber',
            'apellido' => 'iporre',
            'direccion' => 'c:/guerrilleros #222 ',
            'telefono' => '72290479',
            'genero' => 'm',
            'email' => 'helber@gmail.com',
            'password' => bcrypt('guerrilleros')
        ]);
        factory(App\User::class)->create([
            'name' => 'leider',
            'apellido' => 'ticlla',
            'direccion' => 'c:/aniceto arze #333 ',
            'telefono' => '73767252',
            'genero' => 'm',
            'email' => 'leider@gmail.com',
            'password' => bcrypt('realmadrid')
        ]);
        factory(App\User::class)->create([
            'name' => 'santiago',
            'apellido' => 'mamani',
            'direccion' => 'c:/primero de mayo #444 ',
            'telefono' => '67568124',
            'genero' => 'm',
            'email' => 'santiago@gmail.com',
            'password' => bcrypt('santiago')
        ]);
        factory(App\User::class)->create([
            'name' => 'jhosmar',
            'apellido' => 'parra',
            'direccion' => 'c:/blasco nunez #555 ',
            'telefono' => '79775947',
            'genero' => 'm',
            'email' => 'jhosmar@gmail.com',
            'password' => bcrypt('boliviano')
        ]);


        DB::table('role_user')->insert(
        ['user_id' => 1, 'role_id' => 1]
        ); 
        DB::table('role_user')->insert(
        ['user_id' => 2, 'role_id' => 2]
        );

        DB::table('role_user')->insert(
        ['user_id' => 3, 'role_id' => 3]
        );
        DB::table('role_user')->insert(
            ['user_id' => 4, 'role_id' => 3]
        );
        DB::table('role_user')->insert(
            ['user_id' => 5, 'role_id' => 3]
        );
        DB::table('role_user')->insert(
            ['user_id' => 6, 'role_id' => 3]
        );
        DB::table('role_user')->insert(
            ['user_id' => 7, 'role_id' => 3]
        );

        DB::table('categorias')->insert(
        ['id' => 1, 'nombre' => 'Ingenieria de Sistemas']
        ); 

        DB::table('categorias')->insert(
        ['id' => 2, 'nombre' => 'Ingenieria Informatica']
        ); 

        DB::table('categorias')->insert(
        ['id' => 3, 'nombre' => 'Ingenieria Industrial']
        ); 

        DB::table('categorias')->insert(
        ['id' => 4, 'nombre' => 'Ingenieria Civil']
        ); 

        // DATOS PARA LA TABLA "TIPO DE PREGUNTAS"
        DB::table('tipo_preguntas')->insert(
                ['id'=> 1, 'tipo'=> 'complemento']
        );
        DB::table('tipo_preguntas')->insert(
                ['id'=> 2, 'tipo'=> 'desarrollo']
        );
        DB::table('tipo_preguntas')->insert(
                ['id'=> 3, 'tipo'=> 'seleccion simple']
        );

        DB::table('tipo_preguntas')->insert(
                ['id'=> 4, 'tipo'=> 'falso/verdadero']
        );

         DB::table('tipo_preguntas')->insert(
                ['id'=> 5, 'tipo'=> 'seleccion multiple']
        );

        // DATOS PARA LA TABLA DE CURSO

        DB::table('cursos')->insert([
            'id' => 1,
            'nombre' => 'Taller de Ingenieria de Software',
            'capacidad' => 10,
            'codigo' => 'TIS',
            'id_categoria' => 1
        ]);

        DB::table('cursos')->insert([
            'id' => 2,
            'nombre' => 'Inteligencia Artificial',
            'capacidad' => 30,
            'codigo' => 'artificial',
            'id_categoria' => 1
        ]);

        // DATOS PARA LA TABLA CURSO_DICTAS

        DB::table('curso_dictas')->insert([
            'id' => 1,
            'grupo' => '1',
            'curso_id' => 1,
            'user_id' => 2

        ]);

        DB::table('curso_dictas')->insert([
            'id' => 2,
            'grupo' => '1',
            'curso_id' => 2,
            'user_id' => 2

        ]);
        // para la tabla de inscrito a una materia, se inscribio al estudiante jhosmar
        
        DB::table('curso_inscritos')->insert([
            'fecha' => date("Y-m-d"),
            'curso_id' => 1,
            'user_id' => 7
        ]);

        DB::table('curso_inscritos')->insert([
            'fecha' => date("Y-m-d"),
            'curso_id' => 2,
            'user_id' => 3
        ]);

        // DATOS PARA LA TABLA EXAMEN

        DB::table('examens')->insert([
            'id' => 1,
            'nombre_examen' => 'primera practica',
            'estado_examen' => 1,
            'fecha_examen' => date("Y-m-d"),
            'puntaje_totalm' => 100,
            'id_cursos' => 1

        ]);


        // DATOS PARA LA TABLA PREGUNTAS

        DB::table('preguntas')->insert([
            'id' => 1,
            'nombre_pregunta' => 'el lenguaje ensamblador se situa:',
            'puntaje_pregunta' => 5,
            'tipo_pregunta_id' => 3,
            'examen_id' => 1,

        ]);

        // DATOS PARA LA TABLA MULTIPLES

        DB::table('multiples')->insert([
            'id' => 1,
            'respuesta' => 'mas cerca del lenguaje maquina',
            'correcta' => 1,
            'pregunta_id' => 1

        ]);

        DB::table('multiples')->insert([
            'id' => 2,
            'respuesta' => 'mas cerca de los lenguajes de alto nivel',
            'correcta' => 0,
            'pregunta_id' => 1

        ]);
        DB::table('multiples')->insert([
            'id' => 3,
            'respuesta' => 'no es un lenguaje',
            'correcta' => 0,
            'pregunta_id' => 1

        ]);

        DB::table('preguntas')->insert([
            'id' => 2,
            'nombre_pregunta' => 'un algoritmo es un conjunto de ',
            'puntaje_pregunta' => 5,
            'tipo_pregunta_id' => 1,
            'examen_id' => 1,

        ]);

        DB::table('simples')->insert([
            'id' => 1,
            'respuesta' => 'instrucciones',
            'pregunta_id' => 2

        ]);

        DB::table('preguntas')->insert([
            'id' => 3,
            'nombre_pregunta' => ' que es un bucle o ciclo ?  ',
            'puntaje_pregunta' => 5,
            'tipo_pregunta_id' => 2,
            'examen_id' => 1,

        ]);

        DB::table('desarrollos')->insert([
            'id' => 1,
            'respuesta' => 'Una sentencia que permite decidir si se ejecuta o no un bloque de codigo',
            'pregunta_id' => 3

        ]);

        DB::table('preguntas')->insert([
            'id' => 4,
            'nombre_pregunta' => ' int, char, float son algunos tipos de datos?  ',
            'puntaje_pregunta' => 5,
            'tipo_pregunta_id' => 4,
            'examen_id' => 1,

        ]);

        DB::table('falsoverdaderos')->insert([
            'id' => 1,
            'respuesta' => 1,
            'pregunta_id' => 4

        ]);


    }
}
