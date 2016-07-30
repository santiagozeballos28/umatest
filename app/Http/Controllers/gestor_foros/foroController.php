<?php

namespace App\Http\Controllers\gestor_foros;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\foro;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Auth;
use Hash;

class foroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $foro = foro::paginate(15);

        return view('gestor_foro.foro.index', compact('foro'));
    }
       /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function listar($id_curso)
    {

           $aux= DB::table('foros')
            ->where('id_curso', $id_curso)
            ->get();

           $cantidad = count($aux);
           if ($cantidad>0) {
            $foro= DB::table('foros')
            ->where('id_curso', $id_curso)
            ->join('users', 'users.id', '=', 'foros.id_user')
            ->orderBy('fecha', 'desc')
            ->select('foros.id AS id_foro','users.id AS id_user','users.name','users.apellido','foros.titulo','foros.mensaje','foros.archivo','foros.fecha')
            ->get();
//asc
             $comentarios= DB::table('foros')
            ->where('id_curso', $id_curso)
            ->join('users', 'users.id', '=', 'foros.id_user')
           ->join('comentarios', 'comentarios.id_foro', '=', 'foros.id')
           ->orderBy('comentarios.fecha', 'desc')
           ->select('foros.id AS id_foro','comentarios.mensaje','comentarios.fecha')
           ->get();

           // $comentarios=array();
 
           }else {

            return view('gestor_foro.foro.foro_vacio', compact('id_curso'));
           }



        return view('gestor_foro.foro.vista_foros', compact('foro','comentarios','id_curso'));
    }



        public function save_foro(Request $request)
    {
        $this->validate($request, ['titulo' => 'required', 'mensaje',]);
        $id_curso=$request->input('id_curso');
        $fecha_actual = date("Y-m-d H:i:s");
        $id_user=Auth::id();

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
           DB::table('foros')->insert(['titulo' => $request->input('titulo'), 'mensaje' => $request->input('mensaje'),
          'archivo' => $nombreArchivo,'fecha' =>$fecha_actual,
          'id_curso'=> $request->input('id_curso'),'id_user'=> $id_user]
         );
 
         }else{

         DB::table('foros')->insert(['titulo' => $request->input('titulo'), 'mensaje' => $request->input('mensaje'),'fecha' =>$fecha_actual,'id_curso'=> $request->input('id_curso'),'id_user'=> $id_user]
         );
         }
        }

        Session::flash('flash_message', 'foro added!');
        return redirect('gestor_foros/'.$id_curso.'/foro');
    }
      /**
     * Es para crear un nuevo foro
     *
     * @return void
     */
    public function crear_foro($id_curso)
    {
        return view('gestor_foro.foro.crear_foro',compact('id_curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('gestor_foro.foro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['fecha' => 'required', ]);

        foro::create($request->all());

        Session::flash('flash_message', 'foro added!');

        return redirect('foro');
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
        $foro = foro::findOrFail($id);

        return view('gestor_foro.foro.show', compact('foro'));
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
        $foro = foro::findOrFail($id);

        return view('gestor_foro.foro.edit', compact('foro'));
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
        $this->validate($request, ['fecha' => 'required', ]);

        $foro = foro::findOrFail($id);
        $foro->update($request->all());

        Session::flash('flash_message', 'foro updated!');

        return redirect('foro');
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
        foro::destroy($id);

        Session::flash('flash_message', 'foro deleted!');

       return redirect('gestor_foros/'.$id_curso.'/foro');
    }
}
