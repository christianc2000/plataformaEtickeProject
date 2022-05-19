@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.evento.update', $evento->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
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
                        <div class="col-1"></div>
                        <div class="col-3">
                            <!-- Imagen Principal-->
                            @php
                                $img = $image->where('position_id', '=', 1)->first();
                                // $img = $image->first();
                            @endphp
                            <div class="card">
                                @if ($image != null)
                                    <div class="cat container-img" style="overflow: hidden">
                                        <div id="{{ $img->id }}">
                                            <img src="{{ asset($img->url) }}" alt="...">
                                        </div>
                                    </div>
                                @else
                                    <div class="cat container-img" style="overflow: hidden">
                                        <img src="https://www.agroworldspain.com/img/noimage.png" alt="...">
                                    </div>
                                @endif

                                <div class="card-body">
                                    <div class="container">

                                        <input class="form-control" type="file" id="image" name="image[]" multiple
                                            accept="image/*">
                                        <br>
                                        <button type="button" class="btn btn-primary form-control mb-4"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">Abrir Galeria</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-5">
                        </div>
                        <div class="col-7">
                            <a href="{{ route('admin.evento.index') }}" class="btn btn-danger mb-4">Cancelar</a>
                            <a href="#" class="btn btn-primary mb-4">Editar Localidad</a>
                            <button class="btn btn-success mb-4" type="submit">Guardar</button>
                        </div>

                    </div>
                </div>
            </form>
            {{-- MODAL --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Imágenes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Galeria de Imágenes
                            <div class="row">
                                @php
                                    $img = $image->where('position_id', '=', 1)->first();
                                @endphp
                                @foreach ($image as $i)
                                    @if ($i == $img)
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
                                                    id="modal{{ $i->id }}" name='imageModal' alt="">
                                            </div>
                                            <div class="text-center">
                                                <form action="{{ route('admin.images.update', $i->id) }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <button class="btn btn-success" type="submit">Imágen Principal</button>
                                                </form>
                                            </div>

                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="#" class="btn btn-success" id="guardarModal">Guardar</a>
                            <button type="button" class="btn btn-danger" id="eliminar">
                                eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#eliminar').on('click', function() {
                $('input[type=checkbox][name=modalC]:checked').each(function() {
                    // alert($(this).attr("value"));
                    var id = $(this).attr("value");
                    var idcheck = "modal" + $(this).attr("value");
                    //alert(idcheck);
                    $("div#" + idcheck).remove();
                    $("#" + id).remove();
                });
            });
        });
    </script>
@stop
