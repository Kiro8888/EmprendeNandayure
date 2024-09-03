<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Product;

class ClientProductServiceController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el tipo de filtro (producto o servicio)
        $filterType = $request->get('type');

        if ($filterType === 'product') {
            $products = Product::all();
            $services = collect(); // Colección vacía
        } elseif ($filterType === 'service') {
            $services = Service::all();
            $products = collect(); // Colección vacía
        } else {
            // Si no hay filtro, obtener ambos productos y servicios
            $products = Product::all();
            $services = Service::all();
        }

        // Pasar ambas colecciones a la vista
        return view('client.products_services', compact('products', 'services', 'filterType'));
    }
}
