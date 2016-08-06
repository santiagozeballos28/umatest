@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Notificacion {{ $notificacion->id }}</h1>

    {!! Form::model($notificacion, [
        'method' => 'PATCH',
        'url' => ['/admin/notificacion', $notificacion->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('id_user') ? 'has-error' : ''}}">
                {!! Form::label('id_user', trans('notificacion.id_user'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('id_user', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                {!! Form::label('id_curso', trans('notificacion.id_curso'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('id_curso', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('id_curso', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                {!! Form::label('descripcion', trans('notificacion.descripcion'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('visto') ? 'has-error' : ''}}">
                {!! Form::label('visto', trans('notificacion.visto'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('visto', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('visto', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('visto', '<p class="help-block">:message</p>') !!}
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