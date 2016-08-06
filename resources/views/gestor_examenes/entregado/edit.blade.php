@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Entregado {{ $entregado->id }}</h1>

    {!! Form::model($entregado, [
        'method' => 'PATCH',
        'url' => ['/gestor_examenes/entregado', $entregado->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('descripcion_tarea') ? 'has-error' : ''}}">
                {!! Form::label('descripcion_tarea', trans('entregado.descripcion_tarea'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('descripcion_tarea', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('descripcion_tarea', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('archivo') ? 'has-error' : ''}}">
                {!! Form::label('archivo', trans('entregado.archivo'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('archivo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('archivo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
                {!! Form::label('fecha', trans('entregado.fecha'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('fecha', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('puntaje') ? 'has-error' : ''}}">
                {!! Form::label('puntaje', trans('entregado.puntaje'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('puntaje', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('puntaje', '<p class="help-block">:message</p>') !!}
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