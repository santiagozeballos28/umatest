<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;
use Auth;
use Fpdf;
class gestorexamenesController extends Controller
{
   


    public function formulario_examen($id_nota, $id_examen){

           //AQUI ES DONDE VAMOS A CAMBIAR EL ESTADO DEL EXAMEN UNA VEZ QUE DE SU EXAMEN
        $examen= DB::table('examens')->where('id', $id_examen)->first();

        $nombre_examen=$examen->nombre_examen;//ESTE SE ENVIA(1)
        $fecha_examen=$examen->fecha_examen; //ESTE SE ENVIA(2)
        $id_curso=$examen->id_cursos;

        $curso= DB::table('cursos')->where('id', $id_curso)->first();
        $id_categoria=$curso->id_categoria;

        $categoria= DB::table('categorias')->where('id', $id_categoria)->first();
        $nombre_categoria=$categoria->nombre; //ESTE SE ENVIA(3)       

        //$objetos_nota= DB::table('notas')->where('examen_id', $id_examen)->get();
  
        //sacamos todas las preguntas disponibles al usuario
        $historial= DB::table('notas')
            ->join('historial_preguntas', 'notas.id', '=', 'historial_preguntas.nota_id')
            ->select('historial_preguntas.pregunta')->where('examen_id', $id_examen)->where('user_id', Auth::id())->where('estado',1)->get();
     
        
        $preguntas=array();
        $index=0;
        foreach ($historial as $item) {
            $consulta= DB::table('preguntas')->where('id', $item->pregunta)->first();
           $preguntas[$index]=$consulta;
           $index++;     
        }
        
        $ids_preguntas=array();
        $content_nom_preguntas=array();//ESTE SE ENVIA(4)
        $content_puntaje_preguntas=array();//ESTE SE ENVIA(5)
        $ids_tipo_pregunta=array();//ESTE SE ENVIA(6)
   
         $index=0;
        foreach ($preguntas as $item) {
            
            $ids_preguntas[$index]=$item->id;
            $content_nom_preguntas[$index]=$item->nombre_pregunta;
            $content_puntaje_preguntas[$index]=$item->puntaje_pregunta;
            $ids_tipo_pregunta[$index]=$item->tipo_pregunta_id;
           
            $index++;

        }
        
        $content_respuestas=array();//ESTE SE ENVIA(7)
        $res_mul_correcta=array();
        $res_mul_var_correcta="";
        $cadena_m="";

        for ($i=0; $i < count($ids_preguntas) ; $i++) { 

           $respuesta_simple = DB::table('simples')->where('pregunta_id', $ids_preguntas[$i])->first();
           
           $respuesta_desarrollo = DB::table('desarrollos')->where('pregunta_id', $ids_preguntas[$i])->first();

           
           $respuesta_multiple = DB::table('multiples')->where('pregunta_id', $ids_preguntas[$i])->get();

           $respuesta_multiple_correcta = DB::table('multiples')->where('pregunta_id', $ids_preguntas[$i])->where('correcta', 1)->first();

           $respuesta_falsoverdadero = DB::table('falsoverdaderos')->where('pregunta_id', $ids_preguntas[$i])->first();

           $respuesta_multiple_varios = DB::table('multiples_varios')->where('pregunta_id', $ids_preguntas[$i])->get();

           $respuesta_multiple_varios_correcta = DB::table('multiples_varios')->where('pregunta_id', $ids_preguntas[$i])->where('correcta',1)->get();


           if(!is_null($respuesta_simple)){
             
               $content_respuestas[$i]=$respuesta_simple->respuesta;
               $res_mul_correcta[$i]='///';
               $res_mul_var_correcta.='***'.',';
               $cadena_m.= $respuesta_simple->respuesta . ',';

           }else{

               if(!is_null($respuesta_desarrollo)){
               $content_respuestas[$i]= $respuesta_desarrollo->respuesta;
               $res_mul_correcta[$i]='///';
               $res_mul_var_correcta.='***'.',';
               $cadena_m.= $respuesta_desarrollo->respuesta. ',';

              }else{
               if(!is_null($respuesta_falsoverdadero)){
               $content_respuestas[$i]= $respuesta_falsoverdadero->respuesta;
               $res_mul_correcta[$i]='///';
               $res_mul_var_correcta.='***'.',';
               $conversion= ($respuesta_falsoverdadero->respuesta) ? '1' : '0';
               $cadena_m.= $conversion.',';
               
              }else{   
             //  if(!is_null($respuesta_multiple)){
                if(count($respuesta_multiple)!=0){
                
               $j=0;
               $ids_multiples=array();
               $cad_axu="";
               foreach ($respuesta_multiple as $item) {
                $ids_multiples[$j]=$item->respuesta;
                $cad_axu.=$item->respuesta. ',';
                 $j++;
               }
               $content_respuestas[$i]= $ids_multiples;
               $res_mul_correcta[$i]=$respuesta_multiple_correcta->respuesta;
               $res_mul_var_correcta.='***'.',';
               $cadena_m.='/,'.$cad_axu .'/,';

               }else{

              if(count($respuesta_multiple_varios)!=0){
               $j=0;
               $ids_multiples_varios=array();
               $cad_axu="";
               foreach ($respuesta_multiple_varios as $item) {
                $ids_multiples_varios[$j]=$item->respuesta;
                $cad_axu.=$item->respuesta. ',';
                 $j++;
               }
               $content_respuestas[$i]= $ids_multiples_varios;
               
               $nombres_respuestas="";
            
               foreach ($respuesta_multiple_varios_correcta  as $item) {
                 $nombres_respuestas.=$item->respuesta. ',';
               }
               $res_mul_var_correcta.='/,'.$nombres_respuestas .'/,';
               $res_mul_correcta[$i]="///";
               $cadena_m.='/,'.$cad_axu .'/,';

                 }
               }
               
                }
              }
           }

        }

        $duracion_total= DB::table('notas')->where('id', $id_nota)->first();
        $duracion_total=$duracion_total->duracion;
       

        //una vez abierto el formulario examen el estudiante no puede volver a dar
        DB::table('notas')->where('id',$id_nota)->update(array('estado'=>0));

        //store procedure
            
            $dato_nuevo=$nombre_examen.'#'.$fecha_examen.'#'.$nombre_categoria.'#'.$duracion_total;//1
            $dato_viejo="";//2
            $nombre_maq = gethostname(); $ip = gethostbyname($nombre_maq);//3
            $nombre_tabla="notas";//4
            $fecha_a = date("Y-m-d H:i:s");//5
            $accion_a='create';//6
            $id_user=Auth::id();
            $usuario= DB::table('users')->where('id', $id_user)->first();
            $nombre_usuario = $usuario->name.' '.$usuario->apellido;//7
            $id_bi=0;//8

            DB::select('CALL Bitacora(?,?,?,?,?,?,?,?)', array($dato_nuevo, $dato_viejo, $ip, 
                $nombre_tabla, $fecha_a, $accion_a, $nombre_usuario, $id_bi));
              //fin procedure
        

      return view('gestor_examenes.vistas_examenes.formulario_examen', compact('nombre_examen', 
      'fecha_examen', 'nombre_categoria', 'content_nom_preguntas', 'content_puntaje_preguntas',
        'ids_tipo_pregunta','content_respuestas','cadena_m', 'res_mul_correcta', 'id_nota','res_mul_var_correcta','duracion_total', 'ids_preguntas','id_examen'));

     
    }
    

