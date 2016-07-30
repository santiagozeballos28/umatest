@extends('app')
@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR FORO</div>
                   <div class="panel-body">



<div class="container">

  {{-- */$id_user=Auth::id();   
             /* --}}
             {{-- */$id_rol=DB::table('role_user')->where('user_id', $id_user)->first();
                   $id_rol=$id_rol->role_id;    
             /* --}}
             {{-- */$name_rol=DB::table('roles')->where('id', $id_rol)->first();
                    $name_rol=$name_rol->nombre_rol;
             /* --}}
             @if ($name_rol!="estudiante")


    <h1>Foro <a href="{{ url('gestor_foros/'.$id_curso.'/crear/foro') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Foro"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
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
