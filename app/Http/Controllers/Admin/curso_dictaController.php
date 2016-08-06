<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\curso_dictum;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\curso;
use Auth;
use DB;

class curso_dictaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
       // $curso = curso::paginate(15);

        $id_user=Auth::id();

          $rol_user= DB::table('role_user')
            ->where('user_id',$id_user)
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('roles.id','roles.nombre_rol')
            ->first();


             $name_rol=$rol_user->nombre_rol;
       if ($name_rol=='docente') {
                $lista_objetos = DB::table('curso_dictas')->where('user_id', $id_user)->get();
        $vector_ids=array();

        $contador=0;
        foreach ($lista_objetos as $item) {
            
            $vector_ids[$contador]=$item->curso_id;
            $contador++;
        }


        
        $curso=array();
        for ($i=0; $i <count($vector_ids); $i++) { 
         $fecha = DB::table('cursos')->where('id', $vector_ids[$i])->first();
         $fecha_actual = date("Y-m-d");

         if($fecha_actual > $fecha->fecha_vencimiento){
            DB::table('cursos')->where('id', $vector_ids[$i])->update(['estado_curso' => 0]);
         }  
         //$objeto_curso = DB::table('cursos')->where('id', $vector_ids[$i])->where('estado_curso', 1)->first();
        // if(!is_null($objeto_curso)){
         //  $curso[$i]=$objeto_curso;
         //}
        $objeto_curso = DB::table('cursos')->where('id', $vector_ids[$i])->first();
          $curso[$i]=$objeto_curso;
    

        }

        return view('gestorcursos.filtrodocente', compact('curso'));
       }


       elseif ($name_rol=='administrador') {

           $curso= DB::table('curso_dictas')
            //->where('user_id',$id_user)
            ->join('cursos', 'cursos.id', '=', 'curso_dictas.curso_id')
            ->join('users', 'users.id', '=', 'curso_dictas.user_id')
            ->join('categorias', 'categorias.id', '=', 'cursos.id_categoria')
            ->select('cursos.id','categorias.nombre AS carrera','cursos.nombre','users.name','users.apellido','cursos.capacidad','cursos.codigo')
            ->get();


        return view('gestorcursos.filtro_admi', compact('curso'));
           
       }


   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create($id_curso)
    {
        $curso=DB::table('cursos')->where('id',$id_curso)->first();
        $nombre=$curso->nombre;
        return view('admin.curso_dicta.create', compact('nombre', 'id_curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $id_curso=$request->input('id_curso');
        $fecha=$request->input('fecha_vencimiento');

        DB::table('cursos')->where('id',$id_curso)->update(array('fecha_vencimiento' => $fecha,'estado_curso'=>1)); 

        $curso=DB::table('cursos')->where('estado_curso',0)->get();


        return view('admin.curso_dicta.index_desabilitados', compact('curso'));

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
        $curso_dictum = curso_dictum::findOrFail($id);

        return view('admin.curso_dicta.show', compact('curso_dictum'));
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
        $curso_dictum = curso_dictum::findOrFail($id);

        return view('admin.curso_dicta.edit', compact('curso_dictum'));
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
        $this->validate($request, ['grupo' => 'required', ]);

        $curso_dictum = curso_dictum::findOrFail($id);
        $curso_dictum->update($request->all());

        Session::flash('flash_message', 'curso_dictum updated!');

        return redirect('admin/curso_dicta');
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
        curso_dictum::destroy($id);

        Session::flash('flash_message', 'curso_dictum deleted!');

        return redirect('admin/curso_dicta');
    }
  /*
  llama a la vista para listar el contenido del curso

  */
    public function vis_contenido_curso($id_curso){
    
    return view('gestorcursos.contenidocurso',compact('id_curso'));

    }

    public function cursos_desabilitados(){
    
       // $curso=DB::table('cursos')->where('estado_curso',0)->get();

        $curso=DB::table('cursos')->get();

        return view('admin.curso_dicta.index_desabilitados', compact('curso'));

    }

}
