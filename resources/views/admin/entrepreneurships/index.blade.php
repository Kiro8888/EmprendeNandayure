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
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('admin.entrepreneurships.create')}}">
                <i class="fas fa-plus"></i> Crear Emprendimiento
            </a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Número</th>
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
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.entrepreneurships.edit', $entrepreneurship)}}">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('admin.entrepreneurships.destroy', $entrepreneurship)}}" method="POST" class="delete-form">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.entrepreneurships.show', $entrepreneurship)}}">Mostrar</a>
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
