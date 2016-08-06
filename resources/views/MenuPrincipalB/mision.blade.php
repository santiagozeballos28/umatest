@extends('auth.auth')

@section('htmlheader_title')
    Home
@endsection


@section('content')
<div class="container" style="padding-bottom: 4%;">
    <div class="row">
    <!--Comienza path de Misión
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 13%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>home</a></li>
                    <li><a href="#"></i>Misión</a></li>
                    </ol>
        </div>
    <!--Termina path de Misión
    -->
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Misión de la Facultad de Ciencias y Tecnologia</h4></div>

                <div class="panel-body">
        <div class="container">
           
             <div class="content">
                      
                  <!--div style="height:200px; width:200px; float: left;">
                  <img src="{{asset('/img/img_panelPrincipal/bienvenida.png')}}" style="height:200px; width:200px;  "/>  
                  </div-->
                  <div style="margin-left: 50px;">
                  <!--h1>Misión de la carrera de sistemas </h1-->
                  <br><p>La Facultad de Ciencias y Tecnología de la UMSS es una comunidad académica, autónoma, pública, intercultural e interdisciplinaria que forma recursos de alta calidad, generando conocimientos, realizando servicios especializados en ciencias y tecnología.</p>
                  </div>
      
            </div>

  		</div>
			</div>
		</div>
	</div>
</div>
@endsection