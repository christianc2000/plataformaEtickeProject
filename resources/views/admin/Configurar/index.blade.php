@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Configuración - {{ $evento->title }} - {{ $localidad->nombreInfraestructura }}</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <div>
                <label for="" class="container-img" style="font-size: 20px">Horarios</label>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="container-img">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark container-img" style="height: 67px;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Editar Localidad
                        </button>
                    </div>
                </div>

                <div class="col-lg-2">
                    <label for="">Entradas:</label>
                </div>
                <div class="col-lg-4">
                    <p>2000</p>
                </div>
                <div class="col-lg-6 mb-4"></div>
                <div class="col-lg-2">
                    <label for="">Registradas:</label>
                </div>
                <div class="col-lg-4">
                    <p>1000</p>
                </div>
                <div style="border-top: 1px solid;color: gainsboro">

                </div>
                <br>
                <form class="row" action="{{ route('admin.evento.localidadHorario.store', $le) }}"
                    method="POST">
                    @csrf
                    <div class="col-lg-3">
                        <label for="" class="text-center font-bold">Fecha: </label>
                        <input type="date" id="fecha" name="fecha" class="form-control" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="" class="text-center font-bold">Hora Inicio: </label>
                        <input type="time" id="horaEvento" name="horaEvento" class="form-control" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="" class="text-center font-bold">Duración(hh:mm): </label>
                        <input type="time" id="duración" name="duración" class="form-control" required>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="form-control btn btn-primary mb-3 container-img"
                            style="height: 67px;">Add-Horario</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">FECHA</th>
                        <th scope="col">HORA INICIO</th>
                        <th scope="col">DURACIÓN</th>
                        <th scope="col">SECCIÓN</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horarios as $h)
                        <tr>
                            <td scope="col">{{ $h->fecha }}</td>
                            <td scope="col">{{ $h->horaEvento }}</td>
                            <td scope="col">{{ $h->duracion }}</td>
                            <td scope="col">sin sección</td>
                            <td scope="col">
                                <form action="{{ route('admin.evento.localidadHorario.delete', compact('le', 'h')) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="" class="btn btn-primary">Editar</a>
                                    <a href="" class="btn btn-secondary">Ver</a>
                                    <a href="" class="btn btn-warning">Sección</a>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{ route('admin.evento.localidad.index', $evento) }}"
                        class="form-control mb-2 btn btn-primary">Anterior</a>
                </div>
                <div class="col-lg-6">
                    <a href="{{ route('admin.evento.index') }}" class="form-control mb-2 btn btn-danger">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
    @php
    $image = $evento->image;

    @endphp
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar {{ $evento->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.evento.update', $evento) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="container">
                            <div class="row g-2">
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Título</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title', $evento->title) }}" placeholder="Título del evento"
                                            required>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" id="description" name="description"
                                            required>{{ $evento->description }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Categoria: </label>
                                        <br>
                                        <select class="form-control" aria-label="Default select example" id="category_id"
                                            name="category_id" required>
                                            <option value="" disabled>Seleccionar</option>
                                            @foreach ($categories as $c)
                                                <option value={{ $c->id }}
                                                    {{ $c->id == $evento->category_id ? 'selected' : '' }}>
                                                    {{ $c->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <!-- Imagen Principal-->
                                @php
                                    
                                    $img = $image->where('position_id', '=', 1)->first();
                                    
                                    // $img = $image->first();
                                    
                                @endphp

                                <div class="col-lg-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            @if (count($image) > 0 && $img != null)
                                                <div class="cat container-img" style="overflow: hidden; background: gray"
                                                    id="divPerfil">
                                                    <div id="{{ $img->id }}" class="cat container-img" name="perfil">
                                                        <img class="rounded" src="{{ asset($img->url) }}"
                                                            id="modal{{ $img->id }}" name='imagePrincipal' alt="">
                                                    </div>
                                                </div>
                                            @else
                                                <div class="cat container-img" style="overflow: hidden; border">
                                                    <img src="https://www.agroworldspain.com/img/noimage.png" alt="...">
                                                </div>
                                            @endif
                                            <input class="form-control my-2" type="file" id="image" name="image[]" multiple
                                                accept="image/*">
                                            <input id="json" name="json" type="text" hidden value="">
                                            @if (count($image) > 0)
                                                <button type="button" class="btn btn-primary form-control my-0"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-bs-whatever="@mdo">Abrir Galeria</button>
                                            @else
                                                <button class="btn btn-danger form-control" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    style="background:red">Galeria Vacía</button>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                </div>
                                <div class="col-7">
                                    <a href="{{ route('admin.evento.index') }}" class="btn btn-danger mb-4">Cancelar</a>
                                    <a href="#" class="btn btn-primary mb-4">Editar Localidad</a>
                                    <button class="btn btn-success mb-4" type="submit" name="guardar"
                                        id="guardar">Guardar</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        .modal-body {
            height: 450px;
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
            height: 250px;
            width: auto;
        }

    </style>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>


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
