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
                </tbody>
            </table>
        </div>
    </div>


@stop

@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
