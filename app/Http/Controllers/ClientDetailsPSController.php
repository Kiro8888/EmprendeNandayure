<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service;

class ClientDetailsPSController extends Controller
{
    public function showProduct($id)
    {
        // Buscar el producto por su ID
        $product = Product::findOrFail($id);

        // Retornar la vista de detalles con el producto
        return view('client.product_details', compact('product'));
    }

    public function showService($id)
    {
        // Buscar el servicio por su ID
        $service = Service::findOrFail($id);

        // Retornar la vista de detalles con el servicio
        return view('client.service_details', compact('service'));
    }
}
