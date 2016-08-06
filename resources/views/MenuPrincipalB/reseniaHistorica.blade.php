@extends('auth.auth')

@section('htmlheader_title')
    Home
@endsection


@section('content')
<div class="container" style="padding-bottom: 4%;">
    <div class="row">
    <!--Comienza path de Reseña Histórica
    --> 
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 19%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>home</a></li>
                    <li><a href="#"></i>Reseña histórica</a></li>
                    </ol>
        </div>
    <!--Termina path de Reseña Histórica
    -->
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Reseña histórica </h4></div>
                <div class="panel-body">

        <div class="container">           
             <div class="content">
                      
                  <!--div style="height:200px; width:200px; float: left;">
                  <--!img src="{{asset('/img/img_panelPrincipal/bienvenida.png')}}" style="height:200px; width:200px;  "/>  
                  </div-->
                  <div style="margin-left: 50px;margin-right: 12%;">
                  <!--h1></h1-->
                  <br><p>La Facultad de Ciencias y Tecnología de la Universidad Mayor de San Simón nace con la concepción de un Instituto de Ciencias Básicas, en la década del 60 bajo la gestión rectoral del Dr. Arturo Urquidi. En 1972, se crea la Facultad de Ciencias Puras y Naturales como unidad de servicios para todas las carreras de la U.M.S.S., en el campo de las Matemáticas, Física, Química, y Biología, lográndose posteriormente la creación de sus primeras carreras: Licenciatura y Técnico Superior en Química y Biología entre 1975 y 1976. En los años 1976 a 1979, se comisiona la realización de un estudio de factibilidad para la viabilización de las carreras de ingeniería de la U.M.S.S., en base al cual, mediante Resolución del Consejo Universitario No. 07/79, se crean las carreras de ingeniería Eléctrica, Industrial y Mecánica de un Facultad de Tecnología y un Instituto politécnico, conectándolas a las carreras de ciencias con funcionamiento de la Facultad de Ciencias Puras y Naturales. El 21 de septiembre de 1979, mediante Resolución Rectoral No. 471/79 se dispone la conjunción de la carreras de Ciencias y las de Tecnología en una facultad con denominación de FACULTAD DE CIENCIAS Y TECNOLOGÍA.</p>
                    </div>
      
            </div>

  		</div>
			</div>
		</div>
	</div>
</div>
@endsection