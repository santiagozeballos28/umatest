@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">
                <h1>{{$nombre}}</h1>
<form action="{{ url('/probando2_test/lola') }}" method="post">
                   <label for="nombre">Nombre:</label><input type="text" name="nombre" value="{{old('nombre')}}"></input>
                   <br />
                   <input type="submit" value="crear">
</form>


</div>
                </div>
        </div>
    </div>
</div>
@endsection