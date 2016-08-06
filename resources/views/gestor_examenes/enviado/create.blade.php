@extends('app')
@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
                 <!--Comienza path de contenido del curso.
                   -->
                 <div class="col-md-14 col-md-offset-0 borderpath" style="width: 34%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="{{ url('/admin/curso_dicta') }}"><i class="fa fa-dashboard"></i>Materias</a></li>
                    <li><a href="#"></i>Contenido del Curso</a></li>
                    </ol>
                </div>
               <!--Termina path de las Listas de contenido del curso.
                -->
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE TAREAS</div>

                <div class="panel-body">
<div class="container">
<!--Comienza path de mis tarea.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 17%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_curso.'/tareas/listar') }}"><i class="fa fa-dashboard"></i>Tareas</a></li>
                    <li><a href="#"></i>Enviar tarea</a></li>
                    </ol>
        </div>
    <!--Termina path de mis tarea.
    -->
    <h1 style="padding-top:20px;">Enviando una tarea</h1>
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
                    {!! Form::datetime('fecha_limite', null, ['class' => 'form-control', 'required' => 'required']) !!}
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
            {!! Form::submit('Crear', ['class' => 'btn btn-primary form-control']) !!}
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