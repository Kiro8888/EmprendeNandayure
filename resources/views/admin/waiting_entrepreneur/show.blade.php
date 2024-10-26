@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Mostrar emprendedor</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-info" role="alert">
    {{session('info')}}
</div>
@endif
            <form action="{{route('admin.waiting_entrepreneur.show', $user)}}" method="POST">
                @csrf
                @method('PUT')
                {{-- Primer campo --}}
                <div class="form-group">
                    <label for="etp_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="etp_name" id="etp_name" value="{{$user->name}}" readonly>
                    @error('etp_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                 {{-- Tercer campo --}}
                 {{-- <div class="form-group">
                    <label for="etp_latitude" class="form-label">Latitud</label>
                    <input type="number" class="form-control" name="etp_latitude" id="etp_latitude" value="{{$user->etp_latitude}}">
                    @error('etp_latitude')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div> --}}
                <div class="form-group">
                    <label for="etp_latitude" class="form-label">Latitud</label>
                    <input type="text" class="form-control" name="etp_latitude" id="etp_latitude" readonly value="{{$user->etp_latitude}}" readonly>
                    @error('etp_latitude')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>


                {{-- Cuarto campo --}}
                {{-- <div class="form-group">
                    <label for="etp_longitude" class="form-label">Longitud</label>
                    <input type="number" class="form-control" name="etp_longitude" id="etp_longitude" value="{{$user->etp_longitude}}">
                    @error('etp_longitude')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div> --}}
                <div class="form-group">
                    <label for="etp_longitude" class="form-label">Longitud</label>
                    <input type="text" class="form-control" name="etp_longitude" id="etp_longitude" readonly value="{{$user->etp_longitude}}" readonly>
                    @error('etp_longitude')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {{-- Quinto campo --}}
                {{-- <div class="form-group">
                    <label for="etp_status" class="form-label">Estatus</label>
                    <input type="text" class="form-control" name="etp_status" id="etp_status"  value="{{$user->etp_status}}">
                    @error('etp_status')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div> --}}
                <div class="form-group">
                    <label for="etp_status" class="form-label">Estatus</label>
                    <select class="form-control" name="etp_status" id="etp_status" disabled>
                        <option value="1" {{ $user->etp_status == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="2" {{ $user->etp_status == 2 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('etp_status')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Sexto campo --}}
                <div class="form-group">
                    <label for="etp_num" class="form-label">Numero</label>
                    <input type="number" class="form-control" name="etp_num" id="etp_num"  value="{{$user->etp_num}}" readonly>
                    @error('etp_num')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                {{-- Setimo campo --}}
                <div class="form-group">
                    <label for="etp_email" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="etp_email" id="etp_email"  value="{{$user->etp_email}}" readonly>
                    @error('etp_email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Mostrar imagen actual --}}
                 <div class="form-group">
                    <label for="etp_img" class="form-label">Imagen Actual</label>
                    @if ($user->etp_img)
                        <div>
                            <img src="{{ asset($user->etp_img) }}" alt="Imagen del Servicio" width="150">
                        </div>
                    @else
                        <p>No hay imagen disponible.</p>
                    @endif
                </div>             
                {{-- MAP --}}
                <div id="map" style="height: 400px; width: 100%;"readonly ></div>
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
        // Obtener las coordenadas iniciales del emprendedor desde el objeto $user
        var initialLat = {{ $user->etp_latitude ?? 9.7489 }}; // Usa 9.7489 como valor por defecto si no hay latitud
        var initialLng = {{ $user->etp_longitude ?? -83.7534 }}; // Usa -83.7534 como valor por defecto si no hay longitud

        // Crear el mapa centrado en las coordenadas iniciales
        var map = L.map('map').setView([initialLat, initialLng], 15); // Ajusta el zoom según sea necesario

        // Añadir el tile layer de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Crear un marcador inicial en las coordenadas del emprendedor
        var marker = L.marker([initialLat, initialLng], { draggable: true }).addTo(map);

        // Actualizar latitud y longitud al mover el marcador
        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            document.getElementById('etp_latitude').value = position.lat;
            document.getElementById('etp_longitude').value = position.lng;
        });

        
    });
</script>
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
