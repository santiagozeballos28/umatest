@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit respuesta_desarrollo {{ $respuesta_desarrollo->id }}</h1>

    {!! Form::model($respuesta_desarrollo, [
        'method' => 'PATCH',
        'url' => ['/gestor_examenes/respuesta_desarrollo', $respuesta_desarrollo->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('respuesta') ? 'has-error' : ''}}">
                {!! Form::label('respuesta', 'Respuesta', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('respuesta', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('respuesta', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection