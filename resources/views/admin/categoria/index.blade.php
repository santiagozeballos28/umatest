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

    <h1>Carrera <a href="{{ url('/admin/categoria/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Categorium"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Nombre de la Carrera </th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>



 
             {{-- */$ids_categoria=DB::table('cursos') ->select('cursos.id_categoria AS id_cat')->get();
                    
             /* --}}


  

            {{-- */$x=0;/* --}}
            @foreach($categoria as $item)
                {{-- */$x++;/* --}}


               {{-- */

                $i=0;
                $encontrado='false';
                $id_desabilitado=0;
                while($i< count($ids_categoria) && $encontrado=='false'){
                if($ids_categoria[$i]->id_cat==$item->id){
                $id_desabilitado=$item->id;
                  $encontrado='true';
                 }
                 $i++;
                }
               /* --}}

                
                @if($item->estado==0)              
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>
                        <a href="{{ url('/admin/categoria/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Carrera"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/categoria/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Carrera"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>

                       @if($id_desabilitado==$item->id)

                         <a href="{{ url('/admin/categoria/' . $item->id.'/desabilitar') }}" class="fa fa-close" title="Desabilitar carrera" style="font-size:24px;color:#FE2EC8" ><span  aria-hidden="true"/></a>
                      @else
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/categoria', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Carrera" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Carrera',
                                    'onclick'=>'return confirm("Esta seguro que quiere eliminar?")'
                            ));!!}
                        {!! Form::close() !!}

                        @endif

                    </td>
                </tr>
                  @endif


            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $categoria->render() !!} </div>
    </div>

</div>
             </div>
            </div>
        </div>
    </div>
</div>
@endsection
