@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Lista de eventos</h1>
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

                    <a class="btn btn-primary" href="{{route('admin.events.create')}}"><i class="fas fa-plus"></i>Crear evento</a>

                </div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">hora</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        <th scope="col">Mostrar</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($events as $event)

                        <tr>
                            <th scope="row">{{$event->id_evt}}</th>
                            <td>{{$event->evt_name}}</td>
                            <td>{{$event->evt_description}}</td>
                            <td>{{$event->evt_date}}</td>
                            <td>{{$event->evt_hour}}</td>
                            <td>{{$event->evt_location}}</td>
                            <td><a class="btn btn-warning" href="{{route('admin.events.edit', $event)}}">Editar</a></td>
                            <td>

                                <form action="{{route('admin.events.destroy', $event)}}" method="POST">

                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>


                                </form>

                            </td>

                            <td><a class="btn btn-primary" href="{{route('admin.events.show', $event)}}">Mostrar</a></td>
                          </tr>

                        @endforeach
                      </tbody>
                  </table>
            </div>
        </div>



@stop
