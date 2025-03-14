<x-app-layout>
    <div class="container mx-auto p-8">
        <div class="flex items-center bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <!-- Imagen del producto -->
            <div class="w-1/2">
                <img src="{{ asset('images/products/' . basename($product->pdt_img)) }}" alt="{{ $product->pdt_name }}" class="w-full h-auto object-cover rounded-lg">
            </div>

            <!-- Detalles del producto -->
            <div class="w-1/2 pl-8">
                <!-- Título del producto -->
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->pdt_name }}</h1>

                <!-- Precio del producto -->
                <p class="text-2xl text-green-600 font-semibold mb-4">₡{{ number_format($product->pdt_price, 2) }}</p>

                <!-- Descripción del producto -->
                <p class="text-gray-700 mb-6 leading-relaxed">{{ $product->pdt_description }}</p>

                <!-- Calificación del producto (sin backend) -->
                <div class="flex items-center mb-6">
                    <span class="text-yellow-500">
                        <!-- Placeholder de estrellas -->
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-gray-300"></i>
                        <i class="fas fa-star text-gray-300"></i>
                    </span>
                    <p class="ml-2 text-sm text-gray-600">3.0 / 5</p>
                </div>

                <!-- Botón para contactar por WhatsApp -->
                @if ($product->entrepreneurship->etp_num)
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $product->entrepreneurship->etp_num) }}?text=Hola%20{{ urlencode($product->entrepreneurship->etp_name) }}%2C%20estoy%20interesado%20en%20el%20producto%20{{ urlencode($product->pdt_name) }}."
                       target="_blank"
                       class="inline-block bg-green-600 text-white text-lg font-medium py-3 px-6 rounded-md hover:bg-green-700 transition duration-200">
                       Contactar 
                    </a>
                @else
                    <p class="text-red-600">Número de contacto no disponible.</p>
                @endif
            </div>
        </div>

        <!-- Sección de comentarios -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Comentarios</h2>
            <!-- Formulario para agregar comentario -->
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Deja tu comentario</h3>
                <form id="commentForm" class="mt-4">
                    <textarea id="commentInput" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Escribe tu comentario..." required></textarea>
                    <div class="flex items-center mt-4">
                        <label for="rating" class="text-lg font-medium text-gray-700">Calificación:</label>
                        <select id="rating" class="ml-4 p-2 border border-gray-300 rounded-lg">
                            <option value="1">1 Estrella</option>
                            <option value="2">2 Estrellas</option>
                            <option value="3">3 Estrellas</option>
                            <option value="4">4 Estrellas</option>
                            <option value="5">5 Estrellas</option>
                        </select>
                    </div>
                    <button type="submit" class="mt-4 inline-block bg-green-600 text-white text-lg font-medium py-3 px-6 rounded-md hover:bg-green-700 transition duration-200">
                        Enviar comentario
                    </button>
                </form>
            </div>

            <!-- Mostrar comentarios almacenados en localStorage -->
            <div id="commentsSection" class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800">Comentarios anteriores</h3>
                <!-- Los comentarios se insertarán aquí con JavaScript -->
            </div>
        </div>
    </div>

    <!-- Additional Styles -->
    <style>
        .container {
            max-width: 1000px;
        }
        .bg-white {
            background-color: #fff;
        }
        .rounded-xl {
            border-radius: 1rem;
        }
        .hover\:shadow-2xl:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        .fas {
            margin-right: 2px;
        }
    </style>

    <!-- Scripts para manejar comentarios en localStorage -->
    <script>
        // Cargar los comentarios existentes desde localStorage
        document.addEventListener('DOMContentLoaded', () => {
            const commentsSection = document.getElementById('commentsSection');
            const comments = JSON.parse(localStorage.getItem('comments')) || [];

            // Mostrar comentarios existentes
            comments.forEach(comment => {
                const commentDiv = document.createElement('div');
                commentDiv.classList.add('mt-4', 'p-4', 'border', 'border-gray-300', 'rounded-lg');
                commentDiv.innerHTML = `
                    <div class="flex items-center mb-2">
                        <div class="flex">
                            ${getStars(comment.rating)}
                        </div>
                        <span class="ml-2 text-sm text-gray-600">${comment.date}</span>
                    </div>
                    <p class="text-gray-700">${comment.text}</p>
                `;
                commentsSection.appendChild(commentDiv);
            });
        });

        // Función para generar las estrellas
        function getStars(rating) {
            let stars = '';
            for (let i = 1; i <= 5; i++) {
                stars += `<i class="fas fa-star ${i <= rating ? 'text-yellow-400' : 'text-gray-300'}"></i>`;
            }
            return stars;
        }

        // Guardar el comentario y la calificación en localStorage
        document.getElementById('commentForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const commentText = document.getElementById('commentInput').value;
            const rating = document.getElementById('rating').value;
            const date = new Date().toLocaleString();  // Fecha y hora actual

            // Crear un objeto comentario
            const newComment = {
                text: commentText,
                rating: parseInt(rating),
                date: date
            };

            // Guardar en localStorage
            let comments = JSON.parse(localStorage.getItem('comments')) || [];
            comments.push(newComment);
            localStorage.setItem('comments', JSON.stringify(comments));

            // Limpiar el formulario y recargar los comentarios
            document.getElementById('commentInput').value = '';
            document.getElementById('rating').value = '1';
            location.reload();  // Recargar la página para mostrar el nuevo comentario
        });
    </script>
</x-app-layout>

<!-- Footer Start -->
<x-footer-client />
<!-- Footer End -->
