<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Product;

class ClientProductServiceController extends Controller
{
    public function indexProduct(Request $request)
    {
        // Obtener el filtro de precio si está presente
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
    
        // Filtrar productos por rango de precio y estado Activo, luego paginar de 10 en 10
        $products = Product::where('pdt_status', 1) // Filtrar solo productos activos
                        ->when($minPrice, function ($query, $minPrice) {
                            return $query->where('pdt_price', '>=', $minPrice);
                        })
                        ->when($maxPrice, function ($query, $maxPrice) {
                            return $query->where('pdt_price', '<=', $maxPrice);
                        })
                        ->paginate(10);
    
        return view('client.products', compact('products'));
    }
    
    
    public function indexService(Request $request)
    {

        $services = Service::all();
        return view('client.services', compact('services'));
    }
}
