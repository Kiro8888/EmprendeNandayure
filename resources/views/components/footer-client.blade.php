<!-- Footer Start -->
<div class="custom-footer-container custom-bg-dark custom-text-light custom-py-5">
    <div class="custom-footer-content custom-container custom-py-5">
        <div class="custom-footer-row">
            <!-- Office Info -->
            <div class="custom-footer-column">
                <h4 class="custom-text-white custom-mb-4">Nuestra Oficina</h4>
                <p><i class="fas fa-map-marker-alt custom-me-3"></i>123 Calle, Ciudad, País</p>
                <p><i class="fas fa-phone-alt custom-me-3"></i>+123 456 7890</p>
                <p><i class="fas fa-envelope custom-me-3"></i>info@ejemplo.com</p>
                <div class="custom-footer-social-links">
                    <a class="custom-social-link" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="custom-social-link" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="custom-social-link" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="custom-social-link" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <!-- Services -->
            <div class="custom-footer-column">
                <h4 class="custom-text-white custom-mb-4">Servicios</h4>
                <a class="custom-footer-link" href="#">Paisajismo</a>
                <a class="custom-footer-link" href="#">Poda de plantas</a>
                <a class="custom-footer-link" href="#">Jardinería urbana</a>
                <a class="custom-footer-link" href="#">Mantenimiento de jardines</a>
                <a class="custom-footer-link" href="#">Tecnología verde</a>
            </div>
            <!-- Quick Links -->
            <div class="custom-footer-column">
                <h4 class="custom-text-white custom-mb-4">Enlaces Rápidos</h4>
                <a class="custom-footer-link" href="#">Sobre Nosotros</a>
                <a class="custom-footer-link" href="#">Contáctanos</a>
                <a class="custom-footer-link" href="#">Nuestros Servicios</a>
                <a class="custom-footer-link" href="#">Términos y Condiciones</a>
                <a class="custom-footer-link" href="#">Soporte</a>
            </div>
            <!-- Newsletter -->
            <div class="custom-footer-column">
                <h4 class="custom-text-white custom-mb-4">Suscríbete</h4>
                <p>Recibe noticias y actualizaciones directamente en tu correo.</p>
                <div class="custom-newsletter-form">
                    <input class="custom-form-input" type="text" placeholder="Tu correo electrónico">
                    <button type="button" class="custom-submit-btn">Suscribirse</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<style>
    .custom-footer-container {
        background-color: #333;
        color: #fff;
        padding: 2rem 0;
    }

    .custom-footer-content {
        max-width: 1200px;
        margin: 0 auto;
    }

    .custom-footer-row {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
    }

    .custom-footer-column {
        flex: 1;
        min-width: 200px;
    }

    .custom-text-white {
        color: #fff;
    }

    .custom-footer-social-links a {
        color: #fff;
        font-size: 1.2rem;
        margin-right: 0.5rem;
        transition: color 0.3s ease;
    }

    .custom-footer-social-links a:hover {
        color: #007bff;
    }

    .custom-footer-link {
        display: block;
        color: #bbb;
        margin: 0.3rem 0;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .custom-footer-link:hover {
        color: #fff;
    }

    .custom-newsletter-form {
        position: relative;
        width: 100%;
    }

    .custom-form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        margin-top: 1rem;
        border: none;
        border-radius: 4px;
        color: #333;
    }

    .custom-submit-btn {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        padding: 0.5rem 1rem;
        background-color: #007bff;
        border: none;
        color: #fff;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .custom-submit-btn:hover {
        background-color: #0056b3;
    }
</style>
