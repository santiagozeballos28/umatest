  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE TAREAS</div>

                <div class="panel-body">
<div class="container">

    <h1>Tarea {{ $tarea->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $tarea->id }}</td>
                </tr>
                <tr><th> {{ trans('tarea.nombre_tarea') }} </th><td> {{ $tarea->nombre_tarea }} </td></tr><tr><th> {{ trans('tarea.descripcion') }} </th><td> {{ $tarea->descripcion }} </td></tr><tr><th> {{ trans('tarea.archivo') }} </th><td> {{ $tarea->archivo }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('gestor_examenes/tarea/' . $tarea->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Tarea"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['gestor_examenes/tarea', $tarea->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Tarea',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
