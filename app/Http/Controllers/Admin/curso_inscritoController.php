<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\curso_inscrito;
use App\curso;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Auth;

class curso_inscritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $curso_inscrito = curso_inscrito::paginate(15);

        return view('admin.curso_inscrito.index', compact('curso_inscrito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.curso_inscrito.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['curso_id' => 'required|exists:cursos,codigo', ]);

        $fecha_actual = date("Y-m-d");
        $cod_cur=$request->input('curso_id');
        //$fecha_cur=$request->input('fecha');
        
        $id_curso = DB::table('cursos')->where('codigo', $cod_cur)->first();
        $id_curso=$id_curso->id;

        $id_user=Auth::id();
        
        //verifica si ya esta inscrito en el mismo curso
        $estoyinscrito=DB::table('curso_inscritos')->where('curso_id',$id_curso)->where('user_id', 
            $id_user)->first();

        if(is_null($estoyinscrito)){

            DB::table('curso_inscritos')->insert(
            ['fecha' => $fecha_actual, 'curso_id' => $id_curso, 'user_id'=>$id_user] );
             Session::flash('flash_message', 'curso_inscrito added!');   
        }else{
           Session::flash('flash_message', 'YA ESTOY INSCRITO'); 

        }
        //curso_inscrito::create($request->all());

        //return redirect('admin/curso_inscrito');
        return $this->visualizar_mis_cursos_estudiante();
    }

       public function visualizar_mis_cursos_estudiante(){

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
       
        $titulo_general="MIS CURSOS";
        //$curso = DB::table('cursos')->get();

        return view('gestorcursos.indexfiltrado', compact('curso', 'titulo_general'));

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
        $curso_inscrito = curso_inscrito::findOrFail($id);

        return view('admin.curso_inscrito.show', compact('curso_inscrito'));
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
        $curso_inscrito = curso_inscrito::findOrFail($id);

        return view('admin.curso_inscrito.edit', compact('curso_inscrito'));
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

        $curso_inscrito = curso_inscrito::findOrFail($id);
        $curso_inscrito->update($request->all());

        Session::flash('flash_message', 'curso_inscrito updated!');

        return redirect('admin/curso_inscrito');
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
        curso_inscrito::destroy($id);

        Session::flash('flash_message', 'curso_inscrito deleted!');

        return redirect('admin/curso_inscrito');
    }
    public function vis_contenido_curso($id_curso){
    
    return view('gestorcursos.contenidocurso',compact('id_curso'));

    }
}
