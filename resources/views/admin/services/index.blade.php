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
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#createServiceModal">
                <i class="fas fa-plus"></i> Crear Servicio
            </button>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Emprendimiento</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Mostrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <th scope="row">{{ $service->id_srv }}</th>
                    <td>{{ $service->srv_name }}</td>
                    <td>
                        @if ($service->srv_status == 1)
                            Activo
                        @elseif ($service->srv_status == 2)
                            Inactivo
                        @else
                            Desconocido
                        @endif
                    </td>
                    <td>{{ $service->srv_price }}</td>
                    <td>{{ $service->entrepreneurship->etp_name ?? 'Desconocido' }}</td>
                    <td>{{ $service->category->ctg_name ?? 'Desconocido' }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editServiceModal{{ $service->id_srv }}">
                            Editar
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="delete-form">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showServiceModal{{ $service->id_srv }}">
                            Mostrar
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Add pagination links -->
        <div class="d-flex justify-content-center pagination-wrapper">
            {{ $services->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
<!-- Modal de crear servicio -->
<div class="modal fade" id="createServiceModal" tabindex="-1" aria-labelledby="createServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createServiceModalLabel">Crear Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.services.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="srv_name" class="form-label">Nombre servicio</label>
                        <input type="text" class="form-control" name="srv_name" id="srv_name">
                        @error('srv_name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="srv_description" class="form-label">Descripción servicio</label>
                        <input type="text" class="form-control" name="srv_description" id="srv_description">
                        @error('srv_description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="srv_price" class="form-label">Precio servicio</label>
                        <input type="number" class="form-control" name="srv_price" id="srv_price">
                        @error('srv_price')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="srv_img" class="form-label">Imagen servicio</label>
                        <input type="file" class="form-control" name="srv_img" id="srv_img">
                        @error('srv_img')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="srv_id_ctg" class="form-label">Categoría servicio</label>
                        <select name="srv_id_ctg" id="srv_id_ctg" class="form-control">
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_ctg }}">{{ $category->ctg_name }}</option>
                            @endforeach
                        </select>
                        @error('srv_id_ctg')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="srv_id_etp" class="form-label">Emprendimiento</label>
                        <select name="srv_id_etp" id="srv_id_etp" class="form-control">
                            <option value="">Seleccione un emprendimiento</option>
                            @foreach ($entrepreneurships as $entrepreneurship)
                                <option value="{{ $entrepreneurship->id }}">{{ $entrepreneurship->etp_name }}</option>
                            @endforeach
                        </select>
                        @error('srv_id_etp')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Servicio</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar servicio -->
@foreach ($services as $service)
<div class="modal fade" id="editServiceModal{{ $service->id_srv }}" tabindex="-1" aria-labelledby="editServiceModalLabel{{ $service->id_srv }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceModalLabel{{ $service->id_srv }}">Editar Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <label for="srv_name">Nombre servicio</label>
                        <input type="text" class="form-control" name="srv_name" id="srv_name" value="{{ old('srv_name', $service->srv_name) }}">
                        @error('srv_name')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>

                    <!-- Campo Descripción -->
                    <div class="form-group">
                        <label for="srv_description">Descripción servicio</label>
                        <input type="text" class="form-control" name="srv_description" id="srv_description" value="{{ old('srv_description', $service->srv_description) }}">
                        @error('srv_description')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>

                    <!-- Campo Precio -->
                    <div class="form-group">
                        <label for="srv_price">Precio servicio</label>
                        <input type="number" class="form-control" name="srv_price" id="srv_price" value="{{ old('srv_price', $service->srv_price) }}">
                        @error('srv_price')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>

                    <!-- Mostrar imagen actual -->
                    <div class="form-group">
                        <label for="srv_img">Imagen Actual</label>
                        @if ($service->srv_img)
                            <div>
                                <img src="{{ asset($service->srv_img) }}" alt="Imagen del Servicio" width="150">
                            </div>
                        @else
                            <p>No hay imagen disponible.</p>
                        @endif
                    </div>

                    <!-- Campo para subir nueva imagen -->
                    <div class="form-group">
                        <label for="srv_img">Nueva Imagen</label>
                        <input type="file" class="form-control" name="srv_img" id="srv_img">
                        @error('srv_img')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>

                    <!-- Campo para seleccionar Categoría -->
                    <div class="form-group">
                        <label for="srv_id_ctg">Categoría</label>
                        <select name="srv_id_ctg" id="srv_id_ctg" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_ctg }}" {{ $service->srv_id_ctg == $category->id_ctg ? 'selected' : '' }}>
                                    {{ $category->ctg_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('srv_id_ctg')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>

                    <!-- Campo para seleccionar Emprendimiento -->
                    <div class="form-group">
                        <label for="srv_id_etp">Emprendimiento</label>
                        <select name="srv_id_etp" id="srv_id_etp" class="form-control">
                            @foreach ($entrepreneurships as $entrepreneurship)
                                <option value="{{ $entrepreneurship->id }}" {{ $service->srv_id_etp == $entrepreneurship->id ? 'selected' : '' }}>
                                    {{ $entrepreneurship->etp_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('srv_id_etp')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>

                    <!-- Campo para seleccionar Estatus -->
                    <div class="form-group">
                        <label for="srv_status">Estatus</label>
                        <select class="form-control" name="srv_status" id="srv_status" {{ !auth()->user()->hasRole('Admin') ? 'disabled' : '' }}>
                            <option value="1" {{ $service->srv_status == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="2" {{ $service->srv_status == 2 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($services as $service)
<!-- Modal para mostrar servicio -->
<div class="modal fade" id="showServiceModal{{ $service->id_srv }}" tabindex="-1" aria-labelledby="showServiceModalLabel{{ $service->id_srv }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showServiceModalLabel{{ $service->id_srv }}">Detalles del Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Campos para mostrar detalles del servicio -->
                <div class="form-group">
                    <label for="srv_name">Nombre servicio</label>
                    <input type="text" class="form-control" value="{{ $service->srv_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="srv_description">Descripción servicio</label>
                    <input type="text" class="form-control" value="{{ $service->srv_description }}" readonly>
                </div>
                <div class="form-group">
                    <label for="srv_price">Precio servicio</label>
                    <input type="number" class="form-control" value="{{ $service->srv_price }}" readonly>
                </div>
                <div class="form-group">
                    <label for="srv_img">Imagen Actual</label>
                    @if ($service->srv_img)
                        <div>
                            <img src="{{ asset($service->srv_img) }}" alt="Imagen del Servicio" width="150">
                        </div>
                    @else
                        <p>No hay imagen disponible.</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="srv_id_ctg">Categoría servicio</label>
                    <select class="form-control" disabled>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id_ctg }}" {{ $service->srv_id_ctg == $category->id_ctg ? 'selected' : '' }}>
                                {{ $category->ctg_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="srv_id_etp">Emprendimiento</label>
                    <select class="form-control" disabled>
                        @foreach ($entrepreneurships as $entrepreneurship)
                            <option value="{{ $entrepreneurship->id }}" {{ $service->srv_id_etp == $entrepreneurship->id ? 'selected' : '' }}>
                                {{ $entrepreneurship->etp_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endforeach
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

        const createServiceForm = document.querySelector('#createServiceModal form');
        const createServiceButton = createServiceForm.querySelector('button[type="submit"]');
        
        createServiceForm.addEventListener('submit', function() {
            createServiceButton.disabled = true;
        });
    });
</script>
@stop
