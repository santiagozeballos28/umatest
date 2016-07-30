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
    <!--Comienza path de listas de exámenes.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 32%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_test.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_test.'/examen') }}  "><i class="fa fa-dashboard"></i>Mis Exámenes</a></li>
                    <li><a href="#"></i>lista de Preguntas</a></li>
                    </ol>
        </div>
    <!--Termina path de de listas de exámenes.
    -->
    <h1>Pregunta <a href="{{ url('/gestor_examenes/pregunta/'.$id_examen.'/create') }}" class="btn btn-primary btn-xs" title="Añadir Nueva Pregunta"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <li style="text-align: center; color: red;">El Puntaje Maximo del Examen es: {{$ptj_examen}}</li>
    <li style="text-align: center; color: orange;">El Puntaje acumulado del Examen es: {{$puntaje_total_examen}}</li>

    <div class="table">

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('pregunta.nombre_pregunta') }} </th> 
                    <th> Respuesta </th><th> Tipo pregunta </th><th> {{ trans('pregunta.puntaje_pregunta') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($pregunta as $item)
                {{-- */$x++;/* --}}
                
                <tr>
                    @if( $item->tipo_pregunta_id == 1) 
                        <td>{{ $x }}</td>
                        <td>{{ $item->nombre_pregunta }}</td> <td>

                 {{-- */
                $id_simple = DB::table('simples')->where('pregunta_id', $item->id)->first();
                $tipo_pre=DB::table('tipo_preguntas')->where('id', $item->tipo_pregunta_id)->first();
                $tipo_pre = $tipo_pre->tipo;
                /* --}}
                        @if(!is_null($id_simple))

                        {{-- */ $id_simple = $id_simple->id; /* --}}

                     <!-- $id_simple ese es el id_ de la respuesta-->

                        <a href="{{ url('/gestor_examenes/simple/' . $id_simple . '/'.$id_examen.'/edit') }}" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" class="btn btn-primary btn-xs" title="Editarar Respuesta"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

                        <a href="{{ url('/gestor_examenes/simple/'.$id_simple.'/'.$id_examen.'/show') }}" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" class="btn btn-success btn-xs" title="Ver Respuesta"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>

                        <a href="{{ url('/gestor_examenes/simple/' . $id_simple . '/'.$id_examen.'/delete') }}" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" class="btn btn-danger btn-xs" title="Eliminar Respuesta" onclick='return confirm("Confirm delete?")'><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Respuesta" /></a>
                    </td>
                        @else

                    <!-- $item-> id  ese es el id_ de la pregunta-->

                        <a href="{{ url('/gestor_examenes/simple/'.$item->id.'/'.$id_examen.'/create') }}" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" class="btn btn-primary btn-xs" title="Añadir Respuesta"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>

                        @endif

                        </td> 
                        <td>{{$tipo_pre}}</td>
                        <td>{{ $item->puntaje_pregunta }}</td>
                       @endif

                    @if( $item->tipo_pregunta_id == 2) 
                     {{-- */
                $id_simple = DB::table('desarrollos')->where('pregunta_id', $item->id)->first();
                $tipo_pre=DB::table('tipo_preguntas')->where('id', $item->tipo_pregunta_id)->first();
                $tipo_pre = $tipo_pre->tipo;
                /* --}}
                        <td>{{ $x }}</td>
                        <td>{{ $item->nombre_pregunta }}</td>
                        <td style="color: purple;">Manual</td>
                         <td>{{$tipo_pre}}</td> 
                        <td>{{ $item->puntaje_pregunta }}</td>
                   @endif

                    @if( $item->tipo_pregunta_id == 3) 
                        <td>{{ $x }}</td>
                        <td>{{ $item->nombre_pregunta }}</td> <td>
                           {{-- */
                $id_simple = DB::table('multiples')->where('pregunta_id', $item->id)->first();
                $tipo_pre=DB::table('tipo_preguntas')->where('id', $item->tipo_pregunta_id)->first();
                $tipo_pre = $tipo_pre->tipo;
                /* --}}
                       @if(!is_null($id_simple))
                       {{-- */ $id_simple = $id_simple->id; /* --}}

                        <a href="{{ url('/gestor_examenes/multiples/'.$item->id.'/index') }}" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" class="btn btn-success btn-xs" title="Ver Respuesta"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>

                        @else
                        <a href="{{ url('/gestor_examenes/multiples/'.$item->id.'/index') }}" class="btn btn-primary btn-xs" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" title="Añadir Respuestas"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        @endif
                        </td> 
                         <td>{{$tipo_pre}}</td>
                        <td>{{ $item->puntaje_pregunta }}</td>
                       @endif

                    @if( $item->tipo_pregunta_id == 4)
                         <td>{{ $x }}</td>
                        <td>{{ $item->nombre_pregunta }}</td> <td>
                {{-- */
                $id_simple = DB::table('falsoverdaderos')->where('pregunta_id', $item->id)->first();
                $tipo_pre=DB::table('tipo_preguntas')->where('id', $item->tipo_pregunta_id)->first();
                $tipo_pre = $tipo_pre->tipo;
                /* --}}
                       @if(!is_null($id_simple))
                       {{-- */ $id_simple = $id_simple->id; /* --}}

                     
                     <!-- $id_simple ese es el id_ de la respuesta-->

                        <a href="{{ url('/gestor_examenes/falsoverdadero/' . $id_simple . '/'.$id_examen.'/edit') }}" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" class="btn btn-primary btn-xs" title="Editarar Respuesta"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

                        <a href="{{ url('/gestor_examenes/falsoverdadero/'.$id_simple.'/'.$id_examen.'/show') }}" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" class="btn btn-success btn-xs" title="Ver Respuesta"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>

                        <a href="{{ url('/gestor_examenes/falsoverdadero/' . $id_simple . '/'.$id_examen.'/delete') }}" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" class="btn btn-danger btn-xs" title="Eliminar Respuesta" onclick="myfuncion()"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Respuesta" /></a>
                    </td>
                        @else

                    <!-- $item-> id  ese es el id_ de la pregunta-->

                        <a href="{{ url('/gestor_examenes/falsoverdadero/'.$item->id.'/'.$id_examen.'/create') }}" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" class="btn btn-primary btn-xs" title="Definir Respuesta"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                         @endif
                        </td> 
                         <td>{{$tipo_pre}}</td>
                        <td>{{ $item->puntaje_pregunta }}</td>
                       @endif


                       @if( $item->tipo_pregunta_id == 5) 
                        <td>{{ $x }}</td>
                        <td>{{ $item->nombre_pregunta }}</td> <td>
                           {{-- */
                $id_simple = DB::table('multiples_varios')->where('pregunta_id', $item->id)->first();
                $tipo_pre=DB::table('tipo_preguntas')->where('id', $item->tipo_pregunta_id)->first();
                $tipo_pre = $tipo_pre->tipo;
                /* --}}
                       @if(!is_null($id_simple))
                       {{-- */ $id_simple = $id_simple->id; /* --}}

                        <a href="{{ url('/gestor_examenes/multiples_varios/'.$item->id.'/index') }}" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" class="btn btn-success btn-xs" title="Ver Respuesta"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>

                        @else
                        <a href="{{ url('/gestor_examenes/multiples_varios/'.$item->id.'/index') }}" class="btn btn-primary btn-xs" style="background-color: rgb(220, 88, 239); border-color:rgb(220, 88, 239);" title="Añadir Respuestas"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        @endif
                        </td> 
                         <td>{{$tipo_pre}}</td>
                        <td>{{ $item->puntaje_pregunta }}</td>
                       @endif

                    <td>
                        <a href="{{ url('/gestor_examenes/pregunta/'.$item->id.'/'.$id_examen.'/show') }}" class="btn btn-success btn-xs" title="ver Pregunta"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>

                        <a href="{{ url('/gestor_examenes/pregunta/'.$item->id.'/'.$id_examen.'/edit') }}" class="btn btn-primary btn-xs" title="Editarar Pregunta"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                     
                        <a href="{{ url('/gestor_examenes/pregunta/' . $item->id . '/'.$id_examen.'/delete') }}" class="btn btn-danger btn-xs" title="Eliminar Pregunta" onclick='return confirm("Confirm delete?")'><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Pregunta" /></a>
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