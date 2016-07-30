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
<!--Comienza path de listas de exámenes.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 18%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="#"></i>Mis Exámenes</a></li>
                    </ol>
        </div>
    <!--Termina path de de listas de exámenes.
    -->
    <h1>Mis Exámenes<a href="{{ url('/gestor_examenes/examen/'.$id_curso.'/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Examan"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    @if($mensaje_puntaje!="")
    <ul class="alert alert-danger"><li>{{ $mensaje_puntaje }}</li></ul>
    @endif
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('examen.nombre_examen') }} </th><th> Puntaje Examen</th><th>Ver examen</th><th> Fecha Creacion Examen <th>Llenar Preguntas</th></th><th>Actions</th>
                </tr>
                </tr>
            </thead>
            <tbody>
              

            {{-- */$x=0;/* --}}
            @foreach($examen as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre_examen }}</td>
                    <td>{{ $item->puntaje_totalm }}</td>
                    <td>
                    <li><a href="{{url('verexamen/'.$item->id.'/'.$id_curso.'/formulario_examen_docente')}}"><i class="fa fa-file-text-o"></i> Ver </a></li>
                    </td>
                    <td>{{ $item->fecha_examen }}</td>
                    <td> 
                    <li><a href="{{url('/gestor_examenes/pregunta/'.$item->id.'/index')}}"><i class="fa fa-file-text-o"></i> Llenar </a></li>
                    </td>
                    <td>
                        <a href="{{ url('/gestor_examenes/examen/'. $item->id .'/ver/'.$id_curso.'/materia') }}" class="btn btn-success btn-xs" title="Ver Examan"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>

                        <a href="{{ url('/gestor_examenes/examen/' . $item->id . '/update/'.$id_curso.'/edit') }}" class="btn btn-primary btn-xs" title="Editar Examan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

                         <a href="{{ url('/gestor_examenes/examen/' . $item->id . '/delete/'.$id_curso.'/destroy') }}" class="btn btn-danger btn-xs" title="Eliminar Multiple" onclick='return confirm("Confirm delete?")'><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Multiple" /></a>

                    </td>
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