      public function calcular_nota(Request $request){
        
        //con_res_formularios
         $cadena_puntaje=explode(",",$request->input('con_puntaje'));//envia 1
         $cadena_res_formulario=explode(",",$request->input('con_res_formularios'));//envia 2
         $separando= explode(",",$request->input('con_res_correctas'));
         $cadena_res_correctas=$this->explode_respuestas($separando);
         $cadena_res_multiple= explode(",",$request->input('con_res_multiple'));
         $separando_dos=explode(",", $request->input('con_res_multiple_var'));//res_correctas
         $cadena_res_var_correcta=$this->explode_respuestas($separando_dos);//res_correctas
       
         $tipo_pre=explode(",",$request->input('tipo_pregunta'));
         $id_pre=explode(",",$request->input('id_pregunta'));
         $puntaje_estudiante=0;
         $numero_res_correctas=0;
         $numero_res_fallidas=0;
         $numero_res_revisar=0;
            
         for ($i=0; $i < count($cadena_res_correctas); $i++) { 
                 $respuesta=$request->input($cadena_res_formulario[$i]);
                 if(count($cadena_res_correctas[$i])>1){

                  if ($tipo_pre[$i] == 3) { //simple

                   if($respuesta==$cadena_res_multiple[$i]){
                     $puntaje_estudiante+=$cadena_puntaje[$i];
                     $numero_res_correctas++;
                   }else{
                    $numero_res_fallidas++;
                   }
                    
                  }else{ //multiple
                    
                    $respuestas_cor= $cadena_res_var_correcta[$i];
                    $tamanio_cor=count($respuestas_cor);
                    $tamanio_res_form= count($respuesta);
                    if($tamanio_cor==$tamanio_res_form){
                     $buenas=0;
                         for ($j=0; $j < $tamanio_res_form; $j++) { 

                           for ($k =0; $k  < $tamanio_cor; $k ++) { 

                               if($respuesta[$j]==$respuestas_cor[$k]){
                                 $buenas++;
                                }
                           }

                         }
                      if ($buenas==$tamanio_cor) {
                           $puntaje_estudiante+=$cadena_puntaje[$i];
                            $numero_res_correctas++;
                      }else{
                        $numero_res_fallidas++;
                      }

                    }else{

                       $numero_res_fallidas++;
                    }

                  }

                 }else{
                      if($tipo_pre[$i] != 2){ //desarrollo no se evalua
                              if($respuesta==$cadena_res_correctas[$i]){
                              $puntaje_estudiante+=$cadena_puntaje[$i];
                               $numero_res_correctas++;
                          }else{
                            $numero_res_fallidas++;
                          }
                      }else{
                        $numero_res_revisar++;
                      }
   
                 }
           
         }
     /*    
         $respuesta="";
         for ($i=0; $i < count($cadena_res_formulario); $i++) { 
            $respuesta.=$request->input($cadena_res_formulario[$i]).'/';
         }
       */  
         $id_nota=$request->input('id_nota');

         DB::table('notas')->where('id',$id_nota)->update(array('calificacion'=>$puntaje_estudiante, 'numero_respuestas_correctas' => $numero_res_correctas));
         
         $respuestas_estudiante=array();
         for ($i=0; $i < count($cadena_res_formulario); $i++) {  
           $respuestas_estudiante[$i]= $request->input($cadena_res_formulario[$i]);
         }
         
         $id_usuario=Auth::id();
         //guardar para modificar planilla notas
         for ($k=0; $k < count($respuestas_estudiante); $k++) { 
           if($tipo_pre[$k]==2){
             DB::table('respuesta_desarrollos')->insert(['respuesta' => $respuestas_estudiante[$k], 'examen_id' => $request->input('id_examen'), 'id_user'=>$id_usuario,'pregunta_id'=> $id_pre[$k]] );
           }
         }
         //-.--.-..-.-

         //LO QUE SE ENVIA
         $puntajes= $request->input('con_puntaje');//explode
         //$respuestas_estudiante= $request->input('con_res_formularios');//explode
         $preguntas_examen= $request->input('nombre_pregunta_examen');//explode
         $nombre_examen= $request->input('nombre_examen');
         $fecha_examen=$request->input('fecha_examen');
         $nombre_categoria=$request->input('nombre_categoria');
         $puntaje_total_examen=$request->input('puntaje_total_examen');
         $tipos_pregunta=$request->input('tipo_pregunta');//eplode

         $this->crear_pdf($puntajes, $respuestas_estudiante, $preguntas_examen, $nombre_examen, $fecha_examen, $nombre_categoria, $puntaje_total_examen, $tipos_pregunta, $id_nota);
       

         return view('gestor_examenes.vistas_examenes.resultado_examen', compact('puntaje_estudiante','numero_res_correctas','numero_res_fallidas', 'numero_res_revisar'));
      }
     
      

