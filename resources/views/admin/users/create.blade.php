@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')

            <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Primer campo --}}
                <div class="form-group">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                  {{-- Segundo campo --}}
                <div class="form-group">
                    <label for="last_name" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="last_name" id="last_name">
                    @error('last_name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Tercer campo --}}
                 <div class="form-group">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="email" id="email">
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Cuarto campo --}}
                <div class="form-group">
                    <label for="password" class="form-label">Contreseña</label>
                    <input type="password" class="form-control" name="password" id="password">
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Campo para imagen --}}
                 {{-- <div class="form-group">
                    <label for="pdt_img" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="pdt_img" id="pdt_img">
                    @error('pdt_img')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div> --}}
 
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