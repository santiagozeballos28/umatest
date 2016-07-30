@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Notificacion {{ $notificacion->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $notificacion->id }}</td>
                </tr>
                <tr><th> {{ trans('notificacion.id_user') }} </th><td> {{ $notificacion->id_user }} </td></tr><tr><th> {{ trans('notificacion.id_curso') }} </th><td> {{ $notificacion->id_curso }} </td></tr><tr><th> {{ trans('notificacion.descripcion') }} </th><td> {{ $notificacion->descripcion }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('admin/notificacion/' . $notificacion->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Notificacion"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/notificacion', $notificacion->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Notificacion',
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