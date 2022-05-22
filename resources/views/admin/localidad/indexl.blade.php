@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EVENTO {{ $nombre_evento }}</h1>
@stop

@section('content')

    Full texts
    {{-- id 	ubicacion 	direccion 	nombre 	capacidad 	created_at 	updated_at --}}
    <div class="card">
        <div class="card-header">
            <label for="">Lista de eventos</label>
            <br>
            <a href="{{ route('admin.localidad.create', $evento_id) }}" class="btn btn-primary">Crear Localidad</a>
            <a href="{{ route('admin.evento.index') }}" class="btn btn-primary">Volver</a>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">CAPACIDAD</th>
                        <th scope="col">DIRECCION</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($localidades as $localidad)
                        <tr>
                            <td scope="col">{{ $localidad['id'] }}</td>
                            <td scope="col">{{ $localidad['nombre'] }}</td>
                            <td scope="col">{{ $localidad['capacidad'] }}</td>
                            <td scope="col">{{ $localidad['direccion'] }}</td>
                            <td>
                                <a href="#" class="btn btn-dark">Configurar</a>
                                <a href="#" class="btn btn-primary">Mostrar</a>
                                <a href="#" class="btn btn-secondary">Editar</a>

                                @csrf
                                <!--metodo para añadir token a un formulario-->
                                <form action="{{ route('admin.localidad.destroy', $localidad['id']) }}" method="POST">
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
