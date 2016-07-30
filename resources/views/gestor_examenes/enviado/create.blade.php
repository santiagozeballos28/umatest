@extends('app')
@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE TAREAS</div>

                <div class="panel-body">
<div class="container">

    <h1>Enviando una tarea</h1>
    <hr/>

    {!! Form::open(['url' => '/admin/enviado', 'class' => 'form-horizontal']) !!}
                @if($mensajeError!='')
                <ul class="alert alert-danger">
                <li>{{ $mensajeError }}</li>
                </ul>
                @endif
                <div class="form-group {{ $errors->has('fecha_limite') ? 'has-error' : ''}}">
                {!! Form::label('fecha_limite', trans('enviado.fecha_limite'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('fecha_limite', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha_limite', '<p class="help-block">:message</p>') !!}
                </div>
            </div>




             <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_curso',$id_curso, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_curso', '<p class="help-block">:message</p>') !!}
                </div>
                </div>


             <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id',$id, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
                </div>
                </div>







    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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