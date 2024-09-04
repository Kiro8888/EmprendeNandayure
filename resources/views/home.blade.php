<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carousel and Cards</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Ajustar la altura del carrusel */
            .carousel-inner img {
                height: 400px; /* Aumenta la altura del carrusel */
                object-fit: cover;
            }

            .card-img-top {
                height: 75px; /* Reduce la altura de las imágenes de las tarjetas */
                object-fit: cover;
            }

            .carousel-container {
                margin-top: 20px; /* Añade espacio entre el carrusel y el nav */
                margin-bottom: 40px; /* Ajusta el espacio entre el carrusel y las tarjetas debajo */
            }

            .cards-below {
                margin-top: 20px; /* Ajusta el margen superior para separar las tarjetas debajo del carrusel */
            }

            .cards-below .card {
                margin-bottom: 10px; /* Ajusta el margen entre las tarjetas */
                width: 48%; /* Ajusta el ancho de las tarjetas debajo del carrusel */
            }

            /* Alinear las tarjetas debajo con la tarjeta de la derecha */
            .cards-below .card-container {
                display: flex;
                gap: 10px; /* Espacio entre las tarjetas */
            }
            
            .additional-cards .card {
                height: auto; /* Ajusta la altura automática para que todas las tarjetas sean más pequeñas */
                width: 100%; /* Ajusta el ancho de las tarjetas adicionales */
                margin-top: 20px; /* Añade margen superior para separar de los elementos anteriores */
            }

            /* Ajustar márgenes para que las tarjetas se vean mejor */
            .additional-cards .card-body {
                padding: 10px; /* Reduce el padding dentro de las tarjetas para hacerlas más pequeñas */
            }

            .card-title {
                font-size: 1rem; /* Tamaño más pequeño para el título */
            }

            .card-text {
                font-size: 0.875rem; /* Tamaño más pequeño para el texto */
            }
        </style>
    </head>
    <body>
        <!-- Usar container-fluid para ancho completo -->
        <div class="container-fluid">
            <div class="row">
                <!-- Carousel -->
                <div class="col-md-8 carousel-container">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/home/feria1.jpeg" class="d-block w-100" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img src="images/home/feria2.jpeg" class="d-block w-100" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img src="images/home/feria3.jpeg" class="d-block w-100" alt="Imagen 3">
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
    
                    <!-- Cards Below Carousel -->
                    <div class="cards-below">
                        <div class="card-container">
                            <div class="card flex-fill">
                                <img src="https://via.placeholder.com/250x75" class="card-img-top" alt="Card Image 4">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 4</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                            <div class="card flex-fill">
                                <img src="https://via.placeholder.com/250x75" class="card-img-top" alt="Card Image 5">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 5</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Additional Cards -->
                <div class="col-md-4 additional-cards">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="card h-100">
                                <img src="https://via.placeholder.com/250x75" class="card-img-top" alt="Card Image 1">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="card h-100">
                                <img src="https://via.placeholder.com/250x75" class="card-img-top" alt="Card Image 2">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card h-100">
                                <img src="https://via.placeholder.com/250x75" class="card-img-top" alt="Card Image 3">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Scripts de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>
    </html>

</x-app-layout>
