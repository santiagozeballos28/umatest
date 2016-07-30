  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR CARRERAS</div>
                  <div class="panel-body">
<div class="container">
<div class="container">

    <h1>Carrera <a href="#" ><span  aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Nombre de la Carrera </th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>


            {{-- */$x=0;/* --}}
            @foreach($carreras_desabilitados as $item)
                {{-- */$x++;/* --}}
            
                             
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>                    
                         <a href="{{ url('/admin/carreras/' . $item->id.'/habilitar') }}" class="fa fa-check-square" title="Habilitar carrera" style="font-size:24px;color:#74DF00" ><span  aria-hidden="true"/></a>                               

                    </td>
                </tr>
                  
            @endforeach
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
