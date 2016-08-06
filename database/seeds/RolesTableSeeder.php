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
        CREATE PROCEDURE Bitacora(IN dato_nuevo VARCHAR(255), IN dato_viejo VARCHAR(255), IN ip VARCHAR(255), IN tabla VARCHAR(255), IN fecha DATETIME, IN accion VARCHAR(255), IN usuario VARCHAR(255) , IN id_bi INT)
            BEGIN


            IF (accion = 'create') THEN

               INSERT into bitacora_examenes(usuario_bi, accion_bi, ip_bi, tabla_bi,fecha_bi, nuevo)VALUES(usuario, accion, ip, tabla, fecha, dato_nuevo);

            END IF;

            IF (accion = 'delete')THEN

               INSERT into bitacora_examenes(usuario_bi, accion_bi, ip_bi, tabla_bi, fecha_bi, viejo)VALUES(usuario, accion, ip, tabla, fecha, dato_viejo);
                
            END IF;

            IF (accion = 'updaten')THEN

                   UPDATE bitacora_examenes SET nuevo= dato_nuevo WHERE id=id_bi;

                
            END IF;

            IF (accion = 'update')THEN

                 INSERT into bitacora_examenes(usuario_bi, accion_bi, ip_bi, tabla_bi, fecha_bi, viejo)VALUES(usuario, accion, ip, tabla, fecha, dato_viejo);
                
            END IF;

            END

            ");


    }
}
