@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-info" role="alert">
            {{session('info')}}
        </div>
    @endif

<form action="{{route('admin.categories.update', $category)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="ctg_name" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="ctg_name" id="ctg_name" value="{{$category->ctg_name}}">
        @error('ctg_name')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="ctg_description" class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="ctg_description" id="ctg_description" value="{{$category->ctg_description}}">
        @error('ctg_description')
        <p class="text-danger">{{$message}}</p>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop


@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop