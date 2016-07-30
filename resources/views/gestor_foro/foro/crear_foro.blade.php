
  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR FORO</div>
                   <div class="panel-body">
<div class="container">

    <h1>Crear Nuevo Foro</h1>
    


       {!! Form::open(['url' => '/gestor_foros/{id_curso}/save/foro', 'class' => 'form-horizontal','method' => 'post', 'enctype'=>'multipart/form-data']) !!}

                <div class="form-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                {!! Form::label('titulo', trans('titulo'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('titulo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('titulo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('mensaje') ? 'has-error' : ''}}">
                {!! Form::label('mensaje', trans('mensaje'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('mensaje', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('mensaje', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

         

            <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_curso',$id_curso, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_curso', '<p class="help-block">:message</p>') !!}
                </div>
                </div>


             <div class="form-group {{ $errors->has('subir_archivo') ? 'has-error' : ''}}">

 
                {!! Form::label('Subir Archivo','(*) Subir archivo', ['class' => 'col-sm-3 control-label']) !!}
             <div class="col-sm-6">
            {!! Form::file('archivo') !!}

             <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                  
                </div>
                </div>

          {!! Form::submit('Terminar') !!}

          {!! Form::close() !!}
                </div>
                </div>



  

</div>

    </div>
    <li style="text-align: center; color: orange;"></i>(*) Todos los campos que tiene asterisco es opcional</a></li>
            </div>
        </div>
    </div>
</div>
@endsection