
@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de Misión
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 13%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>home</a></li>
                    <li><a href="#"></i>Misión</a></li>
                    </ol>
        </div>
    <!--Termina path de Misión
    -->
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Misión de la carrera de sistemas </h4></div>

                <div class="panel-body">
        <div class="container">
           
             <div class="content">
                      
                  <!--div style="height:200px; width:200px; float: left;">
                  <img src="{{asset('/img/img_panelPrincipal/bienvenida.png')}}" style="height:200px; width:200px;  "/>  
                  </div-->
                  <div style="margin-left: 50px;">
                  <!--h1>Misión de la carrera de sistemas </h1-->
                  <br><p>Formar profesionales a nivel de licenciatura con sólida formación ética y 
                  cultural, comprometidos con los cambios tecnológicos, científicos y humanísticos, 
                  aportando constantemente al mejoramiento y creación de técnicas y métodos de los 
                  sistemas computacionales.</p>
                  </div>
      
            </div>

  		</div>
			</div>
		</div>
	</div>
</div>
@endsection