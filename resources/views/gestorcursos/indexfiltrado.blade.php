@extends('app')

@section('htmlheader_title')
   MIS CURSOS
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de ver materias.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 20%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="#"></i>Mis Materias</a></li>
                    </ol>
        </div>
    <!--Termina path de ver materia de docentes.
    -->
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE MATERIAS</div>

                <div class="panel-body">


<div class="container">

    <h1>{{$titulo_general}}</h1>
    <li style="color: red;">Haga click sobre el nombre del curso para acceder al contenido del curso</li>
       {{-- */$id_user=Auth::id();   
             /* --}}
             {{-- */$id_rol=DB::table('role_user')->where('user_id', $id_user)->first();
                   $id_rol=$id_rol->role_id;    
             /* --}}
             {{-- */$name_rol=DB::table('roles')->where('id', $id_rol)->first();
                    $name_rol=$name_rol->nombre_rol;
             /* --}}
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            @if($name_rol=='docente') 
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('curso.nombre') }} </th><th> {{ trans('curso.codigo') }} </th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($curso as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/curso_inscrito/'.$item->id.'/vista_contenido_curso')}}">{{$item->nombre}}</a></td><td>{{ $item->codigo }}</td>
                  
                </tr>
            @endforeach
            </tbody>
            @else
                       <thead>
                        <tr>
                            <th>S.No</th><th> {{ trans('curso.nombre') }} </th>
                        </tr>
                    </thead>
                    <tbody>
                    {{-- */$x=0;/* --}}
                    @foreach($curso as $item)
                        {{-- */$x++;/* --}}
                        <tr>
                            <td>{{ $x }}</td>
                            <td><a href="{{ url('admin/curso_inscrito/'.$item->id.'/vista_contenido_curso')}}">{{$item->nombre}}</a></td>
                          
                        </tr>
                    @endforeach
                    </tbody>
            @endif
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
