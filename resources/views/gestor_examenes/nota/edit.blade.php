@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">
<div class="container">

    <h1>Edit Notum {{ $notum->id }}</h1>

    {!! Form::model($notum, [
        'method' => 'PATCH',
        'url' => ['/gestor_examenes/nota', $notum->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('numero_preguntas') ? 'has-error' : ''}}">
                {!! Form::label('numero_preguntas', trans('nota.numero_preguntas'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('numero_preguntas', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('numero_preguntas', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('duracion') ? 'has-error' : ''}}">
                {!! Form::label('duracion', trans('nota.duracion'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('duracion', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('duracion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('calificacion') ? 'has-error' : ''}}">
                {!! Form::label('calificacion', trans('nota.calificacion'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('calificacion', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('calificacion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
                {!! Form::label('fecha_inicio', trans('nota.fecha_inicio'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'fecha_inicio', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha_inicio', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fecha_fin') ? 'has-error' : ''}}">
                {!! Form::label('fecha_fin', trans('nota.fecha_fin'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'fecha_fin', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha_fin', '<p class="help-block">:message</p>') !!}
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
      </div>
            </div>
        </div>
    </div>
</div>
@endsection