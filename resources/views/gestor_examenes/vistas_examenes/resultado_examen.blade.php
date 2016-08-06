@extends('app')

@section('htmlheader_title')
    Home
@endsection


@section('main-content')
<div class="containerexamen">
	<div class="row">
		<div class="col-md-14 col-md-offset-0">
					 <div class="hoja">
					 <div>
                    
					 	<h1 style="color:darkred; line-height:40px;text-align:center;">Resultado del Examen</h1>
             			<p class="estiloresultado">Puntaje del Examen: <a style="color:#3c8dbc; font-size:30px;">{{$puntaje_estudiante}}</a></p> 
            			 <p class="estiloresultado" style="line-height:40px;">Número de Respuestas Correctas: <a style="color:green; font-size:30px;">{{$numero_res_correctas}}</a></p>
            			 <p class="estiloresultado">Número de Respuestas Incorrectas: <a style="color:red; font-size:30px;">{{$numero_res_fallidas}}</a></p>
            			 <p class="estiloresultado">Número de Respuestas a Evaluar: <a style="color:orange; font-size:30px;">{{$numero_res_revisar}}</a></p>
            			 <a style="padding-left:15%;line-height:40px; font-size:18px;" href="{{ url('/home') }}">>> TERMINAR << </a>
             				<br>
             				<br>
					 </div>
  	    	</div>
		</div>
	</div>
</div>
@endsection