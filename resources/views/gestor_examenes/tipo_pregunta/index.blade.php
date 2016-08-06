@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Tipo_pregunta <a href="{{ url('/gestor_examenes/tipo_pregunta/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Tipo_preguntum"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('tipo_pregunta.tipo') }} </th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($tipo_pregunta as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>
                        <a href="{{ url('/gestor_examenes/tipo_pregunta/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Tipo_preguntum"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/gestor_examenes/tipo_pregunta/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Tipo_preguntum"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/gestor_examenes/tipo_pregunta', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Tipo_preguntum" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Tipo_preguntum',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $tipo_pregunta->render() !!} </div>
    </div>

</div>
@endsection
