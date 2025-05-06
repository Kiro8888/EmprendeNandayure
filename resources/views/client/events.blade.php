{{-- Nav --}}
<x-app-layout>
    <div class="hero">
        <video class="hero-video" autoplay muted loop>
            <source src="client/hero-video2.mp4" type="video/mp4">
            Tu navegador no soporta la reproducción de videos. Por favor, actualiza tu navegador o contacta al administrador.
        </video>

        
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

    <link rel="stylesheet" href="{{ asset('css/events.css') }}">

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
