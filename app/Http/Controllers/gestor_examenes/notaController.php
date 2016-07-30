<?php

namespace App\Http\Controllers\gestor_examenes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\notum;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class notaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $nota = notum::paginate(15);

        return view('gestor_examenes.nota.index', compact('nota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create($id_curso, $id_examen)
    {

       $bandera = $this->validation_formulario($id_examen);
       if($bandera[1]){

         $numero_preguntas = DB::table('preguntas')->where('examen_id', $id_examen)->get();
         
         $mensajeA='a';
         $mensajeB='b';
           $puntaje=0;
             foreach ($numero_preguntas as $item) {

                 $puntaje+=$item->puntaje_pregunta;

             }
         
         $numero_preguntas=count($numero_preguntas);

        return view('gestor_examenes.nota.create', compact('id_curso', 'id_examen', 'numero_preguntas', 'puntaje', 'mensajeA', 'mensajeB'));

        }else{


       $fecha_actual = date("Y-m-d H:i:s");
        $examen_control = DB::table('examens')->where('id_cursos', $id_curso)->get();
        $ids_exa_control=array();
        $puntero=0;
        foreach ($examen_control as $item) {
         $ids_exa_control[$puntero]=$item->id;
         $puntero++;
        }
        for ($i=0; $i < count($ids_exa_control) ; $i++) { 
            $exa = DB::table('notas')->where('examen_id', $ids_exa_control[$i])->get();
            $exa_fil = DB::table('notas')->where('examen_id', $ids_exa_control[$i])->where('fecha_fin','<',$fecha_actual)->get();

            if(count($exa) == count($exa_fil)){
             DB::table('examens')->where('id',$ids_exa_control[$i])->update(array('estado_examen'=>1));
            }
        }

          $mensaje_puntaje= $bandera[0];

          $examen = DB::table('examens')->where('id_cursos', $id_curso)->get();

          return view('gestor_examenes.examen.index_envio',compact('examen','id_curso', 'mensaje_puntaje'));

        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['puntaje_examen' => 'required','duracion' => 'required',  'fecha_inicio' => 'required', 'fecha_fin' => 'required', ]);

        $fecha_inicio=$request->input('fecha_inicio');
       $fecha_inicio=$this->parser($fecha_inicio);
        $fecha_fin=$request->input('fecha_fin');
         $fecha_fin=$this->parser($fecha_fin);
        $fecha_actual= date("Y-m-d H:i:s"); 
        $id_examen=$request->input('examen_id');
        $id_curso=$request->input('curso_id');
        

        $mensajeA='a';
        $mensajeB='b';
        if($fecha_inicio < $fecha_actual){

         $mensajeA.='los datos de la fecha inicio no son validos';
          $numero_preguntas = DB::table('preguntas')->where('examen_id', $id_examen)->get();
         

           $puntaje=0;
             foreach ($numero_preguntas as $item) {

                 $puntaje+=$item->puntaje_pregunta;

             }
         
         $numero_preguntas=count($numero_preguntas);

        return view('gestor_examenes.nota.create', compact('id_curso', 'id_examen', 'numero_preguntas', 'puntaje','mensajeA', 'mensajeB'));
         

        }else{

           if ($fecha_fin < $fecha_inicio) {

            $mensajeB.='los datos de la fecha fin no son validos';


            $numero_preguntas = DB::table('preguntas')->where('examen_id', $id_examen)->get();
         

           $puntaje=0;
             foreach ($numero_preguntas as $item) {

                 $puntaje+=$item->puntaje_pregunta;

             }
         
             $numero_preguntas=count($numero_preguntas);

             return view('gestor_examenes.nota.create', compact('id_curso', 'id_examen', 'numero_preguntas', 'puntaje','mensajeA', 'mensajeB'));
         


           }else{
           

                       // variables que se utilizaran para la tabla notificaciones
                    $id_curso=$request->input('curso_id');
                    $id_examen=$request->input('examen_id');
                
                $contenedor_estudiantes=array();

                $estudiantes = DB::table('curso_inscritos')->where('curso_id', $request->input('curso_id'))->get();
                 $index=0;
                foreach ($estudiantes as $item) {
                    $contenedor_estudiantes[$index]=$item->user_id;
                    $index++;
                }
                
                //ids de las preguntas q van hacer enviadas
                $preguntas_seleccionadas= $this->preguntas_a_enviar($request->input('examen_id'));

               /* $puntaje_exa_preguntas=0;

                for ($m=0; $m < count($preguntas_seleccionadas); $m++) {  

                      $puntaje= DB::table('preguntas')->where('id', $preguntas_seleccionadas[$m])->first();
                      $puntaje_exa_preguntas+=$puntaje->puntaje_pregunta;  

                }

            */
                  
                    for ($k=0; $k < count($contenedor_estudiantes) ; $k++) { 

                   DB::table('notas')->insert(['numero_preguntas' => $request->input('numero_preguntas'),
                   'puntaje_examen' => $request->input('puntaje_examen'), 'duracion' => $request->input('duracion'), 'fecha_inicio' => $request->input('fecha_inicio'),'estado'=>true,'fecha_fin'=> $request->input('fecha_fin'), 'user_id'=> $contenedor_estudiantes[$k], 
                    'examen_id'=> $request->input('examen_id')]
                     );
                    }

                $notas = DB::table('notas')->orderBy('id', 'desc')->take(count($contenedor_estudiantes))->get();


                 // esta seccion de codigo es para las notificaciones

                     $examen= DB::table('examens')
                       ->where('id_cursos', $id_curso)
                       ->where('id', $id_examen)
                       ->select('examens.nombre_examen')
                        ->get();

                    $estudiantes= DB::table('curso_inscritos')->where('curso_id', $id_curso)->get();


                    foreach ($estudiantes as $item) {
                        
                                DB::table('notificacions')->insert(['id_user' => $item->user_id,'id_curso' => $id_curso, 'descripcion' => $examen[0]->nombre_examen,'visto' => 'false']
                                );

                    }

                $ids_notas=array();
                $j=0;
                foreach ($notas as $item) {
                    
                    $ids_notas[$j]=$item->id;

                    $j++;        
                }
                    
                    Session::flash('flash_message', 'TODO CORRECTO');

                    return $this->llenar_historial($request->input('curso_id'), $request->input('examen_id'), $preguntas_seleccionadas, $ids_notas);

           }

        }

        
   
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */


    public function parser($cadena){

        $res=  explode("T", $cadena);

        $res=$res[0].' '.$res[1].':00';

        return $res;

    }


    public function show($id)
    {
        $notum = notum::findOrFail($id);

        return view('gestor_examenes.nota.show', compact('notum'));
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
        $notum = notum::findOrFail($id);

        return view('gestor_examenes.nota.edit', compact('notum'));
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
        $this->validate($request, ['numero_preguntas' => 'required', 'duracion' => 'required', 'calificacion' => 'required', 'fecha_inicio' => 'required', 'fecha_fin' => 'required', ]);

        $notum = notum::findOrFail($id);
        $notum->update($request->all());

        Session::flash('flash_message', 'notum updated!');

        return redirect('gestor_examenes/nota');
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
        notum::destroy($id);

        Session::flash('flash_message', 'notum deleted!');

        return redirect('gestor_examenes/nota');
    }

    public function llenar_historial($id_curso, $id_examen, $preguntas_seleccionadas, $ids_notas){
        

        for ($i=0; $i < count($ids_notas) ; $i++) {  

            for ($j=0; $j < count($preguntas_seleccionadas); $j++) {

                DB::table('historial_preguntas')->insert(['pregunta' => $preguntas_seleccionadas[$j], 'nota_id' => 
                    $ids_notas[$i]]);

            }
             shuffle($preguntas_seleccionadas);

        }
        
        //restringimos el envio del examen
         
       DB::table('examens')->where('id',$id_examen)->update(array('estado_examen'=>0));

      return redirect('gestor_examenes/'.$id_curso.'/examen_envio');
    }


     public function preguntas_a_enviar($id_examen){


        $preguntas= DB::table('preguntas')->where('examen_id', $id_examen)->get();
        
        $ids_preguntas=array();
      
         $index=0;
        foreach ($preguntas as $item) {
            $ids_preguntas[$index]=$item->id;
            $index++;

        }

        return $ids_preguntas;

    }

    /*public function preguntas_a_enviar($id_examen, $numero_preguntas){


        $preguntas= DB::table('preguntas')->where('examen_id', $id_examen)->get();
        
        $ids_preguntas=array();
      
         $index=0;
        foreach ($preguntas as $item) {
            $ids_preguntas[$index]=$item->id;
            $index++;

        }

        $primer_id= $ids_preguntas[0];

        $ultimo_id= $ids_preguntas[count($ids_preguntas)-1];

        $bandera=false;
        $ids_validos=array();
        $puntero=0;

        while(!$bandera){

               $pregunta_valida= rand($primer_id, $ultimo_id);

               $existe_id= DB::table('preguntas')->where('id',$pregunta_valida )->first();

               if($numero_preguntas==count($ids_validos)){

                $bandera=true;
               
               }else{
                
                $existe=false;
                 if(!is_null($existe_id)){
                        for ($i=0; $i < count($ids_validos); $i++) { 
                            if($existe_id->id==$ids_validos[$i]){
                              $existe=true;
                            }
                        }
                   if(!$existe){
                     $ids_validos[$puntero]=$existe_id->id;
                      $puntero++;
                   }
                 
                 }  

               }
           
        }

        return $ids_validos;

    }

 */

     private function validation_formulario($id_examen){

            $vector_desicion=array();
            
            $examen=DB::table('examens')->where('id',$id_examen)->first();
            $puntaje_examen=$examen->puntaje_totalm;

            $pregunta=DB::table('preguntas')->where('examen_id',$id_examen)->get();

            $puntaje_todas_preguntas=0;
            $ids_preguntas_simple=array();
            $ids_preguntas_multiple=array();
            $ids_preguntas_complemento=array();
            $ids_preguntas_falsoverdadero=array();
           
            $i=0;    $j=0;    $k=0;  $l=0;  $n=0;
            foreach ($pregunta as $item) {
                 
              $puntaje_todas_preguntas+=$item->puntaje_pregunta;

              if($item->tipo_pregunta_id==1){
                 $ids_preguntas_complemento[$l]=$item->id;
                 $l++;
              }

               if($item->tipo_pregunta_id==4){
                 $ids_preguntas_falsoverdadero[$n]=$item->id;
                 $n++;
              }

              if($item->tipo_pregunta_id==3){
                 $ids_preguntas_simple[$j]=$item->id;
                 $j++;
              }

              if($item->tipo_pregunta_id==5){
                 $ids_preguntas_multiple[$k]=$item->id;
                 $k++;
              }

              $i++;
            }
            $bandera_complemento=false;
            for ($m=0; $m < count($ids_preguntas_complemento); $m++) { 
              $test=DB::table('simples')->where('pregunta_id', $ids_preguntas_complemento[$m])->first();
              if(is_null($test)){
                $bandera_complemento=true;//hay error
                break;
              }

            }
             $bandera_falsoverdadero=false;
            for ($m=0; $m < count($ids_preguntas_falsoverdadero); $m++) { 
              $test=DB::table('falsoverdaderos')->where('pregunta_id', $ids_preguntas_falsoverdadero[$m])->first();
              if(is_null($test)){
                $bandera_falsoverdadero=true;//hay error
                break;
              }

            }

            $bandera_simple=false;
            $bandera_simple_pre=false;
            for ($m=0; $m < count($ids_preguntas_simple); $m++) { 
              $test=DB::table('multiples')->where('pregunta_id', $ids_preguntas_simple[$m])->first();

               if(is_null($test)){
                $bandera_simple_pre=true;//hay error
                break;
              }

              $test2=DB::table('multiples')->where('pregunta_id', $ids_preguntas_simple[$m])->where('correcta', 1)->first();
              if(is_null($test2)){
                $bandera_simple=true;//hay error
                break;
              }

            }
             
             $bandera_multiple=false;
             $bandera_multiple_pre=false;
            for ($m=0; $m < count($ids_preguntas_multiple); $m++) { 

              $test=DB::table('multiples_varios')->where('pregunta_id', $ids_preguntas_multiple[$m])->first();
              if(is_null($test)){
                $bandera_multiple_pre=true;//hay error
                break;
              }

              $test2=DB::table('multiples_varios')->where('pregunta_id', $ids_preguntas_multiple[$m])->where('correcta', 1)->first();
              if(is_null($test2)){
                $bandera_multiple=true;//hay error
                break;
              }
              
            }
             
            $bandera_puntaje=false;
            if($puntaje_examen!=$puntaje_todas_preguntas){
             $bandera_puntaje=true;// hay error
            }

          switch (true) {

                  case $bandera_puntaje:
                      $vector_desicion[0]="¡¡Advertencia!! no se alcanzo el puntaje total del examen";
                      $vector_desicion[1]=false;
                      break;
                  case $bandera_simple:
                  $vector_desicion[0]="¡¡Advertencia!! las respuestas de seleccion simple deben tener una respuesta correcta";
                  $vector_desicion[1]=false;
                      break;
                   case $bandera_simple_pre:
                  $vector_desicion[0]="¡¡Advertencia!! las respuestas de seleccion simple deben tener una respuesta";
                  $vector_desicion[1]=false;
                      break;
                  case $bandera_multiple:
                      $vector_desicion[0]="¡¡Advertencia!! las respuestas de seleccion multiple deben tener al menos una respuesta correcta";
                      $vector_desicion[1]=false;
                      break;
                  case $bandera_multiple_pre:
                      $vector_desicion[0]="¡¡Advertencia!! las respuestas de seleccion multiple deben tener una respuesta";
                      $vector_desicion[1]=false;
                      break;
                  case $bandera_complemento:
                       $vector_desicion[0]="¡¡Advertencia!! las preguntas de complemento deben tener una respuesta";
                       $vector_desicion[1]=false;
                      break;
                  case $bandera_falsoverdadero:
                      
                       $vector_desicion[0]="¡¡Advertencia!! las preguntas de falso/Verdadero deben tener una respuesta";
                       $vector_desicion[1]=false;
                      break;

                  default:
                      $vector_desicion[0]="";
                      $vector_desicion[1]=true;

          }

            
            return $vector_desicion;
        }
}
