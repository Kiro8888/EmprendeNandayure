<x-app-layout>
    <!-- Contenedor principal con fondo blanco -->
    <div class="bg-white min-h-screen">
        <!-- Hero Section -->
        <div class="hero">
            <div class="hero-content">
                <h1 class="text-5xl font-extrabold tracking-wide">Productos</h1>
                <p class="text-lg mt-2">Descubre una amplia variedad de productos al mejor precio.</p>
            </div>
        </div>
        <div class="gtranslate_wrapper"></div>
        <script>
            window.gtranslateSettings = {
                "default_language": "es",  // Español como idioma predeterminado
                "languages": ["es", "en", "de"],  // Español, inglés, alemán
                "wrapper_selector": ".gtranslate_wrapper"  // Selector donde aparecerá el widget
            };
        </script>
        <script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
        <!-- Main Content -->
        <div class="bg-gray-100 py-12">
            <div class="container mx-auto px-4 lg:px-8">
                <h1 class="text-4xl font-bold mb-10 text-center text-gray-800">Explora nuestros productos</h1>
                
                <div class="flex flex-col lg:flex-row">
                    <!-- Filtro de Precio y Categoría -->
                    <div class="w-full lg:w-1/4 lg:pr-6 mb-6 lg:mb-0">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h2 class="text-xl font-bold mb-4 text-gray-700">Filtrar</h2>
                            <form action="{{ route('client.products') }}" method="GET">
                                <!-- Filtro por Precio -->
                                <div class="mb-4">
                                    <label for="min_price" class="block text-gray-600">Precio mínimo</label>
                                    <input type="number" name="min_price" id="min_price" 
                                           class="w-full px-3 py-2 border rounded-md sm:text-sm lg:text-base" 
                                           placeholder="₡0" value="{{ request('min_price') }}">
                                </div>
                                <div class="mb-4">
                                    <label for="max_price" class="block text-gray-600">Precio máximo</label>
                                    <input type="number" name="max_price" id="max_price" 
                                           class="w-full px-3 py-2 border rounded-md sm:text-sm lg:text-base" 
                                           placeholder="₡100000" value="{{ request('max_price') }}">
                                </div>
                                <!-- Filtro por Categoría -->
                                <div class="mb-4">
                                    <label for="categories" class="block text-gray-600">Categoría</label>
                                    <select name="categories" id="categories" class="w-full px-3 py-2 border rounded-md">
                                        <option value="">Selecciona una categoría</option>
                                        <option value="frutas" {{ request('categories') == 'frutas' ? 'selected' : '' }}>Frutas</option>
                                        <option value="verdura" {{ request('categories') == 'verdura' ? 'selected' : '' }}>Verdura</option>
                                        <option value="reposteria" {{ request('categories') == 'reposteria' ? 'selected' : '' }}>Repostería</option>
                                        <option value="accesorios" {{ request('categories') == 'accesorios' ? 'selected' : '' }}>Accesorios</option>
                                    </select>
                                </div>
                                <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition duration-200" style="background-color: #009A00;">Filtrar</button>
                            </form>
                        </div>
                    </div>

                    <!-- Contenedor para Productos -->
                    <div class="w-full lg:w-3/4">
                        @if($products->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                            @foreach ($products as $product)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:scale-105">
                                    <div class="relative">
                                        <img src="{{ $product->pdt_img }}" alt="{{ $product->pdt_name }}" class="w-full h-40 object-cover">
                                        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded">New</span>
                                    </div>
                                    <div class="p-4">
                                        <h2 class="text-lg font-bold text-gray-800 text-center">{{ $product->pdt_name }}</h2>
                                        <div class="flex items-center justify-center space-x-2 mt-2">
                                            <span class="text-green-600 font-bold text-xl">₡{{ number_format($product->pdt_price, 2) }}</span>
                                        </div>
                                        <!-- Botón Ver Más -->
                                        <div class="mt-4">
                                            <a href="{{ route('client.product_details', $product->id_pdt) }}" 
                                               class="w-full inline-block text-center text-white py-2 px-4 rounded-md transition duration-200 hover:bg-green-700" 
                                               style="background-color: #009A00;">
                                                Ver más
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Paginación -->
                        <div class="mt-6">
                            {{ $products->links() }}
                        </div>
                        @else
                            <p class="text-center text-gray-600">No hay productos disponibles en este rango de precio y categoría.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <x-footer-client />
    </div>

    <!-- Link to external CSS -->
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
</x-app-layout>
