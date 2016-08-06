<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\entregado;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\tarea;
use DB;
use Illuminate\Support\Facades\Input;
use Hash;
use Auth;

class entregadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $entregado = entregado::paginate(15);





        return view('gestor_examenes.entregado.index', compact('entregado'));
    }
     public function listar()
    {
          $foro= DB::table('foros')
            ->where('id_curso', $id_curso)
            ->join('users', 'users.id', '=', 'foros.id_user')
            ->orderBy('fecha', 'desc')
            ->select('foros.id AS id_foro','users.id AS id_user','users.name','users.apellido','foros.titulo','foros.mensaje','foros.archivo','foros.fecha')
            ->get();



        

        return view('gestor_examenes.entregado.index', compact('entregado'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('gestor_examenes.entregado.create');
    }


 /**
     * Show the form for creating a new resource.
     *
    * @param  int  $id_curso  es el id del curso
     * @param  int  $id  es el id de tareas enviados
  
     * @return void
     */
  public function mostrar_formulario($id_curso,$id)
    {

        return view('gestor_examenes.entregado.subir_archivo',compact('id_curso','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
       // $this->validate($request, ['descripcion_tarea' => 'required', 'archivo' => 'required', 'fecha' => 'required', 'puntaje' => 'required', ]);

        //entregado::create($request->all());

       // Session::flash('flash_message', 'entregado added!');

       // return redirect('gestor_examenes/entregado');

          $this->validate($request, ['descripcion_tarea', 'archivo', 'fecha', 'puntaje', ]);
        $id_curso=$request->input('id_curso');
        $id_enviado=$request->input('id');
        $id_user=Auth::Id();
        $fecha_actual = date("Y-m-d H:i:s");
        $puntaje=5;

      if (!empty($_FILES)) {
        $temporalFile=$_FILES['archivo']['tmp_name'];
        //$path="/xampp/htdocs/git2/public/uploads/";
        $path=public_path().'/uploads/';
        $fileName=$path.'-'.Hash::make($_FILES['archivo']['name']);
        $fileType=$_FILES['archivo']['type'];
        $fileSize=($_FILES['archivo']['size']/1024);
        $nombreArchivo=$_FILES['archivo']['name'];
  
         $dir_subida = $path;
         $fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);
         if (move_uploaded_file($_FILES['archivo']['tmp_name'],$fichero_subido)) {

           DB::table('entregados')->insert(['descripcion_tarea' => $request->input('descripcion'), 
          'archivo' => $nombreArchivo,'fecha' => $fecha_actual,
          'puntaje' => $puntaje,'id_user'=>$id_user,
          'id_enviado'=> $request->input('id')]
         );
 
         }else{

        

           DB::table('entregados')->insert(['descripcion_tarea' => $request->input('descripcion'), 
          'fecha' => $fecha_actual,'puntaje' => $puntaje,'id_user'=>$id_user,
          'id_enviado'=> $request->input('id')]
         );
 

         }
        }
            
       ///gestor_examenes/{id_curso}/tareas/recibidos'
        Session::flash('flash_message', 'entregado added!');
        return redirect('gestor_examenes/'.$id_curso.'/tareas/recibidos');
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
        $entregado = entregado::findOrFail($id);

        return view('gestor_examenes.entregado.show', compact('entregado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $entregado = entregado::findOrFail($id);

        return view('gestor_examenes.entregado.edit', compact('entregado'));
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
        $this->validate($request, ['descripcion_tarea' => 'required', 'archivo' => 'required', 'fecha' => 'required', 'puntaje' => 'required', ]);

        $entregado = entregado::findOrFail($id);
        $entregado->update($request->all());

        Session::flash('flash_message', 'entregado updated!');

        return redirect('gestor_examenes/entregado');
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
        entregado::destroy($id);

        Session::flash('flash_message', 'entregado deleted!');

        return redirect('gestor_examenes/entregado');
    }
}
