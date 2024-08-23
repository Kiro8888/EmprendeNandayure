@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Lista de emprendimientos</h1>
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

                    <a class="btn btn-primary" href="{{route('admin.entrepreneurships.create')}}"><i class="fas fa-plus"></i>Crear Emprendimiento</a>

                </div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Mostrar</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($entrepreneurships as $entrepreneurship)

                        <tr>
                            <th scope="row">{{$entrepreneurship->id}}</th>
                            <td>{{$entrepreneurship->etp_name}}</td>

                            <td>
                                @if ($entrepreneurship->etp_status == 1)
                                    Activo
                                @elseif ($entrepreneurship->etp_status == 2)
                                    Inactivo
                                @else
                                    Desconocido
                                @endif
                            </td>
                            <td>{{$entrepreneurship->etp_num}}</td>
                            <td>{{$entrepreneurship->etp_email}}</td>
                            <td><a class="btn btn-warning" href="{{route('admin.entrepreneurships.edit', $entrepreneurship)}}">Editar</a></td>
                            <td>
                                <form action="{{route('admin.entrepreneurships.destroy', $entrepreneurship)}}" method="POST">

                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>


                                </form>

                            </td>
                            <td><a class="btn btn-primary" href="{{route('admin.entrepreneurships.show', $entrepreneurship)}}">Mostrar</a></td>
                          </tr>

                        @endforeach
                      </tbody>
                  </table>
            </div>
        </div>



@stop
