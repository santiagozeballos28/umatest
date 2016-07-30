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

<!--Comienza path para VER de Respuesta a preguntas de seleccion multiples.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 46%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_test.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_test.'/examen') }}"><i class="fa fa-dashboard"></i>Mis Exámenes</a></li>
                    <li><a href="{{url('/gestor_examenes/pregunta/'.$id_materia.'/index')}}"><i class="fa fa-dashboard"></i>lista de Preguntas</a></li>
                    <li><a href="#"></i>Respuestas Multiples</a></li>
                    </ol>
        </div>
    <!--Termina path para VER de Respuesta a preguntas de seleccion multiples.  
    -->

    <h1>Multiples<a href="{{ url('/gestor_examenes/multiples_varios/'.$id_pregunta.'/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Multiple"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <li style="text-align: center; color: red;">Por lo menos debe existir una respuesta correcta</li>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Respuesta </th><th> Correcta </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($multiples_varios as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->respuesta }}</td>
                    @if($item->correcta == 1)
                    <td>Correcta</td>
                    @else
                    <td>Incorrecta</td>
                    @endif
                    <td>
                         <a href="{{ url('/gestor_examenes/multiples_varios/' . $item->id . '/'.$id_pregunta.'/show') }}" class="btn btn-success btn-xs" title="Ver Multiple"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/gestor_examenes/multiples_varios/' . $item->id . '/'.$id_pregunta.'/edit') }}" class="btn btn-primary btn-xs" title="Editar Multiple"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        <a href="{{ url('/gestor_examenes/multiples_varios/' . $item->id . '/'.$id_pregunta.'/delete') }}" class="btn btn-danger btn-xs" title="Eliminar Multiple" onclick="myfuncion()"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Multiple" /></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> </div>
    </div>

</div>
  </div>
            </div>
        </div>
    </div>
</div>
@endsection
