@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Respuesta_desarrollo <a href="{{ url('/gestor_examenes/respuesta_desarrollo/create') }}" class="btn btn-primary btn-xs" title="Add New respuesta_desarrollo"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Respuesta </th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($respuesta_desarrollo as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->respuesta }}</td>
                    <td>
                        <a href="{{ url('/gestor_examenes/respuesta_desarrollo/' . $item->id) }}" class="btn btn-success btn-xs" title="View respuesta_desarrollo"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/gestor_examenes/respuesta_desarrollo/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit respuesta_desarrollo"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/gestor_examenes/respuesta_desarrollo', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete respuesta_desarrollo" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete respuesta_desarrollo',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $respuesta_desarrollo->render() !!} </div>
    </div>

</div>
@endsection
