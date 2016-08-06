@extends('app')

@section('htmlheader_title')
   CURSOS
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        @if($boton_todosloscursos=='conBoton')
        <!--Comienza path de Listas de todas las materias por carrera para luego poder inscribirse.
        -->
        <div class="col-md-14 col-md-offset-0 borderpath" style="width: 26%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>

                    <li><a href="{{ url('/todosloscursos/conBoton/carrera') }}"><i class="fa fa-dashboard"></i>Categorías</a></li>
                    
                    <li><a href="#"></i>Materias</a></li>
                    </ol>
        </div>
        <!--Termina path de Listas de todas las materias por carrera para luego poder inscribirse.
        -->
        @else
        <!--Comienza path de Listas de todas las materias por carrera.
        -->
        <div class="col-md-14 col-md-offset-0 borderpath" style="width: 28%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>

                    <li><a href="{{ url('/todosloscursos/sinBoton/carrera') }}"><i class="fa fa-dashboard"></i>Categorías</a></li>
                    
                    <li><a href="#"></i>Materias</a></li>
                    </ol>
        </div>
        <!--Termina path de Listas de todas las materias por carrera.
        -->

        @endif
        <div class="col-md-14 col-md-offset-0" style="margin-right: -125px;padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE MATERIAS</div>

                <div class="panel-body">


<div class="container">

    <h1>{{$titulo_general}}</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
        @if($boton_todosloscursos=='conBoton')
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('curso.nombre') }} </th><th>Inscribirse</th>
                </tr> 
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($curso as $item)
                {{-- */$x++;/* --}}
                  
                <tr>
                    
                    @if($item->estado_curso==1)
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre }}</td>
                     {{-- */
                     $id_user=Auth::id();
                    $query = DB::table('curso_inscritos')->where('curso_id', $item->id)->where('user_id',$id_user)->first();
                    $bandera=0;
                    if(!is_null($query)){
                        $bandera=1;
                    }

                     /* --}}

                      @if($bandera)
                   
                      <td style="color: #3c8dbc; font: bold;">INSCRITO</td>
                        
                       @else
                         <td>
                           <a href="{{ url('admin/curso_inscrito/create')}}"><span class="logo-lg"><img src="{{asset('/img/img_panelPrincipal/inscribirse.png')}}"/> </span></a>
                        </td>

                       @endif
                    @endif
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
                 @if($item->estado_curso==1)
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre }}</td>
                 @endif
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
