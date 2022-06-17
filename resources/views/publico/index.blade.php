<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    {{-- js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <title>Flexbox vs CSS Grid</title>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg" style="background: #003D73">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"
                style="color: white; font-size: 35px; font-family: arial;font-weight: bold;">E-Ticket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto " id="navbarSupportedContent">

                <form class="d-flex navbar-nav ms-auto mb-2 mb-lg-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn" type="submit" style="background: gray"><i
                            class="fa fa-solid fa-magnifying-glass"></i></button>
                </form>
                
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="" style="color:white">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="" style="color:white">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- carousel --}}
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" style="max-width: 100%; height: 250px">

            @foreach ($fechas as $f)
                @php
                    $le = $f->localidadEvento;
                    $ev = $le->evento;
                    $imag = $ev->image->where('position_id', '=', 1)->first();
                @endphp
                @if ($fechas->first() == $f)
                    <div class="carousel-item active">
                        <div class="text-center container-img" style="background-color: rgb(203, 203, 203)">
                            <img src="{{ asset($imag->url) }}" class="d-block zoom" style="height:auto; width:50%;"
                                alt="{{ $imag->url }}">
                        </div>
                    </div>
                @else
                    <div class="carousel-item">
                        <div class="text-center container-img" style="background-color: rgb(203, 203, 203)">
                            <img src="{{ asset($imag->url) }}" class="d-block zoom" style="height:auto; width:50%;"
                                alt="{{ $imag->url }}">
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
    {{-- Contenido --}}

    <div class="container">
        @foreach ($fechas as $f)
            @php
                $le = $f->localidadEvento;
                $ev = $le->evento;
                $localid=$le->localidad->nombreInfraestructura;
                $imag = $ev->image->where('position_id', '=', 1)->first();
            @endphp
            <div class="card">
                <div class="card-img" style="background: #000;height: 170px">
                    
                        <img src="{{ asset($imag->url) }}" style="width: auto;height: 100%; align-items: center">
                   
                </div>
                <div class="card-body" style="max-height: 110px;">
                    <a href="{{route('principal.horario.index',compact('le','f'))}}"><h5 style="color: #313E6C; text-transform: uppercase">{{ $ev->title }}</h5></a>
                    
                        <p style="font-size: 10px;">  <a href="#" style="color:#A7A5A5;"><span><i class="fa fa-solid fa-location-dot" style="color:#313E6C; margin-right: 10px"></i></span>{{$localid}}</a></p> 
                

                </div>
                <div class="card-footer" style="width: 100%;height: 100%; background: #D3E1E2">
                   {{$f->fecha}}
                </div>
            </div>
        @endforeach
<br>



    </div>
</body>

</html>
