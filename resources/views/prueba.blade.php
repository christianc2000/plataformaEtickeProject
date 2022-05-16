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
            $("#btnDelete").click(function() {
                $("#div1").remove();
            });

        });
    </script>
</head>

<body>

    @csrf
    @method('put')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Abrir
        Galeria
    </button>
    <button type="button" id="btnDelete" class="btn btn-danger">Eliminar</button>
    <div id="div1">
        Texto Principal
        <p>primer linea</p>
        <p>segunda linea</p>
    </div>
    <div class="row">
        @foreach ($img as $i)
            <div class="col-lg-4 mb-4" id="img1">
                <input class="form-check-input" type="checkbox" value="{{ $i->id }}" id="check">
                <img class="w-100 mb-4 rounded" src="{{ asset($i->url) }}" alt="">
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    bienvenidos al modal
                    <div class="row">
                        <label class="col-lg-4 mb-4">

                            @foreach ($img as $i)
                                <input class="form-check-input" type="checkbox" value="" id="1">
                                <img class="w-100 mb-4 rounded" src="{{ asset($i->url) }}" alt="">
                            @endforeach


                            <input class="form-check-input" type="checkbox" value="" id="1">
                            <img class="w-100 mb-4 rounded"
                                src="https://blog.foto24.com/wp-content/uploads/2019/02/6-fotografia-de-Alejandro-Rodriguez-683x1024.jpg"
                                alt="">
						</label>
                        <div class="col-lg-4 mb-4" id="img1">
                            <input class="form-check-input" type="checkbox" value="" id="1">
                            <img class="w-100 mb-4 rounded"
                                src="https://images.pexels.com/photos/1679772/pexels-photo-1679772.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=400"
                                alt="">
                            <input class="form-check-input" type="checkbox" value="" id="1">
                            <img class="w-100 mb-4 rounded"
                                src="https://i0.wp.com/codigoespagueti.com/wp-content/uploads/2022/04/Dragon-Ball-Donde-estaria-la-casa-de-Goku-en-la-vida-real.jpg?fit=1280%2C720&quality=80&ssl=1"
                                alt="">
                        </div>
                        <div class="col-lg-4 mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="1">
                            <img class="w-100 mb-4 rounded"
                                src="https://cloudfront-us-east-1.images.arcpublishing.com/elcomercio/BXIEH5QRR5EITLKJ2DIBN522DU.jpg"
                                alt="">
                            <input class="form-check-input" type="checkbox" value="" id="1">
                            <img class="w-100 mb-4 rounded"
                                src="https://thumbs.dreamstime.com/b/edificios-verticales-de-casas-con-cielo-y-%C3%A1rbol-azules-en-el-medio-169235124.jpg"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Usar de Perfil</button>
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
