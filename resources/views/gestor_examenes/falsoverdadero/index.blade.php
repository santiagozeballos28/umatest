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

    <h1>Falsoverdadero <a href="{{ url('/gestor_examenes/falsoverdadero/create') }}" class="btn btn-primary btn-xs" title="Añadir Nuevo Falsoverdadero"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('falsoverdadero.respuesta') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($falsoverdadero as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->respuesta }}</td>
                    <td>
                        <a href="{{ url('/gestor_examenes/falsoverdadero/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver Falsoverdadero"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/gestor_examenes/falsoverdadero/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar Falsoverdadero"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/gestor_examenes/falsoverdadero', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar Falsoverdadero" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Eliminar Falsoverdadero',
                                    'onclick'=>'return confirm("Esta seguro de eliminar?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $falsoverdadero->render() !!} </div>
    </div>

</div>
 </div>
            </div>
        </div>
    </div>
</div>
@endsection
