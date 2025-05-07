@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        @if(auth()->user()->hasRole('User'))
        <div class="col-12 text-center mb-4">
            <h2 class="welcome-title">
                ¡Bienvenido, {{ auth()->user()->name }}!
            </h2>
            <p class="welcome-subtitle">
                Nos alegra tenerte aquí. Explora y disfruta
            </p>
            <div class="gallery-description mt-4 text-center">
    
                <p class="platform-description">
                    Emprende Nandayure es una plataforma diseñada para apoyar a los emprendedores locales, 
                    brindándoles herramientas, recursos y visibilidad para impulsar sus negocios. Aquí podrás 
                    explorar emprendimientos, eventos, productos y servicios que destacan el talento y la creatividad 
                    de nuestra comunidad.
                </p>
            </div>
            <div class="gallery-container mt-4">
                
                <div class="row">
                    @foreach(['1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg', '5.jpeg', '6.jpeg', '7.jpeg', '8.jpeg'] as $image)
                    <div class="col-6 col-sm-4 col-md-3 mb-4">
                        <img src="/images/adminHome/{{ $image }}" class="img-fluid gallery-image" alt="Imagen {{ $loop->iteration }}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
      
    </div>
    
<style>
    .welcome-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #2c3e50;
        animation: fadeInDown 1s ease;
    }
    
    .welcome-subtitle {
        font-size: 1.25rem;
        color: #7f8c8d;
        margin-bottom: 30px;
        animation: fadeIn 1.5s ease;
    }
    
    .gallery-container {
        padding: 30px 20px;
        background-color: #f9f9f9;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }
    
    .gallery-image {
        border-radius: 10px;
        object-fit: cover;
        width: 100%;
        height: 180px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .gallery-image:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }
    
    .platform-title {
        font-size: 2rem;
        font-weight: bold;
        color: #16a085;
        animation: fadeInUp 1.5s ease;
    }
    
    .platform-description {
        font-size: 1.1rem;
        color: #34495e;
        max-width: 900px;
        margin: 0 auto;
        animation: fadeIn 2s ease;
        padding: 0 20px;
    }
    
    /* Animaciones */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    </style>
    
        @endif

        @can('admin.categories.index')
        @if(isset($categoriesCount))
        <div class="col-lg-4 col-6">
            <div class="small-box" style="background-color: #00B0F0;"> <!-- Cambié bg-info por un color personalizado -->
                <div class="inner">
                    <h3>{{$categoriesCount}}</h3>
                    <p>Categorías</p>
                </div>
                <div class="icon">
                    <i class="fas fa-th"></i>
                </div>
                <a href="{{ route('admin.categories.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        @endcan

        @can('admin.entrepreneurships.index')
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success" style="background-color: #009A00;">  
                <div class="inner">
                    <h3>{{ $entrepreneurshipsCount }}</h3>
                    <p>Emprendimientos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <a href="{{ route('admin.entrepreneurships.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan

        @can('admin.events.index')
        @if(isset($eventsCount))
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning" style="background-color: #E1D711;">
                <div class="inner">
                    <h3>{{ $eventsCount }}</h3>
                    <p>Eventos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="{{ route('admin.events.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
        @endcan

        @can('admin.products.index')
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success" style="background-color: #009A00;">  
                <div class="inner">
                    <h3>{{ $productsCount }}</h3>
                    <p>Productos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{ route('admin.products.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan

        @can('admin.services.index')
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning" style="background-color: #E1D711;">
                <div class="inner">
                    <h3>{{ $servicesCount }}</h3>
                    <p>Servicios</p>
                </div>
                <div class="icon">
                    <i class="fas fa-concierge-bell"></i>
                </div>
                <a href="{{ route('admin.services.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endcan

        @can('admin.users.index')
        @if(isset($usersCount))
        <div class="col-lg-4 col-6">
            <div class="small-box" style="background-color: #00B0F0;"> <!-- Cambié bg-info por un color personalizado -->
                <div class="inner">
                    <h3>{{ $usersCount }}</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('admin.users.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif
    </div>
    @endcan


    <!-- Gráfico de Barras debajo de las Cards -->
    @can('admin.users.index')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Actividad Reciente</h3>
                </div>
                <div class="card-body">
                    <canvas id="recentActivityBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <x-chatbot />
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Redirect back to dashboard if redirected from entrepreneurship page
        @if(session('redirectToDashboard'))
            window.location.href = "{{ route('admin.home') }}";
        @endif

        // Definir los datos directamente en el script de la vista
        var recentActivityData = {
            categorias: {{ $categoriesCount }},
            emprendimientos: {{ $entrepreneurshipsCount }},
            eventos: {{ $eventsCount }},
            productos: {{ $productsCount }},
            servicios: {{ $servicesCount }},
            usuarios: {{ $usersCount }}
        };

        var ctx = document.getElementById('recentActivityBarChart').getContext('2d');
        var recentActivityBarChart = new Chart(ctx, {
            type: 'bar', // Gráfico de barras
            data: {
                labels: ['Categorías', 'Emprendimientos', 'Eventos', 'Productos', 'Servicios', 'Usuarios'],
                datasets: [{
                    label: 'Actividad Reciente',
                    data: [
                        recentActivityData.categorias,
                        recentActivityData.emprendimientos,
                        recentActivityData.eventos,
                        recentActivityData.productos,
                        recentActivityData.servicios,
                        recentActivityData.usuarios
                    ],
                    backgroundColor: 'rgba(38, 185, 154, 0.5)', // Color de barras suave
                    borderColor: 'rgba(38, 185, 154, 1)', // Color de borde más fuerte
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' items';
                            }
                        }
                    }
                }
            }
        });
    </script>
@stop