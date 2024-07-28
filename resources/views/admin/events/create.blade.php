@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Crear eventos</h1>
@stop

@section('content')

            <form action="{{route('admin.events.store')}}" method="POST">
                @csrf
                {{-- Primer campo --}}
                <div class="form-group">
                    <label for="evt_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="evt_name" id="evt_name">
                    @error('evt_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                  {{-- Segundo campo --}}
                <div class="form-group">
                    <label for="evt_description" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="evt_description" id="evt_description">
                    @error('evt_description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Tercer campo --}}
                 <div class="form-group">
                    <label for="evt_date" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="evt_date" id="evt_date">
                    @error('evt_date')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                {{-- Cuarto campo --}}
                <div class="form-group">
                    <label for="evt_hour" class="form-label">Hora</label>
                    <input type="time" class="form-control" name="evt_hour" id="evt_hour">
                    @error('evt_hour')
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
                    <label for="evt_location" class="form-label">Lugar</label>
                    <input type="text" class="form-control" name="evt_location" id="evt_location">
                    @error('evt_location')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                {{-- Campo para imagen --}}
                <div class="form-group">
                    <label for="evt_img" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="evt_img" id="evt_img">
                    @error('evt_img')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

               
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop