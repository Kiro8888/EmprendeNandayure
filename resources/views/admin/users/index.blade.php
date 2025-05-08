@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
    <button class="btn btn-primary my-4" data-toggle="modal" data-target="#createUserModal">Crear Usuario</button>
@stop

@section('content')
    @livewire('admin.user-index')
    <div class="table-responsive">
        <table class="table">
            <!-- Table content goes here -->
        </table>
    </div>
    
    <x-chatbot />

    <!-- Modal de crear usuario -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Crear Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data" id="createUserForm">
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
                            @if (isset($roles) && $roles->count())
                                @foreach ($roles as $rol)
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" name="roles[]" id="rol_{{ $rol->id }}" value="{{ $rol->id }}">
                                        <label for="rol_{{ $rol->id }}" class="form-check-label">{{ $rol->name }}</label>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-danger">No hay roles disponibles.</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary" id="createUserSubmit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de editar usuario -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
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
                                    <input type="checkbox" class="form-check-input" name="roles[]" id="edit_rol_{{ $rol->id }}" value="{{ $rol->id }}">
                                    <label for="edit_rol_{{ $rol->id }}" class="form-check-label">{{ $rol->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        {{-- Status --}}
                        <div class="form-group">
                            <label for="status" class="form-label">Estado</label>
                            <select class="form-control" name="status" id="edit_status">
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#editUserModal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');
                let name = button.data('name');
                let lastName = button.data('last_name');
                let email = button.data('email');
                let roles = button.data('roles') ? button.data('roles').toString().split(',').map(Number) : [];
                let status = button.data('status'); // Get status

                // Configurar el formulario del modal
                $('#editForm').attr('action', '/admin/users/' + id);
                $('#editForm #edit_name').val(name);
                $('#editForm #edit_last_name').val(lastName);
                $('#editForm #edit_email').val(email);
                $('#editForm #edit_status').val(status); // Set status

                // Marcar los roles correspondientes
                $('#editForm input[name="roles[]"]').each(function() {
                    $(this).prop('checked', roles.includes(parseInt($(this).val())));
                });
            });

            // Prevenir envíos duplicados
            $('#editForm').on('submit', function() {
                $(this).find('button[type="submit"]').prop('disabled', true);
            });

            // Prevent duplicate submissions
            $('#createUserForm').on('submit', function(e) {
                e.preventDefault(); // Prevent form submission

                let email = $('#email').val();

                // Check if the email already exists (server-side validation will still occur)
                $.ajax({
                    url: "{{ route('admin.users.store') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#createUserForm').unbind('submit').submit(); // Submit the form if no error
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) { // Validation error
                            let errors = xhr.responseJSON.errors;
                            if (errors.email) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'El correo ya se encuentra registrado.',
                                });
                            }
                        }
                    }
                });
            });
        });
    </script>
@stop