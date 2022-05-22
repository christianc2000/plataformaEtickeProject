@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar</h1>
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
                        <div class="col-lg-4">

                            <div class="card">
                                @php
                                    
                                    $im = $image->first();
                                    
                                @endphp
                                <img src="" class="card-img-top" style="height: 200px" alt="...">
                                <div class="card-body">
                                    <div class="container">
                                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach ($image as $img)
                                                    @if ($image->first() == $img)
                                                        <div class="carousel-item active">
                                                            <img src="" class="d-block w-100" alt="">
                                                        </div>
                                                    @else
                                                        <div class="carousel-item">
                                                            <img src="{{ asset($img->url) }}" class="d-block w-100"
                                                                alt="{{ $img->url }}">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <input class="form-control" type="file" id="image" name="image[]" multiple
                                            accept="image/*">
                                        <br>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-bs-whatever="@mdo">Abrir Galeria</button>
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
            <!--****************MODAL-INDEX***********************-->


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="títulomodal">Galeria</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                @foreach ($image as $img)
                                    <div class="col-lg-4 mb-4">

                                        <div class="text-center container-img">
                                            <img src="{{ asset($img->url) }}" class="mb-4 rounded zoom"
                                                style="height: 100px;" alt="...">
                                        </div>
                                        <div class="text-center mb-4">
                                            <form action="{{ route('admin.images.destroy', $img->id) }}" method="POST">

                                                @csrf
                                                <!--metodo para añadir token a un formulario-->
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
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
    <style>
        .carousel-inner img {
            width: 100%;
            max-height: 150px;
        }

        .carousel-inner {
            height: 150px;
        }

        .modal-body {
            height: 450px;
            width: 100%;
            overflow-y: auto;
        }

        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {
            transform: scale(2);
        }

        img {
            height: 100%;
            width: 100%;
            object-fit: contain;
        }

        .cat {
            height: 300px;
            width: 300px;
        }

        .button-container {
            display: inline-block;
            position: relative;
        }

        .button-container a {
            position: absolute;
            bottom: 4em;
            right: 4em;
            background-color: #8F0005;
            border-radius: 1.5em;
            color: white;
            text-transform: uppercase;
            padding: 1em 1.5em;
        }

        .button-container a:hover {
            background-color: red;
            cursor: pointer;
            color: white;
        }

        .container-img {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .caption-style-2 {
            list-style-type: none;
            margin: 0px;
            padding: 0px;
        }

        .caption-style-2 .caption {
            cursor: pointer;
            position: absolute;
            opacity: 0;
            top: 300px;
            -webkit-transition: all 0.15s ease-in-out;
            -moz-transition: all 0.15s ease-in-out;
            -o-transition: all 0.15s ease-in-out;
            -ms-transition: all 0.15s ease-in-out;
            transition: all 0.15s ease-in-out;
        }

        .caption-style-2 .blur {
            background-color: rgba(0, 0, 0, 0.7);
            height: 300px;
            width: 400px;
            z-index: 5;
            position: absolute;
        }

        .wrapperes {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
            grid-auto-rows: auto;
        }

    </style>

    <style>
        .checkeable input {
            display: none;
        }

        .checkeable img {
            width: 100px;
            border: 3px solid transparent;
        }

        .checkeable input {
            display: none;
        }

        .checkeable input:checked+img {
            border-color: #ff4460;

        }

    </style>
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- script para colocar modal --}}
    <script>
        const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            const modalTitle = exampleModal.querySelector('.modal-title')
            const modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = `Galeria`
            modalBodyInput.value = recipient
        })
    </script>
    <script>
       
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#boton01").click(function(event) {
                $("p").remove();
            });
            $("#boton02").click(function(event) {
                $("#boton02").remove();
            });
            $("#ModelbtEliminar").click(function() {
                $("#image1").remove();
            });
            $("#boton04").click(function(event) {
                $("p").remove(".borrame");
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    crossorigin="anonymous">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    crossorigin="anonymous">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </script>
@stop
