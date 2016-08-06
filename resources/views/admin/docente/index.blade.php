@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de las Listas de todos los docentes.
                 -->
    <div class="col-md-14 col-md-offset-0 borderpaht" style="width: 21%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Usuarios</a></li>
                    <li><a href="#"></i>Docentes</a></li>
                    </ol>
        </div>
        <!--Termina path de las Listas de todos los docentes.
                  -->
        <div class="col-md-14 col-md-offset-20" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE USUARIOS</div>

                <div class="panel-body">







<div class="container">

    <h1>Docente <a href="{{ url('/admin/docente/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Docente"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table" style="width: 97%">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Nombre </th><th> {{ trans('users.apellido') }} </th><th> {{ trans('users.direccion') }} </th><th> {{ trans('users.telefono') }} </th><th> {{ trans('users.genero') }} </th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($docente as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                      <td>{{ $item->name }}</td><td>{{ $item->apellido }}</td><td>{{ $item->direccion }}</td><td>{{ $item->telefono }}</td><td>{{ $item->genero }}</td>
                    <td>
                        <a href="{{ url('/admin/docente/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Docente"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/docente/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Docente"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/docente', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Docente" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Docente',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">  </div>
    </div>

</div>



            </div>
            </div>
        </div>
    </div>
</div>
@endsection
