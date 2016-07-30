@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE USUARIOS</div>

                <div class="panel-body">
<div class="container">

    <h1>Edit backup {{ $backup->id }}</h1>

    {!! Form::model($backup, [
        'method' => 'PATCH',
        'url' => ['/copia_seguridad/backups', $backup->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('nombre_backup') ? 'has-error' : ''}}">
                {!! Form::label('nombre_backup', 'Nombre Backup', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre_backup', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nombre_backup', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('archivo_backup') ? 'has-error' : ''}}">
                {!! Form::label('archivo_backup', 'Archivo Backup', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('archivo_backup', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('archivo_backup', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fecha_backup') ? 'has-error' : ''}}">
                {!! Form::label('fecha_backup', 'Fecha Backup', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'fecha_backup', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha_backup', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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