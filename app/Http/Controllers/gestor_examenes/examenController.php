<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\examan;
use App\curso;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Auth;

class examenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    /*public function index($id_curso)
    {
        //$examen = examan::paginate(15);

        //controlamos docentes que envian examen nuevamente podran enviar si termina fecha fin de envio
        $fecha_actual = date("Y-m-d H:i:s");
        $examen_control = DB::table('examens')->where('id_cursos', $id_curso)->get();
        $ids_exa_control=array();
        $puntero=0;
        foreach ($examen_control as $item) {
         $ids_exa_control[$puntero]=$item->id;
         $puntero++;
        }
        for ($i=0; $i < count($ids_exa_control) ; $i++) { 
            $exa = DB::table('notas')->where('examen_id', $ids_exa_control[$i])->get();
            $exa_fil = DB::table('notas')->where('examen_id', $ids_exa_control[$i])->where('fecha_fin','<',$fecha_actual)->get();

            if(count($exa) == count($exa_fil)){
             DB::table('examens')->where('id',$ids_exa_control[$i])->update(array('estado_examen'=>1));
            }
        }
          $mensaje_puntaje="";
        //$examen = DB::table('examens')->where('id_cursos', $id_curso)->where('estado_examen',1)->get();
        $examen = DB::table('examens')->where('id_cursos', $id_curso)->get();

        return view('gestor_examenes.examen.index_envio',compact('examen','id_curso', 'mensaje_puntaje'));
    }
  */
   public function listar($id_curso)
    {
        //controlamos docentes que envian examen nuevamente podran enviar si termina fecha fin de envio
        $fecha_actual = date("Y-m-d H:i:s");
        $examen_control = DB::table('examens')->where('id_cursos', $id_curso)->get();
        $ids_exa_control=array();
        $puntero=0;
        foreach ($examen_control as $item) {
         $ids_exa_control[$puntero]=$item->id;
         $puntero++;
        }
        for ($i=0; $i < count($ids_exa_control) ; $i++) { 
            $exa = DB::table('notas')->where('examen_id', $ids_exa_control[$i])->get();
            $exa_fil = DB::table('notas')->where('examen_id', $ids_exa_control[$i])->where('fecha_fin','<',$fecha_actual)->get();

            if(count($exa) == count($exa_fil)){
             DB::table('examens')->where('id',$ids_exa_control[$i])->update(array('estado_examen'=>1));
            }
        }
          
         $mensaje_puntaje="";

         $examen = DB::table('examens')->where('id_cursos', $id_curso)->get();

        return view('gestor_examenes.examen.index',compact('examen','id_curso', 'mensaje_puntaje'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

        return view('gestor_examenes.examen.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre_examen' => 'required',]);

         $id_curso=$request->input('id_curso');
         $fecha_actual = date("Y-m-d");
         
         DB::table('examens')->insert(['nombre_examen' => $request->input('nombre_examen'), 'estado_examen' => 1,
          'fecha_examen' => $fecha_actual,'puntaje_totalm' => $request->input('puntaje_totalm'),'id_cursos'=> $request->input('id_curso')]
         );

               //store procedure
            $nombre_examen = $request->input('nombre_examen');
            $fecha_examen = $fecha_actual;
            $puntaje_examen= $request->input('puntaje_totalm');
            $nombre_curso = DB::table('cursos')->where('id',$request->input('id_curso'))->first();
            $dato_nuevo=$nombre_examen.'#'.$fecha_examen.'#'.$nombre_curso->nombre.'#'.$puntaje_examen;//1
            $dato_viejo="";//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="examenes";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='create';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

        Session::flash('flash_message', 'examan added!');

        return redirect('gestor_examenes/'. $id_curso.'/examen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id,$id_curso)
    {
        $examan = examan::findOrFail($id);

        return view('gestor_examenes.examen.show', compact('examan','id_curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id,$id_curso)
    {
        $examan = examan::findOrFail($id);

        return view('gestor_examenes.examen.edit', compact('examan','id_curso'));
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
        $this->validate($request, ['nombre_examen' => 'required',]);
        $id_curso=$request->input('id_curso');


        $examen=DB::table('examens')->where('id',$id)->first();
              //store procedure
            $nombre_examen = $examen->nombre_examen;
            $fecha_examen = $examen->fecha_examen;
            $nombre_curso = DB::table('cursos')->where('id',$id_curso)->first();
            $puntaje_examen=$examen->puntaje_totalm;
            $dato_nuevo="";//1
            $dato_viejo=$nombre_examen.'#'.$fecha_examen.'#'.$nombre_curso->nombre.'#'.$puntaje_examen;//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="examenes";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='update';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

        $examan = examan::findOrFail($id);
        $examan->update($request->all());


        $recurso= DB::table('bitacora_examenes')->where('usuario_bi', $nombre_usuario)->where('fecha_bi', $fecha_a)->first();
           $recurso=$recurso->id;

         //store procedure
            $nombre_examen = $request->input('nombre_examen');
            $fecha_examen = date("Y-m-d H:i:s");
            $nombre_curso = DB::table('cursos')->where('id',$request->input('id_curso'))->first();
            $puntaje_examen= $request->input('puntaje_totalm');
            $dato_nuevo=$nombre_examen.'#'.$fecha_examen.'#'.$nombre_curso->nombre.'#'.$puntaje_examen;//1
            $dato_viejo="";//2
            $accion_a='updaten';//6
            $id_bi=$recurso;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure


        Session::flash('flash_message', 'examan updated!');

         return redirect('gestor_examenes/'. $id_curso.'/examen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id,$id_curso)
    {
          $examen=DB::table('examens')->where('id',$id)->first();
              //store procedure
            $nombre_examen = $examen->nombre_examen;
            $fecha_examen = $examen->fecha_examen;
            $nombre_curso = DB::table('cursos')->where('id',$id_curso)->first();
            $puntaje_examen= $examen->puntaje_totalm;
            $dato_nuevo="";//1
            $dato_viejo=$nombre_examen.'#'.$fecha_examen.'#'.$nombre_curso->nombre.'#'.$puntaje_examen;//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="examenes";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='delete';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure
        
        examan::destroy($id);

        Session::flash('flash_message', 'examan deleted!');

        return redirect('gestor_examenes/'. $id_curso.'/examen');
    }

     /**
     * es para crear un nuevo examen.
     *
     * @return void
     */
    public function crear_examen($id_curso)
    {

      return view('gestor_examenes.examen.create', compact('id_curso'));

    }

    public function listar_estudiantes($id_curso){

       $estudiantes_insritos = DB::table('curso_inscritos')->where('curso_id', $id_curso)->get();
       $ids_estudiantes=array();
       
       $index=0;
       foreach ($estudiantes_insritos as $item) {
           
           $ids_estudiantes[$index]= $item->user_id;

        $index++;
       }

       $datos_estudiante=array();//estudiantes inscritos

       for ($i=0; $i < count($ids_estudiantes) ; $i++) { 

         $estudiante = DB::table('users')->where('id', $ids_estudiantes[$i])->first();
         $datos_estudiante[$i]=$estudiante;

       }


        $examenes= DB::table('examens') ->where('id_cursos', $id_curso)->get();//examenes
      

       
       return view('gestorcursos.mis_estudiantes', compact('datos_estudiante', 'id_curso', 'examenes'));

    }

    public function ver_examenes_estudiante($id_curso){
       
       //$fecha_actual = date("Y-m-d");
      $fecha_actual = date("Y-m-d H:i:s");

       $examenes = DB::table('examens')->where('id_cursos', $id_curso)->get();
       $ids_examenes=array();
       
       $index=0;
       foreach ($examenes as $item) {
           
           $ids_examenes[$index]=$item->id;
          $index++;
       }
       
       $id_user=Auth::id(); 

       //actualiza la vista mis examenes de los estudiantes
       for ($m=0; $m < count($ids_examenes); $m++) { 

         //$nota_t= DB::table('notas')->where('user_id', $id_user)->where('examen_id', $ids_examenes[$m])->where('estado',true)->get();

          $nota= DB::table('notas')->where('user_id', $id_user)->where('examen_id', $ids_examenes[$m])->where('estado',true)->where('fecha_fin', '<', $fecha_actual)->get();

          if(count($nota)>0){
            foreach ($nota as $item) {

             DB::table('notas')->where('id',$item->id)->update(array('estado'=>0));

            }
          } 

       }
    

       $notas=array();
       $puntero_nota=0;
       for ($i=0; $i < count($ids_examenes); $i++) {

          $objeto_nota= DB::table('notas')->where('user_id', $id_user)->where('examen_id', $ids_examenes[$i])->where('estado',true)->where('fecha_fin', '>=', $fecha_actual)->first();

          if(!is_null($objeto_nota)){

             $notas[$puntero_nota]=$objeto_nota;
            
             $puntero_nota++; 

          } 

       }
       
      
       return view('gestor_examenes.nota.mis_examenes',compact('notas', 'id_curso'));
    }
}