      public function explode_respuestas($exp){
         
         
       $vector_oficial=array();
        $puntero_oficial=0;
        $ultimo=count($exp);
        for($i=0; $i< count($exp); $i++){
           
        
                if($exp[$i]=='/'){
                 
                   $x=($i+1);
                   $vector_multiple=array();
                   $puntero_multiple=0;
                  while($exp[$x]!='/'){
                      $vector_multiple[$puntero_multiple]=$exp[$x];
                       $puntero_multiple++;
                       $x++;        
                       }
                  //posiblemente incrementar $x;
                  $vector_oficial[$puntero_oficial]=$vector_multiple;
                  $puntero_oficial++;
                  $i=$x;
                  
                 }else{
                    $vector_oficial[$puntero_oficial]=$exp[$i];
                  $puntero_oficial++;
                 }
                 
                 if($ultimo==($i+2)){
                  
                   break;
                  }
          
            }
        
              return $vector_oficial;
             }

       public function crear_pdf($puntajes, $respuestas_estudiante, $preguntas_examen, 
        $nombre_examen, $fecha_examen, $nombre_categoria, $puntaje_total_examen, $tipos_pregunta, $id_nota){
         
         $fecha_actual = date("Y-m-d H-i-s");
         $puntaje=explode(",",$puntajes);
         //$respuestas=explode(",", $respuestas_estudiante);
         $preguntas=explode(",", $preguntas_examen);
         $tipo=explode(",", $tipos_pregunta);

         Fpdf::AddPage();
         Fpdf::SetFont('Arial','B',16);

         Fpdf::Cell(185,10, $nombre_examen,0,2,'C');
         Fpdf::Cell(185,10, $fecha_examen,0,2,'C');
         Fpdf::Cell(185,10, $nombre_categoria,0,2,'C');
         Fpdf::Cell(185,10, $puntaje_total_examen.' Puntos',0,2,'C');

        for($i=0;$i<count($puntaje);$i++){
          Fpdf::Cell(0,10,($i+1).'.- '.$preguntas[$i].'('.$puntaje[$i].'puntos)',0,2);

          if($tipo[$i] == '4'){
               if ($respuestas_estudiante[$i]=='1') {
                Fpdf::Cell(0,10,'Respuesta'.'.- '.'Verdadero',0,2);
               }else{
                Fpdf::Cell(0,10,'Respuesta'.'.- '.'Falso',0,2);
               }
          }else{

            if($tipo[$i] == '5'){

                $respuestas_varias= $respuestas_estudiante[$i];
                $cadena_res="";
                for($j=0;$j<count($respuestas_varias);$j++){
                  $cadena_res.=' '.$respuestas_varias[$j].' ';
                }
                  Fpdf::Cell(0,10,'Respuesta'.'.- '.$cadena_res,0,2);
            }else{

            Fpdf::Cell(0,10,'Respuesta'.'.- '.$respuestas_estudiante[$i],0,2);
            }

          }
          
          
        }
          //Fpdf::Output();
        $archivo_examen= 'pdfs_examenes/'.$nombre_examen.'-'.$fecha_actual.'.pdf';
        Fpdf::Output($archivo_examen,'F');
         //Fpdf::Output('probamela3.pdf', 'F');
         
         DB::table('notas')->where('id',$id_nota)->update(array('archivo'=>$archivo_examen));
         
       }
      
