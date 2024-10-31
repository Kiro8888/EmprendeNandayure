@extends('adminlte::page')

@section('title', 'Emprendedores en Espera')

@section('content_header')
    <h1>Emprendedores en espera a ser aceptados</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-info" role="alert">
    {{ session('info') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($waitingEntrepreneurs as $entrepreneur)
                    <tr>
                        <th scope="row">{{ $entrepreneur->id }}</th>
                        <td>{{ $entrepreneur->name }} {{ $entrepreneur->last_name }}</td>
                        <td>{{ $entrepreneur->email }}</td>
                        <td>{{ $entrepreneur->cellphone }}</td>
                        <td>{{ $entrepreneur->cedula }}</td>
                        <td>{{ $entrepreneur->status }}</td>
                        <td>
                   
                           
                            
                            <!-- Formulario para cambiar el estado a Activo -->
                            <form action="{{ route('admin.waiting_entrepreneur.activate', $entrepreneur) }}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-success" type="submit">Activar</button>
                            </form>
                            <!-- Formulario para eliminar el registro -->
                            <form action="{{ route('admin.waiting_entrepreneur.destroy', $entrepreneur) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
