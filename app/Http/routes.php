<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
 // return view('welcome');
//});

/*Route::get('pdf', function(){
    $fpdf = new Fpdf();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial','B',16);
        $fpdf->Cell(40,10,'Hello World!');
        $fpdf->Output();
        exit;

});
Route::get('pdf2', function(){

        Fpdf::AddPage();
        Fpdf::SetFont('Arial','B',16);
        Fpdf::Cell(40,10,'Hello World!');
        Fpdf::Output();
        exit;

);
*/


Route::resource('admin/posts', 'Admin\\PostsController');
//Route::get('/','Admin\\PostsController@prueba');
Route::get('/','menuPrincipalController@index');
// es pararte cuando esta logueado
Route::get('/resenia_historica','menuPrincipalController@reseniaHistorica');
Route::get('/mision','menuPrincipalController@mision');
Route::get('/vision','menuPrincipalController@vision');
Route::get('/contactos','menuPrincipalController@contactos');
Route::get('/ayuda','menuPrincipalController@ayuda');

Route::get('/resenia_historica_v','menuPrincipalControllerB@reseniaHistorica');
Route::get('/mision_v','menuPrincipalControllerB@mision');
Route::get('/vision_v','menuPrincipalControllerB@vision');
Route::get('/contactos_v','menuPrincipalControllerB@contactos');
Route::get('/ayuda_v','menuPrincipalControllerB@ayuda');

Route::resource('admin/permisos', 'Admin\\permisosController');
Route::resource('admin/roles', 'Admin\\rolesController');
Route::resource('admin/users', 'Admin\\UsersController');
Route::resource('admin/docente', 'Admin\\docenteController');
Route::resource('admin/administrador', 'Admin\\administradorController');
Route::resource('admin/curso', 'Admin\\cursoController');


/*
 esto es para crear carreras
*/
Route::resource('admin/categoria', 'Admin\\categoriaController');



/*
 Esto viene despues de presionar , desabilitar carrera
 * url('/admin/categoria/' . $item->id.'/desabilitar')
*/
Route::resource('admin/categoria/{id}/desabilitar', 'Admin\\categoriaController@desabilitar_carrera');

/*
* Esta ruta viene despues presinar crear carrera
* parametro1@ id del curso
* url('admin/carrera/create')
*/
Route::get('admin/carrera/create', 'Admin\\categoriaController@create');
/*
* Esta ruta viene despues presinar ver carreras
* parametro1@ id del curso
* url('admin/carrera/create')
*/
Route::get('admin/carreras', 'Admin\\categoriaController@index');


/*
* Esta ruta viene despues mostrar carreras desabilitados
* parametro1@ id del curso
* url('admin/carreras/desabilidatos')
*/
Route::get('admin/carreras/deshabilitados', 'Admin\\categoriaController@show_deshabilitados');

/*
* Esta ruta viene despues de presionar habilita carrera
* parametro1@ id del curso
* url('/admin/carreras/' . $item->id.'/habilitar')
*/
Route::get('admin/carreras/{id}/habilitar', 'Admin\\categoriaController@habilitar_carrera');
 



Route::resource('admin/curso_dicta', 'Admin\\curso_dictaController');
Route::resource('admin/curso_inscrito', 'Admin\\curso_inscritoController');
/*
 esta ruta viene despues de prsionar inscribirce en un curso, y luego lista todas las carreras
*/

Route::resource('/todosloscursos/{boton}/carrera', 'gestorusuarioController');
//Route::get('/todosloscursos/{algo}','gestorusuarioController@ellasefue']);

//Route::get('/admin/curso/{parametro}', 'Admin\\cursoController@visualizar');

/*
 es para inscribirdea un curso(Foca pone la descripcion de  la ruta)
*/

Route::get('admin/curso/{parametro}/vista_inscribirse/{boton_todosloscursos}/materias', 'Admin\\cursoController@visualizar_inscribirse');
Route::get('admin/curso/index_todo/todo', 'Admin\\cursoController@visualizar_categoria_carrera');

Route::get('admin/curso/{id_materia}/borrar', 'Admin\\cursoController@desinscribirse');
Route::get('admin/curso/desinscribirse/borrarmostrar', 'Admin\\cursoController@visualizar_desinscribirse');

