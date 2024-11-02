<x-app-layout>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <h1 class="text-5xl font-extrabold tracking-wide">Productos</h1>
            <p class="text-lg mt-2">Descubre una amplia variedad de productos al mejor precio.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-100 py-12" style="background: #dddddd;">
        <div class="container mx-auto px-4 lg:px-8">
            <h1 class="text-4xl font-bold mb-10 text-center text-gray-800">Explora nuestros productos</h1>
            
            <div class="flex">
                <!-- Filtro de Precio -->
                <div class="w-1/4 pr-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold mb-4 text-gray-700">Filtrar por precio</h2>
                        <form action="{{ route('client.products') }}" method="GET">
                            <div class="mb-4">
                                <label for="min_price" class="block text-gray-600">Precio mínimo</label>
                                <input type="number" name="min_price" id="min_price" class="w-full px-3 py-2 border rounded-md" placeholder="₡0" value="{{ request('min_price') }}">
                            </div>
                            <div class="mb-4">
                                <label for="max_price" class="block text-gray-600">Precio máximo</label>
                                <input type="number" name="max_price" id="max_price" class="w-full px-3 py-2 border rounded-md" placeholder="₡100000" value="{{ request('max_price') }}">
                            </div>
                            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition duration-200">Filtrar</button>
                        </form>
                    </div>
                </div>

                <!-- Contenedor para Productos -->
                <div class="w-3/4">
                    @if($products->isNotEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                        @foreach ($products as $product)
                            <div class="cardd relative border-2 border-black rounded-lg overflow-hidden transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg">
                                <img src="{{ $product->pdt_img }}" alt="{{ $product->pdt_name }}" class="w-full h-full object-cover transition-transform duration-300 ease-in-out">
                                <div class="contentt absolute inset-0 flex flex-col items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                                    <p class="title text-center text-white font-bold">
                                        {{ $product->pdt_name }}<br>
                                        <span>₡{{ number_format($product->pdt_price, 2) }}</span>
                                    </p>
                                    <a href="{{ route('client.product_details', $product->id_pdt) }}" class="mt-2 inline-block bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition duration-200">
                                        Ver más
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                        <!-- Paginación -->
                        <div class="mt-6">
                            {{ $products->links() }}
                        </div>
                    @else
                        <p class="text-center text-gray-600">No hay productos disponibles en este rango de precio.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <x-footer-client />

    <!-- Additional Styles -->
    <style>
        .cardd {
            position: relative;
            width: 100%;
            height: 254px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden; /* Asegura que el contenido no sobresalga */
        }

        .cardd img {
            transition: transform 0.5s ease;
        }

        .cardd:hover img {
            transform: scale(1.1); /* Escala la imagen al hacer hover */
        }

        .contentt {
            position: absolute;
            top: 0; /* Posición en la parte superior */
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0; /* Inicialmente oculto */
            transition: opacity 0.3s ease;
            background: rgba(0, 0, 0, 0.5); /* Fondo oscuro */
            padding: 1rem; /* Espaciado */
        }

        .cardd:hover .contentt {
            opacity: 1; /* Muestra el contenido al hacer hover */
        }

        .contentt .title {
            color: #fff;
            font-weight: bold;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .hero {
            background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url('/client/hero-products.jpg') no-repeat center center/cover;
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
    </style>
</x-app-layout>
