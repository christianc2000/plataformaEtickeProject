@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Evento</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('admin.evento.store') }}" method="POST">
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
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Imágen Principal</label>
                            <div class="card" style="width: 18rem;">
                                <img src="https://e00-us-marca.uecdn.es/assets/multimedia/imagenes/2022/05/04/16516924664132.jpg"
                                    class="card-img-top" alt="..." width="50" height="150" id="image" name=image>
                                <div class="card-body">
                                    <h5 class="card-title">Lista de imagenes</h5>

                                    <input type="file" class="form-control" id="imagen">
                                </div>
                            </div>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
