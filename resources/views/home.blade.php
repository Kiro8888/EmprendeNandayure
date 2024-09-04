<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio - Emprendimientos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Ajustar la altura del carrusel */
            .carousel-inner img {
                height: 400px; /* Aumenta la altura del carrusel */
                object-fit: cover;
            }

            .carousel-container {
                margin-top: 20px; /* Añade espacio entre el carrusel y el nav */
                margin-bottom: 40px; /* Ajusta el espacio entre el carrusel y la sección de productos */
                position: relative; /* Necesario para la superposición */
            }

            /* Estilos para la capa de superposición */
            .carousel-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
                color: white;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                padding: 20px;
            }

            .carousel-overlay h1 {
                font-size: 3rem;
                font-weight: bold;
            }

            .carousel-overlay p {
                font-size: 1.5rem;
            }

            .products-section {
                margin-top: 40px; /* Espacio superior para separar esta sección del carrusel */
                margin-bottom: 40px; /* Espacio inferior para separar esta sección de la sección de emprendimientos */
            }

            .products-section .card {
                border: 2px solid green; /* Borde verde */
                margin-bottom: 20px; /* Espacio inferior entre las tarjetas de productos */
            }

            .entrepreneurships-section {
                margin-top: 40px; /* Espacio superior para separar esta sección de los productos */
            }
        </style>
    </head>
    <body>
        <!-- Usar container-fluid para ancho completo -->
        <div class="container-fluid">
            <div class="row">
                <!-- Carrusel Hero -->
                <div class="col-md-12 carousel-container">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/home/banner-01.jpg" class="d-block w-100" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img src="images/home/banner-02.jpg" class="d-block w-100" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img src="images/home/banner-03.jpg" class="d-block w-100" alt="Imagen 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>

                        <!-- Overlay con el título y la descripción -->
                        <div class="carousel-overlay">
                            <h1>Somos Emprende Nandayure</h1>
                            <p>Apoyando a los emprendedores locales en su crecimiento.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sección de Productos -->
            <div class="products-section">
                <div class="row">
                    <!-- Productos de ejemplo -->
                    <div class="col-md-4 mb-4">
                        <img src="images/home/icono.png" class="img-fluid" alt="Producto 1">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="images/home/icono2.png" class="img-fluid" alt="Producto 2">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="images/home/icono3.png" class="img-fluid" alt="Producto 3">
                    </div>
                </div>
            </div>
            
<!-- Sección de Emprendimientos usando Tailwind CSS -->
<div class="entrepreneurships-section">
    <h2 class="text-center mb-8 text-2xl font-bold">Nuestros Emprendimientos</h2>
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">
            @foreach ($entrepreneurships as $entrepreneurship)
                <div class="rounded overflow-hidden shadow-lg relative bg-white">
                    <a href="#">
                        <img class="w-full h-48 object-cover" src="{{ $entrepreneurship->etp_img ? asset($entrepreneurship->etp_img) : 'https://via.placeholder.com/500x300' }}" alt="{{ $entrepreneurship->etp_name }}">
                        <div class="absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25 hover:bg-transparent transition duration-300"></div>
                    </a>
                    <div class="px-6 py-4 text-center">
                        <a href="#" class="font-semibold text-lg block mb-2">
                            {{ $entrepreneurship->etp_name }}
                        </a>
                        <p class="text-gray-500 text-sm">
                            {{ $entrepreneurship->etp_description ?? 'No description available' }}
                        </p>
                    </div>
                    <div class="px-6 py-4 text-center">
                        <a href="#" class="bg-[#ADC178] text-white py-2 px-4 rounded-lg w-full">
                            Ver más
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

    
        <!-- Scripts de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>
    </html>
</x-app-layout>
