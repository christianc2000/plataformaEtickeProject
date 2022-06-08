@extends('adminlte::page')

@section('title', 'Configuración')

@section('content_header')
    <h1 class="text-center" style="align-items: center; font-size: 30px">Configuración</h1>
    <h1 class="text-center" style="align-items: center; font-size: 25px">{{ $evento->title }} -
        {{ $localidad->nombreInfraestructura }}</h1>
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
                    @if (count($le->sectorAreas) == 0)
                        <div class="contenedor-botones mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="boton seis" data-bs-toggle="modal" data-bs-target="#area"
                                style="max-height: 50px">
                                <span><i class="fa fa-duotone fa-pen-to-square mb-0" style="color: white"><label for=""
                                            style="font-size: 13px" class="mx-2">Area</label></i></span>
                                <svg>
                                    <rect x="0" y="0" fill="none" style="stroke: #72d4fa"></rect>
                                </svg>
                            </button>
                        </div>
                    @endif

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
                <form class="row" action="{{ route('admin.eventoLocalidadConfiguracion.store', $le) }}"
                    method="POST">
                    @csrf
                    <div class="col-lg-2">
                        <label for="" class="text-center font-bold">Fecha: </label>
                        <input type="date" id="fecha" name="fecha" class="form-control" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="" class="text-center font-bold">Hora Inicio: </label>
                        <input type="time" id="horaEvento" name="horaEvento" class="form-control" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="" class="text-center font-bold">Duración: </label>
                        <input type="time" id="duración" name="duración" class="form-control" required>
                    </div>
                    @if (count($le->sectorAreas) == 0)
                        <div class="col-lg-2">
                            <label for="" class="text-center font-bold">Area: </label>
                            <p class="form-control" style="background: rgb(225, 155, 155)">Sin Area</p>
                        </div>

                        <div class="col-lg-4  container-img mt-2">
                            <div class="form-control text-center"
                                style="background: #F7D716; height: 80px; align-items: center">
                                Debe crear las áreas que usará en el evento y esta localidad
                            </div>
                        </div>
                    @else
                        <div class="col-lg-2">
                            <label for="" class="text-center font-bold">Area: </label>
                            <p class="form-control" style="background: rgb(137, 245, 200)">Area por defecto</p>
                        </div>
                        <div class="col-lg-4  container-img">
                            <button type="submit" class="btn btn-primary form-control" style="height: 60px;">
                                <span>ADD</span>
                            </button>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="card-body" style="background: #ffffff">
            <table id="tablaConfigurar" class="table table-striped" style="width:100%;">
                <thead>
                    <tr style="height: 50px">
                        <th scope="col">FECHA</th>
                        <th scope="col">HORA INICIO</th>
                        <th scope="col">DURACIÓN</th>
                        <th scope="col">SECCIÓN</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fechas as $f)
                        <tr style="height: 40px">
                            <td scope="col">{{ $f->fecha }}</td>
                            <td scope="col">{{ $f->hora }}</td>
                            <td scope="col">{{ $f->duracion }}</td>
                            <td scope="col">sin sección</td>
                            <td scope="col">
                                <form
                                    action="{{ route('admin.eventoLocalidadConfiguracion.delete', compact('le', 'f')) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="" class="btn"
                                        style="background: #23345C; color: white; width: 90px; height: 36px;font-size: 12px">
                                        Sección
                                    </a>
                                    <a href="" class="btn" style="background: #1ECFD6;color: white; width: 90px">
                                        <i class="fa fa-duotone fa-pen-to-square" style="color: #0878A4"></i>
                                    </a>
                                    <a href="" class="btn" style="background: #EDD170;color: white; width: 90px">
                                        <i class="fa fa-duotone fa-eye" style="color: olive"></i></a>

                                    <button type="submit" class="btn"
                                        style="background: #C05640; color: white; width: 90px"><i
                                            class="fa fa-solid fa-square-minus"></i></button>
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
    {{-- modal Area --}}
    <div class="modal fade" id="area" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title " id="staticBackdropLabel">Areas -{{ $localidad->nombreInfraestructura }} -
                        {{ $evento->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="form" action="{{ route('admin.eventoLocalidadConfiguracion.storeArea', $le) }}" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="row" style="background: rgba(153, 180, 242, 0.133)">
                                <div class="col-lg-4">
                                    <label for="">Capacidad Local </label>
                                    <label for="" class="form-control"
                                        id="capacidadLugar">{{ $localidad->capacidadMaxima }}</label>
                                </div>
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <label for="">Sector</label>

                                    <select class="form-control" aria-label="Default select example" id="Sectores"
                                        name="sectores_id">
                                        <option value="" disabled selected>Seleccionar</option>
                                        @foreach ($sectores as $s)
                                            <option class="selectivo" value={{ $s->id }}
                                                id="[{{ $s->capacidadSector }}]" name="[{{ $s->id }}]">
                                                {{ $s->nombre }}
                                            </option>
                                        @endforeach
                                        @php
                                            $ids=$sectores->pluck('id');
                                            $capacidads=$sectores->pluck('capacidadSector');
                                        @endphp
                                        <option value=0 name={{$ids}} id={{$capacidads}}>Mostrar todo</option>
                                    </select>

                                </div>
                            </div>
                            @csrf
                            <input id="json" name="json" type="text" hidden value="">
                            <div id="contenido">
                                @foreach ($sectores as $s)
                                    <div id="{{ $s->id }}content" class="contentSectores" hidden>
                                        <div class="col-lg-12" style="border-top: 2px solid;color: gainsboro"></div>
                                        <label for="" style="text-transform:uppercase">{{ $s->nombre }}</label>
                                        <br>
                                        <label for="" style="font-size: 12px">Capacidad Máxima: </label>
                                        <label for="" class="form-control" id="capacidadSector{{ $s->id }}s"
                                            style="width: 200px; font-size: 12px"></label>

                                        <button id="{{ $s->id }}btn_add" class="form-control btn btn-success buton"
                                            type="button" style="width: 100px; color:white"><i class="fa fa-solid fa-plus"
                                                style="color: white"></i></button>
                                        <button id="{{ $s->id }}btn_del" class="btn btn-default" type="button"
                                            style="background: #D75B66; width: 100px; color:white"><i
                                                class="fa fa-solid fa-trash" style="color: white"></i></button>
                                        <button id="{{ $s->id }}btn_delall" class="form-control btn btn-default"
                                            type="button" style="background: #C05640; color:white; width: 120px"><i
                                                class="fa fa-solid fa-folder-minus" style="color:white"></i></button>
                                        <br>
                                        <table id="{{ $s->id }}tabla"
                                            class="table table-success table-striped table-hover mt-1" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50px">Nro</th>
                                                    <th style="width: 250px">Nombre</th>
                                                    <th style="width: 50px">Color</th>
                                                    <th style="width: 100px">Capacidad</th>
                                                    <th style="width: 100px">Precio</th>
                                                    <th style="width: 100px">Acción</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" id="btnGuardarSectores"
                            name="btnGuardarSectores">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal Sección Areas --}}
    <div class="modal fade" id="area" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title " id="staticBackdropLabel">Areas -{{ $localidad->nombreInfraestructura }} -
                        {{ $evento->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <label for="">Capacidad Máxima: </label>
                            <label for="" class="form-control" id="capacidadLugar"></label>
                        </div>
                        <div class="col-lg-4">
                            <label for="">Sector</label>

                            <select class="form-control" aria-label="Default select example" id="Sectores"
                                name="sectores_id">
                                <option value="" disabled selected>Seleccionar</option>
                                @foreach ($sectores as $s)
                                    <option class="selectivo" value={{ $s->id }}
                                        id="{{ $s->capacidadSector }}">{{ $s->nombre }}
                                    </option>
                                @endforeach
                                <option id="mostrarTodo" value=0>Mostrar todo</option>
                            </select>

                        </div>

                        <form id="form" action="{{ route('admin.eventoLocalidadConfiguracion.storeArea', $le) }}"
                            method="POST">
                            @csrf
                            <input id="json" name="json" type="text" hidden value="">
                            <div id="contenido">
                                @foreach ($sectores as $s)
                                    <div id="{{ $s->id }}content" class="contentSectores" hidden>
                                        <br>
                                        <label for="" style="text-transform:uppercase">{{ $s->nombre }}</label>
                                        <br>
                                        <button id="{{ $s->id }}btn_add" class="form-control btn btn-success buton"
                                            type="button" style="width: 100px; color:white"><i class="fa fa-solid fa-plus"
                                                style="color: white"></i></button>
                                        <button id="{{ $s->id }}btn_del" class="btn btn-default" type="button"
                                            style="background: #D75B66; width: 100px; color:white"><i
                                                class="fa fa-solid fa-trash" style="color: white"></i></button>
                                        <button id="{{ $s->id }}btn_delall" class="form-control btn btn-default"
                                            type="button" style="background: #C05640; color:white; width: 120px"><i
                                                class="fa fa-solid fa-folder-minus" style="color:white"></i></button>
                                        <br>
                                        <table id="{{ $s->id }}tabla" class="table table-striped table-hover mt-1"
                                            style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50px">Nro</th>
                                                    <th style="width: 100px">Nombre</th>
                                                    <th style="width: 50px">Color</th>
                                                    <th style="width: 150px">capacidad</th>
                                                    <th style="width: 80px">Precio</th>
                                                    <th style="width: 100px">Acción</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="btnGuardarSectores"
                        name="btnGuardarSectores">Guardar</button>

                </div>

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
            n = $('#Sectores option').length - 1;
            select = [];

            $("#Sectores").change(function() {
                vid = $("#Sectores :selected").val();

                if (select.length > 0) {
                    // oculta todas las tablas al momento de cambiar de option seleccionado            
                    while (0 < select.length) {
                        $("#" + select[select.length - 1]).prop('hidden', true);
                        select.pop();
                    }
                }
                if (vid > 0) {
                    //todo lo que tiene que ver con un sector y las areas creadas para ese sector
                    $("#" + vid + "content").prop('hidden', false);
                    select.push(vid + "content");
                } else {
                    //Muestra todas las tablas 
                    $('.selectivo').each(function() {
                        vid = $(this).val();
                        $("#" + vid + "content").prop('hidden', false); //quita el oculto del div
                        select.push(vid + "content");
                    });
                }
            });
            // capacidad del sector en label
            /*     $("#Sectores").change(function() {
                     cantidad = $(this).children(":selected").attr("id");
                     //alert(cantidad);

                     $('#capacidadLugar').text(cantidad);

                 });*/
            // capacidad del sector en label
            $("#Sectores").change(function() {
                capacidads = $(this).children(":selected").attr("id");
                capacidads=JSON.parse(capacidads);
                ids = $(this).children(":selected").attr("name");
                ids=JSON.parse(ids);
               for (let index = 0; index < capacidads.length; index++) {
                   $('#capacidadSector' + ids[index] + 's').text(capacidads[index]);
               }

                
            });
            //al momento de guardar el modal de areas
            $('#btnGuardarSectores').on('click', function() {
                let tabla = [];
                let contenido = [];
                contenido = [];
                $('.contentSectores').each(function() {
                    event.preventDefault();
                    var regex = /(\d+)/g;
                    idT = $(this).find('table').attr('id');
                    nroT = idT.match(regex);
                    $('#' + idT + ' tbody tr').each(function() {
                        Fila = $(this).attr('id');

                        nroF = Fila.match(regex);
                        const tab = {
                            nombre: $(this).find('input[id=' + nroF + 'nombre' + nroT +
                                ']').val(),
                            color: $(this).find('input[id=' + nroF + 'color' + nroT +
                                ']').val(),
                            capacidad: $(this).find('input[id=' + nroF + 'capacidad' +
                                nroT + ']').val(),
                            precio: $(this).find('input[id=' + nroF + 'precio' + nroT +
                                ']').val(),
                        }
                        contenido.push(tab);
                    });
                    let copia = contenido;
                    contenido = [];
                    const cont = {
                        id: nroT,
                        content: copia
                    }
                    tabla.push(cont);

                });
                jsn = JSON.stringify(tabla);
                $("#json").val(jsn);
            });
        });

        $(document).on('click', '.borrar', function(event) {
            event.preventDefault();
            //     nroFila=$(this).closest('tr').attr('id');
            idT = $(this).closest('tr').attr('name');
            // alert(idT);
            $(this).closest('tr').remove();
            reordenarF(idT);
        });
        //boton add para cada contenido, funcion que escucha cuando se le da click a un elemento con la clase .buton
        $(document).on('click', '.buton', function(event) {
            event.preventDefault();
            idDivContent = $(this).closest('div').attr('id');
            var regex = /(\d+)/g;
            vid = idDivContent.match(regex);
            nroFila = $('#' + vid + 'tabla tr').length;
            agregar(vid, nroFila);
        });

        function agregar(id, nroFila) {

            inputNombre = '<input id="' + nroFila + 'nombre' + id + '" class="form-control nro" type="text" required>';
            inputColor = '<input id="' + nroFila + 'color' + id + '" class="form-control nro" type="color" required>';
            inputCapacidad = '<input id="' + nroFila + 'capacidad' + id +
                '"  class="form-control nro" type="number" required>';
            inputPrecio = '<input id="' + nroFila + 'precio' + id + '" class="form-control nro" type="number" required>';
            btnEliminar = '<button class="btn btn-danger borrar" id="' + nroFila + 'btnEliminar' + id +
                '" name="buttonTabla">Eliminar</button>';
            var fila = '<tr id="' + nroFila + 'fila" name="' + id + 'tabla"><td>' + nroFila + '</td><td>' + inputNombre +
                '</td><td>' +
                inputColor + '</td><td>' + inputCapacidad + '</td><td>' +
                inputPrecio + '</td><td>' + btnEliminar + '</td></tr>';
            $('#' + id + 'tabla').append(fila);
        }

        function reordenarF(idT) {
            //var regex = /(\d+)/g;
            var num = 1;
            //  var nroF=nrofila.match(regex);
            // var id=idT.match(regex);
            $('#' + idT + ' tbody tr').each(function() {
                $(this).find('td').eq(0).text(num);
                num++;
            });
        }
    </script>

@stop
