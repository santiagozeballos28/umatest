<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\curso;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Auth;
use App\curso_inscrito;
class cursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */


    public function index()
    {
        $curso = curso::paginate(15);
        
        return view('admin.curso.index', compact('curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {


           $vector= DB::table('categorias')
            ->where('estado',0)
            ->lists('nombre','id');
         //*/$vector = DB::table('categorias')->lists('nombre','id');
        //echo $a[0]->nombre;
        //echo $a[4]->nombre;

        return view('admin.curso.create', compact('vector'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required|max:255', 'capacidad' => 'required|numeric|between:10,999', 'codigo' => 'required|max:255|unique:cursos']);

          //verifica si ya existe el curso creado

          $validador = DB::table('cursos')->where('codigo', $request->input('codigo'))->first();
           
            if(is_null($validador)){
          
            curso::create($request->all());
            
            $id_curso = DB::table('cursos')->where('codigo', $request->input('codigo'))->first();
            $id_curso=$id_curso->id;
            
            $id_user=Auth::id();

             DB::table('curso_dictas')->insert(
            ['grupo' => 1, 'curso_id' => $id_curso, 'user_id'=>$id_user]
            ); 
            
               //store procedure
            $nombre = $request->input('nombre');
            $capacidad = $request->input('capacidad');
            $codigo = $request->input('codigo');
            $id_categoria = $request->input('id_categoria');
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;
            $fecha_a = date("Y-m-d H:i:s");
            $accion_a='create';
            $id_bi=0;

            DB::select('CALL PA_curso(?,?,?,?,?,?,?,?)', array($nombre, $capacidad, $codigo, $id_categoria, $nombre_usuario, $fecha_a, $accion_a, $id_bi));
         

            Session::flash('flash_message', 'LA MATERIA SE HA CREADO SATISFACTORIAMENTE'); 

            }else{

               Session::flash('flash_message', 'LA MATERIA QUE QUIERE CREAR YA EXISTE'); 
            }

            
        return redirect('admin/curso_dicta');
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
        $curso = curso::findOrFail($id);

        return view('admin.curso.show', compact('curso'));
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
        $curso = curso::findOrFail($id);
        $vector = DB::table('categorias')->lists('nombre','id');
        return view('admin.curso.edit', compact('curso', 'vector'));
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
        $this->validate($request, ['nombre' => "max:255", 'capacidad' => 'required|numeric|between:10,999', 'codigo' => "required|unique:cursos,codigo,$id", ]);
        $curso=DB::table('cursos')->where('id', $id)->first();
           //store procedure
            $nombre = $curso->nombre;
            $capacidad = $curso->capacidad;
            $codigo = $curso->codigo;
            $id_categoria = $curso->id_categoria;
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;
            $fecha_a = date("Y-m-d H:i:s");
            $accion_a='updatev';
            $id_bi=0;

            DB::select('CALL PA_curso(?,?,?,?,?,?,?,?)', array($nombre, $capacidad, $codigo, $id_categoria, $nombre_usuario, $fecha_a, $accion_a, $id_bi));

        $curso = curso::findOrFail($id);
        $curso->update($request->all());

         
           $recurso= DB::table('bitacora_cursos')->where('usuario', $nombre_usuario)->where('fecha', $fecha_a)->first();
           $recurso=$recurso->id;
  

                //store procedure
            $nombre = $request->input('nombre');
            $capacidad = $request->input('capacidad');
            $codigo = $request->input('codigo');
            $id_categoria = $request->input('id_categoria');
            
            $accion_a='update';
            $id_bi=$recurso;


            DB::select('CALL PA_curso(?,?,?,?,?,?,?,?)', array($nombre, $capacidad, $codigo, $id_categoria, $nombre_usuario, $fecha_a, $accion_a, $id_bi));
           //store procedure


        Session::flash('flash_message', 'curso updated!');

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
        $curso=DB::table('cursos')->where('id', $id)->first();
           //store procedure
            $nombre = $curso->nombre;
            $capacidad = $curso->capacidad;
            $codigo = $curso->codigo;
            $id_categoria = $curso->id_categoria;
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;
            $fecha_a = date("Y-m-d H:i:s");
            $accion_a='delete';
            $id_bi=0;

            DB::select('CALL PA_curso(?,?,?,?,?,?,?,?)', array($nombre, $capacidad, $codigo, $id_categoria, $nombre_usuario, $fecha_a, $accion_a, $id_bi));

            //fin store procedure

        DB::table('curso_inscritos')->where('curso_id', $id)->delete();

        curso::destroy($id);

        Session::flash('flash_message', 'curso deleted!');

        return redirect('admin/curso_dicta');
    }
     
    /**
     * Filtra los cursos por categoria     
     *
     * @param  int  $id
     *
     * @return void
     */
    public function visualizar_inscribirse($parametro, $boton_todosloscursos){
       
       $curso = DB::table('cursos')->where('id_categoria', $parametro)->get();
       $titulo_categoria= DB::table('categorias')->where('id', $parametro)->first();
       //$numero=count($a);
        $titulo_general=strtoupper($titulo_categoria->nombre);
       // $docente = User::paginate(15);
            return view('gestorcursos.inscribirse', compact('curso', 'titulo_general', 'boton_todosloscursos'));
        
    }

    public function visualizar_categoria_carrera(){

        $id_user=Auth::id();
        
        $curso_ins = DB::table('curso_inscritos')->where('user_id', $id_user)->get();
        
        $mis_ids=array();
        $index=0;
        foreach ($curso_ins as $item) {
            
            $mis_ids[$index]=$item->curso_id;
            $index++;

        }
        $curso=array();

       for ($i=0; $i < count($mis_ids) ; $i++) { 

          $cur = DB::table('cursos')->where('id', $mis_ids[$i])->first();
          $curso[$i]=$cur;

       }
       
        $titulo_general="MIS MATERIAS";
        //$curso = DB::table('cursos')->get();

        return view('gestorcursos.indexfiltrado', compact('curso', 'titulo_general'));

    }
     public function visualizar_desinscribirse(){

        $id_user=Auth::id();
        
        $curso_ins = DB::table('curso_inscritos')->where('user_id', $id_user)->get();
        
        $mis_ids=array();
        $index=0;
        foreach ($curso_ins as $item) {
            
            $mis_ids[$index]=$item->curso_id;
            $index++;

        }
        $curso=array();

       for ($i=0; $i < count($mis_ids) ; $i++) { 

          $cur = DB::table('cursos')->where('id', $mis_ids[$i])->first();
          $curso[$i]=$cur;

       }
       
        
        //$curso = DB::table('cursos')->get();

        return view('gestorcursos.desinscribirse', compact('curso'));

    }
    public function desinscribirse($id_materia){

         $id_user=Auth::id();
        
       // $id_inscrito = DB::table('curso_inscritos')->where('user_id', $id_user)->where('curso_id', 
         //   $id_materia)->get();
        //$id_inscrito=$id_inscrito->id;

            $id_inscrito = DB::table('curso_inscritos')->where('curso_id', $id_materia)->where('user_id', $id_user)->delete();

        return $this->visualizar_desinscribirse();

    }
}
