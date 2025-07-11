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
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id </th>
                        <th scope="col">Nombre </th>
                        <th scope="col">Estado </th>
                        <th scope="col">Precio </th>
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
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editProductModal{{ $product->id_pdt }}">
                                Editar 
                            </button>
                                           
                        </td>
                        <td>
                            <form action="{{route('admin.products.destroy', $product)}}" method="POST" class="delete-form">
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showProductModal{{ $product->id_pdt }}">
                                Ver Detalles
                            </button>                  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Add pagination links -->
        <div class="d-flex justify-content-center pagination-wrapper">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
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
                        <label for="pdt_name" class="form-label">Nombre producto</label>
                        <input type="text" class="form-control" name="pdt_name" id="pdt_name">
                        @error('pdt_name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdt_description" class="form-label">Descripción producto</label>
                        <input type="text" class="form-control" name="pdt_description" id="pdt_description">
                        @error('pdt_description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdt_price" class="form-label">Precio producto</label>
                        <input type="number" class="form-control" name="pdt_price" id="pdt_price" maxlength="6" oninput="limitInputLength(this, 6)">
                        @error('pdt_price')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdt_img" class="form-label">Imagen producto</label>
                        <input type="file" class="form-control" name="pdt_img" id="pdt_img">
                        @error('pdt_img')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pdt_id_ctg" class="form-label">Categoría producto</label>
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

<!-- Modales de edición por producto -->
@foreach ($products as $product)
<div class="modal fade" id="editProductModal{{ $product->id_pdt }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id_pdt }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel{{ $product->id_pdt }}">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="pdt_name">Nombre producto</label>
                        <input type="text" class="form-control" name="pdt_name" value="{{ old('pdt_name', $product->pdt_name) }}">
                        @error('pdt_name')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="pdt_description">Descripción producto</label>
                        <input type="text" class="form-control" name="pdt_description" value="{{ old('pdt_description', $product->pdt_description) }}">
                        @error('pdt_description')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="pdt_price">Precio producto</label>
                        <input type="number" class="form-control" name="pdt_price" value="{{ old('pdt_price', $product->pdt_price) }}" maxlength="6" oninput="limitInputLength(this, 6)">
                        @error('pdt_price')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="pdt_img">Imagen Actual</label>
                        @if ($product->pdt_img)
                            <div>
                                <img src="{{ asset($product->pdt_img) }}" alt="Imagen del Producto" width="150">
                            </div>
                        @else
                            <p>No hay imagen disponible.</p>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="pdt_img">Nueva Imagen</label>
                        <input type="file" class="form-control" name="pdt_img">
                        @error('pdt_img')<p class="text-danger">{{ $message}}</p>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="pdt_id_ctg">Categoría producto</label>
                        <select name="pdt_id_ctg" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_ctg }}" {{ $product->pdt_id_ctg == $category->id_ctg ? 'selected' : '' }}>
                                    {{ $category->ctg_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('pdt_id_ctg')<p class="text-danger">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="pdt_status">Estatus</label>
                        <select class="form-control" name="pdt_status" {{ !auth()->user()->hasRole('Admin') ? 'disabled' : '' }}>
                            <option value="1" {{ $product->pdt_status == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="2" {{ $product->pdt_status == 2 ? 'selected' : '' }}>Inactivo</option>
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

@foreach ($products as $product)
<!-- Modal para mostrar producto -->
<div class="modal fade" id="showProductModal{{ $product->id_pdt }}" tabindex="-1" role="dialog" aria-labelledby="showProductModalLabel{{ $product->id_pdt }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showProductModalLabel{{ $product->id_pdt }}">Detalles del Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="pdt_name{{ $product->id_pdt }}" class="form-label">Nombre producto</label>
                    <input type="text" class="form-control" id="pdt_name{{ $product->id_pdt }}" value="{{ $product->pdt_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="pdt_description{{ $product->id_pdt }}" class="form-label">Descripción producto</label>
                    <input type="text" class="form-control" id="pdt_description{{ $product->id_pdt }}" value="{{ $product->pdt_description }}" readonly>
                </div>
                <div class="form-group">
                    <label for="pdt_price{{ $product->id_pdt }}" class="form-label">Precio producto</label>
                    <input type="text" class="form-control" id="pdt_price{{ $product->id_pdt }}" value="₡{{ number_format($product->pdt_price, 2) }}" readonly>
                </div>
                <div class="form-group">
                    <label for="ctg_name{{ $product->id_pdt }}" class="form-label">Categoría producto</label>
                    <input type="text" class="form-control" id="ctg_name{{ $product->id_pdt }}" value="{{ $product->category->ctg_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="etp_name{{ $product->id_pdt }}" class="form-label">Emprendimiento</label>
                    <input type="text" class="form-control" id="etp_name{{ $product->id_pdt }}" value="{{ $product->entrepreneurship->etp_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="pdt_status{{ $product->id_pdt }}" class="form-label">Estatus</label>
                    <input type="text" class="form-control" id="pdt_status{{ $product->id_pdt }}" value="{{ $product->pdt_status == 1 ? 'Activo' : 'Inactivo' }}" readonly>
                </div>

                 {{-- Mostrar imagen actual --}}
                 <div class="form-group">
                    <label for="pdt_img" class="form-label">Imagen Actual</label>
                    @if ($product->pdt_img)
                        <div>
                            <img src="{{ asset($product->pdt_img) }}" alt="Imagen del producto" width="150">
                        </div>
                    @else
                        <p>No hay imagen disponible.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


<x-chatbot />

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

function limitInputLength(element, maxLength) {
        if (element.value.length > maxLength) {
            element.value = element.value.slice(0, maxLength);
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        const createProductForm = document.querySelector('form[action="{{route('admin.products.store')}}"]');
        const createProductButton = createProductForm.querySelector('button[type="submit"]');

        createProductForm.addEventListener('submit', function() {
            createProductButton.disabled = true;
        });

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
