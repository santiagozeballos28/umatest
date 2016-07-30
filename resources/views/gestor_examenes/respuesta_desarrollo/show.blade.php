@extends('layouts.app')

@section('content')
<div class="container">

    <h1>respuesta_desarrollo {{ $respuesta_desarrollo->id }}
        <a href="{{ url('gestor_examenes/respuesta_desarrollo/' . $respuesta_desarrollo->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit respuesta_desarrollo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['gestor_examenes/respuesta_desarrollo', $respuesta_desarrollo->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete respuesta_desarrollo',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $respuesta_desarrollo->id }}</td>
                </tr>
                <tr><th> Respuesta </th><td> {{ $respuesta_desarrollo->respuesta }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