/*
 esta ruta llega de todos los cursos de los docentes, y nos llega un id de la materia
 luego se llama al controlador para mostrar todos los cotenidos de un curso . 
*/
Route::get('admin/curso_dicta/{id_curso}/vista_contenido_curso', 'Admin\\curso_dictaController@vis_contenido_curso');

Route::get('admin/curso_inscrito/{id_curso}/vista_contenido_curso', 'Admin\\curso_inscritoController@vis_contenido_curso');





  /*
 son rutas para el gestor examenes y getor de tareas
*/
Route::resource('gestor_examenes/examen', 'gestor_examenes\\examenController');
Route::resource('gestor_examenes/nota', 'gestor_examenes\\notaController');



//INICIO RUTAS DE PREGUNTAS

Route::resource('gestor_examenes/pregunta', 'gestor_examenes\\preguntaController');

Route::get('gestor_examenes/pregunta/{id_examen}/index', 'gestor_examenes\\preguntaController@index');

Route::get('gestor_examenes/pregunta/{id_examen}/create', 'gestor_examenes\\preguntaController@create');

Route::get('gestor_examenes/pregunta/{id}/{id_examen}/edit', 'gestor_examenes\\preguntaController@edit');

Route::get('gestor_examenes/pregunta/{id}/{id_examen}/show', 'gestor_examenes\\preguntaController@show');

Route::get('gestor_examenes/pregunta/{id}/{id_examen}/delete', 'gestor_examenes\\preguntaController@destroy');

//FIN RUTAS DE PREGUNTAS

Route::resource('gestor_examenes/tipo_pregunta', 'gestor_examenes\\tipo_preguntaController');

//INICIO RUTAS RESPUESTAS DE OPCION MULTIPLE
Route::resource('gestor_examenes/multiples', 'gestor_examenes\\multiplesController');

Route::get('gestor_examenes/multiples/{id_pregunta}/index', 'gestor_examenes\\multiplesController@index');

Route::get('gestor_examenes/multiples/{id_pregunta}/create', 'gestor_examenes\\multiplesController@create');

Route::get('gestor_examenes/multiples/{id}/{id_pregunta}/edit', 'gestor_examenes\\multiplesController@edit');

Route::get('gestor_examenes/multiples/{id}/{id_pregunta}/show', 'gestor_examenes\\multiplesController@show');

Route::get('gestor_examenes/multiples/{id}/{id_pregunta}/delete', 'gestor_examenes\\multiplesController@destroy');
//FIN RUTAS RESPUESTAS DE OPCION MULTIPLE

//INICIO RUTAS RESPUESTAS DE OPCION MULTIPLE_VARIOS

Route::resource('gestor_examenes/multiples_varios', 'gestor_examenes\\multiples_variosController');
Route::get('gestor_examenes/multiples_varios/{id_pregunta}/index', 'gestor_examenes\\multiples_variosController@index');

Route::get('gestor_examenes/multiples_varios/{id_pregunta}/create', 'gestor_examenes\\multiples_variosController@create');

Route::get('gestor_examenes/multiples_varios/{id}/{id_pregunta}/edit', 'gestor_examenes\\multiples_variosController@edit');

Route::get('gestor_examenes/multiples_varios/{id}/{id_pregunta}/show', 'gestor_examenes\\multiples_variosController@show');

Route::get('gestor_examenes/multiples_varios/{id}/{id_pregunta}/delete', 'gestor_examenes\\multiples_variosController@destroy');

//FIN RUTAS RESPUESTAS DE OPCION MULTIPLE_VARIOS

//INICIO RUTAS RESPUESTAS DE OPCION DE DESARROLLO



Route::resource('gestor_examenes/desarrollo', 'gestor_examenes\\desarrolloController');
//{id_pregunta} id de la pregunta
Route::get('gestor_examenes/desarrollo/{id_pregunta}/{id_examen}/create', ['as' => 'examenes.desarrollo.create','uses' => 'gestor_examenes\\desarrolloController@create']);
//{id} id de la respuesta
Route::get('gestor_examenes/desarrollo/{id}/{id_examen}/edit', ['as' => 'examenes.desarrollo.edit','uses' => 'gestor_examenes\\desarrolloController@edit']);
//{id} id de la respuesta
Route::get('gestor_examenes/desarrollo/{id}/{id_examen}/show', ['as' => 'examenes.desarrollo.show','uses' => 'gestor_examenes\\desarrolloController@show']);
//{id} id de la respuesta
Route::get('gestor_examenes/desarrollo/{id}/{id_examen}/delete', ['as' => 'examenes.desarrollo.delete','uses' => 'gestor_examenes\\desarrolloController@destroy']);


