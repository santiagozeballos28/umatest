@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE USUARIOS</div>

                <div class="panel-body">
<div class="container">

    <h1>backup {{ $backup->id }}
        <a href="{{ url('copia_seguridad/backups/' . $backup->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar backup"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['copia_seguridad/backups', $backup->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Eliminar backup',
                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $backup->id }}</td>
                </tr>
                <tr><th> Nombre Backup </th><td> {{ $backup->nombre_backup }} </td></tr><tr><th> Archivo Backup </th><td> {{ $backup->archivo_backup }} </td></tr><tr><th> Fecha Backup </th><td> {{ $backup->fecha_backup }} </td></tr>
            </tbody>
        </table>
    </div>

</div>


 </div>
            </div>
        </div>
    </div>
</div>
@endsection
