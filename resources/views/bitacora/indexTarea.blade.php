@extends('app')

@section('htmlheader_title')
    Home
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-20">
            <div class="panel panel-default">
                <div class="panel-heading">BITACORAS</div>

                <div class="panel-body">



<div class="container">

    <h1>Bitacoras de Tareas</h1>
    <div class="table" style="width: 97%;">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Usuario </th><th> Fecha </th><th> Accion </th><th> Datos Nuevos </th><th> Datos Viejos </th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($tarea as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->usuario }}</td><td>{{ $item->fecha }}</td><td>{{ $item->accion }}</td><td>{{ $item->nuevo }}</td><td>{{ $item->viejo }}</td>
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
