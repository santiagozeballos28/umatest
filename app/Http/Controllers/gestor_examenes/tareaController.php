<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\tarea;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use Hash;
use Auth;

class tareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $tarea = tarea::paginate(15);

        return view('gestor_examenes.tarea.index', compact('tarea'));
    }
  /**
     * si el parametro es listar entonces lista todad=s las tareas.
     * si el parametro es crear entonces lista todad=s las tareas mas la opcion de crear tareas.
     * @param  int  $id_curso ,esl el id del curso
     * @param  varchar $tipo, es la opcion de crear y listar o solo listar
     * @return void
     */
    public function listar($id_curso)
    {
         $tarea = DB::table('tareas')->where('id_cursos', $id_curso)->get();

        //return view('gestor_examenes.examen.index',compact('examen','id_curso'));

        return view('gestor_examenes.tarea.lista_tarea', compact('tarea','id_curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create($id_curso)
    {
        return view('gestor_examenes.tarea.create', compact('id_curso'));
    }

    /**
     * Store a newly created resource in storage.


//controlador
public function store(CreateInvestigationRequest $request)
    {
        $input = $request->all();
        $file = $request->file('file');
        dd($file);
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre_tarea' => 'required', 'descripcion','fecha_creacion','puntaje_total',]);
        $id_curso=$request->input('id_curso');
       // $tipo=$request->input('tipo');
        $fecha_actual = date("Y-m-d H:i:s");

      if (!empty($_FILES)) {
        $temporalFile=$_FILES['archivo']['tmp_name'];
        //$path="/xampp/htdocs/git2/public/uploads/";
       // $path=public_path()."\\".'uploads'."\\";
         $path='uploads/';
        $fileName=$path.$_FILES['archivo']['name'];
        $fileType=$_FILES['archivo']['type'];
        $fileSize=($_FILES['archivo']['size']/1024);
        $nombreArchivo=$_FILES['archivo']['name'];
  
         $dir_subida = $path;
         $fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);
         if (move_uploaded_file($_FILES['archivo']['tmp_name'],$fichero_subido)) {

           DB::table('tareas')->insert(['nombre_tarea' => $request->input('nombre_tarea'), 'descripcion' => $request->input('descripcion'),
          'archivo' => $nombreArchivo,'path_archivo' => $fileName,'fecha_creacion' =>$fecha_actual,
          'puntaje_total' => $request->input('puntaje_total'),'id_cursos'=> $request->input('id_curso')]
         );

         //store procedure
            $nombre_tarea = $request->input('nombre_tarea');
            $descripcion = $request->input('descripcion');
            $fecha_creacion= $fecha_actual;
            $puntaje_total= $request->input('puntaje_total');
            $id_curso= $request->input('id_curso');
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;
            $fecha_a = date("Y-m-d H:i:s");
            $accion_a='create';
            $id_bi=0;

            DB::select('CALL PA_tarea(?,?,?,?,?,?,?,?,?)', array($nombre_tarea, $descripcion, $fecha_creacion, $puntaje_total,$id_curso,$nombre_usuario ,$fecha_a, $accion_a, $id_bi));

         }else{

             DB::table('tareas')->insert(['nombre_tarea' => $request->input('nombre_tarea'), 'descripcion' => $request->input('descripcion'),'fecha_creacion' => $fecha_actual,
          'puntaje_total' => $request->input('puntaje_total'),'id_cursos'=> $request->input('id_curso')]
         );
                      //store procedure
            $nombre_tarea = $request->input('nombre_tarea');
            $descripcion = $request->input('descripcion');
            $fecha_creacion= $fecha_actual;
            $puntaje_total= $request->input('puntaje_total');
            $id_curso= $request->input('id_curso');
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;
            $fecha_a = date("Y-m-d H:i:s");
            $accion_a='create';
            $id_bi=0;

         DB::select('CALL PA_tarea(?,?,?,?,?,?,?,?,?)', array($nombre_tarea, $descripcion, $fecha_creacion, $puntaje_total,$id_curso,$nombre_usuario ,$fecha_a, $accion_a, $id_bi));

         }
        }

        $tarea = DB::table('tareas')->where('id_cursos', $id_curso)->get();
         /*
        tarea::create($request->all());
        //$id_curso=$request->input('id_curso');
        $id_curso=$request->input('id_curso');
       $tipo=$request->input('tipo');
       */
        Session::flash('flash_message', 'tarea added!');
        return redirect('gestor_examenes/'.$id_curso.'/tareas/listar');
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
        $tarea = tarea::findOrFail($id);

        return view('gestor_examenes.tarea.show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id_curso,$tipo,$id)
    {
        $tarea = tarea::findOrFail($id);

        return view('gestor_examenes.tarea.edit', compact('tarea','id_curso','tipo'));
    }


       public function editEnviar($id_curso,$id)
    {
        $tarea = tarea::findOrFail($id);

        return view('gestor_examenes.tarea.editEnviar', compact('tarea','id_curso'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function updatenooo($id, Request $request)
    {
        $this->validate($request, ['nombre_tarea' => 'required', 'descripcion', 'archivo' , 'puntaje_total', ]);
         $tareas= DB::table('tareas')->where('id', $id)->first();
           //store procedure
            $nombre_tarea = $tareas->nombre_tarea;
            $descripcion = $tareas->descripcion;
            $fecha_creacion= $tareas->fecha_creacion;
            $puntaje_total= $tareas->puntaje_total;
            $id_curso= $tareas->id_cursos;
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;
            $fecha_a = date("Y-m-d H:i:s");
            $accion_a='update';
            $id_bi=0;

         DB::select('CALL PA_tarea(?,?,?,?,?,?,?,?,?)', array($nombre_tarea, $descripcion, $fecha_creacion, $puntaje_total,$id_curso,$nombre_usuario ,$fecha_a, $accion_a, $id_bi));

        $tarea = tarea::findOrFail($id);
        $tarea->update($request->all());

         $recurso= DB::table('bitacora_tareas')->where('usuario', $nombre_usuario)->where('fecha', $fecha_a)->first();
           $recurso=$recurso->id;
          
            $nombre_tarea = $request->input('nombre_tarea');
            $descripcion = $request->input('descripcion');
            $fecha_creacion= date("Y-m-d H:i:s");
            $puntaje_total= $request->input('puntaje_total');
            $id_curso= $request->input('id_curso');
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;
            $fecha_a = date("Y-m-d H:i:s");
            $accion_a='update';
            $id_bi=$recurso;

         DB::select('CALL PA_tarea(?,?,?,?,?,?,?,?,?)', array($nombre_tarea, $descripcion, $fecha_creacion, $puntaje_total,$id_curso,$nombre_usuario ,$fecha_a, $accion_a, $id_bi));

        
       $id_curso=$request->input('id_curso');
       


        Session::flash('flash_message', 'tarea updated!');
        //return redirect('gestor_examenes/tarea');
       return redirect('gestor_examenes/'.$id_curso.'/tareas/listar');
    }






public function update($id,Request $request)
    {
        $this->validate($request, ['nombre_tarea' => 'required', 'descripcion','fecha_creacion','puntaje_total',]);
        $id_curso=$request->input('id_curso');
   
        $fecha_actual = date("Y-m-d H:i:s");

      if (!empty($_FILES)) {
        $temporalFile=$_FILES['archivo']['tmp_name'];
        //$path="/xampp/htdocs/git2/public/uploads/";
       // $path=public_path()."\\".'uploads'."\\";
         $path='uploads/';
        $fileName=$path.$_FILES['archivo']['name'];
        $fileType=$_FILES['archivo']['type'];
        $fileSize=($_FILES['archivo']['size']/1024);
        $nombreArchivo=$_FILES['archivo']['name'];
  
         $dir_subida = $path;
         $fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);
         if (move_uploaded_file($_FILES['archivo']['tmp_name'],$fichero_subido)) {

         DB::table('tareas')
         ->where('tareas.id',$id)
         ->update(['nombre_tarea' =>$request->input('nombre_tarea'),'descripcion' => $request->input('descripcion'),
         'archivo' => $nombreArchivo,'path_archivo' => $fileName,'fecha_creacion' =>$fecha_actual,'puntaje_total' => $request->input('puntaje_total'),
           'id_cursos'=> $request->input('id_curso')
                ]);


      

         //store procedure
         //   $nombre_tarea = $request->input('nombre_tarea');
         //   $descripcion = $request->input('descripcion');
         //   $fecha_creacion= $fecha_actual;
         //   $puntaje_total= $request->input('puntaje_total');
         //   $id_curso= $request->input('id_curso');
         //   $id_user=Auth::id();
         //   $usuario= DB::table('users')->where('id', $id_user)->first();
         //   $nombre_usuario = $usuario->name.' '.$usuario->apellido;
         //   $fecha_a = date("Y-m-d H:i:s");
         //   $accion_a='create';
         //   $id_bi=0;

         //   DB::select('CALL PA_tarea(?,?,?,?,?,?,?,?,?)', array($nombre_tarea, $descripcion, $fecha_creacion, $puntaje_total,$id_curso,$nombre_usuario ,$fecha_a, $accion_a, $id_bi));

         }else{

           //  DB::table('tareas')->insert(['nombre_tarea' => $request->input('nombre_tarea'), 'descripcion' => $request->input('descripcion'),'fecha_creacion' => $fecha_actual,
          //'puntaje_total' => $request->input('puntaje_total'),'id_cursos'=> $request->input('id_curso')]
         //);

          DB::table('tareas')
         ->where('tareas.id',$id)
         ->update(['nombre_tarea' =>$request->input('nombre_tarea'),'descripcion' => $request->input('descripcion'),
         'fecha_creacion' =>$fecha_actual,'puntaje_total' => $request->input('puntaje_total'),
           'id_cursos'=> $request->input('id_curso')
                ]);



                      //store procedure
         //   $nombre_tarea = $request->input('nombre_tarea');
         //   $descripcion = $request->input('descripcion');
         //   $fecha_creacion= $fecha_actual;
         //   $puntaje_total= $request->input('puntaje_total');
         //   $id_curso= $request->input('id_curso');
         //   $id_user=Auth::id();
         //   $usuario= DB::table('users')->where('id', $id_user)->first();
         //   $nombre_usuario = $usuario->name.' '.$usuario->apellido;
         //   $fecha_a = date("Y-m-d H:i:s");
         //   $accion_a='create';
         //   $id_bi=0;

        // DB::select('CALL PA_tarea(?,?,?,?,?,?,?,?,?)', array($nombre_tarea, $descripcion, $fecha_creacion, $puntaje_total,$id_curso,$nombre_usuario ,$fecha_a, $accion_a, $id_bi));

         }
        }

        $tarea = DB::table('tareas')->where('id_cursos', $id_curso)->get();
         /*
        tarea::create($request->all());
        //$id_curso=$request->input('id_curso');
        $id_curso=$request->input('id_curso');
       $tipo=$request->input('tipo');
       */
        Session::flash('flash_message', 'tarea added!');
        return redirect('gestor_examenes/'.$id_curso.'/tareas/listar');
    }







    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id_curso,$id_tarea)
    {
        $tarea= DB::table('tareas')->where('id', $id_tarea)->first();
           //store procedure
            $nombre_tarea = $tarea->nombre_tarea;
            $descripcion = $tarea->descripcion;
            $fecha_creacion= $tarea->fecha_creacion;
            $puntaje_total= $tarea->puntaje_total;
            $id_curso= $tarea->id_cursos;
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;
            $fecha_a = date("Y-m-d H:i:s");
            $accion_a='delete';
            $id_bi=0;

         DB::select('CALL PA_tarea(?,?,?,?,?,?,?,?,?)', array($nombre_tarea, $descripcion, $fecha_creacion, $puntaje_total,$id_curso,$nombre_usuario ,$fecha_a, $accion_a, $id_bi));
        tarea::destroy($id_tarea);

        Session::flash('flash_message', 'tarea deleted!');

        return redirect('gestor_examenes/'.$id_curso.'/tareas/listar');
    }
    //mostrar_form

    public function createTask($id_curso)
    {

        return view('gestor_examenes/tarea/formtarea',compact('id_curso'));
    }
     public function postUpload($id_curso,$tipo)
    {
      // if(Input::hasFile('file')) {
        //  Input::file('file')
            //   ->move('carpetarArchivos','NuevoNombre');
        //}
         //   $path = public_path();
           // $files = $request->file('file');
           // foreach($files as $file){
            //    $fileName = $file->getClientOriginalName();
            //    $file->move($path, $fileName);
           // }
       
       if (!empty($_FILES)) {
           # code...

        $temporalFile=$_FILES['archivo']['tmp_name'];
        //$path="/xampp/htdocs/git2/public/uploads/";
        $path=public_path().'/uploads/';
        //$path=base_path().'/public/uploads/';
        $fileName=$path.'-'.Hash::make($_FILES['archivo']['name']);
        $fileType=$_FILES['archivo']['type'];
        $fileSize=($_FILES['archivo']['size']/1024);
        $nombreArchivo=$_FILES['archivo']['name'];
        $file = new tarea();
        $file->nombre_tarea = $nombreArchivo;
        $file->descripcion = 'nose';
        $file->archivo = $fileName;
        $file->id_cursos = $id_curso;

        // if (move_uploaded_file($temporalFile,$path)) {
        //  $file->save();            
       // }
         $dir_subida = $path;
         $fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);
         if (move_uploaded_file($_FILES['archivo']['tmp_name'],$fichero_subido)) {
            # code...
         $file->save();            
        }
      }
        $tarea = DB::table('tareas')->where('id_cursos', $id_curso)->get();

        return view('gestor_examenes.tarea.index', compact('tarea','id_curso','tipo'));
    }


}
