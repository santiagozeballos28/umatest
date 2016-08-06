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
    <!--Termina path de contenido del curso.
    -->
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE TAREAS</div>

                <div class="panel-body">
<div class="container">
{{-- */ $id_materia=$tarea->id_cursos; /* --}}
<!--Comienza path de mis tarea.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 17%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_materia.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_materia.'/tareas/listar') }}"><i class="fa fa-dashboard"></i>Tareas</a></li>
                    <li><a href="#"></i>Ver Tarea</a></li>
                    </ol>
        </div>
    <!--Termina path de mis tarea.
    -->
    <h1 style="padding-top:20px;">Tarea {{ $tarea->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $tarea->id }}</td>
                </tr>
                <tr><th> {{ trans('tarea.nombre_tarea') }} </th><td> {{ $tarea->nombre_tarea }} </td></tr><tr><th> {{ trans('tarea.descripcion') }} </th><td> {{ $tarea->descripcion }} </td></tr><tr><th> {{ trans('tarea.archivo') }} </th><td> {{ $tarea->archivo }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('gestor_examenes/tarea/' . $tarea->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Tarea"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['gestor_examenes/tarea', $tarea->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Tarea',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
