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
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Bitacoras</a></li>
                    <li><a href="#">Mis Bitacoras</a></li>
                    </ol>
        </div>
    <!--Termina path de las Listas de contenido del curso.
    -->
        <div class="col-md-14 col-md-offset-20" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">BITACORAS</div>

                <div class="panel-body">



<div class="container">

    <h1>Mis Bitacoras</h1>
    <div class="table" >
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Usuario </th><th> Accion </th><th> IP </th><th> Tabla </th><th> Fecha </th><th> Datos Viejos </th><th> Datos Nuevos </th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($examen as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->usuario_bi }}</td><td>{{ $item->accion_bi }}</td><td>{{ $item->ip_bi }}</td><td>{{ $item->tabla_bi }}</td><td>{{ $item->fecha_bi }}</td>
                    <td ><div style="overflow-x: auto; width:240px ">{{ $item->viejo }}</div></td><td><div style="overflow-x: auto; width:240px ">{{ $item->nuevo }}</div></td>
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
