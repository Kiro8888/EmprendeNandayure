@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles</h1>
    <a href="{{route('admin.roles.create')}}" class="btn btn-primary my-4">Crear nuevo rol</a>
@stop

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('content')
@if (session('info'))
    <div class="alert alert-info">{{session('info')}}</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Rol</th>
                <th colspan="2" scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <th scope="row">{{$role->id}}</th>
                    <td>{{$role->name}}</td>
                    <td><a class="btn btn-warning" href="{{route('admin.roles.edit', $role)}}">Editar</a></td>
                    <td>
                        <form action="{{route('admin.roles.destroy', $role)}}" method="POST" class="delete-form">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const form = this.closest('.delete-form');
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
