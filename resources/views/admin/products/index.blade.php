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
            <a class="btn btn-primary" href="{{route('admin.products.create')}}">
                <i class="fas fa-plus"></i> Crear Producto
            </a>
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
