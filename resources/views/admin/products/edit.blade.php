@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')


@if (session('info'))
<div class="alert alert-info" role="alert">
    {{session('info')}}
</div>
@endif
            <form action="{{route('admin.products.update', $product)}}" method="POST">
                @csrf
                @method('PUT')
                {{-- Primer campo --}}
                <div class="form-group">
                    <label for="pdt_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="pdt_name" id="pdt_name" value="{{$product->pdt_name}}">
                    @error('pdt_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                  {{-- Segundo campo --}}
                <div class="form-group">
                    <label for="pdt_description" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="pdt_description" id="pdt_description" value="{{$product->pdt_description}}">
                    @error('pdt_description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Tercer campo --}}
                 <div class="form-group">
                    <label for="pdt_price" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="pdt_price" id="pdt_price" value="{{$product->pdt_price}}">
                    @error('pdt_price')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                {{-- Mostrar imagen actual --}}
                <div class="form-group">
                    <label for="pdt_img" class="form-label">Imagen Actual</label>
                    @if ($product->pdt_img)
                        <div>
                            <img src="{{ asset($product->pdt_img) }}" alt="Imagen del Servicio" width="150">
                        </div>
                    @else
                        <p>No hay imagen disponible.</p>
                    @endif
                </div>
                {{-- Campo para subir nueva imagen --}}
                <div class="form-group">
                    <label for="pdt_img" class="form-label">Nueva Imagen</label>
                    <input type="file" class="form-control" name="pdt_img" id="pdt_img">
                    @error('pdt_img')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Quinto campo --}}
                <div class="form-group">
                    <label for="pdt_id_ctg" class="form-label">Categoría</label>
                    <select name="pdt_id_ctg" id="pdt_id_ctg" class="form-control">
                       
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
                    
                        @foreach ($entrepreneurs as $entrepreneur)
                            <option value="{{ $entrepreneur->id_etp }}">{{ $entrepreneur->etp_name }}</option>
                        @endforeach
                    </select>
                    @error('pdt_id_etp')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                 {{-- Setimo campo --}}
                <div class="form-group">
                    <label for="pdt_status" class="form-label">Estatus</label>
                    <select class="form-control" name="pdt_status" id="pdt_status">
                        <option value="1" {{ $product->pdt_status == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="2" {{ $product->pdt_status == 2 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('pdt_status')
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