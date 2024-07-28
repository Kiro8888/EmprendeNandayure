@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Lista de servicios</h1>
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

                    <a class="btn btn-primary" href="{{route('admin.services.create')}}"><i class="fas fa-plus"></i>Crear Servicio</a>

                </div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Duenno</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Mostrar</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($services as $service)

                        <tr>
                            <th scope="row">{{$service->id_srv}}</th>
                            <td>{{$service->srv_name}}</td>
                            <td>{{$service->srv_status}}</td>
                            <td>{{$service->srv_price}}</td>
                            <td>{{$service->srv_id_etp}}</td>
                            <td>{{$service->srv_id_ctg}}</td>
                            <td><a class="btn btn-warning" href="{{route('admin.services.edit', $service)}}">Editar</a></td>
                            <td>
                                <form action="{{route('admin.services.destroy', $service)}}" method="POST">

                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>


                                </form>

                            </td>

                            <td><a class="btn btn-primary" href="{{route('admin.services.show', $service)}}">Mostrar</a></td>
                          </tr>

                        @endforeach
                      </tbody>
                  </table>
            </div>
        </div>



@stop
