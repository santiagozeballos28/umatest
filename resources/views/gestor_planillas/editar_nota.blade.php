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
 @foreach($nota_estudiante as $item)
    <h4>EDITANDO NOTA DEL EXAMEN: {{ $item->nombre_examen }}</h4>


{{-- */

$atribuos_nota=DB::table('notas')->where('user_id', $id_user)->where('examen_id', $id_examen)->first();
$nota_actual= $atribuos_nota->calificacion;
$id_nota=$atribuos_nota->id;
  /* --}}

    {!! Form::model($nota_estudiante, [
        'method' => 'PATCH',
        'url' => ['/gestor_planillas/planilla',$id_nota],
        'class' => 'form-horizontal'
    ]) !!}
          
         <div>
      <li style="text-align: center; color: orange; font-size:24px"></i> La nota actual es: {{ $nota_actual }}</a></li>
      </div>          
             <div class="form-group {{ $errors->has('calificacion') ? 'has-error' : ''}}">
                {!! Form::label('calificacion', 'Nota nueva', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('calificacion',$nota_actual, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('calificacion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


             <!--div class="form-group {{ $errors->has('calificacion') ? 'has-error' : ''}}">
                {!! Form::label('calificacion',trans('calificacion'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('calificacion',null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('calificacion', '<p class="help-block">:message</p>') !!}
                </div>
            </div-->

              <div class="form-group {{ $errors->has('id_examen') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_examen',$id_examen, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_examen', '<p class="help-block">:message</p>') !!}
                </div>
                </div>
  
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
@endforeach

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
