@extends('adminlte::page')

@section('title', 'Localidades')

@section('content_header')
    <h1>Nueva Localidad</h1>
@stop

@section('content')
    <x-adminlte-card theme="blue" theme-mode="outline">
        {{-- Setup data for datatables --}}
        <form method="POST" action="{{ route('admin.localidad.store') }}">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <x-adminlte-input name="name" label="Nombre" />
                    <x-adminlte-input name="gps" label="Ubicacion Geografica" id="gps" />
                    <x-adminlte-input name="direction" label="Direccion" />
                    <x-adminlte-input name="phones" label="Telefonos" />
                    <x-adminlte-input name="capacidad" label="Capacidad" />
                    <x-adminlte-input name="evento_id" type="hidden" value="{{ $evento_id }}" />

                </div>

                <div class="col-md-6">
                    <div id="map" style="height:400px; width: 800px;" class="my-3"></div>
                </div>

            </div>
            <div class="col-7">
                <a href="{{ route('admin.evento_localidad', $evento_id) }}" class="btn btn-danger mb-4">Cancelar</a>
                <button class="btn btn-primary mb-4" type="submit">Guardar</button>
            </div>

        </form>
    </x-adminlte-card>
@stop





@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -17.7847635,
                    lng: -63.1757515
                },
                center: {
                    lat: {{ -17.7847635 }},
                    lng: {{ -63.1757515 }}
                },
                zoom: 14,
                scrollwheel: true,
            });
            const uluru = {
                lat: -17.7847635,
                lng: -63.1757515
            };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker, 'position_changed',
                function() {
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#gps').val(lat + "," + lng)

                })
            google.maps.event.addListener(map, 'click',
                function(event) {
                    pos = event.latLng
                    marker.setPosition(pos)
                })
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl8DaopxOLYwyY0gJV2fUky4_X99ZFwJY&callback=initMap" async
        defer></script>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
