  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection


@section('main-content')
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
                <div class="panel-heading">GESTOR DE TAREAS</div>

                <div class="panel-body">
<div class="container">
<!--Comienza path de lista de tareas de estudiantes.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 17%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="#"></i>Mis Tareas</a></li>
                    </ol>
        </div>
    <!--Termina path de lista de tareas de estudiantes.
    -->
     <h2>Mis Tareas <a href="#"></a></h2>
  


    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                <th>S.No</th><th> Nombre de la tarea</th>
                <th> Descripcion </th>
                <th> Archivo </th>
                <th> Fecha limte entrega </th>
                <th>Descargar</th>
                <th>Subir tarea</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($tareas as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre_tarea }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->archivo }}</td>
                    <td>{{ $item->fecha_limite }}</td>
                    <td> 
                    <a href="{{url(''.$item->path_archivo.'')}}"><i class="fa fa-cloud-download" style="font-size:24px;color:orange"></i></a>
                    </td>
                     <td> 
                    <a href="{{url('/gestor_examenes/'.$id_curso.'/'.$item->id.'/entregar_tarea')}}">
                    <i class="fa fa-cloud-upload" style="font-size:24px;color:green"></i></a>
                    </td>
                
                   
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

