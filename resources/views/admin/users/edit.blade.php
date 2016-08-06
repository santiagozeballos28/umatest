@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
       {{-- */$id_user=Auth::id();   
             /* --}}
             {{-- */$id_rol=DB::table('role_user')->where('user_id', $id_user)->first();
                   $id_rol=$id_rol->role_id;    
             /* --}}
             {{-- */$name_rol=DB::table('roles')->where('id', $id_rol)->first();
                    $name_rol=$name_rol->nombre_rol;
             /* --}}
            @if($name_rol!='administrador') 
             <!--Comienza path de Editar cuenta de Usuario (estudiante y docente) desde sus cuentas.
                -->
                <div class="col-md-14 col-md-offset-0 borderpath" style="width: 19%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>home</a></li>
                    <li><a href="#"></i>Editar Informacion</a></li>
                    </ol>
                 </div>
             <!--Comienza path de Editar cuenta de Usuario (estudiante y docente) desde sus cuentas..
             -->

            @else                      
                 <!--Comienza path de Editar cuenta de Estudiantes desde una cuenta de Administrador.
                 -->
                 <div class="col-md-14 col-md-offset-0 borderpath" style="width: 40%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Usuarios</a></li>
                    <li><a href="{{ url('admin/users') }}"><i class="fa fa-dashboard"></i>Estudiantes</a></li>
                    <li><a href="#"></i>Editar Informacion de Estudiante</a></li>
                    </ol>
                  </div>
                <!--Comienza path de Editar cuenta de estudiantes desde una cuenta de Administrador.
                    -->
            @endif
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE USUARIOS</div>

                <div class="panel-body">

<div class="container">

    <h1>EDITAR INFORMACION</h1>

    {!! Form::model($user, [
        'method' => 'PATCH',
        'url' => ['/admin/users', $user->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Nombre', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
                {!! Form::label('apellido', trans('users.apellido'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('apellido', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                {!! Form::label('direccion', trans('users.direccion'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('direccion', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                {!! Form::label('telefono', trans('users.telefono'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('telefono', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
           
            

             <div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
                {!! Form::label('genero', 'Genero', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('genero', array('M'=>'M', 'F'=>'F'), null, ['class' => 'form-control'])!!}
                    {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', trans('users.email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                {!! Form::label('password', trans('users.password'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::password('password',['class' => 'form-control', 'required' => 'required'],['id' => 'password']) !!}
                    <meter max="4" id="password-strength-meter"></meter>
                    <p id="password-strength-text"></p>
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}

                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('ACTUALIZAR', ['class' => 'btn btn-primary form-control']) !!}
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