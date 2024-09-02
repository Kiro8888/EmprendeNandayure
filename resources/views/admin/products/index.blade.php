@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Lista de productos</h1>
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

                    <a class="btn btn-primary" href="{{route('admin.products.create')}}"><i class="fas fa-plus"></i>Crear Producto</a>

                </div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Emprendimiento</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Mostrar</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)

                        <tr>
                            <th scope="row">{{$product->id_pdt}}</th>
                            <td>{{$product->pdt_name}}</td>
                            <td>
                                @if ($product->pdt_status == 1)
                                    Activo
                                @elseif ($product->pdt_status == 2)
                                    Inactivo
                                @else
                                    Desconocido
                                @endif
                            </td>
                            <td>{{$product->pdt_price}}</td>
                            <td>{{$product->entrepreneurship->etp_name ?? 'Desconocido' }}</td>
                            <td>{{$product->category->ctg_name ?? 'Desconocido' }}</td>
                            <td><a class="btn btn-warning" href="{{route('admin.products.edit', $product)}}">Editar</a></td>
                            <td>
                                <form action="{{route('admin.products.destroy', $product)}}" method="POST">

                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>


                                </form>

                            </td>

                            <td><a class="btn btn-primary" href="{{route('admin.products.show', $product)}}">Mostrar</a></td>
                          </tr>

                        @endforeach
                      </tbody>
                  </table>
            </div>
        </div>



@stop
