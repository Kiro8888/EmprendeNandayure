<x-app-layout>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio - Emprendimientos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">   
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  
        <link href="{{ asset('css/home.css') }}" rel="stylesheet"> <!-- Link to external CSS -->
    </head>
    <body>
        <!-- Usar container-fluid para ancho completo -->
        <!-- Carousel Start -->
        <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="height: 900px;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/home/carousel-1.jpeg" class="d-block w-100 carousel-img" alt="Imagen 1">
                        <div class="carousel-caption d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <h1 class="display-1 text-white mb-5 animated slideInDown">Somos Emprende Nandayure</h1>
                                <p class="text-white mb-4">Apoyando a los emprendedores locales en su crecimiento.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/home/carousel-2.jpeg" class="d-block w-100 carousel-img" alt="Imagen 2">
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
        <div class="container-fluid top-feature py-5 pt-lg-0" style="margin-top: 10px;">
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
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="images/home/about-1.jpeg" alt="">
                                <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="images/home/about-3.jpeg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="images/home/about-4.jpeg" alt="">
                                <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="images/home/about-2.jpeg" alt="">
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
        <!-- Feature Start -->
        <div class="container-fluid bg-light bg-icon my-5 py-6">
            <div class="container">
                <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Nuestras categorías</h1>
                    <p>Actualmente, los emprendedores de Nandayure ofrecen productos y servicios en una amplia variedad de categorías</p>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-white text-center h-100 p-4 p-xl-5">
                            <div class="icon-container d-flex justify-content-center mb-4">
                                <img class="img-fluid" src="images/home/icon-1.png" alt="">
                            </div>
                            <h4 class="mb-3">Frutas y verduras</h4>
                            <p class="mb-4">Algunos de nuestros emprendedores se especializan en ofrecer productos frescos 
                                y naturales.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-white text-center h-100 p-4 p-xl-5">
                            <div class="icon-container d-flex justify-content-center mb-4">
                                <img class="img-fluid" src="images/home/icon-2.png" alt="">
                            </div>
                            <h4 class="mb-3">Respostería y alimentación</h4>
                            <p class="mb-4">Varios de nuestros emprendedores se dedican a la repostería y
                                a ofrecer deliciosos servicios de catering</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="bg-white text-center h-100 p-4 p-xl-5">
                            <div class="icon-container d-flex justify-content-center mb-4">
                                <img class="img-fluid" src="images/home/icon-3.png" alt="">
                            </div>
                            <h4 class="mb-3">Artesanías</h4>
                            <p class="mb-4">Algunos de nuestros emprendedores se especializan
                                en la creación de productos
                                artesanales, como collares,
                                aretes y mucho más.</p>
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
        <!-- Map Section -->
        <div class="container" style="margin-top: 10px">
            <div class="section-header mb-5 wow fadeInUp text-center" data-wow-delay="0.1s" style="max-width: 500px; margin: 0 auto;">
                <h1 class="display-5 mb-2" style="font-size: 2rem; font-weight: bold;">Ubicación de los Emprendimientos</h1>
            </div>
        </div>
        <center>
            <div class="container mt-5">
                <div class="card shadow-lg border-0 rounded-3 overflow-hidden" style="max-width: 2100px">
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
        <script>
            // Generate a unique cache-busting query string
            const cacheBuster = new Date().getTime();
            const googleMapsScript = document.createElement('script');
            googleMapsScript.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyDJgtyUKa--FH9PWRW9ptMzz8-ofLvJgr0&callback=initMap&_=${cacheBuster}`;
            googleMapsScript.async = true;
            googleMapsScript.defer = true;
            document.head.appendChild(googleMapsScript);
        </script>
        <script>
            var map;
            var defaultCenter = { lat: 9.7489, lng: -83.7534 };
            var mapInitialized = false;

            function initMap() {
                try {
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: defaultCenter,
                        zoom: 8,
                        styles: [
                            {
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [{ "color": "#a2daf2" }]
                            },
                            {
                                "featureType": "landscape",
                                "elementType": "geometry",
                                "stylers": [{ "color": "#abce83" }]
                            },
                            {
                                "featureType": "road",
                                "elementType": "geometry",
                                "stylers": [{ "color": "#ffffff" }]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "geometry",
                                "stylers": [{ "color": "#c5dac6" }]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "labels.text.fill",
                                "stylers": [{ "color": "#447530" }]
                            }
                        ]
                    });

                    var entrepreneurships = @json($entrepreneurships);

                    entrepreneurships.forEach(function(etp) {
                        if (etp.etp_latitude && etp.etp_longitude) {
                            var marker = new google.maps.Marker({
                                position: { lat: parseFloat(etp.etp_latitude), lng: parseFloat(etp.etp_longitude) },
                                map: map,
                                title: etp.etp_name,
                                icon: "https://maps.google.com/mapfiles/ms/icons/green-dot.png"
                            });

                            var infowindow = new google.maps.InfoWindow({
                                content: `
                                    <div style="color: #333; font-family: Arial, sans-serif; max-width: 250px;">
                                        <h5 style="margin: 0; font-size: 18px; color: #009A00;">${etp.etp_name}</h5>
                                        <img src="${etp.etp_img}" alt="${etp.etp_name}" style="width:100%; height:auto; border-radius: 8px; margin-top: 10px;">
                                        <a href="/entrepreneurships/${etp.id}" style="display: inline-block; margin-top: 10px; color: #009A00; text-decoration: underline;">Ver más detalles</a>
                                    </div>
                                `
                            });

                            marker.addListener('click', function() {
                                infowindow.open(map, marker);
                            });
                        }
                    });

                    mapInitialized = true;
                } catch (error) {
                    console.error("Error initializing map:", error);
                    setTimeout(initMap, 1000); // Retry after 1 second
                }
            }

            function centerMap() {
                if (mapInitialized) {
                    map.setCenter(defaultCenter);
                    map.setZoom(8);
                } else {
                    console.warn("Map not initialized yet. Retrying...");
                    initMap();
                }
            }
        </script>
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
