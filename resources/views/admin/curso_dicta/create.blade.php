@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-20" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE MATERIAS</div>

                <div class="panel-body">
<div class="container">

    <h1>Actualizar Fecha Vencimiento Curso</h1>
    <h3>{{$nombre}}</h3>
    <hr/>

    {!! Form::open(['url' => '/admin/curso_dicta', 'class' => 'form-horizontal']) !!}

            
             <div class="form-group {{ $errors->has('fecha_vencimiento') ? 'has-error' : ''}}">
                {!! Form::label('fecha_vencimiento', 'Fecha Vencimiento', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('fecha_vencimiento', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha_vencimiento', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            {!! Form::hidden('id_curso',$id_curso, ['class' => 'form-control' , 'required' => 'required']) !!}
            {!! $errors->first('id_curso', '<p class="help-block">:message</p>') !!}
               
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
 </div>
            </div>
        </div>
    </div>
</div>
@endsection