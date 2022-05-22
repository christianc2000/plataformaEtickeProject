@extends('adminlte::page')

@section('title', 'Localidad')

@section('content_header')
    <h1>Localidad</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header text-center">
            LOCALIDADES
        </div>
        <div class="card-body">
            <form action="{{ route('admin.evento.localidadEvento.store', $evento) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <select name="localidad" id="localidad" name="localidad">
                            <option value="" selected disabled>Seleccionar</option>
                            @foreach ($localidades as $l)
                                <option value="{{ $l->nombreInfraestructura }}">{{ $l->nombreInfraestructura }}</option>
                            @endforeach
                            @error('localidad')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </select>

                        <button type="submit" id="addLocalidad" class="btn btn-primary">Añadir Localidad</a>
                    </div>
                    <div class="col-3 mb-1">
                        <button type="button" class="form-control btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"
                            style="background: greenyellow; color:black;">Crear
                            Localidad</button>
                    </div>
                </div>
            </form>
            <br>
            @php
                
            @endphp
            <table id="tablaLocalidades" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Localidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evento->localidadesEvento as $le)
                        <tr>
                            @php
                                $localidad = $localidades->find($le->localidad_id);
                            @endphp
                            <td>{{ $localidad->id }}</td>
                            <td>{{ $localidad->nombreInfraestructura }}</td>
                            <td></td>

                            <td>
                                <form action="{{ route('admin.evento.localidadEvento.delete', $le->id) }}" method="POST">

                                    <a href="#" class="btn btn-warning">configurar</a>
                                    <a href="#" class="btn btn-dark">ver</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('admin.evento.localidad.store', $evento) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear Localidad</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <x-adminlte-input name="name" label="Nombre" />
                                    <x-adminlte-input name="gps" label="Ubicacion Geografica" id="gps" />
                                    <x-adminlte-input name="direction" label="Direccion" />
                                    <x-adminlte-input name="phones" label="Telefonos" />
                                    <x-adminlte-input name="capacidad" label="Capacidad" />
                                    <x-adminlte-input name="evento_id" type="hidden" value="{{ $evento->id }}" />

                                </div>

                                <div class="col-md-6 mb-5">
                                    <br>
                                    <br>
                                    <div class="cat container-img my-30">
                                        <div id="map" style="height:300px; width: 300px;" class="form-control"></div>
                                    </div>
                                </div>
                                {{-- <div class="col-6">
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
                                    <input type="text" class="form-control" id="direccionLocalidad"
                                        name="direccionLocalidad">
                                    @error('direccionLocalidad')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <label for="recipient-name" class="col-form-label">Capacidad:</label>
                                    <input type="number" class="form-control" id="capacidadLocalidad"
                                        name="capacidadLocalidad">
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
                                </div> --}}
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
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -17.7847635,
                    lng: -63.1757515
                },
                center: {
                    lat: {{ -17.7847635 }},
                    lng: {{ -63.1757515 }}
                },
                zoom: 14,
                scrollwheel: true,
            });
            const uluru = {
                lat: -17.7847635,
                lng: -63.1757515
            };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker, 'position_changed',
                function() {
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#gps').val(lat + "," + lng)

                })
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
        /*      $('#addLocalidad').click(function() {
                  var localidad = $('select[id=localidad]').val();
                  if (localidad != null) {
                      var i = $("#tablaLocalidad tr").length - 1; //para contar las filas nuevas
                      markup = "<tr><td>" + i + "</td><td>" + localidad +
                          "</td><td>3</td><td>4</td></tr>" //para cear una fila con sus columnas requeridas
                      tableBody = $("table tbody"); //para obtener el elemento table su tbody
                      tableBody.append(
                      markup); //append para añadir toda una fila con los valores de la variable markup
                  }else{
                      alert("Debe seleccionar una localidad");
                  }
              });*/
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tablaLocalidades').DataTable({
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
