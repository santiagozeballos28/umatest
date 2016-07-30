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
<!--Comienza path de mostrar examen.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 32%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_curso.'/examen') }}"><i class="fa fa-dashboard"></i>Mis Exámenes</a></li>
                    <li><a href="#"></i>Mostrar Examen</a></li>
                    </ol>
        </div>
    <!--Termina path de de mostrar examen.
    -->
    <h1>Examen </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $examan->id }}</td>
                </tr>
                <tr><th> {{ trans('examen.nombre_examen') }} </th><td> {{ $examan->nombre_examen }} </td></tr><tr><th> Fecha Creacion Examen </th><td> {{ $examan->fecha_examen }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('/gestor_examenes/examen/' . $examan->id . '/update/'.$id_curso.'/edit') }}" class="btn btn-primary btn-xs" title="Editar Examan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

                       <a href="{{ url('/gestor_examenes/examen/' . $examan->id . '/delete/'.$id_curso.'/destroy') }}" class="btn btn-danger btn-xs" title="Eliminar Multiple" onclick="myfuncion()"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Multiple" /></a>
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