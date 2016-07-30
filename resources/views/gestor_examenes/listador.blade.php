  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR DE EXAMENES</div>

                <div class="panel-body">
<div class="container">

    <h1>Examen <a href="{{ url('/gestor_examenes/examen/'.$id_curso.'/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Examan"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('examen.nombre_examen') }} </th><th> {{ trans('examen.estado_examen') }} </th><th> {{ trans('examen.fecha_examen') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($examen as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre_examen }}</td><td>{{ $item->estado_examen }}</td><td>{{ $item->fecha_examen }}</td>
                    <td>
                        <a href="{{ url('/gestor_examenes/examen/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Examan"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/gestor_examenes/examen/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Examan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/gestor_examenes/examen', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Examan" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Examan',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $examen->render() !!} </div>
    </div>

</div>
     </div>
            </div>
        </div>
    </div>
</div>
@endsection
