@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Permisos <a href="{{ url('/admin/permisos/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Permiso"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('permisos.nombre_permiso') }} </th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($permisos as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre_permiso }}</td>
                    <td>
                        <a href="{{ url('/admin/permisos/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Permiso"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/permisos/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Permiso"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/permisos', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Permiso" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Permiso',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $permisos->render() !!} </div>
    </div>

</div>
@endsection
