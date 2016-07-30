<?php

namespace App\Http\Controllers\gestor_foros;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\comentario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Auth;

class comentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $comentario = comentario::paginate(15);

        return view('gestor_foro.comentario.index', compact('comentario'));
    }

     public function show_comentario($id_curso,$id_foro)
    {

           
            $foro= DB::table('foros')
            ->where('foros.id', $id_foro)
            ->join('users', 'users.id', '=', 'foros.id_user')
            ->select('foros.id AS id_foro','users.id AS id_user','users.name','users.apellido','foros.titulo','foros.mensaje','foros.archivo','foros.fecha')
            ->get();
            //asc
             $comentarios= DB::table('comentarios')
            ->where('id_foro', $id_foro)
            ->join('users', 'users.id', '=', 'comentarios.id_user')
            ->orderBy('comentarios.fecha', 'desc')
            ->select('comentarios.id AS id_coment','users.id AS id_user','users.name','users.apellido','comentarios.mensaje','comentarios.fecha')
            ->get();

         return view('gestor_foro.comentario.vista_comentarios', compact('foro','comentarios','id_curso','id_foro'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('gestor_foro.comentario.create');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function comentar($id_curso,$id_foro)
    {
        return view('gestor_foro.comentario.create',compact('id_curso','id_foro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['mensaje' => 'required','fecha',]);

        $id_user=Auth::id();
        $fecha_actual = date("Y-m-d H:i:s");

         DB::table('comentarios')->insert(['mensaje' => $request->input('mensaje'),'fecha' =>$fecha_actual,
          'id_foro'=> $request->input('id_foro'),'id_user'=> $id_user]
         );

        Session::flash('flash_message', 'comentario added!');
        $id_curso=$request->input('id_curso');
         $id_foro=$request->input('id_foro');

        //gestor_foros/{id_curso}/crear/{id_foro}/comentario';
        //gestor_foros/{id_curso}/crear/{id_foro}/comentario'

        return redirect('gestor_foros/'.$id_curso.'/crear/'.$id_foro.'/comentario');
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
        $comentario = comentario::findOrFail($id);

        return view('gestor_foro.comentario.show', compact('comentario'));
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
        $comentario = comentario::findOrFail($id);

        return view('gestor_foro.comentario.edit', compact('comentario'));
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
        $this->validate($request, ['mensaje' => 'required', 'fecha' => 'required', ]);

        $comentario = comentario::findOrFail($id);
        $comentario->update($request->all());

        Session::flash('flash_message', 'comentario updated!');

        return redirect('admin/comentario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id_coment,$id_curso,$id_foro)
    {
        comentario::destroy($id_coment);

        Session::flash('flash_message', 'comentario eliminado!');

        return redirect('gestor_foros/'.$id_curso.'/crear/'.$id_foro.'/comentario');
    }
}
