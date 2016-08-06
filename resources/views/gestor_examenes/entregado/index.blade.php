  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR PLANILLAS</div>

                <div class="panel-body">
<div class="container">

    <h1>Entregado <a href="{{ url('/gestor_examenes/entregado/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Entregado"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('entregado.descripcion_tarea') }} </th><th> {{ trans('entregado.archivo') }} </th><th> {{ trans('entregado.fecha') }} </th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($entregado as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->descripcion_tarea }}</td><td>{{ $item->archivo }}</td><td>{{ $item->fecha }}</td>
                    <td>
                        <a href="{{ url('/gestor_examenes/entregado/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Entregado"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                              {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/gestor_examenes/entregado', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Entregado" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Entregado',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}

                         <a href="#"><i class="fa fa-cloud-download" style="font-size:24px;color:orange"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $entregado->render() !!} </div>
    </div>

</div>
     </div>
            </div>
        </div>
    </div>
</div>
@endsection
