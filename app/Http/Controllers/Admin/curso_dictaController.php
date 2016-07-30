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
        $lista_objetos = DB::table('curso_dictas')->where('user_id', $id_user)->get();
        $vector_ids=array();

        $contador=0;
        foreach ($lista_objetos as $item) {
            
            $vector_ids[$contador]=$item->curso_id;
            $contador++;
        }
        
        $curso=array();
        for ($i=0; $i <count($vector_ids); $i++) { 

         $objeto_curso = DB::table('cursos')->where('id', $vector_ids[$i])->first();
         $curso[$i]=$objeto_curso;

        }

        return view('gestorcursos.filtrodocente', compact('curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.curso_dicta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['grupo' => 'required', ]);

        curso_dictum::create($request->all());

        Session::flash('flash_message', 'curso_dictum added!');

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
}
