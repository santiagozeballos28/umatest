@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">USUARIOS</div>

                <div class="panel-body">






<div class="container">

    <h1>Materia_inscrito <a href="{{ url('/admin/curso_inscrito/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Curso_inscrito"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('curso_inscrito.fecha') }} </th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($curso_inscrito as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td>
                        <a href="{{ url('/admin/curso_inscrito/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Curso_inscrito"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/curso_inscrito/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Curso_inscrito"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/curso_inscrito', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Curso_inscrito" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Curso_inscrito',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $curso_inscrito->render() !!} </div>
    </div>

</div>



      </div>
            </div>
        </div>
    </div>
</div>
@endsection