//FIN RUTAS RESPUESTAS DE OPCION DE DESARROLLO

//INICIO RUTAS RESPUESTAS DE OPCION SIMPLE

Route::resource('gestor_examenes/simple', 'gestor_examenes\\simpleController');

//{id_pregunta} id de la pregunta
Route::get('gestor_examenes/simple/{id_pregunta}/{id_examen}/create', ['as' => 'examenes.simple.create','uses' => 'gestor_examenes\\simpleController@create']);
//{id} id de la respuesta
Route::get('gestor_examenes/simple/{id}/{id_examen}/edit', ['as' => 'examenes.simple.edit','uses' => 'gestor_examenes\\simpleController@edit']);
//{id} id de la respuesta
Route::get('gestor_examenes/simple/{id}/{id_examen}/show', ['as' => 'examenes.simple.show','uses' => 'gestor_examenes\\simpleController@show']);
//{id} id de la respuesta
Route::get('gestor_examenes/simple/{id}/{id_examen}/delete', ['as' => 'examenes.simple.delete','uses' => 'gestor_examenes\\simpleController@destroy']);

//FIN RUTAS RESPUESTAS DE OPCION SIMPLE

//INICIO RUTAS RESPUESTAS FALSO O VERDADERO
Route::resource('gestor_examenes/falsoverdadero', 'gestor_examenes\\falsoverdaderoController');

//{id_pregunta} id de la pregunta
Route::get('gestor_examenes/falsoverdadero/{id_pregunta}/{id_examen}/create', ['as' => 'examenes.falsoverdadero.create','uses' => 'gestor_examenes\\falsoverdaderoController@create']);
//{id} id de la respuesta
Route::get('gestor_examenes/falsoverdadero/{id}/{id_examen}/edit', ['as' => 'examenes.falsoverdadero.edit','uses' => 'gestor_examenes\\falsoverdaderoController@edit']);
//{id} id de la respuesta
Route::get('gestor_examenes/falsoverdadero/{id}/{id_examen}/show', ['as' => 'examenes.falsoverdadero.show','uses' => 'gestor_examenes\\falsoverdaderoController@show']);
//{id} id de la respuesta
Route::get('gestor_examenes/falsoverdadero/{id}/{id_examen}/delete', ['as' => 'examenes.falsoverdadero.delete','uses' => 'gestor_examenes\\falsoverdaderoController@destroy']);

//FIN RUTAS RESPUESTAS FALSO O VERDADERO

//INICIO DE RUTAS PARA NOTAS

Route::resource('gestor_examenes/nota', 'gestor_examenes\\notaController');

Route::get('gestor_examenes/nota/{id_curso}/{id_examen}/create', ['as' => 'examenes.nota.create','uses' => 'gestor_examenes\\notaController@create']);

//FIN DE RUTAS PARA NOTAS


//INICIO DE RUTAS PARA DAR EL EXAMEN



Route::get('darexamen/{id_nota}/{id_examen}/formulario_examen', 'gestorexamenesController@formulario_examen');


Route::get('verexamen/{id_examen}/{id_curso}/formulario_examen_docente', 'gestorexamenesController@formulario_examen_docente');

Route::post('darexamen/formulario_examen/calcular_nota', 'gestorexamenesController@calcular_nota');
//Route::get('pdf2', 'gestorexamenesController@crear_pdf');


//FIN DE RUTAS PARA DAT EL EXAMEN

//

Route::get('gestor_examenes/examen/{id_curso}/ver_examenes_estudiante', 'gestor_examenes\\examenController@ver_examenes_estudiante');

Route::get('gestor_examenes/examen/{id_curso}/listar_estudiantes', 'gestor_examenes\\examenController@listar_estudiantes');
/*
 esta ruta llega cuando presinas crar examne en el index(+) y nos manda
 el id del curso , para luego crear un examen
*/
Route::get('gestor_examenes/examen/{id_curso}/create', 'gestor_examenes\\examenController@crear_examen');
/*
esta ruta nos llega del contenido del curso para crear nuevo examen(ojo primero lista)
gestor_examenes/'.$id_curso.'/examen
*/
Route::get('gestor_examenes/{id_curso}/examen_envio', 'gestor_examenes\\examenController@index');

