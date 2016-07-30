
@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de Visión
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 13%;margin-left: 0%;"">   
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>home</a></li>
                    <li><a href="#"></i>Visión</a></li>
                    </ol>
                
        </div>
    <!--Termina path de Visión
    -->
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Visión de la carrera de Sistemas </h4></div>

                <div class="panel-body">
        <div class="container">
           
             <div class="content">
                      
                  <!--div style="height:200px; width:200px; float: left;"-->
                  <!--!img src="{{asset('/img/img_panelPrincipal/bienvenida.png')}}" style="height:200px; width:200px;  "/-->  
                  <!--/div-->
                  <div style="margin-left: 50px;margin-right: 12%;">
                  <!--h1>Visión de la carrera de Sistemas </h1-->
                  <br><p>Ser una carrera de excelencia reconocida en el medio, dedicada a formar profesionales a nivel de licenciatura, capaces de resolver problemas que involucren tecnología computacional, con habilidad para administrar sistemas, proporcionar apoyo técnico, desarrollar y aplicar nuevos métodos y técnicas para 
                  la construcción de sistemas de software, vinculados al avance científico y tecnológico, con valores éticos
                  y responsabilidad socio-cultural.</p>
                    </div>
      
            </div>

  		</div>
			</div>
		</div>
	</div>
</div>
@endsection