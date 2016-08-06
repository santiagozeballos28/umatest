@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de las Listas de todos los docentes.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 20%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="#"></i>Materias</a></li>
                    </ol>
        </div>
    <!--Termina path de las Listas de todos los docentes.
    -->
        <div class="col-md-14 col-md-offset-20" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE MATERIAS</div>

                <div class="panel-body">


<div class="container"> 

    <h1>ESTADO DE MATERIAS</h1>
    <li style="color: red;">Haga click sobre el nombre del curso para acceder al contenido del curso</li>
    <div class="table" style="width: 97%">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('curso.nombre') }} </th><th>Numero de Alumnos</th><th> {{ trans('curso.codigo') }} </th><th>Fecha Caducidad</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($curso as $item)
                {{-- */$x++;/* --}}
 
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/curso_dicta/'.$item->id.'/vista_contenido_curso')}}">{{$item->nombre}}</a></td><td>{{ $item->capacidad }}</td><td>{{ $item->codigo }}</td><td>{{$item->fecha_vencimiento}}</td>
                      
                    @if($item->estado_curso==0)
                    <td><a href="{{ url('admin/desabilitados/' . $item->id . '/habilitar') }}" class="btn btn-warning btn-xs" title="Habilitar Curso"><span class=" glyphicon glyphicon-fire" aria-hidden="true"/></a></td>
                    @else
                     <td><p style="color:green; font:bold;">HABILITADO</p></td>
                    @endif

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> </div>
    </div>

</div>


      </div>
            </div>
        </div>
    </div>
</div>
@endsection