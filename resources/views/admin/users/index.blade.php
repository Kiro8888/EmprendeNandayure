@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
    <button class="btn btn-primary my-4" data-toggle="modal" data-target="#createUserModal">Crear Usuario</button>
@stop

@section('content')
     @livewire('admin.user-index')
        
    <x-chatbot />

    <!-- Modal de crear usuario -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Primer campo --}}
                        <div class="form-group">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        {{-- Segundo campo --}}
                        <div class="form-group">
                            <label for="last_name" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="last_name" id="last_name">
                            @error('last_name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        {{-- Tercer campo --}}
                        <div class="form-group">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="email" id="email">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        {{-- Cuarto campo --}}
                        <div class="form-group">
                            <label for="password" class="form-label">Contreseña</label>
                            <input type="password" class="form-control" name="password" id="password">
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        {{-- Roles --}}
                        <div class="form-group">
                            <label for="Roles" class="form-label">Roles</label>
                            <br>
                            @foreach ($roles as $rol)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="roles[]" id="rol" value="{{$rol->id}}">
                                    <label for="checkbox" class="form-check-label">{{$rol->name}}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de editar usuario -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" id="edit_name">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="last_name" id="edit_last_name">
                            @error('last_name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="email" id="edit_email">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        {{-- Roles --}}
                        <div class="form-group">
                            <label for="Roles" class="form-label">Roles</label>
                            <br>
                            @foreach ($roles as $rol)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="roles[]" id="edit_rol_{{$rol->id}}" value="{{$rol->id}}">
                                    <label for="edit_rol_{{$rol->id}}" class="form-check-label">{{$rol->name}}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#editUserModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');
                let name = button.data('name');
                let lastName = button.data('last_name');
                let email = button.data('email');
                let roles = button.data('roles');

                $('#editForm').attr('action', '/admin/users/' + id);
                $('#editForm #edit_name').val(name);
                $('#editForm #edit_last_name').val(lastName);
                $('#editForm #edit_email').val(email);

                $('#editForm input[name="roles[]"]').each(function() {
                    $(this).prop('checked', roles.includes(parseInt($(this).val())));
                });
            });
        });
    </script>
@stop