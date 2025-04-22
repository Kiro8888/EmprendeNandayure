<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrepreneurship;
use App\Models\Product;
use App\Models\Service;

class EntrepreneurshipDetailController extends Controller
{
    public function show($id)
    {
        // Obtener el emprendimiento específico por su ID
        $entrepreneurship = Entrepreneurship::findOrFail($id);

        // Obtener los productos y servicios relacionados con el emprendimiento
        $products = Product::where('pdt_id_etp', $id)->where('pdt_status', 1)->get();
        $services = Service::where('srv_id_etp', $id)->where('srv_status', 1)->get();

        // Pasar los datos a la vista
        return view('entrepreneurshipsdetails.show', compact('entrepreneurship', 'products', 'services'));
    }
}
