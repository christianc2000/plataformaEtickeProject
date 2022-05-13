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
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Título del evento" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Categoria: </label>
                                <select class="form-select" aria-label="Default select example" id="category_id"
                                    name="category_id" required>
                                    <option value="" selected disabled>Seleccionar</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <div class="image-wrapper">
                                    <img id="picture" src="https://www.agroworldspain.com/img/noimage.png">
                                </div>
                                <label class="py-1" id="labelfoto" name="labelfoto">FOTO VACÍA</label>
                                <input class="form-control" type="file" id="image" name="image" accept="image/*">
                            </div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            {{-- <div class="card">
                                <div class="car-body">
                                    <div class="form-group">
                                        <input type="file" name="image" id="image"  accept="image/*">
                                        @error('image')
                                               <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-6">

                        </div>
                        <div class="col-6">
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
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-file: cover;
            width: 65%;
            height: 100%;
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
                document.getElementById('picture').setAttribute('src', event.target.result);

            };
            document.getElementById('labelfoto').innerHTML = "Foto cargada";
            reader.readAsDataURL(file);
        }
    </script>
@stop
