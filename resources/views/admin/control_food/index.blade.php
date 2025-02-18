@extends('adminlte::page')

@section('title', 'Productos y Servicios')

@section('content_header')
    {{-- <h1>Productos y Servicios</h1> --}}
@stop

@section('content')

<!-- Hero Section -->
{{-- <div class="hero bg-primary text-white text-center p-5 mb-5">
    <h1 class="display-4">Explora Nuestros Productos</h1>
    <p class="lead">Descubre una variedad de productos disponibles para ti. ¡No te los pierdas!</p>
</div> --}}

<div class="text-center mb-4">
    <h1 class="display-4">¿Qué es nuestro Asistente de Salud?</h1>
    <p class="lead">Nuestro Asistente de Salud te ayuda a tomar decisiones informadas sobre los productos que consumes. Utiliza tecnología de Procesamiento de Lenguaje Natural (NLP) para ofrecerte recomendaciones personalizadas según tus condiciones de salud.</p>
</div>

<!-- Icono para instrucciones -->
<div class="text-center mb-5">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#instructionsModal">
        <i class="fas fa-question-circle"></i> Instrucciones
    </button>
</div>

<!-- Modal con instrucciones -->
<div class="modal fade" id="instructionsModal" tabindex="-1" aria-labelledby="instructionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            
            <!-- Encabezado con degradado -->
            <div class="modal-header bg-gradient text-white" style="background: linear-gradient(135deg, #28a745, #218838);">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-lightbulb me-2"></i> ¿Cómo utilizarlo?
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Cuerpo del modal -->
            <div class="modal-body p-4">
                <div class="container">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-primary">
                                        <i class="fas fa-box me-2"></i> 1. Selecciona un Producto
                                    </h6>
                                    <p class="text-muted small">Explora nuestra variedad de productos y haz clic en 
                                        <span class="badge bg-primary">Consultar</span>.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-success">
                                        <i class="fas fa-pencil-alt me-2"></i> 2. Haz tu Consulta
                                    </h6>
                                    <p class="text-muted small">Escribe tu condición de salud, por ejemplo: 
                                        <span class="fst-italic">"Tengo presión alta. ¿Es recomendable consumir este producto?"</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-warning">
                                        <i class="fas fa-paper-plane me-2"></i> 3. Envía tu Consulta
                                    </h6>
                                    <p class="text-muted small">Haz clic en <span class="badge bg-success">Enviar Consulta</span> para recibir una respuesta rápida.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body">
                                    <h6 class="fw-bold text-danger">
                                        <i class="fas fa-comment-alt me-2"></i> 4. Recibe una Respuesta
                                    </h6>
                                    <p class="text-muted small">En segundos, recibirás recomendaciones sobre el consumo del producto y la cantidad adecuada.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie de modal con botón estilizado -->
            <div class="modal-footer border-0 d-flex justify-content-end">
                <button type="button" class="btn btn-outline-dark rounded-pill px-4 py-2" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar
                </button>                
              
            </div>
        </div>
    </div>
</div>


<!-- Alert for info messages -->
@if (session('info'))
    <div class="alert alert-info" role="alert">
        {{ session('info') }}
    </div>
@endif

<div class="card">
    <div class="card-body">

        <!-- Container for Products -->
        @if($products->isNotEmpty())
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-3 mb-4">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300" style="width: 290px;">
                            <img src="{{ asset($product->pdt_img) }}" alt="{{ $product->pdt_name }}" class="w-full h-48 object-cover">
                            <div class="p-3">
                                <h2 class="text-md font-bold text-gray-800">{{ $product->pdt_name }}</h2>
                                <p class="text-gray-600 mt-1 text-sm">{{ $product->pdt_description }}</p>
                                <p class="text-lg font-bold text-indigo-600 mt-2">₡{{ number_format($product->pdt_price, 2) }}</p>
                                <a href="#" class="btn btn-info btn-block mt-2" data-toggle="modal" data-target="#productModal{{ $product->id_pdt }}">Consultar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="productModal{{ $product->id_pdt }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $product->id_pdt }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productModalLabel{{ $product->id_pdt }}">{{ $product->pdt_name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset($product->pdt_img) }}" alt="{{ $product->pdt_name }}" class="img-fluid mb-3">
                                    <p>{{ $product->pdt_description }}</p>
                                    <p class="font-weight-bold">Precio: ₡{{ number_format($product->pdt_price, 2) }}</p>
                                    <p>¿Deseas hacer una consulta sobre este producto?</p>
                                    <form id="consultationForm{{ $product->id_pdt }}">
                                        <div class="form-group">
                                            <label for="userQuestion">Tienes algun padecimiento?<br>puedes describirlo acontinuacion:</label>
                                            <textarea class="form-control" id="userQuestion{{ $product->id_pdt }}" rows="3" maxlength="100" required></textarea>
                                        </div>
                                    </form>
                                    <div id="response{{ $product->id_pdt }}" class="mt-3"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                   
                                    <button type="button" class="btn btn-primary" onclick="submitForm('{{ $product->id_pdt }}', '{{ $product->pdt_name }}', '{{ $product->pdt_description }}')">Enviar Consulta</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                No hay productos disponibles.
            </div>
        @endif
    </div>
</div>
   
<x-chatbot />

<!-- Additional Styles -->
<style>
    .hero {
        background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url('/client/Producs_Service-hero.jpg') no-repeat center center/cover;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
    }

    .card img {
        max-height: 200px;
        object-fit: cover;
    }

    .card-body {
        background: #f4f6f9;
    }
</style>

<!-- Scripts -->
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
   async function submitForm(productId, productName, productDescription) {
    const question = $('#userQuestion' + productId).val();
    const responseElement = $('#response' + productId);

    if (question) {
        responseElement.html('<p>Enviando consulta...</p>');
        try {
            const response = await fetch('https://api.openai.com/v1/chat/completions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + '{{ env('OPENAI_API_KEY') }}' // Asegúrate de que la clave API esté configurada
                },
                body: JSON.stringify({
                    model: 'gpt-3.5-turbo',
                    messages: [
                        {
                            role: 'user',
                            content: `Soy un experto en salud. Estoy consultando sobre el producto ${productName} (${productDescription}). El usuario tiene la siguiente condición: "${question}". ¿Es recomendable consumir este producto y en qué cantidad?, por favor puedes ser breve e ignorar cualquier consulta fuera del tema de salud`
                        }
                    ],
                    max_tokens: 100, // Limita la respuesta a 100 tokens
                    temperature: 0.7 // Ajusta la creatividad de la respuesta (0 a 1)
                })
            });

            const data = await response.json();
            if (data.choices && data.choices.length > 0) {
                responseElement.html(`<strong>Respuesta de IA:</strong> ${data.choices[0].message.content}`);
            } else {
                responseElement.html('<strong>Error:</strong> No se pudo obtener una respuesta válida.');
            }
        } catch (error) {
            console.error('Error al comunicarse con la API:', error);
            responseElement.html('<strong>Error:</strong> No se pudo obtener una respuesta.');
        }
    } else {
        alert('Por favor, ingresa tu consulta.');
    }
}
    </script>
@stop

@stop
