@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Lista</h1>
@stop

@section('content')


@if (session('info'))
<div class="alert alert-info" role="alert">
    {{session('info')}}
</div>
@endif


        <div class="card">
            <div class="card-body">
                <div class="card-heder">

                    <a class="btn btn-primary" href="{{route('admin.categories.create')}}"><i class="fas fa-plus"></i>Crear Categoria</a>

                </div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)

                        <tr>
                            <th scope="row">{{$category->id_ctg}}</th>
                            <td>{{$category->ctg_name}}</td>
                            <td>{{$category->ctg_description}}</td>
                            <td><a class="btn btn-warning" href="{{route('admin.categories.edit', $category)}}">Editar</a></td>
                            <td>

                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">

                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>


                                </form>

                            </td>
                          </tr>

                        @endforeach
                      </tbody>
                  </table>
            </div>
        </div>



@stop
