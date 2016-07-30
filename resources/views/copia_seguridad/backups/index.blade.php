@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Copia de Seguridad</div>

                <div class="panel-body">
<div class="container">

    <h1>Backups <a href="{{ url('/copia_seguridad/backups/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo backup"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Nombre Backup </th><th> Archivo Backup </th><th> Fecha Backup </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($backups as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre_backup }}</td><td>{{ $item->archivo_backup }}</td><td>{{ $item->fecha_backup }}</td>
                    <td>
                     <a href="{{ url('copia_seguridad/restaurar_backup/'.$item->id.'/backups') }}" class="btn btn-success btn-xs" title="Restaurar backup"><span class="glyphicon glyphicon-refresh" aria-hidden="true"/></a>

                  

                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/copia_seguridad/backups', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" title="Eliminar backup" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar backup',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $backups->render() !!} </div>
    </div>

</div>

 </div>
            </div>
        </div>
    </div>
</div>
@endsection
