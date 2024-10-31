@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Crear emprendimiento</h1>
@stop

@section('content')

<form action="{{ route('admin.entrepreneurships.store') }}" method="POST" enctype="multipart/form-data">
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
        <label for="etp_latitude" class="form-label">Latitud</label>
        <input type="text" class="form-control" name="etp_latitude" id="etp_latitude" readonly>
        @error('etp_latitude')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>          
    {{-- Cuarto campo --}}
    <div class="form-group">
        <label for="etp_longitude" class="form-label">Longitud</label>
        <input type="text" class="form-control" name="etp_longitude" id="etp_longitude" readonly>
        @error('etp_longitude')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    {{-- Quinto campo --}}
    <div class="form-group">
        <label for="etp_num" class="form-label">Numero</label>
        <input type="number" class="form-control" name="etp_num" id="etp_num">
        @error('etp_num')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    {{-- Setimo campo --}}
    <div class="form-group">
        <label for="etp_email" class="form-label">Correo</label>
        <input type="email" class="form-control" name="etp_email" id="etp_email">
        @error('etp_email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    {{-- Campo para imagen --}}
    <div class="form-group">
        <label for="etp_img" class="form-label">Imagen</label>
        <input type="file" class="form-control" name="etp_img" id="etp_img">
        @error('etp_img')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    {{-- MAP --}}
    <div id="map" style="height: 400px; width: 100%;"></div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- Cargar la API de Google Maps con tu clave --}}
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJgtyUKa--FH9PWRW9ptMzz8-ofLvJgr0&callback=initMap"></script>
    <script>
        function initMap() {
            // Crear el mapa centrado en las coordenadas iniciales (Costa Rica)
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 9.7489, lng: -83.7534 },
                zoom: 8
            });

            // Crear un marcador arrastrable en el centro inicial
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                map: map,
                draggable: true
            });

            // Función para obtener y centrar en la ubicación actual del usuario
            function setLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var lat = position.coords.latitude;
                        var lng = position.coords.longitude;

                        // Centrar el mapa y mover el marcador a la ubicación actual
                        map.setCenter({ lat: lat, lng: lng });
                        map.setZoom(15);
                        marker.setPosition({ lat: lat, lng: lng });

                        // Actualizar los campos de latitud y longitud en el formulario
                        document.getElementById('etp_latitude').value = lat;
                        document.getElementById('etp_longitude').value = lng;
                    }, function(error) {
                        console.error('Error al obtener la ubicación: ' + error.message);
                        alert('No se pudo obtener la ubicación actual.');
                    });
                } else {
                    console.error('Geolocation no está soportado por este navegador.');
                    alert('Geolocation no está soportado por este navegador.');
                }
            }

            // Añadir un botón personalizado para la ubicación actual
            var controlDiv = document.createElement('div');
            controlDiv.style.margin = '10px';
            var controlUI = document.createElement('button');
            controlUI.textContent = 'Ubicación actual';
            controlUI.className = 'btn btn-secondary';
            controlUI.style.padding = '8px';
            controlUI.addEventListener('click', setLocation);
            controlDiv.appendChild(controlUI);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(controlDiv);

            // Evento para actualizar latitud y longitud al arrastrar el marcador
            marker.addListener('dragend', function() {
                var position = marker.getPosition();
                document.getElementById('etp_latitude').value = position.lat();
                document.getElementById('etp_longitude').value = position.lng();
            });

            // Evento para actualizar latitud y longitud al hacer clic en el mapa
            map.addListener('click', function(event) {
                var position = event.latLng;
                marker.setPosition(position);
                document.getElementById('etp_latitude').value = position.lat();
                document.getElementById('etp_longitude').value = position.lng();
            });
        }
    </script>
@stop
