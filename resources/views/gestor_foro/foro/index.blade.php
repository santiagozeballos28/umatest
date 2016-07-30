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

    <h1>Foro <a href="{{ url('gestor_foros/'.$id_curso.'/crear/foro') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Foro"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
              
            </thead>
            <tbody>


            {{-- */$x=0;/* --}}
            @foreach($foro as $item)
                {{-- */$x++;/* --}}

             {{-- */
              
                 $mensajes=array();
                  for($i=0; $i < count($comentarios); $i++){
                      if($item->id_foro==$comentarios[$i]->id_foro){
                          
                           $mensajes[$i]=$comentarios[j]->mensaje;
                         
                      }
                }
               
          
              /* --}}


                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->mensaje }}</td>
                    <td>{{ $item->archivo }}</td>
                     <td> 3 </td>
                    <td>{{ $item->fecha }}</td>
                    <td>
                        <a href="{{ url('/foro/' . $item->id_foro) }}" class="btn btn-success btn-xs" title="Ver Foro"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/foro/' . $item->id_foro . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Foro"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/foro', $item->id_foro],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Foro" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Foro',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $foro->render() !!} </div>
    </div>
</div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
