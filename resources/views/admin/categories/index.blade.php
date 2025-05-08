@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Lista Categorías</h1>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCategoryModal">
                <i class="fas fa-plus"></i> Crear Categoría
            </button>       
         </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id_ctg}}</th>
                        <td>{{$category->ctg_name}}</td>
                        <td>{{$category->ctg_description}}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editCategoryModal{{$category->id_ctg}}">
                                Editar 
                            </button>
                        </td>
                        <td>
                            <form action="{{route('admin.categories.destroy', $category)}}" method="POST" class="delete-form">
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
          <!-- Add pagination links -->
          <div class="d-flex justify-content-center pagination-wrapper">
              {{ $categories->links('pagination::bootstrap-4') }}
          </div>
    </div>
    <x-chatbot />
</div>

<!-- Modal de crear categoría -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCategoryModalLabel">Crear Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para crear categoría -->
                <form action="{{route('admin.categories.store')}}" method="POST" id="createCategoryForm">
                    @csrf
                    <div class="form-group">
                        <label for="ctg_name" class="form-label">Nombre de la Categoría</label>
                        <input type="text" class="form-control" name="ctg_name" id="ctg_name">
                        @error('ctg_name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ctg_description" class="form-label">Descripción de la Categoría</label>
                        <input type="text" class="form-control" name="ctg_description" id="ctg_description">
                        @error('ctg_description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" id="createCategoryButton">Crear Categoría</button>
                </form>
            </div>
        </div>
    </div>
</div>


@foreach ($categories as $category)
<!-- Modal de Editar Categoría -->
<div class="modal fade" id="editCategoryModal{{$category->id_ctg}}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{$category->id_ctg}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel{{$category->id_ctg}}">Editar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="ctg_name{{$category->id_ctg}}" class="form-label">Nombre categoría</label>
                        <input type="text" class="form-control" name="ctg_name" id="ctg_name{{$category->id_ctg}}" value="{{ old('ctg_name', $category->ctg_name) }}">
                        @error('ctg_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ctg_description{{$category->id_ctg}}" class="form-label">Descripción categoría</label>
                        <input type="text" class="form-control" name="ctg_description" id="ctg_description{{$category->id_ctg}}" value="{{ old('ctg_description', $category->ctg_description) }}">
                        @error('ctg_description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const createCategoryForm = document.getElementById('createCategoryForm');
        const createCategoryButton = document.getElementById('createCategoryButton');

        createCategoryForm.addEventListener('submit', function() {
            createCategoryButton.disabled = true;
        });

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
