@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Evento</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('admin.evento.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row g-2">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Título del evento" required>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
                                @error('Description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Categoria: </label>
                                <br>
                                <select class="form-control" aria-label="Default select example" id="category_id"
                                    name="category_id" required>
                                    <option value="" selected disabled>Seleccionar</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group px-2">
                                <div class="card" style="width: 18rem;">
                                    <label for="formFile" class="form-label text-center">Foto Principal</label>
                                    <div class="cat container-img" style="overflow: hidden">
                                        <img src="https://www.agroworldspain.com/img/noimage.png"
                                            class="img-responsive img-thumbnail" id="visualizar">
                                    </div>
                                    <div class="card-body">
                                        <label class="py-1" id="labelfoto" name="labelfoto">Imágen vacía</label>
                                        <input class="form-control" type="file" id="image" name="image[]" multiple
                                            accept="image/png,image/jpeg,image/jpg" required>
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-5">

                        </div>

                        <div class="col-7">
                            <a href="{{ route('admin.evento.index') }}" class="btn btn-danger mb-4">Cancelar</a>
                            <button class="btn btn-primary mb-4" type="submit">Localidad</button>
                            @csrf
                            @method('post')
                        </div>
                    </div>
                </div>

                <!--***************************************-->

            </form>
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 65%;
        }

        .image-wrapper img {
            position: absolute;
            object-file: cover;
            width: 100%;
            height: 135%;
        }

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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        document.getElementById('image').addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById('visualizar').setAttribute('src', event.target.result);

            };
            document.getElementById('labelfoto').innerHTML = "Imágen(es) cargada(s)";
            reader.readAsDataURL(file);
        }
        /*     $(document).ready(function() {
                         const $seleccionArchivos = $("input[id=image]");
                         alert($seleccionArchivos);
                             $imagenPrevisualizacion = $("#visualizar");
                         const primerArchivo = archivos[0];
             });*/
    </script>
@stop
