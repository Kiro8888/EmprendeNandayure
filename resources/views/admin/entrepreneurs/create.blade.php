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
                 <div class="form-group">
                    <label for="etp_latitude" class="form-label">Latitud</label>
                    <input type="number" class="form-control" name="etp_latitude" id="etp_latitude">
                    @error('etp_latitude')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                {{-- Cuarto campo --}}
                <div class="form-group">
                    <label for="etp_longitude" class="form-label">Longitud</label>
                    <input type="number" class="form-control" name="etp_longitude" id="etp_longitude">
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