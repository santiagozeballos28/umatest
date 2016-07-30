@extends('app')

@section('htmlheader_title')
   Home
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
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">
<div class="container">
{{-- */$id_materia=DB::table('preguntas')->where('id', $id_pregunta)->first();
                   $id_materia=$id_materia->examen_id;    
             /* --}}
             {{-- */$id_test=DB::table('examens')->where('id', $id_materia)->first();
                   $id_test=$id_test->id_cursos;    
             /* --}}
<!--Comienza path para Crear Respuesta a preguntas de seleccion multiples.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 46%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_test.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_test.'/examen') }}"><i class="fa fa-dashboard"></i>Mis Exámenes</a></li>
                    <li><a href="{{url('/gestor_examenes/pregunta/'.$id_materia.'/index')}}"><i class="fa fa-dashboard"></i>lista de Preguntas</a></li>
                    <li><a href="#"></i>Respuestas Simples</a></li>
                    </ol>
        </div>
    <!--Termina path para Crear Respuesta a preguntas de seleccion multiples.  
    -->
    <h1>Añadir Respuestas Simples</h1>
    <hr/>

    {!! Form::open(['url' => '/gestor_examenes/multiples', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('respuesta') ? 'has-error' : ''}}">
                {!! Form::label('respuesta', trans('multiples.respuesta'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('respuesta', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('respuesta', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
 
            <div class="form-group {{ $errors->has('correcta') ? 'has-error' : ''}}">
                {!! Form::label('correcta', trans('multiples.correcta'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
            <div class="checkbox">
                <label>{!! Form::radio('correcta', '1',false) !!} Correcta</label>
            </div>

            <div class="checkbox">
                <label>{!! Form::radio('correcta', '0', false) !!} Incorrecta</label>

            </div>
                    {!! $errors->first('correcta', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
      <div class="form-group {{ $errors->has('pregunta_id') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('pregunta_id',$id_pregunta, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('pregunta_id', '<p class="help-block">:message</p>') !!}
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