Route::get('gestor_examenes/{id_curso}/examen', 'gestor_examenes\\examenController@listar');
/*
esta ruta es para modificar los datos y nos llega de editar con dos paramotres
url('/gestor_examenes/examen/' . $item->id . '/update/'.$id_curso.'/edit')
*/
Route::get('gestor_examenes/examen/{id}/update/{id_curso}/edit', 'gestor_examenes\\examenController@edit');

/*
Esta ruta lega despues de Preisnar el voton ver examen  y nos envia dos parametros]
url('/gestor_examenes/examen/'. $item->id.'/ver/'.$id_curso.'/materia')
*/
Route::get('gestor_examenes/examen/{id}/ver/{id_curso}/materia', 'gestor_examenes\\examenController@show');


/*
Esta ruta lega despues de Preisnar el voton Eliminar examen y nos envia dos parametros]
['/gestor_examenes/'.$item->id.'/examen/'.$id_curso.'/delete' ]
['/gestor_examenes/'. $item->id .'/examen/'. $id_curso .'/delete'
*/
//Route::get('gestor_examenes/{id}/examen/{id_curso}/delete', 'gestor_examenes\\examenController@destroy');
Route::get('gestor_examenes/examen/{id}/delete/{id_curso}/destroy', 'gestor_examenes\\examenController@destroy');

//INICIO DE RUTAS PARA COPIAS DE SEGURIDAD

Route::resource('copia_seguridad/backups', 'copia_seguridad\\backupsController');

Route::get('copia_seguridad/generar_backup/backups', 'copia_seguridad\\backupsController@create');

Route::get('copia_seguridad/restaurar_backup/{id}/backups', 'copia_seguridad\\backupsController@restaurar');

//FIN DE RUTAS PARA COPIAS DE SEGURIDAD

/*
NOTA.- Apartir de esta instruccion solo se debe aniadir rutas para tareas
*/




/*
* Esta ruta viene de contenido de curso, despues de presionar mis tareas
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
*url('gestor_examenes/'.$id_curso.'/tareas/listar') 

*/
Route::get('gestor_examenes/{id_curso}/tareas/listar', 'gestor_examenes\\tareaController@listar');


/*
* esta ruta llega despues de presionar crear tarea con el id de la materia
* luego va al controlador,, al metodo createtask
*url('/gestor_examenes/tarea/'.$id_curso./create')
*/
//Route::get('gestor_examenes/tarea/{id_curso}/create', 'gestor_examenes\\tareaController@create');	
//url('/gestor_examenes/'.$id_curso.'/tarea/create')
Route::get('/gestor_examenes/{id_curso}/tarea/create', 'gestor_examenes\\tareaController@createTask');	


/*
* Esta ruta viene de listar tareas con 2 parametros
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
*url('/gestor_examenes/'.$id_Curso.'/materia/'.$tipo.'/tarea/' . $item->id . '/edit')

*/
Route::get('gestor_examenes/{id_curso}/materia/{tipo}/tarea/{id}/edit', 'gestor_examenes\\tareaController@edit');



/*
* Esta ruta viene despues presinar terminar tarea(al crear tarea)
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
*url('/gestor_examenes/{id_curso}/tarea/upload')
*/
Route::post('/gestor_examenes/{id_curso}/tarea/upload', 'gestor_examenes\\tareaController@store');


/*
* Esta ruta viene despues presinar eliminar tarea
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
*url('/gestor_examenes/'.$id_curso.'/materia/tarea/' . $item->id . '/destroy')
*/
Route::get('gestor_examenes/{id_curso}/materia/tarea/{id_tarea}/destroy', 'gestor_examenes\\tareaController@destroy');

//Route::post('/upload','gestor_examenes\\tareaController@postUpload');

Route::get('/probando_test', 'gestorusuarioController@ellasefue');

Route::post('/probando2_test/lola', 'gestorusuarioController@envio');

Route::resource('admin/enviado', 'gestor_examenes\\enviadoController');

//INICIO DE RUTAS BITACORAS

Route::get('/bitacora_curso', 'bitacoraController@bitacora_curso');

Route::get('/bitacora_tarea', 'bitacoraController@bitacora_tarea');

