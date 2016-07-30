<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\categorium;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $categoria = categorium::paginate(15);

        return view('admin.categoria.index', compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required', ]);

        categorium::create($request->all());

        Session::flash('flash_message', 'categorium added!');

        return redirect('admin/categoria');
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
        $categorium = categorium::findOrFail($id);

        return view('admin.categoria.show', compact('categorium'));
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
        $categorium = categorium::findOrFail($id);

        return view('admin.categoria.edit', compact('categorium'));
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
        $this->validate($request, ['nombre' => 'required', ]);

        $categorium = categorium::findOrFail($id);
        $categorium->update($request->all());

        Session::flash('flash_message', 'categorium updated!');

        return redirect('admin/categoria');
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
        categorium::destroy($id);

        Session::flash('flash_message', 'categorium deleted!');

        return redirect('admin/categoria');
    }
    
     /**
     * Este metodo es para desabilitar una carrera, con el id especificado
     *
     * @param  int  $id
     *
     * @return void
     */
    public function desabilitar_carrera($id)
    {
           DB::table('categorias')
            ->where('categorias.id',$id)
            ->update(['estado' =>1 ]);

        Session::flash('flash_message', 'categoria desabilitado!');

       return $this->index();
    }
   
        /**
     * Este metodo es para mostrar carreras desabilitadas.
     *
     * @return void
     */
    public function show_deshabilitados()
    {
           $carreras_desabilitados=DB::table('categorias')->where('estado',1)->get();

           return view('admin.categoria.deshabilitados', compact('carreras_desabilitados'));
     }

   
            /**
     * Este metodo es para habilitar carreras
      * @param  int  $id es el id de la carrera a habilitar
     * @return void
     */     
    public function habilitar_carrera($id)
    {

        DB::table('categorias')
            ->where('categorias.id',$id)
            ->update(['estado' =>0 ]);


 Session::flash('flash_message', 'categoria habilitado!');

       return $this->index();
     }
}
