@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Permiso {{ $permiso->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $permiso->id }}</td>
                </tr>
                <tr><th> {{ trans('permisos.nombre_permiso') }} </th><td> {{ $permiso->nombre_permiso }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('admin/permisos/' . $permiso->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Permiso"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/permisos', $permiso->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Permiso',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection