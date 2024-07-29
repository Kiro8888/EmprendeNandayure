@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Crear emprendedor</h1>
@stop

@section('content')

    <form action="{{ route('admin.entrepreneurs.store') }}" method="POST">
        @csrf
        {{-- Primer campo --}}
        <div class="form-group">
            <label for="etp_name" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="etp_name" id="etp_name">
            @error('etp_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        {{-- Segundo campo --}}
        <div class="form-group">
            <label for="etp_last_name" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="etp_last_name" id="etp_last_name">
            @error('etp_last_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- Latitud --}}
        <div class="form-group">
            <label for="etp_latitude" class="form-label">Latitud</label>
            <input type="text" class="form-control" name="etp_latitude" id="etp_latitude" readonly>
            @error('etp_latitude')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- Longitud --}}
        <div class="form-group">
            <label for="etp_longitude" class="form-label">Longitud</label>
            <input type="text" class="form-control" name="etp_longitude" id="etp_longitude" readonly>
            @error('etp_longitude')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- Numero --}}
        <div class="form-group">
            <label for="etp_num" class="form-label">Numero</label>
            <input type="number" class="form-control" name="etp_num" id="etp_num">
            @error('etp_num')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- Correo --}}
        <div class="form-group">
            <label for="etp_email" class="form-label">Correo</label>
            <input type="email" class="form-control" name="etp_email" id="etp_email">
            @error('etp_email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        {{-- MAP --}}
        <div id="map" style="height: 400px; width: 100%;"></div>
        
        {{-- Botón para guardar la ubicación actual --}}
        <button type="button" id="saveLocation" class="btn btn-secondary mt-3">Guardar Ubicación Actual</button>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq4odCELAfcbtP63DImOG50Vczdt-P97c&callback=initMap"></script>
    <script>
        function initMap() {
            // Crear el mapa centrado en coordenadas por defecto
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 9.7489, lng: -83.7534 }, // Coordenadas por defecto (Costa Rica)
                zoom: 8
            });

            // Marcador inicial
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                map: map,
                draggable: true // Permite que el marcador sea arrastrable
            });

            // Añadir la capa KML del mapa de My Maps
            var ctaLayer = new google.maps.KmlLayer({
                url: 'EmprendeNandayure/public/test.kml', // Asegúrate de que esta URL sea accesible
                map: map
            });

            // Evento click para actualizar latitud y longitud al hacer clic en el mapa
            map.addListener('click', function(event) {
                var position = event.latLng;
                marker.setPosition(position);
                document.getElementById('etp_latitude').value = position.lat();
                document.getElementById('etp_longitude').value = position.lng();
            });

            // Evento dragend para actualizar latitud y longitud al mover el marcador
            marker.addListener('dragend', function() {
                var position = marker.getPosition();
                document.getElementById('etp_latitude').value = position.lat();
                document.getElementById('etp_longitude').value = position.lng();
            });

            // Botón para guardar la ubicación actual del marcador
            document.getElementById('saveLocation').addEventListener('click', function() {
                var position = marker.getPosition();
                document.getElementById('etp_latitude').value = position.lat();
                document.getElementById('etp_longitude').value = position.lng();
                alert("Ubicación guardada: " + position.lat() + ", " + position.lng());
            });
        }
    </script>
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
