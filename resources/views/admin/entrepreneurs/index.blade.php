@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Lista de emprendedores</h1>
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

                    <a class="btn btn-primary" href="{{route('admin.entrepreneurs.create')}}"><i class="fas fa-plus"></i>Crear Emprendedor</a>

                </div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Ubicacion</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($entrepreneurs as $entrepreneur)

                        <tr>
                            <th scope="row">{{$entrepreneur->id_etp}}</th>
                            <td>{{$entrepreneur->etp_name}}</td>
                            <td>{{$entrepreneur->etp_last_name}}</td>
                            <td>
                                @if ($entrepreneur->etp_status == 1)
                                    Activo
                                @elseif ($entrepreneur->etp_status == 2)
                                    Inactivo
                                @else
                                    Desconocido
                                @endif
                            </td>
                            <td>{{$entrepreneur->etp_num}}</td>
                            <td>{{$entrepreneur->etp_email}}</td>
                            <td><a class="btn btn-warning" href="{{route('admin.entrepreneurs.edit', $entrepreneur)}}">Editar</a></td>
                            <td>

                                <form action="{{route('admin.entrepreneurs.destroy', $entrepreneur)}}" method="POST">

                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>


                                </form>

                            </td>

                            <td><a class="btn btn-primary" href="{{route('admin.entrepreneurs.show', $entrepreneur)}}">Mostrar</a></td>
                          </tr>

                        @endforeach
                      </tbody>
                  </table>
            </div>
        </div>



@stop
