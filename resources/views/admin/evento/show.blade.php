@extends('adminlte::page')

@section('title', 'Dashboard-Evento')

@section('content_header')
    <h1>Mostrar Evento</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="text-center">
                <label for="" class="transformacion1">{{ $evento->title }}</label>
            </div>
        </div>
        <div class="card-body">
            <div>
                <label for="" class="font-semibold">Imágenes</label>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="max-width: 100%; height: 200px">

                    @foreach ($images as $img)
                        @if ($images->first() == $img)
                            <div class="carousel-item active">
                                <div class="text-center container-img" style="background-color: gray">
                                    <img src="{{ asset($img->url) }}" class="d-block zoom" style="height:200px;"
                                        alt="{{ $img->url }}">
                                </div>
                            </div>
                        @else
                            <div class="carousel-item">
                                <div class="text-center container-img" style="background-color: gray">
                                    <img src="{{ asset($img->url) }}" class="d-block zoom" style="height:200px;"
                                        alt="{{ $img->url }}">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <br>
            <div class="row">
                <div class="col-1 font-bold text-center">*</div>
                <label for="" class="col-2 font-bold">Título: </label>
                <p class="col-9 transformacion1">{{ $evento->title }}</p>

                @php
                    $cat = $evento->category;
                @endphp
                <div class="col-1 font-bold text-center">*</div>
                <label for="" class="col-2 font-bold">Categoría: </label>
                <p class="col-9 transformacion1">{{ $cat->name }}</p>
                <div class="col-1 font-bold text-center">*</div>
                <label for="" class="col-2 font-bold">Descripción: </label>
                <p class="col-9 transformacion1">{{ $evento->description }}</p>
                <div class="col-1 font-bold text-center">*</div>
                <label for="" class="col-2 font-bold">Lugar: </label>
                <p class="col-9 transformacion1">Tahuichi Aguilera</p>
            </div>
        </div>
        <div class="card-footer">
              <a href="{{route('admin.evento.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@stop

@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <style type="text/css">
        .transformacion1 {
            text-transform: capitalize;
        }

        .transformacion2 {
            text-transform: uppercase;
        }

        .transformacion3 {
            text-transform: lowercase;
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
    <script>
        console.log('Hi!');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
@stop
