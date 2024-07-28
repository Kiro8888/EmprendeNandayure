@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Mostrar Servicio</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-info" role="alert">
    {{session('info')}}
</div>
@endif
            <form action="{{route('admin.services.store', $service)}}" method="POST">
                @csrf
                @method('PUT')
                {{-- Primer campo --}}
                <div class="form-group">
                    <label for="srv_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="srv_name" id="srv_name" value="{{$service->srv_name}}" readonly>
                    @error('srv_name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                  {{-- Segundo campo --}}
                <div class="form-group">
                    <label for="srv_description" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="srv_description" id="srv_description" value="{{$service->srv_description}}" readonly>
                    @error('srv_description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                 {{-- Tercer campo --}}
                 <div class="form-group">
                    <label for="srv_price" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="srv_price" id="srv_price" value="{{$service->srv_price}}" readonly>
                    @error('srv_price')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                </div>
                    {{-- Mostrar imagen actual --}}
                <div class="form-group">
                    <label for="srv_img" class="form-label">Imagen Actual</label>
                    @if ($service->srv_img)
                        <div>
                            <img src="{{ asset($service->srv_img) }}" alt="Imagen del Servicio" width="150">
                        </div>
                    @else
                        <p>No hay imagen disponible.</p>
                    @endif
                </div>
                {{-- Quinto campo --}}
                <div class="form-group">
                    <label for="srv_id_ctg" class="form-label">Categoría</label>
                    <select name="srv_id_ctg" id="srv_id_ctg" class="form-control" disabled>
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
                    <label for="srv_id_etp" class="form-label">Emprendedor</label>
                    <select name="srv_id_etp" id="srv_id_etp" class="form-control" disabled>
                        @foreach ($entrepreneurs as $entrepreneur)
                            <option value="{{ $entrepreneur->id_etp }}">{{ $entrepreneur->etp_name }}</option>
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