@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Localidad</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <select name="localidad" id="">
                        <option value="">Tahuichi Aguilera</option>
                        <option value="">Teatro Colegio Américano</option>
                    </select>
                    <a href="" class="btn btn-primary">Añadir Localidad</a>
                </div>
                <div class="col-6">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        data-bs-whatever="@getbootstrap" style="background: greenyellow; color:black;">Crear
                        Localidad</button>
                </div>
            </div>
            <br>
            <table id="tablaLocalidad" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Localidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('admin.evento.localidad.store',$evento) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear Localidad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-6">
                                    <label for="recipient-name" class="col-form-label">Gps:</label>
                                    <input type="text" class="form-control" id="gpsLocalidad" name="gpsLocalidad">
                                    @error('gpsLocalidad')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                    <label for="recipient-name" class="col-form-label">Nombre del lugar:</label>
                                    <input type="text" class="form-control" id="nombreLocalidad" name="nombreLocalidad">
                                    @error('nombreLocalidad')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                    <label for="recipient-name" class="col-form-label">Dirección:</label>
                                    <input type="text" class="form-control" id="direccionLocalidad" name="direccionLocalidad">
                                    @error('direccionLocalidad')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                    <label for="recipient-name" class="col-form-label">Capacidad:</label>
                                    <input type="number" class="form-control" id="capacidadLocalidad" name="capacidadLocalidad">
                                    @error('capacidadLocalidad')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                                <div class="col-6">
                                    <label for="message-text" class="col-form-label text-center">Mapa</label>
                                    <div class="cat container-img" style="overflow: hidden; border: 3px solid; color:gray">
                                        <img class="rounded zoom"
                                            src="https://i.blogs.es/3ea7db/1366_2000-23-/450_1000.jpg" id=""
                                            name='imageModal' alt="">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-4">
                    <a href="{{ route('admin.evento.index') }}" class="form-control btn btn-danger">Salir</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .modal-body {
            height: 350px;
            width: 100%;
            overflow-y: auto;
        }

        .container-img {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {
            transform: scale(2);
        }

        img {
            max-width: 100%;
            max-height: 100%;
            left: 0;
            top: 0;
        }

        .cat {
            height: 230px;
            width: auto;
        }

    </style>
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        console.log('Hi!');
        $(document).ready(function() {
            $('#tablaLocalidad').DataTable();
        });
    </script>
@stop
