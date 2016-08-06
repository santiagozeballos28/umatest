<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\categorium;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Auth;

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

         //store procedure
            $nombre_carrera = $request->input('nombre');
            $dato_nuevo=$nombre_carrera;//1
            $dato_viejo="";//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="categorias";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='create';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

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

        $cat = DB::table('categorias')->where('id',$id)->first();
         //store procedure
            $nombre_carrera = $cat->nombre;
            $dato_nuevo="";//1
            $dato_viejo=$nombre_carrera;//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="categorias";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='update';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

        $categorium = categorium::findOrFail($id);
        $categorium->update($request->all());

             $recurso= DB::table('bitacora_examenes')->where('usuario_bi', $nombre_usuario)->where('fecha_bi', $fecha_a)->first();
           $recurso=$recurso->id;


           //store procedure
            $nombre_carrera = $request->input('nombre');
            $dato_nuevo=$nombre_carrera;//1
            $dato_viejo="";//2
            $nombre_tabla="categorias";//4
            $accion_a='updaten';//6
            $id_bi=$recurso;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

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
        $cat = DB::table('categorias')->where('id',$id)->first();
         //store procedure
            $nombre_carrera = $cat->nombre;
            $dato_nuevo="";//1
            $dato_viejo=$nombre_carrera;//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="categorias";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='delete';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure
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
