<x-app-layout>
    <div class="container mx-auto p-8">
        <div class="flex items-center bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <!-- Imagen del servicio -->
            <div class="w-1/2">
                <img src="{{ asset('images/services/' . basename($service->srv_img)) }}" alt="{{ $service->srv_name }}" class="w-full h-auto object-cover rounded-lg">
            </div>

            <!-- Detalles del servicio -->
            <div class="w-1/2 pl-8">
                <!-- Título del servicio -->
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $service->srv_name }}</h1>

                <!-- Precio del servicio -->
                <p class="text-2xl text-indigo-600 font-semibold mb-4">₡{{ number_format($service->srv_price, 2) }}</p>

                <!-- Descripción del servicio -->
                <p class="text-gray-700 mb-6 leading-relaxed">{{ $service->srv_description }}</p>

                <!-- Botón para contactar por WhatsApp -->
                @if ($service->entrepreneurship->etp_num)
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $service->entrepreneurship->etp_num) }}?text=Hola%20{{ urlencode($service->entrepreneurship->etp_name) }}%2C%20estoy%20interesado%20en%20el%20servicio%20{{ urlencode($service->srv_name) }}."
                       target="_blank"
                       class="inline-block bg-green-600 text-white text-lg font-medium py-3 px-6 rounded-md hover:bg-green-700 transition duration-200">
                       Contactar
                    </a>
                @else
                    <p class="text-red-600">Número de contacto no disponible.</p>
                @endif

                <!-- Botón para abrir el formulario de cotización -->
                @if ($service->entrepreneurship->etp_num)
                    <button id="quoteButton"
                            class="inline-block bg-blue-600 text-white text-lg font-medium py-3 px-6 rounded-md hover:bg-blue-700 transition duration-200">
                        Solicitar Cotización
                    </button>
                @else
                    <p class="text-red-600">Número de contacto no disponible.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal para el formulario de cotización -->
    <div id="quoteModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Formulario de Cotización</h2>
            <form id="quoteForm">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nombre:</label>
                    <input type="text" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="details" class="block text-gray-700 font-medium mb-2">Detalles del Servicio:</label>
                    <textarea id="details" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Escribe los detalles del servicio que necesitas..." required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelButton" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 transition duration-200 mr-2">Cancelar</button>
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Additional Styles -->
    <style>
        .container {
            max-width: 1000px;
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

    <script>
        // Mostrar el modal
        document.getElementById('quoteButton').addEventListener('click', () => {
            document.getElementById('quoteModal').classList.remove('hidden');
        });

        // Ocultar el modal
        document.getElementById('cancelButton').addEventListener('click', () => {
            document.getElementById('quoteModal').classList.add('hidden');
        });

        // Enviar el formulario de cotización
        document.getElementById('quoteForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const name = document.getElementById('name').value;
            const details = document.getElementById('details').value;
            const serviceName = "{{ $service->srv_name }}";
            const whatsappNumber = "{{ preg_replace('/\D/', '', $service->entrepreneurship->etp_num) }}";

            const whatsappMessage = `Hola, mi nombre es ${encodeURIComponent(name)}. Estoy interesado en el servicio "${encodeURIComponent(serviceName)}". Aquí están los detalles: ${encodeURIComponent(details)}`;

            // Redirigir a WhatsApp
            window.open(`https://wa.me/${whatsappNumber}?text=${whatsappMessage}`, '_blank');

            // Ocultar el modal
            document.getElementById('quoteModal').classList.add('hidden');
        });
    </script>
</x-app-layout>
<!-- Footer Start -->
<x-footer-client />
<!-- Footer End -->