       public function formulario_examen_docente($id_examen, $id_curso){
       
       $bandera = $this->validation_formulario($id_examen);
       if($bandera[1]){

         $examen= DB::table('examens')->where('id', $id_examen)->first();

        $nombre_examen=$examen->nombre_examen;//ESTE SE ENVIA(1)
        $fecha_examen=$examen->fecha_examen; //ESTE SE ENVIA(2)
        $id_curso=$examen->id_cursos;

        $curso= DB::table('cursos')->where('id', $id_curso)->first();
        $id_categoria=$curso->id_categoria;

        $categoria= DB::table('categorias')->where('id', $id_categoria)->first();
        $nombre_categoria=$categoria->nombre; //ESTE SE ENVIA(3)       

        $historial= DB::table('preguntas')->where('examen_id', $id_examen)->get();
        
        $preguntas=array();
        $index=0;
        foreach ($historial as $item) {
            $consulta= DB::table('preguntas')->where('id', $item->id)->first();
           $preguntas[$index]=$consulta;
           $index++;     
        }
        
        $ids_preguntas=array();
        $content_nom_preguntas=array();//ESTE SE ENVIA(4)
        $content_puntaje_preguntas=array();//ESTE SE ENVIA(5)
        $ids_tipo_pregunta=array();//ESTE SE ENVIA(6)
        //$content_duracion=array();
         $index=0;
        foreach ($preguntas as $item) {
            
            $ids_preguntas[$index]=$item->id;
            $content_nom_preguntas[$index]=$item->nombre_pregunta;
            $content_puntaje_preguntas[$index]=$item->puntaje_pregunta;
            $ids_tipo_pregunta[$index]=$item->tipo_pregunta_id;
          //  $content_duracion[$index]=$item->duracion;
            $index++;

        }
        
         $content_respuestas=array();//ESTE SE ENVIA(7)
        $res_mul_correcta=array();
        $res_mul_var_correcta="";
        $cadena_m="";

        for ($i=0; $i < count($ids_preguntas) ; $i++) { 

           $respuesta_simple = DB::table('simples')->where('pregunta_id', $ids_preguntas[$i])->first();
           
           $respuesta_desarrollo = DB::table('desarrollos')->where('pregunta_id', $ids_preguntas[$i])->first();

           
           $respuesta_multiple = DB::table('multiples')->where('pregunta_id', $ids_preguntas[$i])->get();

           $respuesta_multiple_correcta = DB::table('multiples')->where('pregunta_id', $ids_preguntas[$i])->where('correcta', 1)->first();

           $respuesta_falsoverdadero = DB::table('falsoverdaderos')->where('pregunta_id', $ids_preguntas[$i])->first();

           $respuesta_multiple_varios = DB::table('multiples_varios')->where('pregunta_id', $ids_preguntas[$i])->get();

           $respuesta_multiple_varios_correcta = DB::table('multiples_varios')->where('pregunta_id', $ids_preguntas[$i])->where('correcta',1)->get();


           if(!is_null($respuesta_simple)){
             
               $content_respuestas[$i]=$respuesta_simple->respuesta;
               $res_mul_correcta[$i]='///';
               $res_mul_var_correcta.='***'.',';
               $cadena_m.= $respuesta_simple->respuesta . ',';

           }else{

               if(!is_null($respuesta_desarrollo)){
               $content_respuestas[$i]= $respuesta_desarrollo->respuesta;
               $res_mul_correcta[$i]='///';
               $res_mul_var_correcta.='***'.',';
               $cadena_m.= $respuesta_desarrollo->respuesta. ',';

              }else{
               if(!is_null($respuesta_falsoverdadero)){
               $content_respuestas[$i]= $respuesta_falsoverdadero->respuesta;
               $res_mul_correcta[$i]='///';
               $res_mul_var_correcta.='***'.',';
               $conversion= ($respuesta_falsoverdadero->respuesta) ? '1' : '0';
               $cadena_m.= $conversion.',';
               
              }else{   
             //  if(!is_null($respuesta_multiple)){
                if(count($respuesta_multiple)!=0){
                
               $j=0;
               $ids_multiples=array();
               $cad_axu="";
               foreach ($respuesta_multiple as $item) {
                $ids_multiples[$j]=$item->respuesta;
                $cad_axu.=$item->respuesta. ',';
                 $j++;
               }
               $content_respuestas[$i]= $ids_multiples;
               $res_mul_correcta[$i]=$respuesta_multiple_correcta->respuesta;
               $res_mul_var_correcta.='***'.',';
               $cadena_m.='/,'.$cad_axu .'/,';

               }else{

              if(count($respuesta_multiple_varios)!=0){
               $j=0;
               $ids_multiples_varios=array();
               $cad_axu="";
               foreach ($respuesta_multiple_varios as $item) {
                $ids_multiples_varios[$j]=$item->respuesta;
                $cad_axu.=$item->respuesta. ',';
                 $j++;
               }
               $content_respuestas[$i]= $ids_multiples_varios;
               
               $nombres_respuestas="";
            
               foreach ($respuesta_multiple_varios_correcta  as $item) {
                 $nombres_respuestas.=$item->respuesta. ',';
               }
               $res_mul_var_correcta.='/,'.$nombres_respuestas .'/,';
               $res_mul_correcta[$i]="///";
               $cadena_m.='/,'.$cad_axu .'/,';

                 }
               }
               
                }
              }
           }

        }
   
        

      return view('gestor_examenes.vistas_examenes.formulario_examen_docente', compact('nombre_examen', 
      'fecha_examen', 'nombre_categoria', 'content_nom_preguntas', 'content_puntaje_preguntas',
        'ids_tipo_pregunta','content_respuestas','cadena_m', 'res_mul_correcta', 'id_nota','res_mul_var_correcta', 'id_curso'));

        }else{

          $mensaje_puntaje= $bandera[0];

          $examen = DB::table('examens')->where('id_cursos', $id_curso)->get();

          return view('gestor_examenes.examen.index',compact('examen','id_curso', 'mensaje_puntaje'));
       }
        
    }

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