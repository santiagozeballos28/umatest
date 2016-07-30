@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="containerexamen">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
           
 
<div class="hoja">
   <h1 style="text-align: center; font-family:arial; color:darkred;font-weight: 700; ">{{$nombre_examen}}</h1>
    <h2 style="text-align: center; font-family:arial;color:darkred;font-weight: 700; line-height:4px;">{{$fecha_examen}}</h2>
    <h2 style="text-align: center; font-family:arial;color:darkred;font-weight: 700; ">{{$nombre_categoria}}</h2>
    {{-- */  
             $puntaje_total_examen=0;
             for($i=0; $i < count($content_puntaje_preguntas); $i++){
                 $puntaje_total_examen+=$content_puntaje_preguntas[$i];
             }
     /* --}}
    <h2 style="text-align: center; font-family:arial;color:darkred;font-weight: 700; line-height:4px; ">{{$puntaje_total_examen}} PUNTOS</h2>
    {!! Form::open(['url' => 'darexamen/formulario_examen/calcular_nota', 'class' => 'form-horizontal formexa', 'style' => 'margin-left: 15%;margin-top: 60px;font-size: 22px; width:100%;']) !!}
     {{-- */$formulario_nombres=array(); /* --}}

      @for ($i = 0; $i < count($content_nom_preguntas); $i++)
            
         @if($ids_tipo_pregunta[$i]==1)
    
            <div class="form-group {{ $errors->has('numero_pregunta' . $i) ? 'has-error' : ''}}">
           <label style="float:left;line-height:40px;" for="'numero_pregunta' . $i">{{($i+1)}}.-
            {{$content_nom_preguntas[$i]}}({{$content_puntaje_preguntas[$i]}}puntos)</label>
                   <div class="col-sm-2">
                    {!! Form::text('numero_pregunta' . $i, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('numero_pregunta' . $i, '<p class="help-block">:message</p>') !!}
                   </div>
            </div>
     {{-- */  $formulario_nombres[$i]='numero_pregunta' . $i; /* --}}
            <br/> <br/>
        @endif


         @if($ids_tipo_pregunta[$i]==2 )
           
          <div class="form-group {{ $errors->has('numero_pregunta' . $i) ? 'has-error' : ''}}">
          <div style="line-height:40px;"><label for="'numero_pregunta' . $i" style="width:auto;">{{($i+1)}}.- {{$content_nom_preguntas[$i]}}({{$content_puntaje_preguntas[$i]}}puntos)</label></div>
          
                
                <div class="col-sm-6">
                    {!! Form::text('numero_pregunta' . $i, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('numero_pregunta' . $i, '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        {{-- */  $formulario_nombres[$i]='numero_pregunta' . $i; /* --}}
             <br/> <br/>
         @endif


         @if($ids_tipo_pregunta[$i]==3)
                   {{-- */  $numero_de_respuestas=count($content_respuestas[$i]); 
                   $respuestas = $content_respuestas[$i];
          /* --}}
          
            <div class="form-group {{ $errors->has('numero_pregunta' . $i) ? 'has-error' : ''}}">
            <li style="color: red;">Seleccione una Respuesta</li>
            <div style="line-height:40px;"><label for="'numero_pregunta' . $i" style="width:auto;">{{($i+1)}}.- {{$content_nom_preguntas[$i]}}({{$content_puntaje_preguntas[$i]}}puntos)</label></div>
                <div class="col-sm-6" style="margin-left:10%">
                    <div id="form">
                    <br/> <br/>

          @for ($j = 0; $j < $numero_de_respuestas; $j++)
                        {!! Form::checkbox('numero_pregunta' . $i, $respuestas[$j], false, ['onchange' => 'validacion("form", this,1)']) !!} 
                        {{$respuestas[$j]}}</br></br>
                        
          @endfor
                   </div>
                        {!! $errors->first('numero_pregunta' . $i, '<p class="help-block">:message</p>') !!}
                </div>
            </div>
          
            {{-- */  $formulario_nombres[$i]='numero_pregunta' . $i; /* --}}
            <br/> <br/>
         @endif


         @if($ids_tipo_pregunta[$i]==4)
         <br/> <br/>
           <div class="form-group {{ $errors->has('numero_pregunta' . $i) ? 'has-error' : ''}}">
           <div style="line-height:40px;"><label for="'numero_pregunta' . $i" style="width:auto;">{{($i+1)}}.- {{$content_nom_preguntas[$i]}}({{$content_puntaje_preguntas[$i]}}puntos)</label></div>
            
                <div class="col-sm-6" style="margin-left:10%">
                   <div class="checkbox">
                   <br/> <br/>
                     <label>{!! Form::radio('numero_pregunta' . $i, '1',false) !!} VERDADERO</label>
                   </div>
                   <div class="checkbox">
                    <label>{!! Form::radio('numero_pregunta' . $i, '0',false) !!} FALSO</label>
                   </div>
                    {!! $errors->first('numero_pregunta' . $i, '<p class="help-block">:message</p>') !!}
                </div>
            </div>

              {{-- */  $formulario_nombres[$i]='numero_pregunta' . $i; /* --}}
              <br/> <br/> 
         @endif

          @if($ids_tipo_pregunta[$i]==5)
                   {{-- */  $numero_de_respuestas=count($content_respuestas[$i]); 
                   $respuestas = $content_respuestas[$i];
          /* --}}
          
            <div class="form-group {{ $errors->has('numero_pregunta' . $i) ? 'has-error' : ''}}">
            <li style="color: red;">Seleccione mas de una Respuesta</li>

            <div style="line-height:40px;"><label for="'numero_pregunta' . $i" style="width:auto;">{{($i+1)}}.- {{$content_nom_preguntas[$i]}}({{$content_puntaje_preguntas[$i]}}puntos)</label></div>
                <div class="col-sm-6" style="margin-left:10%">
                    <div id="checkbox">
                    <br/> <br/>

          @for ($j = 0; $j < $numero_de_respuestas; $j++)
                        {!! Form::checkbox('numero_pregunta'.$i.'[]', $respuestas[$j], false) !!} 
                        {{$respuestas[$j]}}</br></br>
             
          @endfor
                         

                   </div>
                        {!! $errors->first('numero_pregunta' . $i, '<p class="help-block">:message</p>') !!}
                </div>
            </div>
          
            {{-- */  $formulario_nombres[$i]='numero_pregunta'.$i; 
            /* --}}
            <br/> <br/>
         @endif
            
      @endfor
      


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
         <a href="{{ url('gestor_examenes/'.$id_curso.'/examen') }}" > >>Volver </a>
            <br/> <br/>
            <br/> <br/>
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
@endsection
