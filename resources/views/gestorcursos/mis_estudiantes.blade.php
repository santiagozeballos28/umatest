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
        <div class="col-md-14 col-md-offset-20">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE MATERIAS</div>

                <div class="panel-body">



<div class="container">
<!--Comienza path de Estudiantes Inscritos.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 22%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="#"></i>Estudiantes Inscritos</a></li>
                    </ol>
        </div>
    <!--Termina path de Estudiantes Inscritos.
    -->
    <h2>MIS ESTUDIANTES</h2>
    <div class="table" style="width: 97%;">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th> Nombres </th>
                    <th> Apellido </th>
                       @foreach($examenes as $item)
                        <th>{{$item->nombre_examen}}</th>
                       @endforeach
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($datos_estudiante as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->apellido }}</td>
                    @foreach($examenes as $item2)
                    {{-- */
                     $res = DB::table('notas')->where('examen_id', $item2->id)->where('user_id', $item->id)->where('archivo','<>','')->orderBy('id','desc')->first();
                     if(!is_null($res)){
                      /* --}}
                      <td>
                       <a href="{{url(''.$res->archivo.'')}}">{{$res->archivo}}</a></br>
                       <iframe src="{{asset(''.$res->archivo.'')}}"></iframe>
                      </td>
                      
                       
                      {{-- */
                     }else{
                     /* --}}
                      <td>
                      </td>
                      {{-- */
                     }
                     /* --}}
                    @endforeach
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
