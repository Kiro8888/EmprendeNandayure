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
<div class="modal fade" id="instructionsModal" tabindex="-1" role="dialog" aria-labelledby="instructionsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="instructionsModalLabel">¿Cómo utilizarlo?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ol class="list-unstyled">
                    <li class="mb-2"><strong>1. Selecciona un Producto:</strong> Explora nuestra variedad de productos y haz clic en "Consultar".</li>
                    <li class="mb-2"><strong>2. Haz tu Consulta:</strong> Escribe tu condición de salud en el campo de texto, como "Tengo presión alta. ¿Es recomendable consumir este producto?".</li>
                    <li class="mb-2"><strong>3. Envía tu Consulta:</strong> Haz clic en "Enviar Consulta" para obtener una respuesta rápida.</li>
                    <li><strong>4. Recibe una Respuesta:</strong> En segundos, recibirás recomendaciones sobre el consumo del producto y la cantidad adecuada.</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
                    <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                        <img src="{{ asset($product->pdt_img) }}" alt="{{ $product->pdt_name }}" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold; color: #333;">{{ $product->pdt_name }}</h5>
                            <p class="card-text text-success font-weight-bold">₡{{ number_format($product->pdt_price, 2) }}</p>
                            <a href="#" class="btn btn-primary btn-sm rounded-pill px-3" data-toggle="modal" data-target="#productModal{{ $product->id_pdt }}">
                                <i class="fas fa-search"></i> Consultar
                            </a>
                        </div>
                    </div>
                </div>

                    <!-- Modal -->
<div class="modal fade" id="productModal{{ $product->id_pdt }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $product->id_pdt }}" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content border-0 rounded-lg shadow-lg">
            
            <!-- Encabezado elegante -->
            <div class="modal-header bg-light text-dark py-2">
                <h6 class="modal-title font-weight-bold text-uppercase" id="productModalLabel{{ $product->id_pdt }}">
                    {{ $product->pdt_name }}
                </h6>
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <!-- Cuerpo del Modal -->
            <div class="modal-body text-center p-3">
                <!-- Imagen del producto -->
                <img src="{{ asset($product->pdt_img) }}" 
                     alt="{{ $product->pdt_name }}" 
                     class="img-fluid rounded-circle shadow-sm mb-2" 
                     style="width: 80px; height: 80px; object-fit: cover;">

                <!-- Descripción del Producto -->
                <p class="text-muted small">{{ $product->pdt_description }}</p>
                
                <!-- Precio con estilo llamativo -->
                <p class="font-weight-bold text-success">₡{{ number_format($product->pdt_price, 2) }}</p>

                <!-- Pregunta para el usuario -->
                <p class="font-weight-bold small">¿Tienes alguna condición de salud? Indícanos si necesitas recomendaciones sobre el consumo de este producto? </p>
                
            
                

                <!-- Formulario de consulta -->
                <form id="consultationForm{{ $product->id_pdt }}">
                    <div class="form-group">
                        <textarea class="form-control border rounded-sm p-2" 
                                  id="userQuestion{{ $product->id_pdt }}" 
                                  rows="2" 
                                  maxlength="100" 
                                  placeholder="Escribe aquí..." 
                                  required></textarea>
                    </div>
                </form>

                <div id="response{{ $product->id_pdt }}" class="mt-2"></div>
            </div>

            <!-- Pie del Modal con botones estilizados -->
            <div class="modal-footer d-flex justify-content-between px-3 py-2">
                <button type="button" class="btn btn-sm btn-light shadow-sm px-3 py-1" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-sm btn-primary shadow-sm px-3 py-1" 
                        onclick="submitForm('{{ $product->id_pdt }}', '{{ $product->pdt_name }}', '{{ $product->pdt_description }}')">
                    <i class="fas fa-paper-plane"></i> Enviar
                </button>
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
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }


    .card-body {
        background: #f4f6f9;
    }
    .modal-sm {
    max-width: 350px; /* Tamaño compacto */
}

.modal-content {
    border-radius: 12px;
}

.bg-light {
    background-color: #f8f9fa !important;
}

.btn-primary {
        background-color: #28a745;
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #218838;
        transform: scale(1.05);
    }

.btn-light:hover {
    background-color: #e9ecef !important;
    transform: scale(1.05);
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
