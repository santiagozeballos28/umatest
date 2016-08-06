@extends('auth.auth')

@section('htmlheader_title')
    Home
@endsection


@section('content')
<div class="container" style="padding-bottom: 4%;">
    <div class="row">
    <!--Comienza path de Visión
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 13%;margin-left: 0%;"">
            
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>home</a></li>
                    <li><a href="#"></i>Visión</a></li>
                    </ol>
                
        </div>
    <!--Termina path de Visión
    -->
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Visión de la Facultad de Ciencias y Tecnologia </h4></div>

                <div class="panel-body">
        <div class="container">
           
             <div class="content">
                      
                  <!--div style="height:200px; width:200px; float: left;"-->
                  <!--!img src="{{asset('/img/img_panelPrincipal/bienvenida.png')}}" style="height:200px; width:200px;  "/-->  
                  <!--/div-->
                  <div style="margin-left: 50px; margin-right: 12%;">
                  <!--h1>Visión de la carrera de Sistemas </h1-->
                  <br><p>Una Facultad de Ciencias y Tecnología generando tres productos de alta calidad y competitividad: profesionales de Pre-grado, Post-grado y conocimientos científicos y tecnológicos, que satisfagan la demanda social en el tiempo previsto, con sistemas de gestión y administración eficientes y con enfoques flexibles que se adecuen dinámicamente a los desafíos que plantean el desarrollo científico y tecnológico nacional e internacional.</p>
                    </div>
      
            </div>

  		</div>
			</div>
		</div>
	</div>
</div>
@endsection