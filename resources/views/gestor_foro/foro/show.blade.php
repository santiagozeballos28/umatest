  @extends('app')

@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR PLANILLA</div>
                  <div class="panel-body">
<div class="container">

    <h1>Foro {{ $foro->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $foro->id }}</td>
                </tr>
                <tr><th> {{ trans('foro.titulo') }} </th><td> {{ $foro->titulo }} </td></tr><tr><th> {{ trans('foro.mensaje') }} </th><td> {{ $foro->mensaje }} </td></tr><tr><th> {{ trans('foro.archivo') }} </th><td> {{ $foro->archivo }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('foro/' . $foro->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Foro"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['foro', $foro->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Foro',
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