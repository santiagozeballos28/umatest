@extends('auth.auth')

@section('htmlheader_title')
    Home
@endsection


@section('content')
<div class="container">
    <div class="row">
    <!--Comienza path de Home
    -->
  <div class="col-md-14 col-md-offset-0 borderpath" style=" width: 8%;">
           
                    <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    </ol>
              
        </div>
    <!--Termina path de Home
    -->
        <div class="col-md-8 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body" >
        <div class="container" style="    padding-right: 85%;">
           
             <div class="content" >
                      
                    <div style="height:200px; width:200px; float: left;">
                    <img src="{{asset('/img/img_panelPrincipal/bienvenida.png')}}" style="height:200px; width:200px;  "/>  
                    </div>
                     <div style="margin-left: 250px;    width: 80%; text-align : justify;">
                     <h1 style="text-align: center;">Bienvenidos a UmaTest </h1>
                      <h3 style="text-align: center;"> Sistema de Evaluación de exámenes en línea</h3>
                     <p>UmaTest le ofrece una plataforma mas segura en eduacion en linea para la interaccion entre  docentes y estudiantes de la Universidad Mayor de San Simon. La información que se presenta esta destinada a las Autoridades ,Docentes, Estudiantes, y Usuarios en General de las distintas entidades Universitarias. El sistema incluye Cursos, Planillas de Notas,foros.</p>
                    </div>
      
            </div>

  		</div>


			</div>
      

		</div>

            <!-- /.box-body -->
            
          </div>
          <div style="float: right;margin-top: 0%;">
              <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendario</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 300px">
              <div class="datepicker datepicker-inline">
              <div class="datepicker-days" style="display: block;">
              <table class="table table-condensed">
              <thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">Junio 2016</th><th class="next" style="visibility: visible;">»</th></tr><tr><th class="dow">DO</th><th class="dow">LU</th><th class="dow">MA</th><th class="dow">MI</th><th class="dow">JU</th><th class="dow">VI</th><th class="dow">SA</th></tr></thead><tbody><tr><td class="old day">29</td><td class="old day">30</td><td class="old day">31</td><td class="day">1</td><td class="day">2</td><td class="day">3</td><td class="day">4</td></tr><tr><td class="day">5</td><td class="day">6</td><td class="day">7</td><td class="day">8</td><td class="day">9</td><td class="day">10</td><td class="day">11</td></tr><tr><td class="day">12</td><td class="day">13</td><td class="day">14</td><td class="day">15</td><td class="day">16</td><td class="day">17</td><td class="day">18</td></tr><tr><td class="day">19</td><td class="day">20</td><td class="day">21</td><td class="day">22</td><td class="day">23</td><td class="day">24</td><td class="day">25</td></tr><tr><td class="day">26</td><td class="day">27</td><td class="day">28</td><td class="day">29</td><td class="day">30</td><td class="new day">1</td><td class="new day">2</td></tr><tr><td class="new day">3</td><td class="new day">4</td><td class="new day">5</td><td class="new day">6</td><td class="new day">7</td><td class="new day">8</td><td class="new day">9</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2016</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month active">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2010-2019</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year active">2016</span><span class="year">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year new">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
            </div>
            </div>
	</div>
</div>
@endsection