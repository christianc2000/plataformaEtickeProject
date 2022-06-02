@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Evento: {{ $evento->title }}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('admin.evento.update', $evento) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="container">
                    <div class="row g-2">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title', $evento->title) }}" placeholder="Título del evento" required>
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
                                            {{ $c->id == $evento->category_id ? 'selected' : '' }}>{{ $c->name }}
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
                                <div class="card-body" style="max-height: 370px">
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
                                    <input class="form-control my-1" type="file" id="image" name="image[]" multiple
                                        accept="image/*">
                                    <input id="json" name="json" type="text" hidden value="">
                                    @if (count($image) > 0)
                                        <button type="button" class="btn btn-info form-control"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">Abrir Galeria</button>
                                    @else
                                        <button class="btn btn-danger form-control" type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" style="background:red">Galeria Vacía</button>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                        </div>
                        <div class="col-7">

                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <a href="{{ route('admin.evento.index') }}" class="form-control btn btn-danger mb-4">Cancelar</a>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <a href="{{ route('admin.evento.localidad.index', $evento) }}"
                            class="form-control btn btn-warning mb-4">Editar
                            Localidad</a>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <button class="form-control btn btn-primary mb-4" type="submit" name="guardar" id="guardar">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
        {{-- MODAL --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Imágenes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                            <input class="form-check-input" type="checkbox" id="modal{{ $img->id }}"
                                                name="modalC" value="{{ $img->id }}">
                                            <br>
                                        </div>
                                        <div class="cat container-img"
                                            style="overflow: hidden; border: 3px solid; color:gray">
                                            <img class="rounded zoom" src="{{ asset($img->url) }}"
                                                id="image{{ $img->id }}" name='imageModal' alt="">
                                        </div>
                                        <div class="text-center">
                                            <form action="{{ route('admin.images.update', $img->id) }}" method="POST">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <a href="#" class="btn btn-success" id="guardarModal">Guardar</a> --}}
                        <button type="button" class="btn btn-danger" id="eliminar">eliminar</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .modal-body {
            height: 450px;
            width: 100%;
            overflow-y: auto;
        }

        .card-body {
            height: 410px;
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
    <script type="text/javascript">
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
