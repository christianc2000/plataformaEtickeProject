@extends('adminlte::page')

@section('title', 'Espacio Fecha')

@section('content_header')

@stop

@section('content')
    <div class="card">
        <div class="card-header" style="background: rgba(153, 180, 242, 0.133)">

            <label class="text-left" style="font-size: 18px; width: 90px">Evento: </label> <label
                class="font-weight-normal " style="font-size: 18px">{{ $le->evento->title }}</label>
            <br>
            <label class=" text-left" style="font-size: 18px; width: 90px">Localidad: </label> <label
                class="font-weight-normal " style="font-size: 18px">{{ $le->localidad->nombreInfraestructura }}</label>
            <br>
            <label class="text-left" style="font-size: 18px; width: 90px">Fecha: </label> <label
                class="font-weight-normal " style="font-size: 18px">{{ date('d-m-Y', strtotime($f->fecha)) }}</label>
            <br>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="row">
                    <div class="col-lg-4">
                        <label for="">Capacidad Áreas</label>
                        <label for="" class="form-control" id="capacidadAreas"></label>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <label for="">Sector</label>

                        <select class="form-control" aria-label="Default select example" id="Sectores" name="sectores_id">
                            <option value="" disabled selected>Seleccionar</option>
                            @foreach ($sectorAreas as $s)
                                <option class="selectivo" value={{ $s->area->id }} id={{ $s->area->capacidad }}
                                    name="[{{ $s->area->id }}]">
                                    {{ $s->area->nombre }}
                                </option>
                            @endforeach
                        
                            <option value=0>Mostrar todo
                            </option>
                        </select>

                    </div>
                </div>

                <input id="json" name="json" type="text" hidden value="">
                <div id="contenido">
                    @foreach ($sectorAreas as $s)
                        <div id="{{ $s->id }}content" class="contentSectores" hidden>
                            <div class="col-lg-12" style="border-top: 2px solid;color: gainsboro"></div>
                            <label for="" style="text-transform:uppercase">{{ $s->area->nombre }}</label>
                            <br>
                            <label for="" style="font-size: 12px">Capacidad Máxima: </label>
                            <label for="" class="form-control" id="capacidadSector{{ $s->id }}s"
                                style="width: 200px; font-size: 12px"></label>

                            <button id="{{ $s->id }}btn_add" class="form-control btn btn-success buton"
                                type="button" style="width: 100px; color:white"><i class="fa fa-solid fa-plus"
                                    style="color: white"></i></button>
                            <button id="{{ $s->id }}btn_del" class="btn btn-default" type="button"
                                style="background: #D75B66; width: 100px; color:white"><i class="fa fa-solid fa-trash"
                                    style="color: white"></i></button>
                            <button id="{{ $s->id }}btn_delall" class="form-control btn btn-default" type="button"
                                style="background: #C05640; color:white; width: 120px"><i
                                    class="fa fa-solid fa-folder-minus" style="color:white"></i></button>
                            <br>
                            <table id="{{ $s->id }}tabla" class="table table-success table-striped table-hover mt-1"
                                style="width: 100%">
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
        <div class="card-footer">
          <a href="{{route('admin.eventoLocalidadConfiguracion.index',compact('le'))}}" type="button" class="btn" style="background: #000D29; color:white">volver</a>
          <button type="button" class="btn btn-danger">cancelar</button>
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
            let array = [];
            $('.selectivo').each(function() {
                capacidad=$(this).attr('id');
                array.push(capacidad);
            });
            $('#capacidadAreas').text(suma(array));
        });

        function suma(array) {
            s = 0;
            for (let index = 0; index < array.length; index++) {
                s = s + parseInt(array[index]);
            }
            return s;
        }
    </script>
@stop
