@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Evento</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('admin.evento.update', $evento) }}" method="POST" enctype="multipart/form-data">
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
                        <div class="col-md-4">


                            @if ($evento->image == null)
                                <div class="form-group px-2">
                                    <div class="card" style="width: 18rem;">
                                        <label for="picture" class="form-label text-center">Foto Principal</label>
                                        <div class="image-wrapper">
                                            <img id="picture" name="picture" src="https://www.agroworldspain.com/img/noimage.png">
                                        </div>
                                        <br>
                                        <div class="card-body">
                                            <label for="image" class="py-1" id="labelfoto" name="labelfoto">Sin imagen</label>
                                            <input class="form-control" type="file" id="image" name="image"
                                                accept="image/*">
                                            @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="form-group px-2">
                                    <div class="card" style="width: 18rem;">
                                        <label for="formFile" class="form-label text-center">Foto Principal</label>
                                        <div class="image-wrapper mb-3">
                                            <img id="picture" src="{{ asset($image->url) }}"
                                                class="img-responsive img-thumbnail">
                                        </div>
                                        <br>
                                        <div class="card-body">
                                            <label class="py-1" id="labelfoto" name="labelfoto">Imagen actual</label>
                                            <input class="form-control" type="file" id="image" name="image"
                                                accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            @endif

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

    </style>
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
        //cambiar imagen
        document.getElementById('image').addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById('picture').setAttribute('src', event.target.result);
            };
            document.getElementById('labelfoto').innerHTML = "Foto cargada";
            reader.readAsDataURL(file);
        }
    </script>
@stop
