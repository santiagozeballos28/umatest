<?php

namespace App\Http\Controllers\gestor_planillas;
//use App\Http\Controllers\gestor_examenes;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\enviado;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Auth;


class planillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $enviado = enviado::paginate(15);

        return view('gestor_examenes.enviado.index', compact('enviado'));
    }
    /*
    * Nro | Apellido |Nombre | Primer parcial......| NFin |

    */
     public function listar($id_curso)
    {

            $estudiantes= DB::table('curso_inscritos')
            ->where('curso_id', $id_curso)
            ->join('users', 'users.id', '=', 'curso_inscritos.user_id')
            ->orderBy('apellido', 'asc')
            ->select('users.id AS id_user','users.apellido','users.name')
            ->get();

            $examenes= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->select('examens.id','examens.nombre_examen')
            ->get();
         
            $notas_estudiantes= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->join('notas', 'examens.id', '=', 'notas.examen_id')
            ->join('users', 'users.id', '=', 'notas.user_id')
            ->select('users.id AS id_user','examens.id AS examen_id','examens.nombre_examen','notas.calificacion')
            ->get();
       


        return view('gestor_planillas.planilla', compact('estudiantes','examenes','notas_estudiantes','id_curso'));
    }

    /*
    * Este metodo es para mandar a la vista
    * todos los datos para mostrar el kardex 
    * al estudiante
    * Nro | Apellido |Materia | Primer parcial......| NFin | 
    */
    /*
     public function kardex()
    {

            $id_user=Auth::id();
            $materias= DB::table('curso_inscritos')
            ->where('user_id', $id_user)
            ->join('cursos', 'cursos.id', '=', 'curso_inscritos.curso_id')
            ->select('curso_inscritos.user_id AS id_user','cursos.id AS id_curso','cursos.nombre')
            ->get();

            $calificaciones= DB::table('examens')
            ->join('materias', 'materias.id_curso', '=', 'examens.id_cursos')
            ->select('materias.id AS id_mat','examens.id AS id_exam','examens.nombre_examen','examens.calificacion')
            ->get();
         
        $examenes= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->select('examens.id','examens.nombre_examen')
            ->get();
       


        return view('gestor_planillas.kardex', compact('materias','calificaciones','examenes'));
    }

 */


        /*
    * Este metodo es para mandar a la vista
    * todos los datos para mostrar el kardex 
    * al estudiante
    * Nro | Apellido |Materia | Primer parcial......| NFin | 
    */
     public function kardex($id_curso)
    {



            $id_user=Auth::id();
           
            $examenes= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->select('examens.id','examens.nombre_examen')
            ->get();
         
            $calificaciones= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->join('notas', 'examens.id', '=', 'notas.examen_id')
            ->where('user_id', $id_user)
            ->select('examens.id','examens.nombre_examen','notas.calificacion')
            ->get();

           



        return view('gestor_planillas.kardex', compact('examenes','calificaciones','id_curso'));
    }


   /**
     * Muestra la vista para editar la vista
     *
     * @param  int  $id
     *
     * @return void
     */
    public function modificar($id_curso,$id_user)
    {
             $estudiantes= DB::table('curso_inscritos')
            ->where('curso_id', $id_curso)
            ->join('users', 'users.id', '=', 'curso_inscritos.user_id')
            ->orderBy('apellido', 'asc')
            ->select('users.id AS id_user','users.apellido','users.name')
            ->get();

            $examenes= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->select('examens.id','examens.nombre_examen')
            ->get();
         
            $notas_estudiantes= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->join('notas', 'examens.id', '=', 'notas.examen_id')
            ->join('users', 'users.id', '=', 'notas.user_id')
            ->select('users.id AS id_user','examens.id AS examen_id','examens.nombre_examen','notas.calificacion')
            ->get();
              
        return view('gestor_planillas.editar_planilla', compact('estudiantes','examenes','notas_estudiantes','id_curso'));
    }
      /**
     * Muestra la vista para editar la vista
     *
     * @param  int  $id
     *
     * @return void
     */
    public function modificar_varios($id_curso)
    {
             $estudiantes= DB::table('curso_inscritos')
            ->where('curso_id', $id_curso)
            ->join('users', 'users.id', '=', 'curso_inscritos.user_id')
            ->orderBy('apellido', 'asc')
            ->select('users.id AS id_user','users.apellido','users.name')
            ->get();

            $examenes= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->select('examens.id','examens.nombre_examen')
            ->get();
         
            $notas_estudiantes= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->join('notas', 'examens.id', '=', 'notas.examen_id')
            ->join('users', 'users.id', '=', 'notas.user_id')
            ->select('users.id AS id_user','examens.id AS examen_id','examens.nombre_examen','notas.calificacion')
            ->get();
              
        return view('gestor_planillas.editar_planilla', compact('estudiantes','examenes','notas_estudiantes','id_curso'));
    }
    public function modificar_notas($id_curso)
    {
             $estudiantes= DB::table('curso_inscritos')
            ->where('curso_id', $id_curso)
            ->join('users', 'users.id', '=', 'curso_inscritos.user_id')
            ->orderBy('apellido', 'asc')
            ->select('users.id AS id_user','users.apellido','users.name')
            //->distinct()
            ->get();

            $examenes= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->join('notas', 'examens.id', '=', 'notas.examen_id')
            ->orderBy('notas.fecha_inicio', 'asc')
            ->select('examens.id','examens.nombre_examen')
            ->distinct()
            ->get();
         
            $notas_estudiantes= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->join('notas', 'examens.id', '=', 'notas.examen_id')
            ->join('users', 'users.id', '=', 'notas.user_id')
            ->orderBy('notas.fecha_inicio', 'desc')
            ->select('users.id AS id_user','examens.id AS examen_id','examens.nombre_examen','notas.calificacion')
            //->distinct()
            ->get();
              
        return view('gestor_planillas.editar_planilla', compact('estudiantes','examenes','notas_estudiantes','id_curso'));
    }

    /**
     * Muestra el formulario para editar la planilla
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id_curso,$id_user,$id_examen)
    {
            $nota_estudiante= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->where('examens.id', $id_examen)
            ->join('notas', 'examens.id', '=', 'notas.examen_id')
            ->where('user_id', $id_user)
            ->select('examens.id AS id_examen','notas.id','examens.nombre_examen','notas.calificacion')
            ->get();

        
        return view('gestor_planillas.editar_nota', compact('nota_estudiante','id_user','id_curso','id_examen'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        //$this->validate($request, ['descripcion_tarea' => 'required', 'archivo' => 'required', 'fecha' => 'required', 'puntaje' => 'required', ]);

       // $entregado = entregado::findOrFail($id);
        //$entregado->update($request->all());
    

           $id_examen=$request->input('id_examen');
           $nueva_nota=$request->input('calificacion');
          DB::table('notas')
            ->where('notas.id',$id)
            ->update(['calificacion' =>$nueva_nota ]);
          $id_curso=$request->input('id_curso');
             $id_user=$request->input('id_user');
      
    

        Session::flash('flash_message', 'Nota ha sido aniadido!');
        return redirect('/gestor_planillas/' .$id_curso. '/planilla/'.$id_user.'/modificar');
    }


     /**
     * Muestra el formulario para editar la planilla
     * ->join('notas', 'examens.id', '=', 'notas.examen_id') ->where('user_id', $id_user)
     * @param  int  $id
     *
     * @return void
     */
   
     public function calificar($id_curso,$id_user,$id_examen)
    {
            $numero_pre=DB::table('preguntas')->where('examen_id',$id_examen)->where('tipo_pregunta_id', 2)->get();
            $numero_pre=count($numero_pre);
            $respuesta_desarrollos= DB::table('examens')
            ->where('id_cursos', $id_curso)
            ->where('examens.id', $id_examen)
            ->where('id_user', $id_user)
               // ->join('notas', 'examens.id', '=', 'notas.examen_id')           
            ->join('respuesta_desarrollos', 'examens.id', '=', 'respuesta_desarrollos.examen_id')
            ->join('preguntas', 'preguntas.id', '=', 'respuesta_desarrollos.pregunta_id')
            
            ->select('examens.id AS id_examen','examens.nombre_examen','respuesta_desarrollos.id AS id_resp',
                'preguntas.nombre_pregunta','preguntas.puntaje_pregunta','respuesta_desarrollos.respuesta',
           'respuesta_desarrollos.calificacion')
            ->orderBy('respuesta_desarrollos.id', 'desc')->take($numero_pre)
            ->get();
    
        
      //  return view('gestor_planillas.editar_nota', compact('nota_estudiante','id_user','id_curso','id_examen'));
            $mensaje_texto="";

    return view('gestor_examenes.respuesta_desarrollo.create', compact('respuesta_desarrollos','id_user','id_curso','id_examen', 'mensaje_texto'));    
    }

}
