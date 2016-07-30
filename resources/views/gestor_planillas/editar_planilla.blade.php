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
   
    {{-- */$materia=DB::table('cursos')->where('id', $id_curso)->first();
                    $name_materia=$materia->nombre;
                    $cantidad_estudiantes= count($estudiantes);
             /* --}}
    <h3> Planilla <a href="#"></a></h2>
    <h4> Materia: {{ $name_materia }} <a href="#"></a></h4>
    <h4> Cantidad de estudiantes: {{ $cantidad_estudiantes }} <a href="#"></a></h4>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>  Apellidos  </th>
                    <th>  Nombres  </th>
                      {{-- */$y=0;/* --}}
                    @foreach($examenes as $items)
                    {{-- */$y++;/* --}}
                    <th> {{ $items->nombre_examen }} </th>
                    @endforeach

                    <th bgcolor="#F3E2A9">NotaFinal</th>
                    
                   

                   </tr>
              </thead>
              <tbody>
              {{-- */$x=0;/* --}}
              @foreach($estudiantes as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->apellido }}</td>
                    <td>{{ $item->name }}</td>
               


               {{-- */$calif=0;/* --}}
               {{-- */$cant=0;/* --}}

               {{-- */
   
                 $bandera=0;
                 $i=0;

                while(($i < count($examenes))&& ($bandera==0)){
                       $j=0; 
                      while(($j < count($notas_estudiantes))&& ($bandera==0)){
                       if($item->id_user==$notas_estudiantes[$j]->id_user){
                          if($examenes[$i]->id==$notas_estudiantes[$j]->examen_id){;
                           $id_examen_es=$examenes[$i]->id;
                           $nota_estudiante=$notas_estudiantes[$j]->calificacion;
                           $bandera=1;
                        } 
                      } 
                       $j++;           
                   }
                   /* --}}
                 
                 <td> {{ $nota_estudiante }} 
                 <a href="{{ url('/gestor_planillas/'.$id_curso.'/planilla/' . $item->id_user . '/'.$id_examen_es.'/edit') }}">
                  <i class="fa fa-edit"  style="font-size:22px;color:#E2A9F3"></i>
                  </a>
                  </td>

   
                  {{-- */
                     $bandera=0;
                    $i++;
                     $calif=$calif+$nota_estudiante;
                     $cant++;
                }
                /* --}}
     
                

              


                
                 {{-- */
                 $NFin = $calif/$cant;
                 $NFin=round($NFin, 0, PHP_ROUND_HALF_UP);

                 /* --}}
                  
                    <td bgcolor="#F3E2A9">{{ $NFin }}</td>
       
                </tr>
            @endforeach
            </tbody>

        </table>
        <center>
         <div>
          <a href="{{  url('gestor_planillas/'.$id_curso.'/planilla/listar')}}" class="btn btn-primary btn-xs" title="Terminar" ><span class="" aria-hidden="true"/> <h5> Terminar </h5></a>
          </div>
          </center>
        <div class="pagination">  </div>
    </div>

</div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection

