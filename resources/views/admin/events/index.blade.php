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
            <a class="btn btn-primary" href="{{route('admin.events.create')}}">
                <i class="fas fa-plus"></i> Crear evento
            </a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
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
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.events.edit', $event)}}">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('admin.events.destroy', $event)}}" method="POST" class="delete-form">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.events.show', $event)}}">Mostrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<x-chatbot />

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('form'); // Encuentra el formulario más cercano
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "No podrás deshacer esta acción",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Envía el formulario si se confirma
                    }
                });
            });
        });
    });
</script>
@stop
