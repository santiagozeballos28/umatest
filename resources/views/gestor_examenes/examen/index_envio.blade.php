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
<!--Comienza path de Enviar exámenes.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 21%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="#"></i>Exámenes a Enviar</a></li>
                    </ol>
        </div>
    <!--Termina path de de Enviar exámenes.
    -->
    <h1>Enviar Examen</h1>
     @if($mensaje_puntaje!="")
    <ul class="alert alert-danger"><li>{{ $mensaje_puntaje }}</li></ul>
    @endif
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('examen.nombre_examen') }} </th><th> Fecha Creacion Examen <th>Enviar examen</th></th>
                </tr>
                </tr>
            </thead>
            <tbody>


            {{-- */$x=0;/* --}}
            @foreach($examen as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre_examen }}</td><td>{{ $item->fecha_examen }}</td>
                    @if($item->estado_examen==1)
                    <td> 
                    <li><a href="{{url('/gestor_examenes/nota/'.$id_curso.'/'.$item->id.'/create')}}"><i class="fa fa-envelope-o"></i> Enviar </a></li>
                    </td>
                    @else
                     <td> 
                    <li><a href="#" style="color: red;"><i class="fa fa-envelope-o"></i> Enviado </a></li>
                    </td>
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