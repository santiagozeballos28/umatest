  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE TAREAS</div>

                <div class="panel-body">
<div class="container">

    <h1>Crear Nueva Tarea</h1>
    <hr/>

    {!! Form::open(['url' => '/gestor_examenes/tarea', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('nombre_tarea') ? 'has-error' : ''}}">
                {!! Form::label('nombre_tarea', trans('tarea.nombre_tarea'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre_tarea', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nombre_tarea', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                {!! Form::label('descripcion', trans('tarea.descripcion'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('descripcion', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <!--div class="form-group {{ $errors->has('archivo') ? 'has-error' : ''}}">
                {!! Form::label('archivo', trans('tarea.archivo'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('archivo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('archivo', '<p class="help-block">:message</p>') !!}
                </div>
            </div-->
            <div class="form-group {{ $errors->has('archivo') ? 'has-error' : ''}}">
                {!! Form::open(['route' => 'investigations.store']) !!}

                  <div class="form-group col-sm-6">
                    {!! Form::label('file=>true', 'Archivo:') !!}
                    {!! Form::file('file') !!}
                   </div>

                 {!! Form::close() !!}
            </div>


            <div class="form-group {{ $errors->has('estado_tarea') ? 'has-error' : ''}}">
                {!! Form::label('estado_tarea', trans('tarea.estado_tarea'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('estado_tarea', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('estado_tarea', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('estado_tarea', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <!--div class="form-group {{ $errors->has('fecha_limite') ? 'has-error' : ''}}">
                {!! Form::label('fecha_limite', trans('tarea.fecha_limite'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('fecha_limite', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha_limite', '<p class="help-block">:message</p>') !!}
                </div>
            </div-->
            <div class="form-group {{ $errors->has('puntaje_total') ? 'has-error' : ''}}">
                {!! Form::label('puntaje_total', trans('tarea.puntaje_total'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('puntaje_total', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('puntaje_total', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


             <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_curso',$id_curso, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_curso', '<p class="help-block">:message</p>') !!}
                </div>
                </div>

>



    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Crear', ['class' => 'btn btn-primary form-control']) !!}
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
