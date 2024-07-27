@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')

            <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- Primer campo --}}
                <div class="form-group">
                    <label for="pdt_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="pdt_name" id="pdt_name">
                    @error('pdt_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                  {{-- Segundo campo --}}
                <div class="form-group">
                    <label for="pdt_description" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="pdt_description" id="pdt_description">
                    @error('pdt_description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Tercer campo --}}
                 <div class="form-group">
                    <label for="pdt_price" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="pdt_price" id="pdt_price">
                    @error('pdt_price')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Campo para imagen --}}
                 <div class="form-group">
                    <label for="pdt_img" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="pdt_img" id="pdt_img">
                    @error('pdt_img')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Quinto campo --}}
                <div class="form-group">
                    <label for="pdt_id_ctg" class="form-label">Categoría</label>
                    <select name="pdt_id_ctg" id="pdt_id_ctg" class="form-control">
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id_ctg }}">{{ $category->ctg_name }}</option>
                        @endforeach
                    </select>
                    @error('pdt_id_ctg')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Sexto campo --}}
                <div class="form-group">
                    <label for="pdt_id_etp" class="form-label">Emprendedor</label>
                    <select name="pdt_id_etp" id="pdt_id_etp" class="form-control">
                        <option value="">Seleccione un emprendedor</option>
                        @foreach ($entrepreneurs as $entrepreneur)
                            <option value="{{ $entrepreneur->id_etp }}">{{ $entrepreneur->etp_name }}</option>
                        @endforeach
                    </select>
                    @error('pdt_id_etp')
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