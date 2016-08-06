@extends('auth.auth')

@section('htmlheader_title')
    Home
@endsection


@section('content')
<div class="container">
    <div class="row">
    <!--Comienza path de Home
    -->
  <div class="col-md-14 col-md-offset-0 borderpath" style=" width: 8%; margin-left:120px;">
           
                    <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    </ol>
              
        </div>
    <!--Termina path de Home
    -->
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default" style="margin-left:100px; width:120%;">
                <div class="panel-body" >
        
           
             <div class="content" >
                      
                    <div class="col-md-4 col-md-offset-0">
                    <img src="{{asset('/img/img_panelPrincipal/bienvenida.png')}}"  align="left" />  
                    </div>
                     <div class="col-md-8 col-md-offset-0" style="padding-left: 70px;">
                     <h1 >Bienvenidos a UmaTest </h1>
                      <h3> Sistema de Evaluación de exámenes en línea</h3>
                     <p>UmaTest le ofrece una plataforma mas segura en eduacion en linea para la interaccion entre  docentes y estudiantes de la Universidad Mayor de San Simon. La información que se presenta esta destinada a las Autoridades ,Docentes, Estudiantes, y Usuarios en General de las distintas entidades Universitarias. El sistema incluye Cursos, Planillas de Notas,foros.</p>
                    </div>
      
            </div>

  


			</div>
      

		</div>

            <!-- /.box-body -->
            
          </div>
          </div>
</div>
@endsection