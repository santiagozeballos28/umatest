@extends('app')

@section('htmlheader_title')
   CURSOS
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    
        <div class="col-md-14 col-md-offset-0" style="margin-right: -125px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE MATERIAS</div>

                <div class="panel-body">


<div class="container">

    <h1>{{$titulo_general}}</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
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
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre }}</td>
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