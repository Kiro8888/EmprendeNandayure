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
<link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
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

    <!-- Top Feature Start -->
    <div class="container-fluid top-feature py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-times text-primary"></i>
                            </div>
                    
                            <div class="ps-3">
                                <h4>No Hidden Cost</h4>
                                <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-users text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>Dedicated Team</h4>
                                <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-phone text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h4>24/7 Available</h4>
                                <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Feature End -->
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-end">
            <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid rounded custom-img" data-wow-delay="0.1s" src="images/home/image1.jpeg" alt="Imagen de emprendedores en Nandayure">
            </div>
            <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="display-5 mb-4">Empoderamos a los Emprendedores en Nandayure</h1>
                <p class="mb-4">Nuestro sitio web está diseñado para apoyar a los emprendedores de Nandayure conectándolos con recursos, oportunidades y una comunidad de apoyo. Ofrecemos herramientas para gestionar sus negocios, promocionar sus productos y participar en eventos locales.</p>
                <a class="btn btn-primary py-3 px-4" href="about-us.html" style="background-color: #348E38; border-color: #348E38; color: #ffffff;">Descubre Más</a>
            </div>
            <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="row g-5">
                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="border-start ps-4">
                            <i class="fa fa-thumbs-up fa-3x text-primary mb-3"></i>
                            <h4 class="mb-3">Apoyo Local</h4>
                            <span>Estamos comprometidos con el desarrollo de la comunidad local y trabajamos para ofrecer apoyo continuo a los emprendedores de Nandayure.</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-12">
                        <div class="border-start ps-4">
                            <i class="fa fa-network-wired fa-3x text-primary mb-3"></i>
                            <h4 class="mb-3">Red de Contactos</h4>
                            <span>Conéctate con una amplia red de contactos y oportunidades para colaborar y crecer en tu emprendimiento.</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<style>
    .custom-img {
        width: 100%; /* Hace que la imagen ocupe el 100% del contenedor */
        height: 400px; /* Establece una altura fija para la imagen */
        object-fit: cover; /* Ajusta la imagen para cubrir el contenedor sin distorsionarse */
    }
</style>
<!-- Features Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="fs-5 fw-bold" style="color: #348E38 !important;">¿Por Qué Elegirnos?</p>
                <h1 class="display-5 mb-4">Razones para Elegir Nuestra Plataforma</h1>
                <p class="mb-4">Nuestra plataforma está diseñada para ofrecer a los emprendedores de Nandayure las herramientas y recursos necesarios para el éxito. Desde apoyo en la gestión de negocios hasta oportunidades de networking y marketing local, estamos aquí para ayudarte a crecer y destacar en tu comunidad.</p>
                <a class="btn btn-primary py-3 px-4" href="features.html" style="background-color: #348E38; border-color: #348E38; color: #ffffff;">Descubre Más</a>
            </div>
            <div class="col-lg-6">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6">
                        <div class="row g-4">
                            <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                    <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                        <i class="fa fa-thumbs-up fa-3x" style="color: #348E38;"></i>
                                    </div>
                                    <h4 class="mb-0">Soporte Integral</h4>
                                    <p>Recibe asistencia completa en la gestión y promoción de tu emprendimiento, asegurando que tengas todo lo necesario para triunfar.</p>
                                </div>
                            </div>
                            <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                    <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                        <i class="fa fa-network-wired fa-3x" style="color: #348E38;"></i>
                                    </div>
                                    <h4 class="mb-0">Red de Contactos</h4>
                                    <p>Conéctate con otros emprendedores, proveedores y clientes potenciales a través de nuestra red de contactos local.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                        <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                <i class="fa fa-calendar-check fa-3x" style="color: #348E38;"></i>
                            </div>
                            <h4 class="mb-0">Eventos y Talleres</h4>
                            <p>Participa en eventos locales y talleres diseñados para mejorar tus habilidades y expandir tu red de contactos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->


            
<!-- resources/views/home.blade.php -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary" style="color: #348E38 !important;">Nuestros Emprendimientos</p>
            <h1 class="display-5 mb-5">Servicios y Productos que Ofrecemos para Ti</h1>
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
<!-- Service End -->



   <!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-bold text-primary">Nuestras actividades</p>
            <h1 class="display-5 mb-5">Ferias de emprendimiento en Nandayure</h1>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <!-- Aquí puedes agregar un texto introductorio o dejar vacío si no necesitas nada -->
            </div>
        </div>
        <div class="row g-4 portfolio-container">
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="images/home/service-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.3s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="images/home/service-2.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.5s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="images/home/service-3.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="images/home/service-4.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.3s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="images/home/service-5.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.5s">
                <div class="portfolio-inner rounded">
                    <img class="img-fluid" src="images/home/service-6.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Projects End -->


<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Office Info -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Our Office</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <!-- Services -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Services</h4>
                <a class="btn btn-link text-light" href="#">Landscaping</a>
                <a class="btn btn-link text-light" href="#">Pruning plants</a>
                <a class="btn btn-link text-light" href="#">Urban Gardening</a>
                <a class="btn btn-link text-light" href="#">Garden Maintenance</a>
                <a class="btn btn-link text-light" href="#">Green Technology</a>
            </div>
            <!-- Quick Links -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Quick Links</h4>
                <a class="btn btn-link text-light" href="#">About Us</a>
                <a class="btn btn-link text-light" href="#">Contact Us</a>
                <a class="btn btn-link text-light" href="#">Our Services</a>
                <a class="btn btn-link text-light" href="#">Terms & Condition</a>
                <a class="btn btn-link text-light" href="#">Support</a>
            </div>
            <!-- Newsletter -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative w-100">
                    <input class="form-control bg-light border-light w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

    
        <!-- Scripts de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>
    </html>
</x-app-layout>
