<x-app-layout>
    <div class="container mx-auto p-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <img src="{{ asset('images/services/' . basename($service->srv_img)) }}" alt="{{ $service->srv_name }}" class="w-full h-48 object-cover rounded-md mb-4">

            <h1 class="text-3xl font-bold text-gray-800">{{ $service->srv_name }}</h1>
            <p class="text-gray-600 mt-4">{{ $service->srv_description }}</p>
            <p class="text-gray-900 font-bold mt-4 text-2xl">₡{{ number_format($service->srv_price, 2) }}</p>
        </div>
    </div>
</x-app-layout>
