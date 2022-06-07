@extends('adminlte::page')

@section('title', 'Localidad')

@section('content_header')
    <h1>Localidad - {{ $evento->title }}</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header text-center">
            <form action="{{ route('admin.evento.localidadEvento.store', $evento) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <select name="localidad" id="localidad" class="form-select">

                            <option value="" selected disabled style="background: gray">Seleccionar Localidad</option>
                            @foreach ($localidades as $l)
                                <option value="{{ $l->nombreInfraestructura }}">{{ $l->nombreInfraestructura }}
                                </option>
                            @endforeach
                            @error('localidad')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </select>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" id="addLocalidad" class="form-control btn btn-primary">Añadir Localidad</a>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" class="form-control btn btn-success" data-bs-toggle="modal" id="btnCrear"
                            data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Crear
                            Localidad</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            @php
                
            @endphp
            <table id="tablaLocalidades" class="table table-striped shadow-lg mt-4" style="width:100%">
                <thead>
                    <tr style="height: 30px">
                        <th style="width: 150px;
                        word-wrap: break-word;">FECHA CREACIÓN</th>
                        <th style="width: 300px;
                        word-wrap: break-word;">LOCALIDAD</th>
                        <th style="width: 100px;
                        word-wrap: break-word;">ESTADO</th>
                        <th style="width: 300px;
                            word-wrap: break-word;">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locE as $le)
                        <tr>
                            @php
                                $localidad = $localidades->find($le->localidad_id);
                            @endphp
                            <td>{{ $le->created_at }}</td>
                            <td>{{ $localidad->nombreInfraestructura }}</td>


                            @if (count($le->fechas) == 0)
                                <td class="mb-2">
                                    <label for="" class="text-center" style="background: lightcoral; width: 100px">Sin horario</label>
                                </td>
                            @else
                                <td class="mb-2">
                                    <label for="" class="text-center" style="background: greenyellow; width: 100px">
                                        Con horario</label>
                                </td>
                            @endif

                            <td>
                                <div class="row">
                                    <form action="{{ route('admin.evento.localidadEvento.delete', $le) }}" method="POST">
                                     {{--configurar--}}   <a href="{{ route('admin.eventoLocalidadConfiguracion.index', $le) }}"
                                            class="btn btn-warning" style="width: 100px"><i
                                                class="fa fa-solid fa-gears"></i></a>
                                    {{--ver--}}  <a href="#" class="btn btn-info" style="width: 100px"><i
                                                class="fa fa-thin fa-eye"></i></a>
                                        @csrf
                                        @method('delete')
                                    {{--eliminar--}}    <button type="submit" class="btn btn-danger" style="width: 100px"><i
                                                class="fa fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-4">
                    <a href="{{ route('admin.evento.index') }}" class="form-control btn btn-danger">Salir</a>
                </div>

            </div>
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
                                    <x-adminlte-input name="name" label="*Nombre" required />
                                    <x-adminlte-input name="gps" label="*Ubicacion Geografica" id="gps"
                                        onmousedown="return false;" onkeypress="return false;" required />
                                    <x-adminlte-input name="direction" label="*Direccion" required />
                                    <label class="">*Telefono 1</label>
                                    <input name="phones1" type="number" id="phones1" class="form-control" required>
                                    @error('phones1')
                                        <small class="text-danger font-bold"
                                            style="font-weight: bold;">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label class="">Telefono 2</label>
                                    <input name="phones2" type="number" id="phones2" class="form-control">
                                    @error('phones2')
                                        <small class="text-danger font-semibold"
                                            style="font-weight: bold;">{{ $message }}</small>
                                    @enderror
                                    <br>

                                    <div class="container" style="background: #f5f5f5">
                                        <label>*Capacidad Total</label>
                                        <input name="capacidad" id="capacidad" class="form-control"
                                            onmousedown="return false;" onkeypress="return false;" required>
                                        <label for="" class="">Sectores</label>
                                        <br>
                                        <button id="btn_add" class="form-control btn btn-success" type="button"
                                            style="width: 100px; color:white"><i class="fa fa-solid fa-plus"
                                                style="color: white"></i></button>
                                        <button id="btn_del" class="btn btn-default" type="button"
                                            style="background: #D75B66; width: 100px; color:white"><i
                                                class="fa fa-solid fa-trash" style="color: white"></i></button>
                                        <button id="btn_delall" class="form-control btn btn-default" type="button"
                                            style="background: #C05640; color:white; width: 120px"><i
                                                class="fa fa-solid fa-folder-minus" style="color:white"></i></button>
                                        <br>
                                        <table id="tabla" class="table table-hover mt-1">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50px">nro</th>
                                                    <th style="width: 250px">Sector</th>
                                                    <th style="width: 100px">Color</th>
                                                    <th style="width: 150px">Capacidad</th>
                                                    <th style="width: 50px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-5">
                                    <div class="cat container-img"
                                        style="height: 410px;width: 370px; overflow: hidden; border: 3px solid; color: darkgrey">
                                        <div id="map" style="height:410px; width: 370px;" class="form-control rounded">
                                        </div>
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
    </div>
