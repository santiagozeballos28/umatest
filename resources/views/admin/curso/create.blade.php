@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de crear Materias.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 28%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="#"></i>Crear Nueva Materia</a></li>
                    </ol>
        </div>
    <!--Termina path de crear Materias.
    -->
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">






<div class="container">

    <h1>CREAR NUEVA MATERIA</h1>
    <hr/>
           {{-- */$id_user=Auth::id();   
             /* --}}
             {{-- */$id_rol=DB::table('role_user')->where('user_id', $id_user)->first();
                   $id_rol=$id_rol->role_id;    
             /* --}}
             {{-- */$name_rol=DB::table('roles')->where('id', $id_rol)->first();
                    $name_rol=$name_rol->nombre_rol;
             /* --}}

    {!! Form::open(['url' => '/admin/curso', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', trans('curso.nombre'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('grupo') ? 'has-error' : ''}}">
                {!! Form::label('grupo','Grupo', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('grupo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('grupo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>




            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                {!! Form::label('descripcion', 'Descripcion del Curso', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        <div class="form-group {{ $errors->has('fecha_vencimiento') ? 'has-error' : ''}}">
                {!! Form::label('fecha_vencimiento', 'Fecha Vencimiento', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('fecha_vencimiento', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha_vencimiento', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('capacidad') ? 'has-error' : ''}}">
                {!! Form::label('capacidad', 'Numero de Estudiantes', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('capacidad', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('capacidad', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <li style="text-align: center; color: red;"></i>Este sera el codigo que los Estudiantes necesitan para inscribirse a esta materia</a></li>
            <div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
                {!! Form::label('codigo', trans('curso.codigo'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('codigo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
             <div class="form-group {{ $errors->has('id_categoria') ? 'has-error' : ''}}">
                {!! Form::label('id_categoria', 'Carrera', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('id_categoria', $vector, null, ['class' => 'form-control'])!!}
                    {!! $errors->first('id_categoria', '<p class="help-block">:message</p>') !!}
                </div>
            </div>






@if($name_rol=='administrador') 

             <div class="form-group {{ $errors->has('id_categoria') ? 'has-error' : ''}}">
                {!! Form::label('user_id', 'Docente', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('user_id', $docentes, null, ['class' => 'form-control'])!!}
                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            @endif


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