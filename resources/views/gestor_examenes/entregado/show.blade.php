@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Entregado {{ $entregado->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $entregado->id }}</td>
                </tr>
                <tr><th> {{ trans('entregado.descripcion_tarea') }} </th><td> {{ $entregado->descripcion_tarea }} </td></tr><tr><th> {{ trans('entregado.archivo') }} </th><td> {{ $entregado->archivo }} </td></tr><tr><th> {{ trans('entregado.fecha') }} </th><td> {{ $entregado->fecha }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('gestor_examenes/entregado/' . $entregado->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Entregado"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['gestor_examenes/entregado', $entregado->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Entregado',
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