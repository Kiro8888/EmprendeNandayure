@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Lista de eventos</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-info" role="alert">
    {{ session('info') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#createEventModal">
                <i class="fas fa-plus"></i> Crear evento
            </button>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre evento</th>
                    <th scope="col">Descripción evento</th>
                    <th scope="col">Fecha evento</th>
                    <th scope="col">Hora evento</th>
                    <th scope="col">Lugar evento</th>
                    <th scope="col">Editar evento</th>
                    <th scope="col">Eliminar evento</th>
                    <th scope="col">Mostrar evento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <th scope="row">{{ $event->id_evt }}</th>
                    <td>{{ $event->evt_name }}</td>
                    <td>{{ $event->evt_description }}</td>
                    <td>{{ $event->evt_date }}</td>
                    <td>{{ $event->evt_hour }}</td>
                    <td>{{ $event->evt_location }}</td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editEventModal">
                            Editar 
                        </button>                    
                    </td>
                    <td>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="delete-form">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#showEventModal{{ $event->id_evt }}">Mostrar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para crear evento -->
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="createEventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="createEventModalLabel">Crear Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="evt_name">Nombre evento</label>
                        <input type="text" class="form-control" name="evt_name" id="evt_name">
                        @error('evt_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="evt_description">Descripción evento</label>
                        <input type="text" class="form-control" name="evt_description" id="evt_description">
                        @error('evt_description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="evt_date">Fecha evento</label>
                        <input type="date" class="form-control" name="evt_date" id="evt_date" min="{{ date('Y-m-d') }}">
                        @error('evt_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="evt_hour">Hora evento</label>
                        <input type="time" class="form-control" name="evt_hour" id="evt_hour">
                        @error('evt_hour')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="evt_location">Lugar evento</label>
                        <input type="text" class="form-control" name="evt_location" id="evt_location">
                        @error('evt_location')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="evt_img">Imagen evento</label>
                        <input type="file" class="form-control" name="evt_img" id="evt_img">
                        @error('evt_img')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

@foreach ($events as $event)
<div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editEventModalLabel">Editar evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.events.update', $event)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="evt_name">Nombre evento</label>
                        <input type="text" class="form-control" name="evt_name" id="evt_name" value="{{$event->evt_name}}">
                        @error('evt_name')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="evt_description">Descripción evento</label>
                        <input type="text" class="form-control" name="evt_description" id="evt_description" value="{{$event->evt_description}}">
                        @error('evt_description')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="evt_date">Fecha evento</label>
                        <input type="date" class="form-control" name="evt_date" id="evt_date" value="{{$event->evt_date}}">
                        @error('evt_date')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="evt_hour">Hora evento</label>
                        <input type="time" class="form-control" name="evt_hour" id="evt_hour" value="{{$event->evt_hour}}">
                        @error('evt_hour')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="evt_location">Lugar evento</label>
                        <input type="text" class="form-control" name="evt_location" id="evt_location" value="{{$event->evt_location}}">
                        @error('evt_location')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="evt_img">Imagen Actual</label>
                        @if ($event->evt_img)
                            <div>
                                <img src="{{ asset($event->evt_img) }}" alt="Imagen del evento" width="150">
                            </div>
                        @else
                            <p>No hay imagen disponible.</p>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="evt_img">Nueva Imagen</label>
                        <input type="file" class="form-control" name="evt_img" id="evt_img">
                        @error('evt_img')<p class="text-danger">{{ $message }}</p>@enderror
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
@foreach ($events as $event)
<!-- Modal para mostrar evento -->
<div class="modal fade" id="showEventModal{{ $event->id_evt }}" tabindex="-1" role="dialog" aria-labelledby="showEventModalLabel{{ $event->id_evt }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="showEventModalLabel{{ $event->id_evt }}">Detalles del Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="evt_name{{ $event->id_evt }}" class="form-label">Nombre evento</label>
                        <input type="text" class="form-control" id="evt_name{{ $event->id_evt }}" value="{{ $event->evt_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="evt_description{{ $event->id_evt }}" class="form-label">Descripción evento</label>
                        <input type="text" class="form-control" id="evt_description{{ $event->id_evt }}" value="{{ $event->evt_description }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="evt_date{{ $event->id_evt }}" class="form-label">Fecha evento</label>
                        <input type="text" class="form-control" id="evt_date{{ $event->id_evt }}" value="{{ $event->evt_date }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="evt_hour{{ $event->id_evt }}" class="form-label">Hora evento</label>
                        <input type="text" class="form-control" id="evt_hour{{ $event->id_evt }}" value="{{ $event->evt_hour }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="evt_location{{ $event->id_evt }}" class="form-label">Lugar evento</label>
                        <input type="text" class="form-control" id="evt_location{{ $event->id_evt }}" value="{{ $event->evt_location }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="evt_img{{ $event->id_evt }}" class="form-label">Imagen Actual</label>
                        <div>
                            @if ($event->evt_img)
                                <img src="{{ asset($event->evt_img) }}" alt="Imagen del evento" width="150">
                            @else
                                <p>No hay imagen disponible.</p>
                            @endif
                        </div>
                    </div>
                </form>
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

        const createEventForm = document.querySelector('#createEventModal form');
        const createEventButton = createEventForm.querySelector('button[type="submit"]');
        
        createEventForm.addEventListener('submit', function() {
            createEventButton.disabled = true;
        });

    });
</script>

@stop
