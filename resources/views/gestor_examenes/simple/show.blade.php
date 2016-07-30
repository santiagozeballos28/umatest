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
<!--Comienza path para VER Respuestas a preguntas de seleccion multiples.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 40%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_test.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_test.'/examen') }}"><i class="fa fa-dashboard"></i>Mis Exámenes</a></li>
                    <li><a href="{{url('/gestor_examenes/pregunta/'.$id_examen.'/index')}}"><i class="fa fa-dashboard"></i>lista de Preguntas</a></li>
                    <li><a href="#"></i>Respuesta</a></li>
                    </ol>
        </div>
    <!--Termina path para VER Respuestas a preguntas de seleccion multiples.  
    -->
    <h1>Respuesta {{ $simple->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $simple->id }}</td>
                </tr>
                <tr><th> {{ trans('simple.respuesta') }} </th><td> {{ $simple->respuesta }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                          <a href="{{ url('/gestor_examenes/simple/' . $simple->id . '/'.$id_examen.'/edit') }}" class="btn btn-primary btn-xs" title="Editarar respuesta"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

                         <a href="{{ url('/gestor_examenes/simple/' . $simple->id . '/'.$id_examen.'/delete') }}" class="btn btn-danger btn-xs" title="Eliminar Multiple" onclick="myfuncion()"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Multiple" /></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection