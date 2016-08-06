@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Materia_dictum {{ $curso_dictum->id }}</h1>

    {!! Form::model($curso_dictum, [
        'method' => 'PATCH',
        'url' => ['/admin/curso_dicta', $curso_dictum->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('grupo') ? 'has-error' : ''}}">
                {!! Form::label('grupo', trans('curso_dicta.grupo'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('grupo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('grupo', '<p class="help-block">:message</p>') !!}
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