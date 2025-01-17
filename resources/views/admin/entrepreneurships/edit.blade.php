@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Editar emprendimiento</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-info" role="alert">
    {{session('info')}}
</div>
@endif
            <form action="{{route('admin.entrepreneurships.update', $entrepreneurship)}}" method="POST">
                @csrf
                @method('PUT')
                {{-- Primer campo --}}
                <div class="form-group">
                    <label for="etp_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="etp_name" id="etp_name" value="{{$entrepreneurship->etp_name}}">
                    @error('etp_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                 {{-- Tercer campo --}}
                 {{-- <div class="form-group">
                    <label for="etp_latitude" class="form-label">Latitud</label>
                    <input type="number" class="form-control" name="etp_latitude" id="etp_latitude" value="{{$entrepreneur->etp_latitude}}">
                    @error('etp_latitude')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div> --}}
                <div class="form-group">
                    <label for="etp_latitude" class="form-label">Latitud</label>
                    <input type="text" class="form-control" name="etp_latitude" id="etp_latitude" readonly value="{{$entrepreneurship->etp_latitude}}">
                    @error('etp_latitude')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>


                {{-- Cuarto campo --}}
                {{-- <div class="form-group">
                    <label for="etp_longitude" class="form-label">Longitud</label>
                    <input type="number" class="form-control" name="etp_longitude" id="etp_longitude" value="{{$entrepreneurship->etp_longitude}}">
                    @error('etp_longitude')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div> --}}
                <div class="form-group">
                    <label for="etp_longitude" class="form-label">Longitud</label>
                    <input type="text" class="form-control" name="etp_longitude" id="etp_longitude" readonly value="{{$entrepreneurship->etp_longitude}}">
                    @error('etp_longitude')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- Quinto campo --}}
                {{-- <div class="form-group">
                    <label for="etp_status" class="form-label">Estatus</label>
                    <input type="text" class="form-control" name="etp_status" id="etp_status"  value="{{$entrepreneurship->etp_status}}">
                    @error('etp_status')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div> --}}
                <div class="form-group">
                    <label for="etp_status" class="form-label">Estatus</label>
                    <select class="form-control" name="etp_status" id="etp_status">
                        <option value="1" {{ $entrepreneurship->etp_status == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="2" {{ $entrepreneurship->etp_status == 2 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('etp_status')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Sexto campo --}}
                <div class="form-group">
                    <label for="etp_num" class="form-label">Numero</label>
                    <input type="number" class="form-control" name="etp_num" id="etp_num"  value="{{$entrepreneurship->etp_num}}">
                    @error('etp_num')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                {{-- Setimo campo --}}
                <div class="form-group">
                    <label for="etp_email" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="etp_email" id="etp_email"  value="{{$entrepreneurship->etp_email}}">
                    @error('etp_email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Mostrar imagen actual --}}
                 <div class="form-group">
                    <label for="etp_img" class="form-label">Imagen Actual</label>
                    @if ($entrepreneurship->etp_img)
                        <div>
                            <img src="{{ asset($entrepreneurship->etp_img) }}" alt="Imagen del Servicio" width="150">
                        </div>
                    @else
                        <p>No hay imagen disponible.</p>
                    @endif
                </div>
                {{-- Campo para subir nueva imagen --}}
                <div class="form-group">
                    <label for="etp_img" class="form-label">Nueva Imagen</label>
                    <input type="file" class="form-control" name="etp_img" id="etp_img">
                    @error('etp_img')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- MAP --}}
                <div id="map" style="height: 400px; width: 100%;"></div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/admin/entrepreneurship" class="btn btn-primary">Atrás</a>
            </form>

            
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJgtyUKa--FH9PWRW9ptMzz8-ofLvJgr0&callback=initMap"></script>
    <script>
function initMap() {
    // Obtener las coordenadas iniciales del emprendimiento desde los campos del formulario
    var lat = parseFloat(document.getElementById('etp_latitude').value) || 9.7489; // Valor por defecto si no hay coordenadas
    var lng = parseFloat(document.getElementById('etp_longitude').value) || -83.7534;

    // Crear el mapa centrado en las coordenadas iniciales
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: lat, lng: lng },
        zoom: 15
    });

    // Crear un marcador en la ubicación inicial
    var marker = new google.maps.Marker({
        position: { lat: lat, lng: lng },
        map: map,
        draggable: true
    });

    // Función para obtener y centrar en la ubicación actual del usuario
    function setLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var currentLat = position.coords.latitude;
                var currentLng = position.coords.longitude;

                // Centrar el mapa y mover el marcador a la ubicación actual
                map.setCenter({ lat: currentLat, lng: currentLng });
                marker.setPosition({ lat: currentLat, lng: currentLng });

                // Actualizar los campos de latitud y longitud en el formulario
                document.getElementById('etp_latitude').value = currentLat;
                document.getElementById('etp_longitude').value = currentLng;
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
