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
{{-- */$id_test=DB::table('examens')->where('id', $id_examen)->first();
                   $id_test=$id_test->id_cursos;    
             /* --}}
        {{-- */$id_materia=DB::table('preguntas')->where('id', $id_pregunta)->first();
                   $id_materia=$id_materia->examen_id;    
             /* --}}
<!--Comienza path para Crear Respuesta a preguntas de True/False.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 43%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_test.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_test.'/examen') }}"><i class="fa fa-dashboard"></i>Mis Exámenes</a></li>
                    <li><a href="{{url('/gestor_examenes/pregunta/'.$id_materia.'/index')}}"><i class="fa fa-dashboard"></i>lista de Preguntas</a></li>
                    <li><a href="#"></i>Respuestas V/F</a></li>
                    </ol>
        </div>
    <!--Termina path para Crear Respuesta a preguntas de True/False.  
    -->
    <h1>Repuesta Falso/verdadero</h1>
    <hr/>

    {!! Form::open(['url' => '/gestor_examenes/falsoverdadero', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('respuesta') ? 'has-error' : ''}}">
                {!! Form::label('respuesta', trans('falsoverdadero.respuesta'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('respuesta', '1') !!} Verdadero</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('respuesta', '0', true) !!} Falso</label>
            </div>
                    {!! $errors->first('respuesta', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pregunta_id') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('pregunta_id',$id_pregunta, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('pregunta_id', '<p class="help-block">:message</p>') !!}
                </div>
                </div>
                 <div class="form-group {{ $errors->has('examen_id') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('examen_id',$id_examen, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('examen_id', '<p class="help-block">:message</p>') !!}
                </div>
                </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Seleccionar', ['class' => 'btn btn-primary form-control']) !!}
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