@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de las Listas de todos los estudiantes.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 22%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Usuarios</a></li>
                    <li><a href="#"></i>Estudiantes</a></li>
                    </ol>
        </div>
    <!--Termina path de las Listas de todos los estudiantes.
    -->
        <div class="col-md-14 col-md-offset-20">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE USUARIOS</div>

                <div class="panel-body">



<div class="container">

    <h1>Estudiante <a href="{{ url('/admin/users/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo User"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table" style="width: 97%;">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Nombre </th><th> {{ trans('users.apellido') }} </th><th> {{ trans('users.direccion') }} </th><th> {{ trans('users.telefono') }} </th><th> {{ trans('users.genero') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($users as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td><td>{{ $item->apellido }}</td><td>{{ $item->direccion }}</td><td>{{ $item->telefono }}</td><td>{{ $item->genero }}</td>
                    <td>
                        <a href="{{ url('/admin/users/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver User"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar User"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/users', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar User" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar User',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
       <div class="pagination"></div>
    </div>

</div>



            </div>
            </div>
        </div>
    </div>
</div>
@endsection
