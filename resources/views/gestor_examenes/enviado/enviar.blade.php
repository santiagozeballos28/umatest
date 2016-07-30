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
    <!--Termina path de enviar tarea.
    -->
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE TAREAS</div>

                <div class="panel-body">
<div class="container">
<!--Comienza path de enviar tarea.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 17%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="#"></i>Nueva Tarea</a></li>
                    </ol>
        </div>
    <!--Termina path que muestra todas las tareas de un docente y permite crear una nueva tarea.
    -->

    <h2> Envio <a href="#"></a></h2>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('tarea.nombre_tarea') }} </th><th> {{ trans('tarea.descripcion') }} </th><th> {{ trans('tarea.archivo') }} </th><th>Fecha de creacion</th><th>Enviar Tarea</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($enviar_tarea as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre_tarea }}</td><td>{{ $item->descripcion }}</td><td>{{ $item->archivo }}</td><td>{{ $item->fecha_creacion }}</td>
                    <td>
                    <li><a href="{{url('/gestor_examenes/enviar/'.$id_curso.'/'.$item->id.'/create')}}"><i class="fa fa-envelope-o"></i> Enviar Tarea</a></li>

                    </td>>
                    <td>
                        <a href="{{ url('/gestor_examenes/tarea/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Tarea"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/gestor_examenes/'.$id_curso.'/enviar/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Tarea"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

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