Route::get('/bitacora_examen', 'bitacoraController@bitacora_examen');
//FIN DE RUTAS BITACORAS



/*
* Esta ruta viene despues presinar enviar tarea
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
* url('/gestor_examenes/'.$id_curso.'/enviar/' . $item->id . '/edit')
*/
Route::get('/gestor_examenes/{id_curso}/enviar/{id}/edit', 'gestor_examenes\\tareaController@editEnviar');

/*
NOTA.- Apartir de esta instruccion solo se debe aniadir rutas para tareas
*/
Route::resource('gestor_examenes/tarea', 'gestor_examenes\\tareaController');
/*
* Esta ruta viene despues presinar enviar tarea
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
* url('/gestor_examenes/enviar/'.$id_curso.'/'.$item->id.'/create')
*/
Route::get('/gestor_examenes/enviar/{id_curso}/{id}/create', 'gestor_examenes\\enviadoController@create');
/*
* Esta ruta viene despues presinar enviar tarea , cuando estamos en el contenido del curso
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
*url('gestor_examenes/'.$id_curso.'/envio')
*/
Route::get('gestor_examenes/{id_curso}/envio', 'gestor_examenes\\enviadoController@listar');


 
/*
* Esta ruta viene despues presinar editar tarea
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
* parametro1@ id de la tarea
*url('/gestor_examenes/'.$id_curso.'/materia/'.$tipo.'/tarea/' . $item->id . '/edit')
*/
Route::get('gestor_examenes/{id_curso}/materia/{tipo}/tarea/{id_tarea}/edit', 'gestor_examenes\\tareaController@edit');

/*
* Esta ruta viene despues presinar update tarea(ojo aka se tiene dos metodos)
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
* parametro1@ id de la tarea
*'url' => '/gestor_examenes/{id_curso}/tarea/{tipo}/{trans('tarea.id')}/update'
*/
Route::get('/gestor_examenes/{id_curso}/tarea/{tipo}/{id}/update', 'gestor_examenes\\tareaController@update');


/*
NOTA.- Apartir de esta instruccion solo se debe aniadir tareas enviadas al estudiante
*/

/*
* Esta ruta viene despues presinar mis tareas
* parametro1@ id del curso
* url('gestor_examenes/'.$id_curso.'/tareas/recibidos')
*/
Route::get('/gestor_examenes/{id_curso}/tareas/recibidos', 'gestor_examenes\\enviadoController@tareas_recibidos');



/*
NOTA.- Apartir de esta instruccion solo se debe solo para enviar las tareas por parte del estudiante
*/

/*
* Esta ruta viene despues presinar enviar tarea
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
* url('/gestor_examenes/'.$id_curso.'/'.$item->id.'/entregar_tarea')
*/
Route::get('/gestor_examenes/{id_curso}/{id}/entregar_tarea','gestor_examenes\\entregadoController@mostrar_formulario');
//gestor_examenes.tareasrecibidos.recibidos
//Route::get('/gestor_examenes/{id_curso}/tareas/recibidos', 'gestor_examenes\\enviadoController@tareas_recibidos');
Route::resource('gestor_examenes/entregado', 'gestor_examenes\\entregadoController');



/*
* Esta ruta viene despues presinar enviar tarea
* parametro1@ id del curso
* parametro1@ tipo de evento(crear tarea/ Mis tareas)
* '/gestor_examenes/{id_curso}/archivo/{id}/upload'
/gestor_examenes/{id_curso}/archivo/{id}/upload'
*/
Route::post('/gestor_examenes/{id_curso}/archivo/{id}/upload','gestor_examenes\\entregadoController@store');

Route::resource('admin/notificacion', 'Admin\\notificacionController');


/*
NOTA.- Apartir de esta instruccion solo se debe aniadir planillas
*/

/*
* Esta ruta viene despues presinar ver planilla de estudiantes
* parametro1@ id del curso
* url('gestor_planillas/'.$id_curso.'/planilla/listar')
*/
Route::get('gestor_planillas/{id_curso}/planilla/listar', 'gestor_planillas\\planillaController@listar');
/*
* Esta ruta viene despues presinar en gestor planilla, el boton editar
* parametro1@ id del curso
* parametro1@ id del ususario
* url('/gestor_planilla/'.$id_curso.'/planilla/' . $item->id_user . '/edit') 
*/
Route::get('/gestor_planillas/{id_curso}/planilla/{id_user}/modificar','gestor_planillas\\planillaController@modificar');
/*
* Esta ruta viene despues presinar en gestor planilla, el boton editar varios
* parametro1@ id del curso
* parametro1@ id del ususario
* url('/gestor_planilla/'.$id_curso.'/planilla/' . $item->id_user . '/edit') 
*/
Route::get('/gestor_planillas/{id_curso}/modificar/varios','gestor_planillas\\planillaController@modificar_varios');

