@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>EVENTO</h1>
@stop

@section('content')
@if(Session::has('evento_borrado'))
    <p class="bg-danger">{{session('evento_borrado')}}</p>
@endif
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

                    @foreach ($eventos as $evento)
                        <tr>
                            <td scope="col">{{ $evento->id }}</td>
                            <td scope="col">{{ $evento->title }}</td>
                            <td scope="col">deshabilitado</td>
                            <td>
                                <form action="{{ route('admin.evento.destroy', $evento->id) }}" method="POST">
                                    <a href="{{ route('admin.evento.show', $evento->id) }}"
                                        class="btn btn-primary">Mostrar</a>
                                    <a href="{{ route('admin.evento.edit', $evento) }}" class="btn btn-secondary">Editar</a>
                                    <a href="{{ route('admin.evento.localidad.index', $evento) }}"
                                        class="btn btn-warning">Localidad</a>
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
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
    
        $(document).ready(function() {
            $('#tabla').DataTable({
                language: {
                    lengthMenu: 'Mostrar _MENU_ registros por página',
                    zeroRecords: 'No se encontró nada - lo siento',
                    info: 'Mostrando la página _PAGE_ de _PAGES_',
                    infoEmpty: 'No hay registros disponibles',
                    infoFiltered: '(filtrado de _MAX_ registros totales)',
                    search: "Buscar",
                },
            });
        });
    </script>
@stop
