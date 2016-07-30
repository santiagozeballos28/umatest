@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Tipo_preguntum {{ $tipo_preguntum->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $tipo_preguntum->id }}</td>
                </tr>
                <tr><th> {{ trans('tipo_pregunta.tipo') }} </th><td> {{ $tipo_preguntum->tipo }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('gestor_examenes/tipo_pregunta/' . $tipo_preguntum->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Tipo_preguntum"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['gestor_examenes/tipo_pregunta', $tipo_preguntum->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Tipo_preguntum',
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