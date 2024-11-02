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


<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer py-5 wow fadeIn" data-wow-delay="0.1s">
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