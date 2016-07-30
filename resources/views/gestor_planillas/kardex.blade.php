  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR PLANILLA</div>
                  <div class="panel-body">

    <div class="container">
    <div class="row">
   

    
     {{-- */$id_user=Auth::id();;/* --}}
    {{-- */$usuario=DB::table('users')->where('id', $id_user)->first();
                    $nombre=$usuario->name;
                    $apellido=$usuario->apellido;
          $materia=DB::table('cursos')->where('id', $id_curso)->first();
          $name_materia=$materia->nombre;

             /* --}}
    <h3> Kardex <a href="#"></a></h3>
    <h4> Estudiante: {{ $nombre }} {{ $apellido }}<a href="#"></a></h4>
    <h4> Materia: {{ $name_materia }} <a href="#"></a></h4>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>  Nombre Examen  </th>         
                    <th>  Nota </th>  
                </tr>

              </thead>
              <tbody>





                {{-- */
                 $notas_est=array();
                 $bandera=0;
                 $calif=0;
                for($i=0; $i < count($examenes); $i++){
                      for($j=0; $j < count($calificaciones); $j++){
                       if($examenes[$i]->id==$calificaciones[$j]->id){
                          
                           $notas_est[$i]=$calificaciones[$j]->calificacion;
                           $calif=$calif+$calificaciones[$j]->calificacion;
                           $bandera=1;
                         
                      }            
                   }
                   if($bandera==1) $bandera =0;     
                   else $notas_est[$i]=0;
                }
                $cant=count($examenes);
                $NotaFinal=$calif/$cant;


                 $NFin=round($NotaFinal, 0, PHP_ROUND_HALF_UP);

                /* --}}          


              {{-- */
              $x=0;
              $i=0;
              /* --}}
              @foreach($examenes as $examen)
                {{-- */$x++;/* --}}
                <tr>
                <td>{{ $x }}</td>
                 <td>{{ $examen-> nombre_examen }}</td>
                    

                <td>{{ $notas_est[$i] }}</td>   
                </tr>         

                 {{-- */$i++;/* --}}
                 @endforeach
               <tr style="color: red">

               <td> N </td>
                <td> NotaFinal </td>
                <td>{{ $NFin }}</td> 
                </tr>
            
            </tbody>
        </table>
        <div class="pagination">  </div>
    </div>

</div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection

