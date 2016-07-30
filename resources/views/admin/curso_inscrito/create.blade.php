@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path Inscripcion a una materia
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 35%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="{{ url('/todosloscursos/conBoton/carrera') }}"><i class="fa fa-dashboard"></i>Categorías</a></li>
                    <li><a href="{{ url('/admin/curso/1/vista_inscribirse/conBoton/materias') }}"><i class="fa fa-dashboard"></i>Materias</a></li>
                    <li><a href="#"></i>Inscripción</a></li>
                    </ol>
        </div>
    <!--Termina path  Inscripcion a una materia
    -->
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">


<div class="container">

    <h1>INSCRIBIRSE A UNA MATERIA</h1>
    <hr/>
    
    {!! Form::open(['url' => '/admin/curso_inscrito', 'class' => 'form-horizontal']) !!}


           <div class="form-group {{ $errors->has('curso_id') ? 'has-error' : ''}}">
                {!! Form::label('curso_id', 'Ingrese codigo curso', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('curso_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('curso_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

                 {{-- */$fecha_actual = date("Y-m-d");/* --}}
            <!--   <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
                {!! Form::label('fecha', trans('curso_inscrito.fecha'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('fecha', $fecha_actual, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            -->
        

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Inscribirse', ['class' => 'btn btn-primary form-control']) !!}
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