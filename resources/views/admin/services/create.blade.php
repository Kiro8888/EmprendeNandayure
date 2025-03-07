@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Crear Servicio</h1>
@stop

@section('content')

            <form action="{{route('admin.services.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Primer campo --}}
                <div class="form-group">
                    <label for="srv_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="srv_name" id="srv_name">
                    @error('srv_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                  {{-- Segundo campo --}}
                <div class="form-group">
                    <label for="srv_description" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="srv_description" id="srv_description">
                    @error('srv_description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Tercer campo --}}
                 <div class="form-group">
                    <label for="srv_price" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="srv_price" id="srv_price">
                    @error('srv_price')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>

                 {{-- Campo para imagen --}}
                 <div class="form-group">
                    <label for="srv_img" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="srv_img" id="srv_img">
                    @error('srv_img')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Quinto campo --}}
                <div class="form-group">
                    <label for="srv_id_ctg" class="form-label">Categoría</label>
                    <select name="srv_id_ctg" id="srv_id_ctg" class="form-control">
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id_ctg }}">{{ $category->ctg_name }}</option>
                        @endforeach
                    </select>
                    @error('srv_id_ctg')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Sexto campo --}}
                <div class="form-group">
                    <label for="srv_id_etp" class="form-label">Emprendimiento</label>
                    <select name="srv_id_etp" id="srv_id_etp" class="form-control">
                        <option value="">Seleccione un emprendedor</option>
                        @foreach ($entrepreneurships as $entrepreneurship)
                            <option value="{{ $entrepreneurship->id }}">{{ $entrepreneurship->etp_name }}</option>
                        @endforeach
                    </select>
                    @error('srv_id_etp')
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