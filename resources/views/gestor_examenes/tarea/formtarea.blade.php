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
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE TAREAS</div>
                  <div class="panel-body">
<div class="container">
<!--Comienza path que muestra todas las tareas de un docente y permite crear una nueva tarea.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 27%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_curso.'/examen/tarea') }}"><i class="fa fa-dashboard"></i>Mis Tareas</a></li>
                    <li><a href="#"></i>Nueva Tarea</a></li>
                    </ol>
        </div>
    <!--Termina path que muestra todas las tareas de un docente y permite crear una nueva tarea.
    -->
    <h1>Nueva Tarea</h1>

       {!! Form::open(['url' => '/gestor_examenes/{id_curso}/tarea/upload', 'class' => 'form-horizontal','method' => 'post', 'enctype'=>'multipart/form-data']) !!}

                <div class="form-group {{ $errors->has('nombre_tarea') ? 'has-error' : ''}}">
                {!! Form::label('nombre_tarea', trans('tarea.nombre_tarea'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre_tarea', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nombre_tarea', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                {!! Form::label('descripcion', trans('tarea.descripcion'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('descripcion', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('puntaje_total') ? 'has-error' : ''}}">
                {!! Form::label('puntaje_total', trans('tarea.puntaje_total'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('puntaje_total', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('puntaje_total', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


          

            <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_curso',$id_curso, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_curso', '<p class="help-block">:message</p>') !!}
                </div>
                </div>



 <div class="form-group {{ $errors->has('subir_archivo') ? 'has-error' : ''}}">

 
                {!! Form::label('Subir Archivo','(*) Subir archivo', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-6">
          {!! Form::file('archivo') !!}

             <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                  
                </div>
                </div>

          {!! Form::submit('Terminar') !!}

          {!! Form::close() !!}
                </div>
                </div>



  

</div>

    </div>
    <li style="text-align: center; color: orange;"></i>(*) Todos los campos que tiene asterisco es opcional</a></li>
            </div>
        </div>
    </div>
</div>
@endsection