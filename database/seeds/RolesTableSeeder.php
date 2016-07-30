<?php

use Illuminate\Database\Seeder;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\role::class)->create([
     		'nombre_rol' => 'administrador'
     		]);
     	factory(App\role::class)->create([
     		'nombre_rol' => 'docente'
     		]);
     	factory(App\role::class)->create([
     		'nombre_rol' => 'estudiante'
     		]);	
        
        DB::unprepared("
        
CREATE PROCEDURE PA_curso(IN nombre_o VARCHAR(255), IN capacidad INT, IN codigo VARCHAR(255), IN id_categoria INT, IN usuario_a VARCHAR(255), IN fecha_a DATETIME, IN accion_a VARCHAR(255), IN id_bi INT)
BEGIN

DECLARE nombre_categoria VARCHAR(255);

SET nombre_categoria = (SELECT nombre FROM categorias WHERE id=id_categoria);

IF (accion_a = 'create') THEN

   INSERT into bitacora_cursos(usuario, accion, fecha, nuevo)VALUES(usuario_a, accion_a, fecha_a, CONCAT(nombre_o,'#',capacidad,'#',codigo,'#',nombre_categoria));

END IF;

IF (accion_a = 'delete')THEN
   
    INSERT into bitacora_cursos(usuario, accion, fecha, viejo)VALUES(usuario_a, accion_a, fecha_a, CONCAT(nombre_o,'#',capacidad,'#',codigo,'#',nombre_categoria));
    
END IF;

IF (accion_a = 'update')THEN

       UPDATE bitacora_cursos SET nuevo= CONCAT(nombre_o,'#',capacidad,'#',codigo,'#',nombre_categoria) WHERE id=id_bi;

    
END IF;

IF (accion_a = 'updatev')THEN

      INSERT into bitacora_cursos(usuario, accion, fecha, viejo)VALUES(usuario_a, accion_a, fecha_a, CONCAT(nombre_o,'#',capacidad,'#',codigo,'#',nombre_categoria));
    
END IF;

END

            ");

        DB::unprepared("
        
CREATE PROCEDURE PA_examen(IN nombre_examen VARCHAR(255), IN fecha_examen DATE, IN id_curso INT, IN usuario_a VARCHAR(255), IN fecha_a DATETIME, IN accion_a VARCHAR(255), IN id_bi INT)
BEGIN

DECLARE nombre_curso VARCHAR(255);

SET nombre_curso = (SELECT nombre FROM cursos WHERE id=id_curso);

IF (accion_a = 'create') THEN

   INSERT into bitacora_examenes(usuario, accion, fecha, nuevo)VALUES(usuario_a, accion_a, fecha_a, CONCAT(nombre_examen,'#',fecha_examen,'#',nombre_curso));

END IF;

IF (accion_a = 'delete')THEN
   
   INSERT into bitacora_examenes(usuario, accion, fecha, viejo)VALUES(usuario_a, accion_a, fecha_a, CONCAT(nombre_examen,'#',fecha_examen,'#',nombre_curso));
    
END IF;

IF (accion_a = 'update')THEN

       UPDATE bitacora_examenes SET nuevo= CONCAT(nombre_examen,'#',fecha_examen,'#',nombre_curso) WHERE id=id_bi;

    
END IF;

IF (accion_a = 'updatev')THEN


   INSERT into bitacora_examenes(usuario, accion, fecha, viejo)VALUES(usuario_a, accion_a, fecha_a, CONCAT(nombre_examen,'#',fecha_examen,'#',nombre_curso));
    
END IF;

END

            ");

        DB::unprepared("
        
CREATE PROCEDURE PA_tarea(IN nombre_tarea VARCHAR(255), IN descripcion varchar(255), IN fecha_creacion DATE, IN puntaje_total INT, IN id_curso INT,IN usuario_a VARCHAR(255), IN fecha_a DATETIME, IN accion_a VARCHAR(255), IN id_bi INT)
BEGIN

DECLARE nombre_curso VARCHAR(255);

SET nombre_curso = (SELECT nombre FROM cursos WHERE id=id_curso);

IF (accion_a = 'create') THEN

   INSERT into bitacora_tareas(usuario, accion, fecha, nuevo)VALUES(usuario_a, accion_a, fecha_a, CONCAT(nombre_tarea,'#',descripcion,'#',fecha_creacion,'#',puntaje_total,'#',nombre_curso));

END IF;

IF (accion_a = 'delete')THEN
   
   INSERT into bitacora_tareas(usuario, accion, fecha, viejo)VALUES(usuario_a, accion_a, fecha_a, CONCAT(nombre_tarea,'#',descripcion,'#',fecha_creacion,'#',puntaje_total,'#',nombre_curso));
    
END IF;

IF (accion_a = 'update')THEN

       UPDATE bitacora_tareas SET nuevo= CONCAT(nombre_tarea,'#',descripcion,'#',fecha_creacion,'#',puntaje_total,'#',nombre_curso) WHERE id=id_bi;

    
END IF;

IF (accion_a = 'updatev')THEN


   INSERT into bitacora_tareas(usuario, accion, fecha, viejo)VALUES(usuario_a, accion_a, fecha_a, CONCAT(nombre_tarea,'#',descripcion,'#',fecha_creacion,'#',puntaje_total,'#',nombre_curso));
    
END IF;

END

            ");



    }
}
