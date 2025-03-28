{{-- Nav --}}
<x-app-layout>
    <div class="hero">
        <div class="hero-content">
            <h1>Próximos Eventos</h1>
            <p>Descubre los eventos más interesantes que se llevarán a cabo pronto.</p>
        </div>
    </div>

    <center>
    <div class="container my-5">
        @if($events->isEmpty())
            <p class="text-center text-muted">No hay eventos programados.</p>
        @else
            <div class="event-cards-container">
                @foreach($events as $event)
                    <div class="event-card">
                        @if($event->evt_img)
                            <div class="event-card-img-container">
                                <img src="{{ asset($event->evt_img) }}" class="event-card-img" alt="{{ $event->evt_name }}">
                            </div>
                        @else
                            <div class="event-card-img-placeholder">Imagen no disponible</div>
                        @endif
                        <div class="event-card-body">
                            <div class="event-card-header">
                                <h5 class="event-card-title">{{ $event->evt_name }}</h5>
                                <div class="event-card-date">
                                    <span>{{ \Carbon\Carbon::parse($event->evt_date)->format('d') }}</span>
                                    <small>{{ \Carbon\Carbon::parse($event->evt_date)->locale('es')->isoFormat('MMM') }}</small>
                                </div>
                            </div>
                            <p class="event-card-text">{{ \Illuminate\Support\Str::limit($event->evt_description, 100) }}</p>
                            <div class="event-card-footer">
                                <!-- Link "Leer más" para abrir el modal -->
                                <a href="javascript:void(0);" onclick="openModal({{ $event->id_evt }})" class="btn btn-primary leer-mas-btn">
                                    <span class="arrow">→</span> Leer más
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="eventModal{{ $event->id_evt }}" class="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $event->evt_name }}</h5>
                                    <button type="button" class="btn-close" onclick="closeModal({{ $event->id_evt }})">&times;</button>
                                </div>
                                <div class="modal-body">
                                    @if($event->evt_img)
                                        <img src="{{ asset($event->evt_img) }}" class="modal-img" alt="{{ $event->evt_name }}">
                                    @endif
                                    <p><strong>Descripción:</strong> {{ $event->evt_description }}</p>
                                    <p><strong>Hora:</strong> {{ $event->evt_hour }}</p>
                                    <p><strong>Ubicación:</strong> {{ $event->evt_location }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="closeModal({{ $event->id_evt }})">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</center>

    <style>
        .hero {
            background: url('/client/Events-hero.jpg') no-repeat center center;
            background-size: cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            position: relative;
        }

        .hero-content {
            background: rgba(0, 0, 0, 0.5);
            padding: 2rem;
            border-radius: 10px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }

        .hero p {
            font-size: 1.25rem;
        }

        .event-cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .event-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    width: 300px;
    margin-bottom: 1rem;
    position: relative; /* Aseguramos que el contenido se posicione dentro de la tarjeta */
}
.event-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .leer-mas-btn {
        display: flex;
        align-items: center;
        background-color: #2c6e49;
        color: #fff;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .leer-mas-btn:hover {
        background-color: #244d33;
    }

    .arrow {
        margin-right: 8px;
        font-size: 1.2rem;
    }
.event-card-date {
    position: absolute; /* Fijamos la fecha en la parte superior de la tarjeta */
    top: 30px;
    left: 10px;
    background: #2c6e49;
    color: #fff;
    padding: 0.5rem;
    border-radius: 5px;
    font-size: 1.25rem;
    font-weight: bold;
}

.event-card-img-container {
    position: relative;
}

.event-card-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.event-card-body {
    padding: 1rem;
    padding-top: 60px; /* Dejamos espacio para que la fecha no se superponga al contenido */
}

.event-card-title {
    font-size: 1.4rem; /* Aumentar tamaño */
    font-weight: 600;  /* Aumentar peso de la fuente */
    color: #2c6e49;    /* Color verde más fuerte para resaltar */
    margin-bottom: 0.5rem;
    text-transform: capitalize; /* Poner en mayúsculas la primera letra */
    font-family: 'Roboto', sans-serif; /* Fuente moderna */
}

.event-card-text {
    font-size: 1.1rem;  /* Aumentar el tamaño de la descripción */
    color: #495057;     /* Gris oscuro para mejor contraste */
    margin-bottom: 1rem;
    line-height: 1.6;    /* Mejorar la legibilidad */
    font-family: 'Open Sans', sans-serif; /* Fuente limpia */
}

.event-card-footer {
        display: flex;
        justify-content: center; /* Centra el contenido horizontalmente */
        align-items: center;     /* Alinea el contenido verticalmente */
        width: 100%;             /* Asegura que ocupe todo el ancho disponible */
    }



.event-card-footer p {
    margin: 0;
    font-weight: bold;
}

        .event-card:hover {
            transform: scale(1.02);
        }

        .event-card-img-container {
            position: relative;
        }

        .event-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .event-card-img-placeholder {
            width: 100%;
            height: 200px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 14px;
        }

        .event-card-date {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #2c6e49;
            color: #fff;
            text-align: center;
            padding: 0.5rem;
            border-radius: 5px;
        }

        .event-card-date span {
            display: block;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .event-card-date small {
            font-size: 0.875rem;
            text-transform: uppercase;
        }

        .event-card-body {
            padding: 1rem;
        }

        .event-card-title {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .event-card-text {
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .event-card-footer p {
            margin: 0;
            font-weight: bold;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-dialog {
            background: #fff;
            border-radius: 10px;
            padding: 2rem;
            position: relative;
            max-width: 90%;
            max-height: 90%;
            overflow: auto;
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .btn-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 1rem;
        }
    </style>

    <script>
        function openModal(eventId) {
            document.getElementById('eventModal' + eventId).style.display = 'flex';
        }

        function closeModal(eventId) {
            document.getElementById('eventModal' + eventId).style.display = 'none';
        }
    </script>
</x-app-layout>

<x-footer-client />
