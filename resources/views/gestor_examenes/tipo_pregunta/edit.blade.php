@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Tipo_preguntum {{ $tipo_preguntum->id }}</h1>

    {!! Form::model($tipo_preguntum, [
        'method' => 'PATCH',
        'url' => ['/gestor_examenes/tipo_pregunta', $tipo_preguntum->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
                {!! Form::label('tipo', trans('tipo_pregunta.tipo'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('tipo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
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