/*
* Esta ruta viene despues presinar en gestor planilla, el boton editar
* parametro1@ id del curso
* parametro1@ id del ususario
* url('/gestor_planilla/'.$id_curso.'/planilla/' . $item->id_user . '/edit') 
*/
Route::get('/gestor_planillas/{id_curso}/planilla/{id_user}/{id_examen}/edit', 'gestor_planillas\\planillaController@edit');

///gestor_planillas/planilla
Route::resource('gestor_planillas/planilla', 'gestor_planillas\\planillaController');


/*
* Esta ruta viene despues presinar ver kardex (de parte de estuciate)
* parametro1@ id del curso
* url('gestor_planillas/ver/kardex'
*/
//Route::get('gestor_planillas/ver/kardex', 'gestor_planillas\\planillaController@kardex');

/*
* Esta ruta viene despues presinar ver kardex (de parte de estudiante)
* parametro1@ id del curso
* url('gestor_planillas/ver/kardex'
*/
Route::get('gestor_planillas/{id_curso}/ver/kardex', 'gestor_planillas\\planillaController@kardex');

/*
NOTA.- Apartir de esta instruccion solo se debe aniadir foros
*/
Route::resource('foro', 'gestor_foros\\foroController');


Route::resource('/gestor_foros/comentario', 'gestor_foros\\comentarioController');

/*
* Esta ruta viene despues presinar ver kardex (de parte de estudiante)
* parametro1@ id del curso
* url('gestor_foros/'.$id_curso.'/foro')
*/
Route::get('gestor_foros/{id_curso}/foro', 'gestor_foros\\foroController@listar');


/*
* Esta ruta viene despues presinar crear foro
* parametro1@ id del curso
* url('gestor_foros/'.$id_curso'.'/crear/foro')
*/
Route::get('gestor_foros/{id_curso}/crear/foro', 'gestor_foros\\foroController@crear_foro');	

/*
* Esta ruta viene despues presinar crear foro
* parametro1@ id del curso
* /gestor_foros/{id_curso}/save/foro
*/
Route::post('/gestor_foros/{id_curso}/save/foro', 'gestor_foros\\foroController@save_foro');


/*
* Esta ruta viene despues presinar en gestor foros , el boton elimnar foro
* parametro@ id del curso
*url('/gestor_foros/' . $item->id . '/delete/'.$id_curso.'/destroy')
*/
Route::get('gestor_foros/{id}/delete/{id_curso}/destroy', 'gestor_foros\\foroController@destroy'); 



/*
* Esta ruta viene despues presinar en gestor foros , el boton comentar
* parametro@ id del curso
  
* url('gestor_foros/'.$id_curso.'/crear/'.$item->id_foro.'/comentario') 
*redirect('gestor_foros/'.$id_curso.'/crear/'.$id_foro.'/comentario');
*/
Route::get('gestor_foros/{id_curso}/crear/{id_foro}/comentario', 'gestor_foros\\comentarioController@show_comentario');



/*
* Esta ruta viene despues presinar en gestor foros , el boton comentar
* parametro@ id del curso
* url('gestor_foros/'.$id_curso.'/nuevo/'.$id_foro.'/comentario') 
*/
Route::get('gestor_foros/{id_curso}/nuevo/{id_foro}/comentario', 'gestor_foros\\comentarioController@comentar'); 




/*
* Esta ruta viene despues presinar en gestor foros , el boton eliminar comentario
* parametro@ id comnetario
* parametro@ id del curso
* url('/gestor_foros/' . $item->id_coment . '/delete/'.$id_curso.'/comentario/destroy')
*/
Route::get('gestor_foros/{id_coment}/delete/{id_curso}/comentario/{id_foro}/destroy', 'gestor_foros\\comentarioController@destroy'); 






Route::resource('gestor_examenes/respuesta_desarrollo', 'gestor_examenes\\respuesta_desarrolloController');