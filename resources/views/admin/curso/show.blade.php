@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de ver materias de docente.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath borderpath" style="width: 29%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="{{ url('/admin/curso_dicta') }}"><i class="fa fa-dashboard"></i>Materias</a></li>
                    <li><a href="#"></i>Ver Materia</a></li>
                    </ol>
        </div>
    <!--Termina path de ver materia de docentes.
    -->
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">


<div class="container">

    <h1>VER MATERIA</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $curso->id }}</td>
                </tr>
                <tr><th> {{ trans('curso.nombre') }} </th><td> {{ $curso->nombre }} </td></tr><tr><th>Numero de Alumnos</th><td> {{ $curso->capacidad }} </td></tr><tr><th> {{ trans('curso.codigo') }} </th><td> {{ $curso->codigo }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('admin/curso/' . $curso->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Curso"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/curso', $curso->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Curso',
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