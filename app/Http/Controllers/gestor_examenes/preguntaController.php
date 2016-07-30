<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\preguntum;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

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
       
         $vector = DB::table('tipo_preguntas')->lists('tipo', 'id');

        return view('gestor_examenes.pregunta.create', compact('vector', 'id_examen'));
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

        }

        Session::flash('flash_message', 'preguntum added!');

        

        return redirect('gestor_examenes/pregunta/'.$request->input('examen_id').'/index');
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

        return view('gestor_examenes.pregunta.show', compact('preguntum', 'id_examen'));
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
        $preguntum = preguntum::findOrFail($id);

        return view('gestor_examenes.pregunta.edit', compact('preguntum', 'id_examen'));
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

        $preguntum = preguntum::findOrFail($id);
        $preguntum->update($request->all());

        Session::flash('flash_message', 'preguntum updated!');

        return redirect('gestor_examenes/pregunta/'.$request->input('examen_id').'/index');
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
        $pregunta=$pregunta->tipo_pregunta_id;

        $tipo= DB::table('tipo_preguntas')->where('id',$pregunta)->first();
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

        

        preguntum::destroy($id);

        Session::flash('flash_message', 'preguntum deleted!');

        return redirect('gestor_examenes/pregunta/'.$id_examen.'/index');
    }
}
