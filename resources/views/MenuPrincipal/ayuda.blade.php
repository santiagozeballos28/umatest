
@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de Ayuda
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 14%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>home</a></li>
                    <li><a href="#"></i>Ayuda</a></li>
                    </ol>
        </div>
    <!--Termina path de Ayuda
    -->
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Ayuda </h4></div>

                <div class="panel-body">

        <div class="container">
           
             <div class="content">
                      
                  <!--div style="height:200px; width:200px; float: left;">
                  <!img src="{{asset('/img/img_panelPrincipal/bienvenida.png')}}" style="height:200px; width:200px;  "/>  
                  </div-->
                  <div style="margin-left: 50px;">
                  <!--h1>Manual </h1--><br><p>Para la ayuda debera comunicarse con la empresa Umasoft Gracias.</p>
                    </div>
      
            </div>

  		</div>
			</div>
		</div>
	</div>
</div>
@endsection