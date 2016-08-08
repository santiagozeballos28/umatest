  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR TAREAS</div>

                <div class="panel-body">
<div class="container">

    <h3>Tareas entregados </h3>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th> Nombre completo </th>
                    <th> {{ trans('entregado.descripcion_tarea') }} </th>
                    <th> {{ trans('entregado.archivo') }} </th>
                    <th> {{ trans('entregado.fecha') }} </th>
                    <th>Descargar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($entregado as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->apellido }} {{ $item->name }} </td>
                    <td>{{ $item->descripcion_tarea }}</td><td>{{ $item->archivo }}</td><td>{{ $item->fecha }}</td>

                    <td> 
                    <a href="{{url(''.$item->path_archivo.'')}}"><i class="fa fa-cloud-download" aria-hidden="true" title="Descargar Archivo"style="font-size:24px;color:orange"></i></a>
                    </td>
                    <td>

                                        
                              {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/gestor_examenes/entregado', $item->id_user],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Entregado" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Entregado',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}

                         
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> </div>
    </div>

</div>
     </div>
            </div>
        </div>
    </div>
</div>
@endsection