@stop

@section('css')

    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        .modal-body {
            height: 470px;
            width: 100%;
            overflow-y: auto;
        }

        .card-body {
            height: 400px;
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

        select {
            color: blue;
        }

        option {
            color: black;
            background-color: lightblue;
        }

        #content {
            position: absolute;
            min-height: 50%;
            width: 80%;
            top: 20%;
            left: 5%;
        }

        .selected {
            cursor: pointer;
        }

        .selected:hover {
            background-color: #0585C0;
            color: white;
        }

        .seleccionada {
            background-color: #0585C0;
            color: white;
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

            $('#btn_add').click(function() {
                agregar();
                sumar();
            });
            $('#btn_del').click(function() {

                eliminar(id_fila_selected);
                if ($(".monto").val() != null) {
                    sumar();
                } else {
                    $('#capacidad').val("");
                }
            });
            $('#btn_delall').click(function() {
                eliminarTodasFilas();
                $('#capacidad').val("");
            });
            $('#capacidads').on('change', function() {
                alert(this.value);
            });

        });

        var cont = 0;
        var id_fila_selected = [];


        function sumar() {
            var total = 0;
            $(".monto").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                    total += 0;
                } else {
                    total += parseFloat($(this).val());
                }
            });
            //console.log(total);
            $("#capacidad").val(total);
        }

        function agregar() {
            cont++;

            var fila = '<tr class="selected" id="fila' + cont + '" onclick="seleccionar(this.id);"><td>' +
                cont +
                '</td><td><input type="text" id="sectors" name="sectors[]" class="form-control" required></td><td><input name="colors[]" id="color" type="color" class="form-control" /></td><td><input type="number" id="capacidads" name="capacidads[]" class="form-control monto" min=0 value=0 onchange="sumar()" required></td><td></td></tr>';
            $('#tabla').append(fila);
            reordenar();
        }

        function removerArray(id_fila) {
            var myIndex = id_fila_selected.indexOf(id_fila);
            if (myIndex !== -1) {
                id_fila_selected.splice(myIndex, 1);
            }

        }

        function seleccionar(id_fila) {

            if ($('#' + id_fila).hasClass('seleccionada')) {


                removerArray(id_fila);
                $('#' + id_fila).removeClass('seleccionada');

            } else {
                $('#' + id_fila).addClass('seleccionada');
                id_fila_selected.push(id_fila);

            }

            //2702id_fila_selected=id_fila;


        }

        function eliminar(id_fila) {
            /*$('#'+id_fila).remove();
            reordenar();*/
            for (var i = 0; i < id_fila.length; i++) {
                $('#' + id_fila[i]).remove();

            }

            reordenar();
        }

        function reordenar() {
            var num = 1;
            $('#tabla tbody tr').each(function() {
                $(this).find('td').eq(0).text(num);
                num++;
            });
        }

        function eliminarTodasFilas() {
            $('#tabla tbody tr').each(function() {
                $(this).remove();
            });
        }
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
