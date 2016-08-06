<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\preguntum;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Auth;
class preguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index($id_examen)
    {
        $pregunta = DB::table('preguntas')->where('examen_id', $id_examen)->get();
        $examen =DB::table('examens')->where('id',$id_examen)->first();
        $ptj_examen=$examen->puntaje_totalm;
        //$pregunta = preguntum::paginate(15);

             $puntaje_total_examen=0;
             foreach ($pregunta as $item) {

                 $puntaje_total_examen+=$item->puntaje_pregunta;

             }

        return view('gestor_examenes.pregunta.index', compact('pregunta', 'id_examen', 
            'puntaje_total_examen', 'ptj_examen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create($id_examen)
    {
        
         $mensaje_create="";
         $vector = DB::table('tipo_preguntas')->lists('tipo', 'id');

        return view('gestor_examenes.pregunta.create', compact('vector', 'id_examen', 'mensaje_create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        //$this->validate($request, ['nombre_pregunta' => 'required', 'puntaje_pregunta' => 'required', ]);
        //preguntum::create($request->all());
        
        $preguntaz = DB::table('preguntas')->where('examen_id', $request->input('examen_id'))->get();
        $examen =DB::table('examens')->where('id',$request->input('examen_id'))->first();
        $ptj_examen=$examen->puntaje_totalm;
        

             $puntaje_total_examen=0;
             foreach ($preguntaz as $item) {

                 $puntaje_total_examen+=$item->puntaje_pregunta;

             }
             $puntaje_total_examen+=$request->input('puntaje_pregunta');

        if($ptj_examen >= $puntaje_total_examen){

             DB::table('preguntas')->insert(
            ['nombre_pregunta' => $request->input('nombre_pregunta'), 'puntaje_pregunta' => $request->input('puntaje_pregunta'), 'tipo_pregunta_id'=>$request->input('tipo_pregunta_id'), 
               'examen_id'=>$request->input('examen_id')]
            ); 
            
             if($request->input('tipo_pregunta_id') == 2){

             $pregunta = DB::table('preguntas')->orderBy('id', 'desc')->take(1)->first();

             DB::table('desarrollos')->insert(
            ['respuesta' => 'desarrollos', 'pregunta_id' => $pregunta->id]
            ); 

             }
              //store procedure
            $nombre_pregunta = $request->input('nombre_pregunta');
            $puntaje_pregunta = $request->input('puntaje_pregunta');
            $tipo_pregunta= DB::table('tipo_preguntas')->where('id',$request->input(
                'tipo_pregunta_id'))->first();
            $nombre_examen = DB::table('examens')->where('id',$request->input('examen_id'))->first();
            $dato_nuevo=$nombre_pregunta.'#'.$puntaje_pregunta.'#'.$tipo_pregunta->tipo.'#'.$nombre_examen->nombre_examen;//1
            $dato_viejo="";//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="preguntas";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='create';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure
            return redirect('gestor_examenes/pregunta/'.$request->input('examen_id').'/index');
        }
        
          $mensaje_create="¡¡Advertencia!! El puntaje de la pregunta ha excedido el puntaje total del examen";
         $vector = DB::table('tipo_preguntas')->lists('tipo', 'id');
         $id_examen=$request->input('examen_id');
        return view('gestor_examenes.pregunta.create', compact('vector', 'id_examen', 'mensaje_create'));

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id, $id_examen)
    {
        

        $preguntum = preguntum::findOrFail($id);

        return view('gestor_examenes.pregunta.show', compact('preguntum', 'id_examen', 'mensaje_create'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id, $id_examen)
    {
        $mensaje_create="";

        $preguntum = preguntum::findOrFail($id);

        return view('gestor_examenes.pregunta.edit', compact('preguntum', 'id_examen', 'mensaje_create'));
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
        $this->validate($request, ['nombre_pregunta' => 'required', 'puntaje_pregunta' => 'required', ]);


        $preguntaz = DB::table('preguntas')->where('examen_id', $request->input('examen_id'))->get();
        $examen =DB::table('examens')->where('id',$request->input('examen_id'))->first();
        $ptj_examen=$examen->puntaje_totalm;
        
         $pregunta_nota = DB::table('preguntas')->where('id', $id)->first();
         $pregunta_nota=$pregunta_nota->puntaje_pregunta; 
             
             $puntaje_total_examen=0;
             foreach ($preguntaz as $item) {

                 $puntaje_total_examen+=$item->puntaje_pregunta;

             }
             $puntaje_total_examen+=$request->input('puntaje_pregunta');
             $puntaje_total_examen-=$pregunta_nota;

         $preguntum = preguntum::findOrFail($id);

        if($ptj_examen >= $puntaje_total_examen){

       $pregunta= DB::table('preguntas')->where('id',$id)->first();
         //store procedure
            $nombre_pregunta = $pregunta->nombre_pregunta;
            $puntaje_pregunta = $pregunta->puntaje_pregunta;
            $tipo_pregunta= DB::table('tipo_preguntas')->where('id',$pregunta->tipo_pregunta_id)->first();
            $nombre_examen = DB::table('examens')->where('id',$pregunta->examen_id)->first();
            $dato_nuevo="";//1
            $dato_viejo=$nombre_pregunta.'#'.$puntaje_pregunta.'#'.$tipo_pregunta->tipo.'#'.$nombre_examen->nombre_examen;//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="preguntas";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='update';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
         //fin procedure

        $preguntum->update($request->all());

         $recurso= DB::table('bitacora_examenes')->where('usuario_bi', $nombre_usuario)->where('fecha_bi', $fecha_a)->first();
           $recurso=$recurso->id;

          //store procedure
            $nombre_pregunta = $request->input('nombre_pregunta');
            $puntaje_pregunta = $request->input('puntaje_pregunta');
            //$tipo_pregunta= DB::table('tipo_preguntas')->where('id',$request->input('tipo_pregunta_id'))->first();
            //$nombre_examen = DB::table('examens')->where('id',$request->input('examen_id'))->first();
            $dato_nuevo=$nombre_pregunta.'#'.$puntaje_pregunta.'#'.$tipo_pregunta->tipo.'#'.$nombre_examen->nombre_examen;//1
            $dato_viejo="";//2
            $accion_a='updaten';//6
            $id_bi=$recurso;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

        Session::flash('flash_message', 'preguntum updated!');

        return redirect('gestor_examenes/pregunta/'.$request->input('examen_id').'/index');
      }

         $mensaje_create="¡¡Advertencia!! El puntaje de la pregunta ha excedido el puntaje total del examen";
        $id_examen=$request->input('examen_id');
        return view('gestor_examenes.pregunta.edit', compact('preguntum', 'id_examen',              'mensaje_create'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id, $id_examen)
    {
        $pregunta= DB::table('preguntas')->where('id',$id)->first();
        $p=$pregunta->tipo_pregunta_id;

        $tipo= DB::table('tipo_preguntas')->where('id',$p)->first();
        $tipo=$tipo->tipo;

        if($tipo=='simple'){

          DB::table('multiples')->where('pregunta_id', $id)->delete();

        }
        if($tipo=='complemento'){

          DB::table('simples')->where('pregunta_id', $id)->delete();

        }
        if($tipo=='desarrollo'){

          DB::table('desarrollos')->where('pregunta_id', $id)->delete();

        }
        if($tipo=='F/V'){

          DB::table('falsoverdaderos')->where('pregunta_id', $id)->delete();

        }
        if($tipo=='multiple'){

          DB::table('multiples_varios')->where('pregunta_id', $id)->delete();

        }

        //store procedure
            $nombre_pregunta = $pregunta->nombre_pregunta;
            $puntaje_pregunta = $pregunta->puntaje_pregunta;
            $tipo_pregunta= DB::table('tipo_preguntas')->where('id',$pregunta->tipo_pregunta_id)->first();
            $nombre_examen = DB::table('examens')->where('id',$pregunta->examen_id)->first();
            $dato_nuevo="";//1
            $dato_viejo=$nombre_pregunta.'#'.$puntaje_pregunta.'#'.$tipo_pregunta->tipo.'#'.$nombre_examen->nombre_examen;//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="preguntas";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='delete';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure

        preguntum::destroy($id);

        Session::flash('flash_message', 'preguntum deleted!');

        return redirect('gestor_examenes/pregunta/'.$id_examen.'/index');
    }
}
