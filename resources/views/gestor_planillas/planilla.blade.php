  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de contenido del curso.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 34%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="{{ url('/admin/curso_dicta') }}"><i class="fa fa-dashboard"></i>Materias</a></li>
                    <li><a href="#"></i>Contenido del Curso</a></li>
                    </ol>
        </div>
    <!--Termina path de las Listas de contenido del curso.
    -->
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR PLANILLA</div>
                  <div class="panel-body">

    <div class="container">
     <!--Comienza path que solo muestra todas las tareas de un docente.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 16%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="#"></i>Planilla</a></li>
                    </ol>
        </div>
    <!--Termina path que solo muestra todas las tareas de un docente.
    -->
    <div class="row">
    {{-- */$materia=DB::table('cursos')->where('id', $id_curso)->first();
                    $name_materia=$materia->nombre;
                    $cantidad_estudiantes= count($estudiantes);
             /* --}}
    <h3 style="padding-top:20px;"> Planilla <a href="#"></a></h2>
    <h4> Materia: {{ $name_materia }} <a href="#"></a></h4>
    <h4> Cantidad de estudiantes: {{ $cantidad_estudiantes }} <a href="#"></a></h4>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
 <rigth>
 <div>
            <a href="{{ url('/gestor_planillas/'.$id_curso.'/modificar/varios') }}" class="btn btn-primary btn-xs" title="Editar Notum" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"/> <h5> Modificar Notas </h5></a>
</div>
</rigth>

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
                    
                   <!--th>Editar</th-->

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


               {{-- */
                 $notas_est=array();
                 $bandera=0;
                for($i=0; $i < count($examenes); $i++){
                      for($j=0; $j < count($notas_estudiantes); $j++){
                       if($item->id_user==$notas_estudiantes[$j]->id_user){
                          if($examenes[$i]->id==$notas_estudiantes[$j]->examen_id){
                           $notas_est[$i]=$notas_estudiantes[$j]->calificacion;
                           $bandera=1;
                        } 
                      }            
                   }
                   if($bandera==1) $bandera =0;     
                   else $notas_est[$i]=0;
                }
                /* --}}

               {{-- */$calif=0;/* --}}
               {{-- */$cant=0;/* --}}

                @foreach($notas_est as $nota)
                <td> {{ $nota}}  </td>
   
                {{-- */$calif=$calif+$nota;/* --}}
                {{-- */$cant++;/* --}}

                @endforeach 
                 {{-- */
                 if($cant != 0){
                    $NFin = $calif/$cant;
                 $NFin=round($NFin, 0, PHP_ROUND_HALF_UP);
                 

                 /* --}}
                
                    <td  bgcolor="#F3E2A9">{{ $NFin }}</td>
                      {{-- */
                    }
                    /* --}}
                    <!--td>
                       
                        <a href="{{ url('/gestor_planillas/'.$id_curso.'/planilla/' . $item->id_user . '/modificar') }}">
                        <i class="fa fa-edit"  style="font-size:22px;color:black"></i>
                        </a>
                     esto oes para editar individualmente
                    </td-->
                </tr>
            @endforeach
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

