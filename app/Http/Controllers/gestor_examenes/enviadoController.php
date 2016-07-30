<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\enviado;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;


class enviadoController extends Controller
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
     public function listar($id_curso)
    {
          $enviar_tarea = DB::table('tareas')->where('id_cursos', $id_curso)->get();

        return view('gestor_examenes.enviado.enviar', compact('enviar_tarea','id_curso'));
    }

    /**
     * este es para crear un formi=ulario de examen
     *@param  int  $id_curso es el id del curso
     *@param  int  $id es el id de la tarea a enviar
     * @return void
     */
    public function create($id_curso,$id)
    {
         $mensajeError='';
        return view('gestor_examenes.enviado.create',compact('id_curso','id', 'mensajeError'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['fecha_limite' => 'required', ]);
        $id_curso=$request->input('id_curso');
        $id=$request->input('id');

        $fecha_actual= date("Y-m-d"); 
        $fecha_fin=$request->input('fecha_limite');
        // $fecha_fin=$this->parser($fecha_fin);

        $mensajeError='';

        if($fecha_fin < $fecha_actual){
            $mensajeError.='La Fecha Limite no es Valida';
            return view('gestor_examenes.enviado.create',compact('id_curso','id','mensajeError'));
        }else{
            $id_curso=$request->input('id_curso');
             $id_tarea=$request->input('id');                 
         DB::table('enviados')->insert(['fecha_limite' => $request->input('fecha_limite'),'id_tarea'=> $request->input('id')]
         );



         // aparir de aca es para notificaciones

         $tarea= DB::table('tareas')
           ->where('id_cursos', $id_curso)
           ->where('id', $id_tarea)
           ->select('tareas.nombre_tarea')
            ->get();
            //first();




         
          $estudiantes= DB::table('curso_inscritos')->where('curso_id', $id_curso)->get();

         foreach ($estudiantes as $item) {
            
                    DB::table('notificacions')->insert(['id_user' => $item->user_id,'id_curso' => $id_curso, 'descripcion' => $tarea[0]->nombre_tarea,'visto' => 'false']
         );

        }


        //enviado::create($request->all());

        Session::flash('flash_message', 'enviado added!');
   
        return redirect('gestor_examenes/'.$id_curso.'/envio');

        }

         
    }
    public function parser($cadena){

        $res=  explode("T", $cadena);

        $res=$res[0].' '.$res[1].':00';

        return $res;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $enviado = enviado::findOrFail($id);

        return view('gestor_examenes.enviado.show', compact('enviado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id_curso,$id)
    {
        $enviado = enviado::findOrFail($id);

        return view('gestor_examenes.enviado.edit', compact('enviado'));
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
        $this->validate($request, ['fecha_limite' => 'required', ]);

        $enviado = enviado::findOrFail($id);
        $enviado->update($request->all());

        Session::flash('flash_message', 'enviado updated!');

        return redirect('admin/enviado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        enviado::destroy($id);

        Session::flash('flash_message', 'enviado deleted!');

        return redirect('admin/enviado');
    }
       
     /**
     * Es para mostrar las tareas recibidos
     *
     * @param  int  $id_curso es el id del curso
     *
     * @return void
     */
    public function tareas_recibidos($id_curso)
    {
      $tareas= DB::table('tareas')
            ->where('id_cursos', $id_curso)
            ->join('enviados', 'tareas.id', '=', 'enviados.id_tarea')
            ->select('tareas.nombre_tarea','tareas.descripcion','tareas.archivo','tareas.path_archivo','enviados.id', 'enviados.fecha_limite')
            ->get();
     return view('gestor_examenes.tareasrecibidos.recibido', compact('tareas','id_curso'));
    //return redirect('admin/enviado');
    }
}
