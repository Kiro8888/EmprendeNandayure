@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Mostrar eventos</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-info" role="alert">
    {{session('info')}}
</div>
@endif
            <form action="{{route('admin.events.update', $event)}}" method="POST">
                @csrf
                @method('PUT')
                {{-- Primer campo --}}
                <div class="form-group">
                    <label for="evt_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="evt_name" id="evt_name" value="{{$event->evt_name}}"> 
                    @error('evt_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                  {{-- Segundo campo --}}
                  <div class="form-group">
                    <label for="evt_description" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="evt_description" id="evt_description" value="{{$event->evt_description}}">
                    @error('evt_description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Tercer campo --}}
                 <div class="form-group">
                    <label for="evt_date" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="evt_date" id="evt_date" value="{{$event->evt_date}}">
                    @error('evt_date')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                {{-- Cuarto campo --}}
                <div class="form-group">
                    <label for="evt_hour" class="form-label">Hora</label>
                    <input type="time" class="form-control" name="evt_hour" id="evt_hour" value="{{$event->evt_hour}}">
                    @error('evt_hour')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                
                
                {{-- Sexto campo --}}
                <div class="form-group">
                    <label for="evt_location" class="form-label">Lugar</label>
                    <input type="text" class="form-control" name="evt_location" id="evt_location" value="{{$event->evt_location}}">
                    @error('evt_location')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
            </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop