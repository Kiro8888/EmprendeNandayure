<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio - Emprendimientos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">   
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  
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
            body {
    background-color: #ffffff; /* Color de fondo blanco */
}
        </style>
    </head>
    <body>
        <!-- Usar container-fluid para ancho completo -->
   <!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/home/carousel-1.jpg" class="d-block w-100 carousel-img" alt="Imagen 1">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <h1 class="display-1 text-white mb-5 animated slideInDown">Somos Emprende Nandayure</h1>
                        <p class="text-white mb-4">Apoyando a los emprendedores locales en su crecimiento.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/home/carousel-2.jpg" class="d-block w-100 carousel-img" alt="Imagen 2">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <h1 class="display-1 text-white mb-5 animated slideInDown">Desarrolla Tu Emprendimiento</h1>
                        <p class="text-white mb-4">Conoce a nuestros emprendedores y sus historias.</p>
                    </div>
                </div>
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
    </div>
</div>
<!-- Carousel End -->
 <!-- Top Feature Start -->
 <div class="container-fluid top-feature py-5 pt-lg-0">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Apoyo a Emprendedores</h4>
                            <span>Ofrecemos herramientas de promoción y gestión para visibilizar negocios locales.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="">
                            <i class="fa fa-map-marker-alt text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Mapas Personalizados</h4>
                            <span>Integramos Google Maps para mostrar la ubicación de los negocios.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                    <div class="d-flex">
                        <div class="">
                            <i class="fa fa-comments text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Asistente Virtual</h4>
                            <span>Un asistente IA que guía a los emprendedores y facilita la interacción.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Feature End -->

<style>
    /* Asegura que el carrusel ocupe el 100% del viewport */
    #carouselExample {
        height: 100vh; /* Ajusta la altura del carrusel al 100% del viewport */
        position: relative;
        overflow: hidden;
    }

    .carousel-inner, .carousel-item, .carousel-item img {
        height: 100%; /* Hace que el carrusel y las imágenes ocupen el 100% de la altura */
    }

    .carousel-item img {
        object-fit: cover; /* Asegura que la imagen cubra el área del carrusel sin deformarse */
    }

    /* Efecto de filtro verde en las imágenes cuando se pasa el cursor */
    .carousel-item img {
        transition: filter 0.5s ease;
    }

    

    /* Estilo para el texto del carrusel */
    .carousel-caption {
        position: absolute;
        bottom: 20px; /* Ajusta la posición del texto */
        left: 0;
        right: 0;
        z-index: 10;
        color: white;
    }

    .carousel-caption h1 {
        font-weight: bold; /* Hace que el título sea más grueso */
    }

    .carousel-caption p {
        font-weight: bold; /* Hace que el párrafo sea más grueso */
    }
    i, .fa {
    color: #348E38 !important;
}
</style>

   
<style>
    /* Asegura que el carrusel ocupe el 100% del viewport */
    #carouselExample {
        height: 100vh; /* Ajusta la altura del carrusel al 100% del viewport */
        position: relative;
        overflow: hidden;
    }

    .carousel-inner, .carousel-item, .carousel-item img {
        height: 100%; /* Hace que el carrusel y las imágenes ocupen el 100% de la altura */
    }

    .carousel-item img {
        object-fit: cover; /* Asegura que la imagen cubra el área del carrusel sin deformarse */
    }

    /* Efecto de filtro verde en las imágenes cuando se pasa el cursor */
    .carousel-item img {
        transition: filter 0.5s ease;
    }

    

    /* Estilo para el texto del carrusel */
    .carousel-caption {
        position: absolute;
        bottom: 20px; /* Ajusta la posición del texto */
        left: 0;
        right: 0;
        z-index: 10;
        color: white;
    }

    .carousel-caption h1 {
        font-weight: bold; /* Hace que el título sea más grueso */
    }

    .carousel-caption p {
        font-weight: bold; /* Hace que el párrafo sea más grueso */
    }
    i, .fa {
    color: #009A00 !important;
}
</style>

    
  <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-end">
                        <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="images/home/about-1.jpg" alt="">
                        <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="images/home/about-3.jpg" alt="">
                    </div>
                    <div class="col-6">
                        <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="images/home/about-4.jpg" alt="">
                        <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="images/home/about-2.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">Bienvenido  a Emprende Nandayure</h1>
                <p class="mb-4">Somos una plataforma web creada como parte de un
                     proyecto impulsado por la Municipalidad de Nandayure, en
                      colaboración con estudiantes de la Universidad Nacional de Costa Rica. 
                      Nuestro objetivo principal es ser una herramienta que permita a los 
                      emprendedores de Nandayure, Guanacaste, promover sus productos y servicios, 
                      fortaleciendo su presencia en el mercado. El sitio web ofrece herramientas como: </p>
                <p><i class="fa fa-check text-primary me-3"></i>Mapas personalizados con la ubicación de los emprendedores</p>
                <p><i class="fa fa-check text-primary me-3"></i>Asistente virtual</p>
                <p><i class="fa fa-check text-primary me-3"></i>Asistente para el control de comidas</p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="" style="background-color: #009A00 !important; border-color: #009A00 !important;">Más información</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<style>
 
    @keyframes subirYbajar {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px); /* Cambia el valor para ajustar la altura del movimiento */
    }
}

.subir-y-bajar {
    animation: subirYbajar 2s infinite; /* Duración de 2 segundos, se repite infinitamente */
}
</style>


<style>
    .custom-img {
        width: 100%; /* Hace que la imagen ocupe el 100% del contenedor */
        height: 400px; /* Establece una altura fija para la imagen */
        object-fit: cover; /* Ajusta la imagen para cubrir el contenedor sin distorsionarse */
    }

    .bg-icon {
    background: url(../images/home/bg-icon.png) center center repeat;
    background-size: contain;
}
.btn-outline-primary {
        border-color: #009A00 !important;
        color: #009A00 !important;
    }

    .btn-outline-primary:hover {
        border-color: #009A00 !important;
        color: #009A00 !important;
        background-color: transparent; /* Para que el fondo no cambie */
    }
    .img-fluid {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .img-fluid:hover {
        transform: scale(1.1); /* Aumenta el tamaño de la imagen */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Sombra suave */
    }

</style>

<!-- Feature Start -->
<div class="container-fluid bg-light bg-icon my-5 py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Nuestras categorías</h1>
            <p>Actualmente, los emprendedores de Nandayure ofrecen productos y servicios en una amplia variedad de categorías</p>
        </div>
        <div class="row g-4 justify-content-center"> <!-- Añadido justify-content-center aquí -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <div class="icon-container d-flex justify-content-center mb-4"> <!-- Añadido para centrar el icono -->
                        <img class="img-fluid" src="images/home/icon-1.png" alt="">
                    </div>
                    <h4 class="mb-3">Frutas y verduras</h4>
                    <p class="mb-4">Algunos de nuestros emprendedores se especializan en ofrecer productos frescos 
                        y naturales.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                    </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <div class="icon-container d-flex justify-content-center mb-4"> <!-- Añadido para centrar el icono -->
                        <img class="img-fluid" src="images/home/icon-2.png" alt="">
                    </div>
                    <h4 class="mb-3">Respostería y alimentación</h4>
                    <p class="mb-4">Varios de nuestros emprendedores se dedican a la repostería y
                         a ofrecer deliciosos servicios de catering</p>
                         <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                        </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <div class="icon-container d-flex justify-content-center mb-4"> <!-- Añadido para centrar el icono -->
                        <img class="img-fluid" src="images/home/icon-3.png" alt="">
                    </div>
                    <h4 class="mb-3">Artesanías</h4>
                    <p class="mb-4">Algunos de nuestros emprendedores se especializan
                         en la creación de productos
                         artesanales, como collares,
                         aretes y mucho más.</p>
                         <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Read More</a>
                        </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3" style="color: black;">Nuestras empresas</h1>
            <p>Contamos con una amplia variedad de empresas que reflejan el esfuerzo y la 
                dedicación de los emprendedores de Nandayure.</p>
        </div>
        <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
            <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-6">
                @foreach ($entrepreneurships as $entrepreneurship)
                    <div class="relative rounded overflow-hidden bg-white shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl duration-300">
                        <a href="{{ route('entrepreneurships.show', $entrepreneurship->id) }}" class="block">
                            <img class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110" src="{{ $entrepreneurship->etp_img ? asset($entrepreneurship->etp_img) : 'https://via.placeholder.com/500x300' }}" alt="{{ $entrepreneurship->etp_name }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900 to-transparent opacity-60 hover:opacity-0 transition-opacity duration-300"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-center">
                                <h4 class="text-white text-xl font-semibold mb-2">{{ $entrepreneurship->etp_name }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- resources/views/home.blade.php -->

{{-- MAP --}}

</div>
<div class="container" style="margin-top: 10px">
<div class="section-header mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
    <h1 class="display-5 mb-3">Ubicación de los Emprendimientos</h1>
    {{-- <p>Ubicaciones de los emprnedimientos del sistemas</p> --}}
</div></div>
<center>
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-3 overflow-hidden" style="max-width: 2100px">
            {{-- <div class="card-header text-center text-white" style="background: #84af78bd;">
                <h5 class="m-0">Ubicación de los Emprendimientos</h5>
            </div> --}}
            <div class="card-body position-relative" style="background-color: #f8f9fa; padding: 0;">
                <!-- Botón flotante para centrar mapa -->
                <button onclick="centerMap()" class="btn btn-dark position-absolute" style="top: 10px; right: 10px; z-index: 10;">
                    <i class="bi bi-geo-alt-fill"></i> Centrar Mapa
                </button>
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>
        </div>
    </div>
</center>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJgtyUKa--FH9PWRW9ptMzz8-ofLvJgr0&callback=initMap"></script>
<script>
    var map;
    var defaultCenter = { lat: 9.7489, lng: -83.7534 };
    
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: defaultCenter,
            zoom: 8,
            
        });

        // Obtener las ubicaciones desde Blade y convertirlas en una lista JavaScript
        var entrepreneurships = @json($entrepreneurships);

        entrepreneurships.forEach(function(etp) {
            if (etp.etp_latitude && etp.etp_longitude) {
                var marker = new google.maps.Marker({
                    position: { lat: parseFloat(etp.etp_latitude), lng: parseFloat(etp.etp_longitude) },
                    map: map,
                    title: etp.etp_name,
                    icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png"
                });

                var infowindow = new google.maps.InfoWindow({
    content: `
        <div style="color: #333;">
            <h6>${etp.etp_name}</h6>
            <img src="${etp.etp_img}" alt="${etp.etp_name}" style="width:100px;height:auto;display:block;margin-top:10px;">
        </div>
    `
});
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }
        });
    }

    function centerMap() {
        map.setCenter(defaultCenter);
        map.setZoom(8);
    }
</script>




<style>
    .section-header h1 {
        font-size: 3rem; /* Tamaño más grande para el título */
        font-weight: bold; /* Aumenta el grosor de la fuente */
        color: #009A00; /* Color verde para el texto */
        text-transform: uppercase; /* Todo en mayúsculas */
        letter-spacing: 2px; /* Espaciado entre letras */
        position: relative;
        display: block; /* Asegura que el texto ocupe el espacio completo disponible */
        white-space: normal; /* Permite que el texto se ajuste a varias líneas si es necesario */
    }

    .section-header h1::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background-color: #009A00; /* Línea verde debajo */
        transform: scaleX(0);
        transform-origin: bottom right;
        transition: transform 0.3s ease-out;
    }

    .section-header h1:hover::before {
        transform: scaleX(1);
        transform-origin: bottom left;
    }

    .section-header h1:hover {
        color: #006600; /* Color de texto verde más oscuro al hacer hover */
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil en el texto */
    }
</style>


<!-- Blog Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Galería de eventos</h1>
            <p>Te ofrecemos algunas imágenes de ferias anteriores, donde podrás observar a nuestros emprendedores en acción.</p>
        </div>
        <div class="row g-2">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" style="width: 90%;" src="images/home/blog-1.jpg" alt="">
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <img class="img-fluid" style="width: 90%;" src="images/home/blog-2.jpg" alt="">
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <img class="img-fluid" style="width: 90%;" src="images/home/blog-3.jpg" alt="">
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" style="width: 90%;" src="images/home/blog-4.jpg" alt="">
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" style="width: 90%;" src="images/home/blog-5.jpg" alt="">
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid" style="width: 90%;" src="images/home/blog-6.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->







<!-- Footer Start -->
<x-footer-client />
<!-- Footer End -->

    
        <!-- Scripts de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>
    </html>
</x-app-layout>
