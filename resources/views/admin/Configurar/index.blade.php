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
                <div class="col-lg-2">
                    <div class="container-img">
                        <!-- Button trigger modal -->
                        <button type="button" class="form-control btn btn-dark container-img" style="height: 50px;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Editar Evento
                        </button>
                        
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="container-img">
                        <button type="button" class="form-control btn btn-info container-img" style="height: 50px;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Editar Localidad
                        </button>
                    </div>
                </div>
                <div class="col-lg-6"></div>

                <div class="col-lg-1">
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
                        <button type="submit" class="form-control btn btn-primary container-img"
                            style="height: 70px;">Add-Horario</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table id="tabla" class="table table-striped shadow-lg " style="width:100%">
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
                    <h5 class="container-img modal-title font-bold" id="exampleModalLabel">Editar - {{ $evento->title }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form action="{{route('admin.evento.update',$evento)}}" method="POST" enctype="multipart/form-data">
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
                                    
                                    // $img = $image->first();
                                    
                                @endphp

                                <div class="col-lg-4 mb-4">
                                    <div class="card">
                                        <div class="card-body" style="height: 380px">
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
                                            <input class="form-control my-2" type="file" id="image" name="image[]" multiple
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
                                                    data-toggle="modal" data-bs-target="#test2">Galeria Vacía</button>
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
                {{-- MODAL 2 --}}
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
                                                    <!--Muestra todas las demás imágnes-->
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
