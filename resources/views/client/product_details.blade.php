<x-app-layout>
    <div class="container mx-auto p-8">
        <div class="flex items-center bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <!-- Imagen del producto -->
            <div class="w-1/2">
                <img src="{{ asset('images/products/' . basename($product->pdt_img)) }}" alt="{{ $product->pdt_name }}" class="w-full h-auto object-cover rounded-lg">
            </div>

            <!-- Detalles del producto -->
            <div class="w-1/2 pl-8">
                <!-- Título del producto -->
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->pdt_name }}</h1>

                <!-- Precio del producto -->
                <p class="text-2xl text-green-600 font-semibold mb-4">₡{{ number_format($product->pdt_price, 2) }}</p>

                <!-- Descripción del producto -->
                <p class="text-gray-700 mb-6 leading-relaxed">{{ $product->pdt_description }}</p>

                <!-- Botón para contactar por WhatsApp -->
                @if ($product->entrepreneurship->etp_num)
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $product->entrepreneurship->etp_num) }}?text=Hola%20{{ urlencode($product->entrepreneurship->etp_name) }}%2C%20estoy%20interesado%20en%20el%20producto%20{{ urlencode($product->pdt_name) }}."
                       target="_blank"
                       class="inline-block bg-green-600 text-white text-lg font-medium py-3 px-6 rounded-md hover:bg-green-700 transition duration-200">
                       Contactar 
                    </a>
                @else
                    <p class="text-red-600">Número de contacto no disponible.</p>
                @endif
            </div>
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
</x-app-layout>
