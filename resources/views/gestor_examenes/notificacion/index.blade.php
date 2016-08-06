@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Notificacion <a href="{{ url('/admin/notificacion/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Notificacion"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('notificacion.id_user') }} </th><th> {{ trans('notificacion.id_curso') }} </th><th> {{ trans('notificacion.descripcion') }} </th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($notificacion as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->id_user }}</td><td>{{ $item->id_curso }}</td><td>{{ $item->descripcion }}</td>
                    <td>
                        <a href="{{ url('/admin/notificacion/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Notificacion"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/notificacion/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Notificacion"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/notificacion', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Notificacion" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Notificacion',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $notificacion->render() !!} </div>
    </div>

</div>
@endsection
