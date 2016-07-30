@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Materia_dictum {{ $curso_dictum->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $curso_dictum->id }}</td>
                </tr>
                <tr><th> {{ trans('curso_dicta.grupo') }} </th><td> {{ $curso_dictum->grupo }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('admin/curso_dicta/' . $curso_dictum->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Curso_dictum"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/curso_dicta', $curso_dictum->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Curso_dictum',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection