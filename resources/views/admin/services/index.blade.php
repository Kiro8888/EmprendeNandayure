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
                        <a class="btn btn-warning" href="{{ route('admin.services.edit', $service) }}">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="delete-form">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.services.show', $service) }}">Mostrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
                        <label for="srv_name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="srv_name" id="srv_name">
                        @error('srv_name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="srv_description" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="srv_description" id="srv_description">
                        @error('srv_description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="srv_price" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="srv_price" id="srv_price">
                        @error('srv_price')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="srv_img" class="form-label">Imagen</label>
                        <input type="file" class="form-control" name="srv_img" id="srv_img">
                        @error('srv_img')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="srv_id_ctg" class="form-label">Categoría</label>
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
