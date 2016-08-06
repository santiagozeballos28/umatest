
@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <div class="col-md-14 col-md-offset-0">
    <!--Comienza path de Mostar cuenta de Docentes.
    -->
    <div class="col-md-14 col-md-offset-0 borderpaht" style="width: 21%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Usuarios</a></li>
                    <li><a href="{{ url('admin/docente') }}"><i class="fa fa-dashboard"></i>Docentes</a></li>
                    <li><a href="#"></i>Cuenta de Docente</a></li>
                    </ol>
                    </div>
    <!--Termina path de Mostrar cuenta de docentes.
    -->
        
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE USUARIOS</div>

                <div class="panel-body">



<div class="container">

    <h1>VER INFORMACION</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $docente->id }}</td>
                </tr>
                <tr><th> Nombre </th><td> {{ $docente->name }} </td></tr><tr><th> {{ trans('docente.apellido') }} </th><td> {{ $docente->apellido }} </td></tr><tr><th> {{ trans('docente.direccion') }} </th><td> {{ $docente->direccion }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('admin/docente/' . $docente->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Docente"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/docente', $docente->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Docente',
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