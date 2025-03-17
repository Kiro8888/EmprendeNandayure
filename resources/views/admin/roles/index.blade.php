@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles</h1>
    <button class="btn btn-primary my-4" data-toggle="modal" data-target="#createRoleModal">Crear nuevo rol</button>
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
                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#editRoleModal" data-id="{{ $role->id }}" data-name="{{ $role->name }}" data-permissions="{{ $role->permissions->pluck('id') }}">Editar</button></td>
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

<!-- Modal de crear rol -->
<div class="modal fade" id="createRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear nuevo rol</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.roles.store')}}" method="post">
                    @csrf
                    @include('admin.roles.partials.form', ['routeName' => 'admin.roles.create'])
                    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de editar rol -->
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Rol</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.roles.partials.form', ['routeName' => 'admin.roles.edit'])
                    <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                </form>
            </div>
        </div>
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

        $('#editRoleModal').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let name = button.data('name');
            let permissions = button.data('permissions');

            $('#editForm').attr('action', '/admin/roles/' + id);
            $('#editForm #name').val(name);

            $('#editForm input[name="permissions[]"]').each(function() {
                $(this).prop('checked', permissions.includes(parseInt($(this).val())));
            });
        });
    });
</script>
@stop
