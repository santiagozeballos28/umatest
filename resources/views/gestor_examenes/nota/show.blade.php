@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">
<div class="container">

    <h1>Notum {{ $notum->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $notum->id }}</td>
                </tr>
                <tr><th> {{ trans('nota.numero_preguntas') }} </th><td> {{ $notum->numero_preguntas }} </td></tr><tr><th> {{ trans('nota.duracion') }} </th><td> {{ $notum->duracion }} </td></tr><tr><th> {{ trans('nota.calificacion') }} </th><td> {{ $notum->calificacion }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('gestor_examenes/nota/' . $notum->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Notum"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['gestor_examenes/nota', $notum->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Notum',
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