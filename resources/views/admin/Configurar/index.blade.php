@extends('adminlte::page')

@section('title', 'Configuración')

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
                
                <div class="col-6">
                    <br>
                    <div class="contenedor-botones mb-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="boton seis" data-bs-toggle="modal" data-bs-target="#exampleModal" style="max-height: 50px">
                            <span><i class="fa fa-duotone fa-pen-to-square mb-0" style="color: #0878A4"><label for=""
                                     style="font-size: 12px" class="mx-2">Evento</label></i></span>
                            <svg>
                                <rect x="0" y="0" fill="none" style="stroke: #0878A4"></rect>
                            </svg>
                        </button>
                        <button type="button" class="boton seis" data-bs-toggle="modal" id="editarLocalidad"
                            name="editarLocalidad" data-bs-target="#localidadModal" style="max-height: 50px">
                            <span><i class="fa fa-duotone fa-pen-to-square mb-0" style="color: white"><label
                                        style="font-size: 12px" class="mx-2">Localidad</label></i></span>
                            <svg>
                                <rect x="0" y="0" fill="none" style="stroke: #0878A4"></rect>

                            </svg>
                        </button>
                    </div>
                   
                </div>
                <div class="col-lg-3"></div>

                <div class="col-lg-2">
                    <label for="">Entradas:</label>
                    <label for="">Registradas:</label>
                </div>
                <div class="col-lg-1">
                    <label class="font-weight-normal">2000</label>
                    <label class="font-weight-normal">1000</label>
                </div>

                <div class="col-lg-12" style="border-top: 1px solid;color: gainsboro">

                </div>
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
                        <button type="submit" class="boton uno">
                            <span>ADD</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table id="tablaConfigurar" class="table table-striped shadow-lg " style="width:100%; background:White">
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
                                    <a href="" class="btn" style="background: #23345C; color: white"
                                        style="overflow: hidden; height: 20px;">
                                        <i class="fa fa-duotone fa-layer-group" style="size: 10px"></i>
                                        <p style="font-size: 10px; height: 0px;">Sección</p>
                                    </a>
                                    <a href="" class="btn" style="background: #1ECFD6;color: white">
                                        <i class="fa fa-duotone fa-pen-to-square fa-2x" style="color: #0878A4"></i>
                                    </a>
                                    <a href="" class="btn" style="background: #EDD170;color: white">
                                        <i class="fa fa-duotone fa-eye fa-2x" style="color: olive"></i></a>

                                    <button type="submit" class="btn"
                                        style="background: #C05640; color: white"><i
                                            class="fa fa-solid fa-square-minus fa-2x"></i></button>
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
                    <a href="{{ route('admin.evento.localidad.index', $evento) }}" class="form-control mb-2 btn"
                        style="background: #23345C; color: white">Anterior</a>
                </div>
                <div class="col-lg-6">
                    <a href="{{ route('admin.evento.index') }}" class="form-control mb-2 btn"
                        style="background: #D75B66; color: white">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
    @php
    $image = $evento->image;
    @endphp
    <!-- MODAL EDITAR EVENTO -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="container-img modal-title font-bold" id="exampleModalLabel">Editar - {{ $evento->title }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.evento.update', $evento) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
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
                                @endphp
                                <div class="col-lg-4 mb-4">
                                    <div class="card">
                                        <div class="card-body" style="height: 370px">
                                            @if (count($image) > 0 && $img != null)
                                                <div class="cat container-img" style="overflow: hidden; background: gray"
                                                    id="divPerfil">
                                                    <div id="{{ $img->id }}" class="cat container-img" name="perfil">
                                                        <img class="rounded card-img-top" src="{{ asset($img->url) }}"
                                                            id="modal{{ $img->id }}" name='imagePrincipal' alt="">
                                                    </div>
                                                </div>
                                            @else
                                                <div class="cat container-img" style="overflow: hidden; border">
                                                    <img src="https://www.agroworldspain.com/img/noimage.png" alt="...">
                                                </div>
                                            @endif
                                            <input class="form-control my-1" type="file" id="image" name="image[]" multiple
                                                accept="image/*">
                                            <input id="json" name="json" type="text" hidden value="">
                                            @if (count($image) > 0)
                                                {{-- <button type="button" class="btn btn-primary form-control my-0"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-bs-whatever="@mdo">Abrir Galeria</button> --}}
                                                <button type="button" class="btn btn-primary form-control"
                                                    data-toggle="modal" data-target="#test2">Galeria</button>
                                            @else
                                                <button class="btn btn-danger form-control" type="button"
                                                    data-toggle="modal" data-target="#test2">Galeria Vacía</button>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" id="guardar" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
                {{-- MODAL GALERIA --}}
                <div class="modal fade" id="test2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Imágenes</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Galeria de Imágenes
                                <div class="row">
                                    @if (count($image) == 0)
                                        <div class="container-img">
                                            <p> Galeria Vacía</p>
                                        </div>
                                    @else
                                        @php
                                            if (count($image) > 0) {
                                                $img = $image->where('position_id', '=', 1)->first();
                                            }
                                        @endphp
                                        {{-- Si es una imágen y no es position 1 sólo será visible --}}
                                        @if (empty($img))
                                            @php
                                                $img = $image->first();
                                            @endphp
                                            <div class="col-lg-4 mb-4" id="modal{{ $img->id }}">
                                                <div class="px-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="modal{{ $img->id }}" name="modalC"
                                                        value="{{ $img->id }}">
                                                    <br>
                                                </div>
                                                <div class="cat container-img"
                                                    style="overflow: hidden; border: 3px solid; color:gray">
                                                    <img class="rounded zoom" src="{{ asset($img->url) }}"
                                                        id="image{{ $img->id }}" name='imageModal' alt="">
                                                </div>
                                                <div class="text-center">
                                                    <form action="{{ route('admin.images.update', $img->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <button class="btn btn-success" type="submit">Imágen
                                                            Principal</button>
                                                    </form>
                                                </div>

                                            </div>
                                        @else
                                            {{-- Si es una imágen y es position 1 será visible y enmarcada --}}
                                            @foreach ($image as $i)
                                                @if ($i->id == $img->id)
                                                    <!--Enmarca  a la Imagen seleccionada de Perfil-->
                                                    <div class="col-lg-4 mb-4" id="modal{{ $i->id }}">
                                                        <div class="px-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="modal{{ $i->id }}" name="modalC"
                                                                value="{{ $i->id }}">
                                                            <br>
                                                        </div>
                                                        <div class="cat container-img"
                                                            style="overflow: hidden; border: 10px solid; color: orange;">
                                                            <img class="rounded zoom" src="{{ asset($i->url) }}"
                                                                id="modal{{ $i->id }}" name='imageModal' alt="">
                                                        </div>
                                                    </div>
                                                @else
                                                    <!--Muestra todas las demás imágenes-->
                                                    <div class="col-lg-4 mb-4" id="modal{{ $i->id }}">
                                                        <div class="px-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="modal{{ $i->id }}" name="modalC"
                                                                value="{{ $i->id }}">
                                                            <br>
                                                        </div>
                                                        <div class="cat container-img"
                                                            style="overflow: hidden; border: 3px solid; color:gray">
                                                            <img class="rounded zoom" src="{{ asset($i->url) }}"
                                                                id="image{{ $i->id }}" name='imageModal' alt="">
                                                        </div>
                                                        <div class="text-center">
                                                            <form action="{{ route('admin.images.update', $i->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('put')
                                                                <button class="btn btn-success" type="submit">Imágen
                                                                    Principal</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                {{-- <a href="#" class="btn btn-success" id="guardarModal">Guardar</a> --}}
                                <button type="button" class="btn btn-danger" id="eliminar">eliminar</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL EDITAR LOCALIDAD --}}
    <div class="modal fade" id="localidadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Localidad - {{ $evento->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.evento.localidad.update', $le) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nombre</label>
                                <br>
                                <input name="name" id="name" class="form-control"
                                    value="{{ old('title', $localidad->nombreInfraestructura) }}" />
                                <label for="">Ubicacion Geografica</label>
                                <input name="gps" id="gps" class="form-control"
                                    value="{{ old('gps', $localidad->gps) }}" readonly onmousedown="return false;" />
                                <label for="">Dirección</label>
                                <input name="direction" id="direction" class="form-control"
                                    value="{{ old('ubicación', $localidad->ubicación) }}" />
                                <label for="">Teléfono</label>
                                <input name="phones" id="phones" class="form-control" type="number" value="77383487">
                                <label for="">Capacidad</label>
                                <input name="capacidad" id="capacidad" class="form-control" type="number"
                                    value="{{ old('capacidadMaxima', $localidad->capacidadMaxima) }}" />
                                <input type="text" id="longitud" hidden value="">
                                <input type="text" id="latitud" hidden value="">
                            </div>
                            <div class="col-lg-6">
                                <div class="cat container-img"
                                    style="height: 390px;width: 370px; overflow: hidden; border: 3px solid; color: darkgrey">
                                    <div id="map" style="height:390px; width: 370px;" class="form-control rounded"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="Actualizar">Actualizar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        .modal-body {
            height: 450px;
            width: 100%;
            overflow-y: auto;
        }

        .card-body {
            height: 250px;
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

        .boton {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 80px;
            background: #0878A4;
            color: rgb(255, 255, 255);
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
            font-weight: 500px;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            transition: .3s ease all;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
        }

        .boton span {
            position: relative;
            z-index: 2;
            transition: .3s ease all;
        }

        .boton.uno::after {
            content: "";
            width: 100%;
            height: 100%;
            background: ;
            position: absolute;
            z-index: 1;
            top: -80px;
            left: 0;
            transition: .3s ease-in-out all;
        }

        .boton.uno:hover::after {
            top: 0;
        }

        .contenedor-botones {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .boton.dos::after {
            content: "";
            width: 100%;
            height: 300px;
            background: #F7D716;
            position: absolute;
            z-index: 1;
            top: -300px;
            left: 0;
            transition: .4s ease-in-out all;
            border-radius: 0px 0px 300px 300px;
        }

        .boton.dos:hover::after {
            top: 0;
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

        card-body {
            background: #4553cd;
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
        }

        .boton.dos {
            background: #0878A4;
            color: #000;
        }

        .boton.seis {
            background: #1ECFD6;
            color: #000;
        }

        .boton.seis svg {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            fill: none;
        }

        .boton.seis rect {
            width: 100%;
            height: 100%;
            stroke: #000D29;
            stroke-width: 10px;
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            transition: .6s ease all;
        }

        .boton.seis:hover rect {
            stroke-dashoffset: 0;
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
        var cad = $('#gps').val();
        var index = cad.indexOf(',');
        var longitud = cad.substring(0, index);
        var latitud = cad.substring(index + 1, cad.length);
        $('#longitud').val(longitud);
        $('#latitud').val(latitud);
        //alert("longitud: "+$('#longitud').val());
        //alert("latitud: "+$('#latitud').val());
        let map;

        function initMap() {
            var longi = document.getElementById("latitud").value.substring(0, 11);
            var lati = document.getElementById("longitud").value.substring(0, 11);
            map = new google.maps.Map(document.getElementById("map"), {

                center: {
                    lat: -17.783725227247068,
                    lng: -63.18050197649233
                },
                center: {
                    lat: {{ -17.783725227247068 }},
                    lng: {{ -63.18050197649233 }}
                },
                zoom: 14,
                scrollwheel: true,
            });

            const uluru = {
                lat: -17.783725227247068,
                lng: -63.18050197649233
            };
            uluru.lat = parseFloat(lati);
            uluru.lng = parseFloat(longi);
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker, 'position_changed',
                function() {
                    let lat = marker.position.lat();
                    let lng = marker.position.lng();
                    $('#gps').val(lat + "," + lng);

                });
            google.maps.event.addListener(map, 'click',
                function(event) {
                    pos = event.latLng
                    marker.setPosition(pos)
                })
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8DaopxOLYwyY0gJV2fUky4_X99ZFwJY&callback=initMap" async
        defer></script>
    <script>
        $(document).ready(function() {
            $('#tablaConfigurar').DataTable({
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
    <script>
        $(document).ready(function() {
            $('#guardar').on('click', function() {
                let arrayI = [];
                $('img[name=imageModal]').each(function() {
                    //images.push($(this).attr('src'));
                    cad = $(this).attr('id');
                    n = cad.length;
                    cad = cad.substring(5, n);
                    const tab = {
                        id: cad,
                        url: $(this).attr('src'),
                    }
                    arrayI.push(tab);
                })
                jsn = JSON.stringify(arrayI);
                $("#json").val(jsn);
            });
            $('#eliminar').on('click', function() {
                let array = [];
                $('input[type=checkbox][name=modalC]:checked').each(function() {
                    // alert($(this).attr("value"));
                    var id = $(this).attr("value");

                    var idcheck = "modal" + $(this).attr("value");
                    //var src = $('#image' + id).attr("src");
                    // images.push(src);
                    array.push(idcheck);
                    $("div#" + idcheck).remove();
                    $("#" + id).remove();
                });
                /*  let arrayI = [];
                  $('img[name=imageModal]').each(function() {
                      //images.push($(this).attr('src'));
                      cad = $(this).attr('id');
                      n = cad.length;
                      cad = cad.substring(5, n);
                      const tab = {
                          id: cad,
                          url: $(this).attr('src'),
                      }
                      arrayI.push(tab);
                  })
                  jsn = JSON.stringify(arrayI);
                  $("#json").val(jsn);*/
            });
        });
    </script>
@stop
