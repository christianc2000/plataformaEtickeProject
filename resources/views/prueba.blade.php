<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#btnDelete').on('click', function() {
                $('input[type=checkbox]:checked').each(function() {
                    var idcheck = $(this).attr("value");
                    $("div#" + idcheck).remove();
                });
            });
            $('#eliminar').on('click', function() {
                $('input[type=checkbox][name=modalC]:checked').each(function() {
                    //  alert($(this).attr("value"));
                    var id=$(this).attr("value");
                    var idcheck = "modal" + $(this).attr("value");
                    //alert(idcheck);
                    $("div#" + idcheck).remove();
                    $("#"+id).remove();
                });
            });

            $('#guardarModal').on('click', function() {
                
            });
        });
    </script>
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

    </style>
</head>

<body>

    <div class="card">
        <div class="card">
            @php
                $perfil = $img->where('position_id', '=', 1)->first();
            @endphp
            @if ($perfil != null)
                <div class="container-img">
                    <img src="{{ asset($perfil->url) }}" id="{{$perfil->id}}" style="height: 200px" alt="">
                </div>
            @else
                <div class="container-img">
                    <img src="https://www.agroworldspain.com/img/noimage.png" alt="">
                </div>
            @endif

        </div>
        <input class="form-control" type="file" id="image[]" name="image[]" multiple accept="image/*">
        <br>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Abrir
            Galeria
        </button>
        <button type="button" id="btnDelete" class="btn btn-danger">Eliminar</button>
        <div class="px-4">
            Texto Principal
            <p>primer linea</p>
            <p>segunda linea</p>
        </div>
        <div class="row">
            @foreach ($img as $i)
                <div class="col-lg-3 mb-4" id="{{ $i->id }}">
                    <input class="form-check-input" type="checkbox" value="{{ $i->id }}" id="check[]"
                        name="check[]">
                    <img class="mb-4 rounded" style="height: 100px;" src="{{ asset($i->url) }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
    {{--MODAL--}}
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

                        @foreach ($img as $i)
                            @if ($i->position_id == 1)
                                <div class="col-lg-4 mb-4" id="modal{{ $i->id }}">
                                    <input class="form-check-input" type="checkbox" id="modal{{ $i->id }}"
                                        name="modalC" value="{{ $i->id }}">
                                    <br>
                                    <div class="container-img" style="border: 10px solid; color: orange;">
                                        <img class="mb-4 rounded zoom" style="height: 100px"
                                            src="{{ asset($i->url) }}" id="modal{{ $i->id }}" name='imageModal'
                                            alt="">
                                    </div>
                                    <div class="text-center">
                                        <form action="{{ route('admin.images.update', $i->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-success" type="submit">Perfil</button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-4 mb-4" id="modal{{ $i->id }}">
                                    <input class="form-check-input" type="checkbox" id="modal{{ $i->id }}"
                                        name="modalC" value="{{ $i->id }}">
                                    <br>
                                    <div class="container-img">
                                        <img class="mb-4 rounded zoom" style="height: 100px"
                                            src="{{ asset($i->url) }}" id="modal{{ $i->id }}"
                                            name='imageModal' alt="">
                                    </div>
                                    <div class="text-center">
                                        <form action="{{ route('admin.images.update', $i->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-success" type="submit">Perfil</button>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
