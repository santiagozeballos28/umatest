@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Materia_dicta <a href="{{ url('/admin/curso_dicta/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Curso_dictum"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('curso_dicta.grupo') }} </th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($curso_dicta as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->grupo }}</td>
                    <td>
                        <a href="{{ url('/admin/curso_dicta/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Curso_dictum"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/curso_dicta/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Curso_dictum"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/curso_dicta', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Curso_dictum" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Curso_dictum',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $curso_dicta->render() !!} </div>
    </div>

</div>
@endsection
