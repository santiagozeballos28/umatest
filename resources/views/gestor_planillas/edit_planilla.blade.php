  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR PLANILLAS</div>

                <div class="panel-body">
<div class="container">

    <h1>Editando nota de: {{ $id_user }}</h1>

    {!! Form::model($nota_estudiante, [
        'method' => 'PATCH',
        'url' => ['/gestor_planillas/planilla', $id_user],
        'class' => 'form-horizontal'
    ]) !!}



                           


             <div class="form-group {{ $errors->has($item->calificacion) ? 'has-error' : ''}}">
                {!! Form::label($item->calificacion,$item->nombre_examen, ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text($item->calificacion,$item->calificacion, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first($item->calificacion, '<p class="help-block">:message</p>') !!}
                </div>
            </div>

              <div class="form-group {{ $errors->has('id_examen') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_examen',$item->id_examen, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_examen', '<p class="help-block">:message</p>') !!}
                </div>
                </div>
   @endforeach
            <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_curso',$id_curso, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_curso', '<p class="help-block">:message</p>') !!}
                </div>
                </div>


                <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_user',$id_user, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
                </div>
                </div>

   
            <!--div class="form-group {{ $errors->has('estado_tarea') ? 'has-error' : ''}}">
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
            </div-->
            <!--div class="form-group {{ $errors->has('fecha_limite') ? 'has-error' : ''}}">
                {!! Form::label('fecha_limite', trans('tarea.fecha_limite'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('fecha_limite', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fecha_limite', '<p class="help-block">:message</p>') !!}
                </div>
            </div-->


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
