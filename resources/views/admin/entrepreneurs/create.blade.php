@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Crear emprendedor</h1>
@stop

@section('content')

            <form action="{{route('admin.entrepreneurs.store')}}" method="POST">
                @csrf
                {{-- Primer campo --}}
                <div class="form-group">
                    <label for="etp_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="etp_name" id="etp_name">
                    @error('etp_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                  {{-- Segundo campo --}}
                <div class="form-group">
                    <label for="etp_last_name" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="etp_last_name" id="etp_last_name">
                    @error('etp_last_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Tercer campo --}}
                 {{-- <div class="form-group">
                    <label for="etp_latitude" class="form-label">Latitud</label>
                    <input type="number" class="form-control" name="etp_latitude" id="etp_latitude">
                    @error('etp_latitude')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div> --}}

                <div class="form-group">
                    <label for="etp_latitude" class="form-label">Latitud</label>
                    <input type="text" class="form-control" name="etp_latitude" id="etp_latitude" readonly>
                    @error('etp_latitude')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                
                {{-- Cuarto campo --}}
                {{-- <div class="form-group">
                    <label for="etp_longitude" class="form-label">Longitud</label>
                    <input type="number" class="form-control" name="etp_longitude" id="etp_longitude">
                    @error('etp_longitude')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div> --}}

                <div class="form-group">
                    <label for="etp_longitude" class="form-label">Longitud</label>
                    <input type="text" class="form-control" name="etp_longitude" id="etp_longitude" readonly>
                    @error('etp_longitude')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                {{-- Quinto campo --}}
                {{-- <div class="form-group">
                    <label for="etp_status" class="form-label">Estatus</label>
                    <input type="text" class="form-control" name="etp_status" id="etp_status">
                    @error('etp_status')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div> --}}
                {{-- Sexto campo --}}
                <div class="form-group">
                    <label for="etp_num" class="form-label">Numero</label>
                    <input type="number" class="form-control" name="etp_num" id="etp_num">
                    @error('etp_num')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                {{-- Setimo campo --}}
                <div class="form-group">
                    <label for="etp_email" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="etp_email" id="etp_email">
                    @error('etp_email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>

                {{-- MAP --}}
                <div id="map" style="height: 400px; width: 100%;"></div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@stop

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Crear el mapa centrado en coordenadas por defecto
        var map = L.map('map').setView([9.7489, -83.7534], 8); // Coordenadas por defecto (Costa Rica)

        // Añadir el tile layer de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Crear un marcador inicial en el centro por defecto
        var marker = L.marker([9.7489, -83.7534], { draggable: true }).addTo(map);

        // Añadir un botón para centrar en la ubicación actual
        var locateButton = L.control({position: 'topright'});
        locateButton.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'leaflet-bar leaflet-control leaflet-control-custom');
            div.innerHTML = '<button style="background-color: white; padding: 8px; border: none; cursor: pointer;">Ubicación actual</button>';
            div.style.backgroundColor = 'white'; 
            div.style.width = 'auto';
            div.style.height = 'auto';
            div.style.cursor = 'pointer';
            div.onclick = function(){
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var lat = position.coords.latitude;
                        var lng = position.coords.longitude;

                        // Centrar el mapa en la ubicación del usuario
                        map.setView([lat, lng], 15);

                        // Mover el marcador a la ubicación del usuario
                        marker.setLatLng([lat, lng]);

                        // Actualizar los campos de latitud y longitud
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
            return div;
        };
        locateButton.addTo(map);

        // Actualizar latitud y longitud al mover el marcador
        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            document.getElementById('etp_latitude').value = position.lat;
            document.getElementById('etp_longitude').value = position.lng;
        });

        // Actualizar la posición del marcador al hacer clic en el mapa
        map.on('click', function(event) {
            var position = event.latlng;
            marker.setLatLng(position);
            document.getElementById('etp_latitude').value = position.lat;
            document.getElementById('etp_longitude').value = position.lng;
        });
    });
</script>
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
