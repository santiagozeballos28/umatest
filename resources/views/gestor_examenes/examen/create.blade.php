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
                <div class="panel-heading">GESTOR DE EXAMENES</div>
                <div class="panel-body">
<div class="container">
    <!--Comienza path de crear examen.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 30%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_curso.'/examen') }}"><i class="fa fa-dashboard"></i>Mis Exámenes</a></li>
                    <li><a href="#"></i>Crear Examen</a></li>
                    </ol>
        </div>
    <!--Termina path de de Crear de examen.
    -->
    <h1>Crear Nuevo Examen</h1>
    <hr/>

    {!! Form::open(['url' => '/gestor_examenes/examen', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('nombre_examen') ? 'has-error' : ''}}">
                {!! Form::label('nombre_examen', trans('examen.nombre_examen'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre_examen', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nombre_examen', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('puntaje_totalm') ? 'has-error' : ''}}">
                {!! Form::label('puntaje_totalm', 'Puntaje Examen', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('puntaje_totalm', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('puntaje_totalm', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

           <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_curso',$id_curso, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_curso', '<p class="help-block">:message</p>') !!}
                </div>
                </div>


    <div class="form-group">
        <div id="crear_examen" class="col-sm-offset-3 col-sm-3">
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