@extends('app')
@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de contenido del curso.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 34%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="{{ url('/admin/curso_dicta') }}"><i class="fa fa-dashboard"></i>Materias</a></li>
                    <li><a href="#"></i>Contenido del Curso</a></li>
                    </ol>
        </div>
    <!--Termina path de las Listas de contenido del curso.
    -->
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR FORO</div>
                   <div class="panel-body">



<div class="container">
<!--Comienza path de vista de foros vacio
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 17%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_curso.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="#"></i>Foros</a></li>
                    </ol>
        </div>
    <!--Termina path de vista de foros vacio
    -->
  {{-- */$id_user=Auth::id();   
             /* --}}
             {{-- */$id_rol=DB::table('role_user')->where('user_id', $id_user)->first();
                   $id_rol=$id_rol->role_id;    
             /* --}}
             {{-- */$name_rol=DB::table('roles')->where('id', $id_rol)->first();
                    $name_rol=$name_rol->nombre_rol;
             /* --}}
    @if ($name_rol!="estudiante")
    <h1 style="padding-top:20px;">Foro <a href="{{ url('gestor_foros/'.$id_curso.'/crear/foro') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Foro"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
    @else
    <div class="table" style="padding-top:45px;">
    @endif
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
              
            </thead>
            <tbody>


                <tr>
                    <td style="font-size: 24px; color: orange;" > No existen Foros 


                    </td>
         

                </tr>
          
            </tbody>
        </table>
       
    </div>

</div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
