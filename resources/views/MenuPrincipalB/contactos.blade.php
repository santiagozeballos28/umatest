  @extends('auth.auth')

@section('htmlheader_title')
    Home
@endsection


@section('content')
<div class="container" style="padding-bottom: 4%;">
    <div class="row">
    <!--Comienza path de Contacto
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 16%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>home</a></li>
                    <li><a href="#"></i>Contactos</a></li>
                    </ol>
        </div>
    <!--Termina path de Contacto
    -->
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"><h4> Contacto </h4></div>
                <div class="panel-body">






        <div class="container">
           
             <div class="content" style="margin-right: 100px">
                      
                  <!--div style="height:200px; width:200px; float: left;">
                  <!img src="{{asset('/img/img_panelPrincipal/bienvenida.png')}}" style="height:200px; width:200px;  "/>  
                  </div-->
                  <div>
                  


                             
            <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="sendEmail">Enviar
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </div>




                    </div>
               </div>
  		      </div>
			</div>
		</div>
	</div>
</div>
@endsection