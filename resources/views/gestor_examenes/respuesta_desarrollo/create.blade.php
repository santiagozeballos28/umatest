@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <div class="container">
    <div class="row">
    <!--Comienza path de contenido del curso.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 34%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="{{ url('/admin/curso_dicta') }}"><i class="fa fa-dashboard"></i>Materias</a></li>
                    <li><a href="#"></i>Contenido del Curso</a></li>
                    </ol>
        </div>
    <!--Termina path de las Listas de contenido del curso.
    -->
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">
<div class="container">
 <!--Comienza path que solo muestra todas las tareas de un docente.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 16%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{url('gestor_planillas/'.$id_curso.'/planilla/listar')}}"><i class="fa fa-dashboard"></i>Planilla</a></li>
                    <li><a href="{{url('/gestor_planillas/'.$id_curso.'/modificar/varios')}}"><i class="fa fa-dashboard"></i>Editar Planilla</a></li>
                    <li><a href="#"></i>Modificar Nota</a></li>
                    </ol>
        </div>
    <!--Termina path que solo muestra todas las tareas de un docente.
    -->
      {{-- */$materia=DB::table('cursos')->where('id', $id_curso)->first();
                    $name_materia=$materia->nombre;
                   
             /* --}}
   
    <h3 style="margin-top:40px;"> Planilla <a href="#"></a></h2>
    <h4> Materia: {{ $name_materia }} <a href="#"></a></h4>
  
   
    {!! Form::open(['url' => '/gestor_examenes/respuesta_desarrollo', 'class' => 'form-horizontal']) !!}

   
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
               @if($mensaje_texto!="")
                <ul class="alert alert-danger"><li>{{ $mensaje_texto }}</li></ul>
                @endif
                <tr bgcolor="#81BEF7">
                    <th>S.No</th><th> Preguntas/Respuestas </th><th>Calificacion</th>
                </tr>
            </thead>
            <tbody>

    
            {{-- */
                   $x=0;  $i=0; $formulario_ids=array(); $formulario_calificaciones=array();
                   $formulario_puntaje=array();
            /* --}}
            @foreach($respuesta_desarrollos as $item)
                {{-- */$x++; /* --}}
            
            <tr bgcolor= "#81F7F3">
                    <td bgcolor= "#81F7F3">{{ $x }}</td>
                    <td bgcolor= "#81F7F3">{{ $item->nombre_pregunta }}</td>
                    <td bgcolor= "#81F7F3"> Puntaje de la pregunta: {{ $item->puntaje_pregunta }}</td>
                </tr>

                <tr bgcolor= "#CEECF5">
                    <td> Resp. {{ $x }}</td>
                    <td>{{ $item->respuesta }}</td>
                    <td>                     
              

        
                    {!! Form::number('calificacion' .$item->id_resp, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('calificacion' .$item->id_resp, '<p class="help-block">:message</p>') !!}
              

          {{-- */  $formulario_calificaciones[$i]='calificacion' . $item->id_resp; /* --}}
           {{-- */  $formulario_ids[$i]=$item->id_resp; 
                    $formulario_puntaje[$i]=$item->puntaje_pregunta;
           /* --}}
           
                  </td>

               </tr>

                {{-- */$i++;/* --}}
                @endforeach
                 {{-- */ 
                  $calificaciones_resp=implode(",",$formulario_calificaciones);
                  $calificaciones_ids=implode(",",$formulario_ids);
                  $puntaje_pre=implode(",",$formulario_puntaje);
                /* --}}

                    {!! Form::hidden('calificaciones_ins',$calificaciones_resp, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('calificaciones_ins', '<p class="help-block">:message</p>') !!}
            

         
                    {!! Form::hidden('calificaciones_ids',$calificaciones_ids, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('calificaciones_ids', '<p class="help-block">:message</p>') !!}
            

                    {!! Form::hidden('id_curso',$id_curso, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_curso', '<p class="help-block">:message</p>') !!}
              
               
                    {!! Form::hidden('id_user',$id_user, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_user', '<p class="help-block">:message</p>') !!}
              
                    {!! Form::hidden('id_examen',$id_examen, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_examen', '<p class="help-block">:message</p>') !!}
             
                    {!! Form::hidden('ptj_pre',$puntaje_pre, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('ptj_pre', '<p class="help-block">:message</p>') !!}
               

        </tbody>

        </table>
       
        <div class="pagination">  </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Actualizar Nota', ['class' => 'btn btn-primary form-control']) !!}
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
</div>
@endsection