<x-app-layout>
    <div class="container mx-auto p-8">
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <!-- Imagen del servicio -->
            <img src="{{ asset('images/services/' . basename($service->srv_img)) }}" alt="{{ $service->srv_name }}" class="w-full h-80 object-cover rounded-lg mb-6">

            <!-- Título del servicio -->
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $service->srv_name }}</h1>

            <!-- Descripción del servicio -->
            <p class="text-lg text-gray-700 mb-6 leading-relaxed">{{ $service->srv_description }}</p>

            <!-- Precio del servicio -->
            <p class="text-3xl font-extrabold text-indigo-600 mb-6">₡{{ number_format($service->srv_price, 2) }}</p>

            <!-- Nombre del emprendimiento -->
            <p class="text-xl font-medium text-gray-600 mb-4">
                Emprendimiento: {{ $service->entrepreneurship->etp_name }}
            </p>

            <!-- Botón para contactar por WhatsApp -->
            @if ($service->entrepreneurship->etp_num)
                <a href="https://wa.me/{{ preg_replace('/\D/', '', $service->entrepreneurship->etp_num) }}?text=Hola%20{{ urlencode($service->entrepreneurship->etp_name) }}%2C%20estoy%20interesado%20en%20el%20servicio%20{{ urlencode($service->srv_name) }}."
                   target="_blank"
                   class="inline-block bg-indigo-600 text-white text-lg font-medium py-3 px-6 rounded-md hover:bg-indigo-700 transition duration-200">
                   Contactar con {{ $service->entrepreneurship->etp_name }}
                </a>
            @else
                <p class="text-red-600">Número de contacto no disponible.</p>
            @endif
        </div>
    </div>

    <!-- Additional Styles -->
    <style>
        .container {
            max-width: 900px;
        }
        .bg-white {
            background-color: #fff;
        }
        .rounded-xl {
            border-radius: 1rem;
        }
        .hover\:shadow-2xl:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</x-app-layout>
