@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Evento</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('admin.evento.update', $evento->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="container">
                    <div class="row g-2">
                        <div class="col-6">
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
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" id="description" name="description"
                                    required>{{ $evento->description }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Categoria: </label>
                                <select class="form-select" aria-label="Default select example" id="category"
                                    name="category" required>
                                    <option value="" selected disabled>Seleccionar</option>
                                    @foreach ($categories as $c)
                                        <option value="{{ $c }}"
                                            {{ $c->id == $evento->category_id ? 'selected' : '' }}>{{ $c->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="">Imágen Principal</label>
                            <div class="card" style="width: 18rem;">
                                <img src="https://e00-us-marca.uecdn.es/assets/multimedia/imagenes/2022/05/04/16516924664132.jpg"
                                    class="card-img-top" alt="..." width="50" height="150">
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
