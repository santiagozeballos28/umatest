@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de contenido del curso desde docente.
            -->
              <div class="col-md-14 col-md-offset-0 borderpath" style="width: 34%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="{{ url('/admin/curso_dicta') }}"><i class="fa fa-dashboard"></i>Materias</a></li>
                    <li><a href="#"></i>Contenido del Curso</a></li>
                    </ol>
              </div>
              <!--Termina path de las Listas de contenido del curso desde docente.
           -->
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">
<div class="container">
<!--Comienza path de Enviar exámenes.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 33%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_curso.'/examen_envio') }}"><i class="fa fa-dashboard"></i>Exámenes a Enviar</a></li>
                    <li><a href="#"></i>Enviar Examen</a></li>
                    </ol>
        </div>
    <!--Termina path de de Enviar exámenes.
    -->
    <h1>Enviar Examen</h1>
    <hr/>

    {!! Form::open(['url' => '/gestor_examenes/nota', 'class' => 'form-horizontal']) !!}

               <li style="text-align: center; color: red;">El numero total de preguntas que existe en el examen es: {{$numero_preguntas}}</li>

               <li style="text-align: center; color: red;">El puntaje sobre el cual estara evaluado el examen es: {{$puntaje}}</li>


               <div class="form-group {{ $errors->has('numero_preguntas') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('numero_preguntas',$numero_preguntas, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('numero_preguntas', '<p class="help-block">:message</p>') !!}
                </div>

               </div>

                <div class="form-group {{ $errors->has('puntaje_examen') ? 'has-error' : ''}}">
                
                 <div class="col-sm-6">
                    {!! Form::hidden('puntaje_examen',$puntaje, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('puntaje_examen', '<p class="help-block">:message</p>') !!}
                 </div>

                </div>
               

            <div class="form-group {{ $errors->has('duracion') ? 'has-error' : ''}}">
                {!! Form::label('duracion', 'Duracion del examen(min)', ['class' => 'col-sm-3 control-label']) !!}
            

               <div class="col-sm-6">
                    {!! Form::number('duracion', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('duracion', '<p class="help-block">:message</p>') !!}
                </div>

            </div>
            @if($mensajeA!='a')
             <ul class="alert alert-danger"><li>{{ $mensajeA }}</li></ul>
            @endif

            <div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
                {!! Form::label('fecha_inicio', 'Fecha y hora Inicio', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'fecha_inicio', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha_inicio', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            @if($mensajeB!='b')
               <ul class="alert alert-danger"><li>{{ $mensajeB }}</li></ul>
               @endif
            <div class="form-group {{ $errors->has('fecha_fin') ? 'has-error' : ''}}">
                {!! Form::label('fecha_fin', 'Fecha y hora Fin', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'fecha_fin', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha_fin', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

             <div class="form-group {{ $errors->has('examen_id') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('examen_id',$id_examen, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('examen_id', '<p class="help-block">:message</p>') !!}
                </div>
                </div>

                   <div class="form-group {{ $errors->has('curso_id') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('curso_id',$id_curso, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('curso_id', '<p class="help-block">:message</p>') !!}
                </div>
                </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Enviar', ['class' => 'btn btn-primary form-control']) !!}
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