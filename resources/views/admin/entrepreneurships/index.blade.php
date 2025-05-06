@extends('adminlte::page')

@section('title', 'Admin Nandayure')

@section('content_header')
    <h1>Lista de emprendimientos</h1>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#createEntrepreneurshipModal">
                <i class="fas fa-plus"></i> Crear Emprendimiento
            </button>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Número</th>
                    <th>Correo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Mostrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entrepreneurships as $entrepreneurship)
                <tr>
                    <th>{{ $entrepreneurship->id }}</th>
                    <td>{{ $entrepreneurship->etp_name }}</td>
                    <td>{{ $entrepreneurship->etp_status == 1 ? 'Activo' : ($entrepreneurship->etp_status == 2 ? 'Inactivo' : 'Desconocido') }}</td>
                    <td>{{ $entrepreneurship->etp_num }}</td>
                    <td>{{ $entrepreneurship->etp_email }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-edit" data-toggle="modal" 
                            data-target="#editEntrepreneurshipModal{{ $entrepreneurship->id }}" 
                            data-id="{{ $entrepreneurship->id }}"
                            data-name="{{ $entrepreneurship->etp_name }}"
                            data-latitude="{{ $entrepreneurship->etp_latitude }}"
                            data-longitude="{{ $entrepreneurship->etp_longitude }}"
                            data-num="{{ $entrepreneurship->etp_num }}"
                            data-email="{{ $entrepreneurship->etp_email }}">
                            Editar 
                        </button>
                    </td>
                    <td>
                        <form action="{{ route('admin.entrepreneurships.destroy', $entrepreneurship) }}" method="POST" class="delete-form">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showEntrepreneurshipModal{{ $entrepreneurship->id }}">
                            Ver Detalles
                        </button>      
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Agregar enlaces de paginación con estilo Bootstrap 4 --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $entrepreneurships->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<x-chatbot />

<!-- Modal de crear emprendimiento -->
<div class="modal fade" id="createEntrepreneurshipModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Crear Emprendimiento</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.entrepreneurships.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nombre emprendimiento</label>
                        <input type="text" class="form-control" name="etp_name" required>
                    </div>
                    <div class="form-group">
                        <label for="etp_num" class="form-label">Número emprendimiento</label>
                        <input type="number" class="form-control" name="etp_num" id="etp_num"  maxlength="8" oninput="limitInputLength(this, 8)">
                        @error('etp_num')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="etp_email" class="form-label">Correo emprendimiento</label>
                        <input type="email" class="form-control" name="etp_email" id="etp_email">
                        @error('etp_email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="etp_img" class="form-label">Imagen emprendimiento</label>
                        <input type="file" class="form-control" name="etp_img" id="etp_img">
                        @error('etp_img')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div id="map-create" style="height: 400px; width: 100%;"></div>
                    <button type="button" class="btn btn-secondary mt-2" id="get-current-location">
                        Obtener mi ubicación actual
                    </button>
                    <input type="hidden" name="etp_latitude" id="etp_latitude_create">
                    <input type="hidden" name="etp_longitude" id="etp_longitude_create">
                    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($entrepreneurships as $entrepreneurship)
<!-- Modal de edición -->
<div class="modal fade" id="editEntrepreneurshipModal{{ $entrepreneurship->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Editar Emprendimiento</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.entrepreneurships.update', $entrepreneurship) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nombre emprendimiento</label>
                        <input type="text" class="form-control" name="etp_name" value="{{ $entrepreneurship->etp_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="etp_status" class="form-label">Estatus</label>
                        <select class="form-control" name="etp_status">
                            <option value="1" {{ $entrepreneurship->etp_status == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="2" {{ $entrepreneurship->etp_status == 2 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="etp_num" class="form-label">Número emprendimiento</label>
                        <input type="number" class="form-control" name="etp_num" value="{{ $entrepreneurship->etp_num }}" maxlength="8" oninput="limitInputLength(this, 8)">
                    </div>
                    <div class="form-group">
                        <label for="etp_email" class="form-label">Correo emprendimiento</label>
                        <input type="email" class="form-control" name="etp_email" value="{{ $entrepreneurship->etp_email }}">
                    </div>
                    <div class="form-group">
                        <label for="etp_img" class="form-label">Imagen Actual</label>
                        @if ($entrepreneurship->etp_img)
                            <div>
                                <img src="{{ asset($entrepreneurship->etp_img) }}" alt="Imagen del Emprendimiento" width="150">
                            </div>
                        @else
                            <p>No hay imagen disponible.</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="etp_img" class="form-label">Nueva Imagen</label>
                        <input type="file" class="form-control" name="etp_img">
                    </div>
                    <div id="map-edit-{{ $entrepreneurship->id }}" style="height: 400px; width: 100%;"></div>
                    <input type="hidden" name="etp_latitude" id="edit_etp_latitude_{{ $entrepreneurship->id }}" value="{{ $entrepreneurship->etp_latitude }}">
                    <input type="hidden" name="etp_longitude" id="edit_etp_longitude_{{ $entrepreneurship->id }}" value="{{ $entrepreneurship->etp_longitude }}">
                    <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($entrepreneurships as $entrepreneurship)
<!-- Modal para mostrar -->
<div class="modal fade" id="showEntrepreneurshipModal{{ $entrepreneurship->id }}" tabindex="-1" role="dialog" aria-labelledby="showEntrepreneurshipModalLabel{{ $entrepreneurship->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="showEntrepreneurshipModalLabel{{ $entrepreneurship->id }}">Detalles del Emprendimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.entrepreneurships.show', $entrepreneurship)}}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- Primer campo --}}
                    <div class="form-group">
                        <label for="etp_name" class="form-label">Nombre emprendimiento</label>
                        <input type="text" class="form-control" name="etp_name" id="etp_name" value="{{$entrepreneurship->etp_name}}" readonly>
                        @error('etp_name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    {{-- Tercer campo --}}
                    <div class="form-group">
                        <label for="etp_latitude" class="form-label">Latitud</label>
                        <input type="text" class="form-control" name="etp_latitude" id="etp_latitude" readonly value="{{$entrepreneurship->etp_latitude}}">
                        @error('etp_latitude')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    {{-- Cuarto campo --}}
                    <div class="form-group">
                        <label for="etp_longitude" class="form-label">Longitud</label>
                        <input type="text" class="form-control" name="etp_longitude" id="etp_longitude" readonly value="{{$entrepreneurship->etp_longitude}}">
                        @error('etp_longitude')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    {{-- Quinto campo --}}
                    <div class="form-group">
                        <label for="etp_status" class="form-label">Estatus</label>
                        <select class="form-control" name="etp_status" id="etp_status" disabled>
                            <option value="1" {{ $entrepreneurship->etp_status == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="2" {{ $entrepreneurship->etp_status == 2 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('etp_status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- Sexto campo --}}
                    <div class="form-group">
                        <label for="etp_num" class="form-label">Número emprendimiento</label>
                        <input type="number" class="form-control" name="etp_num" id="etp_num"  value="{{$entrepreneurship->etp_num}}" readonly>
                        @error('etp_num')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                    {{-- Setimo campo --}}
                    <div class="form-group">
                        <label for="etp_email" class="form-label">Correo emprendimiento</label>
                        <input type="email" class="form-control" name="etp_email" id="etp_email"  value="{{$entrepreneurship->etp_email}}" readonly>
                        @error('etp_email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                     {{-- Mostrar imagen actual --}}
                     <div class="form-group">
                        <label for="etp_img" class="form-label">Imagen Actual</label>
                        @if ($entrepreneurship->etp_img)
                            <div>
                                <img src="{{ asset($entrepreneurship->etp_img) }}" alt="Imagen del Servicio" width="150">
                            </div>
                        @else
                            <p>No hay imagen disponible.</p>
                        @endif
                    </div>             
                    {{-- MAP --}}
                    <div id="map-show-{{ $entrepreneurship->id }}" style="height: 400px; width: 100%;"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@section('js')
<script>
    let mapCreate;
    function initMap() {
        mapCreate = new google.maps.Map(document.getElementById('map-create'), {
            center: { lat: 9.9333, lng: -84.0833 },
            zoom: 10
        });
        let markerCreate = new google.maps.Marker({ map: mapCreate, draggable: true });
        mapCreate.addListener('click', function(event) {
            markerCreate.setPosition(event.latLng);
            document.getElementById('etp_latitude_create').value = event.latLng.lat();
            document.getElementById('etp_longitude_create').value = event.latLng.lng();
        });

        document.getElementById('get-current-location').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    mapCreate.setCenter(currentLocation);
                    markerCreate.setPosition(currentLocation);
                    document.getElementById('etp_latitude_create').value = currentLocation.lat;
                    document.getElementById('etp_longitude_create').value = currentLocation.lng;
                }, function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo obtener la ubicación actual. Por favor, habilita el acceso a la ubicación en tu dispositivo.'
                    });
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'La geolocalización no es compatible con este navegador.'
                });
            }
        });

        @foreach ($entrepreneurships as $entrepreneurship)
        const mapEdit{{ $entrepreneurship->id }} = new google.maps.Map(document.getElementById('map-edit-{{ $entrepreneurship->id }}'), {
            center: { lat: parseFloat('{{ $entrepreneurship->etp_latitude }}'), lng: parseFloat('{{ $entrepreneurship->etp_longitude }}') },
            zoom: 10
        });
        const markerEdit{{ $entrepreneurship->id }} = new google.maps.Marker({
            position: { lat: parseFloat('{{ $entrepreneurship->etp_latitude }}'), lng: parseFloat('{{ $entrepreneurship->etp_longitude }}') },
            map: mapEdit{{ $entrepreneurship->id }},
            draggable: true
        });
        mapEdit{{ $entrepreneurship->id }}.addListener('click', function(event) {
            markerEdit{{ $entrepreneurship->id }}.setPosition(event.latLng);
            document.getElementById('edit_etp_latitude_{{ $entrepreneurship->id }}').value = event.latLng.lat();
            document.getElementById('edit_etp_longitude_{{ $entrepreneurship->id }}').value = event.latLng.lng();
        });
        @endforeach

        @foreach ($entrepreneurships as $entrepreneurship)
        let mapShow{{ $entrepreneurship->id }} = new google.maps.Map(document.getElementById('map-show-{{ $entrepreneurship->id }}'), {
            center: { lat: parseFloat('{{ $entrepreneurship->etp_latitude }}'), lng: parseFloat('{{ $entrepreneurship->etp_longitude }}') },
            zoom: 10
        });
        new google.maps.Marker({
            position: { lat: parseFloat('{{ $entrepreneurship->etp_latitude }}'), lng: parseFloat('{{ $entrepreneurship->etp_longitude }}') },
            map: mapShow{{ $entrepreneurship->id }}
        });
        @endforeach
    }

    function limitInputLength(element, maxLength) {
        if (element.value.length > maxLength) {
            element.value = element.value.slice(0, maxLength);
        }
    }

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

        // Validar ubicación antes de enviar el formulario de creación
        const createForm = document.querySelector('#createEntrepreneurshipModal form');
        createForm.addEventListener('submit', function(event) {
            const latitude = document.getElementById('etp_latitude_create').value;
            const longitude = document.getElementById('etp_longitude_create').value;

            if (!latitude || !longitude) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Es obligatorio registrar una ubicación en el mapa.'
                });
                return;
            }
        });

        // Validar ubicación antes de enviar el formulario de edición
        @foreach ($entrepreneurships as $entrepreneurship)
        const editForm{{ $entrepreneurship->id }} = document.querySelector('#editEntrepreneurshipModal{{ $entrepreneurship->id }} form');
        editForm{{ $entrepreneurship->id }}.addEventListener('submit', function(event) {
            const latitude = document.getElementById('edit_etp_latitude_{{ $entrepreneurship->id }}').value;
            const longitude = document.getElementById('edit_etp_longitude_{{ $entrepreneurship->id }}').value;

            if (!latitude || !longitude) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Es obligatorio registrar una ubicación en el mapa.'
                });
                return;
            }
        });
        @endforeach
    });

    document.addEventListener('DOMContentLoaded', function() {
        const createForm = document.querySelector('#createEntrepreneurshipModal form');
        createForm.addEventListener('submit', async function(event) {
            event.preventDefault();
            const email = document.getElementById('etp_email').value;
            const phone = document.getElementById('etp_num').value;

            const emailExists = await checkDuplicate('email', email);
            const phoneExists = await checkDuplicate('phone', phone);

            if (emailExists || phoneExists) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: emailExists ? 'El correo ya está registrado.' : 'El número ya está registrado.'
                });
                return;
            }

            this.submit();
        });

        async function checkDuplicate(type, value) {
            const url = type === 'email' ? '{{ route("admin.entrepreneurships.checkEmail") }}' : '{{ route("admin.entrepreneurships.checkPhone") }}';
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ [type]: value })
            });
            const data = await response.json();
            return data.exists;
        }
    });
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJgtyUKa--FH9PWRW9ptMzz8-ofLvJgr0&callback=initMap"></script>
@endsection
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