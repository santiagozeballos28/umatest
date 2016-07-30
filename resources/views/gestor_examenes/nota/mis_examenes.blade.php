@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')


<input id="reloadValue" type="hidden" name="reloadValue" value="" />

<div class="container">
    <div class="row">
    {{-- */$id_user=Auth::id();   
             /* --}}
             {{-- */$id_rol=DB::table('role_user')->where('user_id', $id_user)->first();
                   $id_rol=$id_rol->role_id;    
             /* --}}
             {{-- */$name_rol=DB::table('roles')->where('id', $id_rol)->first();
                    $name_rol=$name_rol->nombre_rol;
             /* --}}
             @if ($name_rol=="estudiante")
               <!--Comienza path de contenido del curso desde estudiante.
                -->
                <div class="col-md-14 col-md-offset-0 borderpath" style="width: 34%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="{{ url('admin/curso/index_todo/todo')}}"><i class="fa fa-dashboard"></i>Materias</a></li>
                    <li><a href="#"></i>Contenido del Curso</a></li>
                    </ol>
               </div>
            <!--Termina path de contenido del curso desde estudiante.
            -->

          @else      
          <!--Comienza path de contenido del curso desde docente.
            -->
              <div class="col-md-14 col-md-offset-0 borderpath" style="width: 34%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="{{ url('/admin/curso_dicta') }}"><i class="fa fa-dashboard"></i>Materias</a></li>
                    <li><a href="#"></i>Contenido del Curso</a></li>
                    </ol>
              </div>
              <!--Termina path de las Listas de contenido del curso desde docente.
           -->
        @endif
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">
<div class="container">
<!--Comienza path de lista de examen de estudiantes.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 21%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="#"></i>Lista de Exámenes</a></li>
                    </ol>
        </div>
    <!--Termina path de lista de examen de estudiantes.
    -->
    <h1>MIS EXAMENES</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Nombre Examen</th><th> Duracion</th>
                    <th>Fecha y Hora Inicio</th><th>Fecha y Hora Limite</th>
                    <th>Dar Examen</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($notas as $item)
                {{-- */

                  $x++;
                       
                    $objeto_examen= DB::table('examens')->where('id', $item->examen_id)->first();

                    $nombre_examen=$objeto_examen->nombre_examen;

                    $id_examen=$objeto_examen->id;
                     
                    $f_inicio= $item->fecha_inicio;

                    $fecha_actual = date("Y-m-d H:i:s");      

                /* --}}
                <tr>
                    <td>{{ $x }}</td><td>{{$nombre_examen}}</td>
                    <td>{{ $item->duracion . "min"}}</td><td>{{$item->fecha_inicio}}</td><td>{{$item->fecha_fin}}</td>
                   
                   @if($fecha_actual >= $f_inicio)
                    <td>
                    <li><a href="{{url('darexamen/'.$item->id.'/'.$id_examen.'/formulario_examen')}}"><i class="fa fa-book Try it"></i> Empezar </a></li>
                    </td>
                   @else
                    <td>
                    <li><a href="#"><i class="fa fa-book Try it"></i> Empezar </a></li>
                    </td>
                   @endif

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
