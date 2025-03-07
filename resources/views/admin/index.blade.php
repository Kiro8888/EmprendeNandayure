@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        @can('admin.categories.index')
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