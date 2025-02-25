@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Lista de productos</h1>
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
            <!-- Botón para abrir el modal -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#createProductModal">
                <i class="fas fa-plus"></i> Crear Producto
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
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$product->id_pdt}}</th>
                    <td>{{$product->pdt_name}}</td>
                    <td>
                        @if ($product->pdt_status == 1)
                            Activo
                        @elseif ($product->pdt_status == 2)
                            Inactivo
                        @else
                            Desconocido
                        @endif
                    </td>
                    <td>{{$product->pdt_price}}</td>
                    <td>{{$product->entrepreneurship->etp_name ?? 'Desconocido' }}</td>
                    <td>{{$product->category->ctg_name ?? 'Desconocido' }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.products.edit', $product)}}">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('admin.products.destroy', $product)}}" method="POST" class="delete-form">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.products.show', $product)}}">Mostrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de crear producto -->
<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductModalLabel">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí va el formulario que ya tenías para crear producto -->
                <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="pdt_name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="pdt_name" id="pdt_name">
                        @error('pdt_name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdt_description" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="pdt_description" id="pdt_description">
                        @error('pdt_description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdt_price" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="pdt_price" id="pdt_price">
                        @error('pdt_price')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdt_img" class="form-label">Imagen</label>
                        <input type="file" class="form-control" name="pdt_img" id="pdt_img">
                        @error('pdt_img')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdt_id_ctg" class="form-label">Categoría</label>
                        <select name="pdt_id_ctg" id="pdt_id_ctg" class="form-control">
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_ctg }}">{{ $category->ctg_name }}</option>
                            @endforeach
                        </select>
                        @error('pdt_id_ctg')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdt_id_etp" class="form-label">Emprendimiento</label>
                        <select name="pdt_id_etp" id="pdt_id_etp" class="form-control">
                            <option value="">Seleccione un emprendimiento</option>
                            @foreach ($entrepreneurships as $entrepreneurship)
                                <option value="{{ $entrepreneurship->id }}">{{ $entrepreneurship->etp_name }}</option>
                            @endforeach
                        </select>
                        @error('pdt_id_etp')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Producto</button>
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
                const form = this.closest('form');
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
                        form.submit();
                    }
                });
            });
        });
    });
</script>

@stop
