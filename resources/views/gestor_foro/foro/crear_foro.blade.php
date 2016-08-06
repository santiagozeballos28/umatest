
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
                <div class="panel-heading">GESTOR FORO</div>
                   <div class="panel-body">
<div class="container">
<!--Comienza path de mis tarea.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 17%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_foros/'.$id_curso.'/foro') }}"><i class="fa fa-dashboard"></i>Foros</a></li>
                    <li><a href="#"></i>Crear Foro</a></li>
                    </ol>
        </div>
    <!--Termina path de mis tarea.
    -->
    <h1 style="padding-top:20px;">Crear Nuevo Foro</h1>
    


       {!! Form::open(['url' => '/gestor_foros/{id_curso}/save/foro', 'class' => 'form-horizontal','method' => 'post', 'enctype'=>'multipart/form-data']) !!}

                <div class="form-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                {!! Form::label('titulo', trans('titulo'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('titulo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('mensaje') ? 'has-error' : ''}}">
                {!! Form::label('mensaje', trans('mensaje'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('mensaje', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('mensaje', '<p class="help-block">:message</p>') !!}
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