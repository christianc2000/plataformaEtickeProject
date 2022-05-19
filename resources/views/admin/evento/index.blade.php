@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EVENTO</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <label for="">Lista de eventos</label>
            <br>
            <a href="{{ route('admin.evento.create') }}" class="btn btn-primary">Crear Evento</a>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">EVENTO</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($eventos as $e)
                        <tr>
                            <td scope="col">{{ $e->id }}</td>
                            <td scope="col">{{ $e->title }}</td>
                            <td scope="col">deshabilitado</td>
                            <td>
                                <form action="{{ route('admin.evento.destroy', $e->id) }}" method="POST">
                                    <a href="{{ route('admin.evento.show', $e->id) }}" class="btn btn-primary">Mostrar-Prueba</a>
                                    <a href="{{ route('admin.evento.edit', $e->id) }}" class="btn btn-secondary">Editar</a>
                                    <a href="{{route('admin.evento.localidad.index',$e->id)}}" class="btn btn-warning">Localidad</a>
                                    @csrf
                                    <!--metodo para añadir token a un formulario-->
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        console.log('Hi!');
        $(document).ready(function() {
            $('#tabla').DataTable();
        });
    </script>
@stop
