@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Copia de Seguridad</div>

                <div class="panel-body">
<div class="container">

    <h1>Generar Copia de Seguridad(Backup)</h1>
    <hr/>

    {!! Form::open(['url' => '/copia_seguridad/backups', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('nombre_backup') ? 'has-error' : ''}}">
                {!! Form::label('nombre_backup', 'Nombre Backup', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre_backup', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nombre_backup', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
                 



    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Generar', ['class' => 'btn btn-primary form-control']) !!}
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