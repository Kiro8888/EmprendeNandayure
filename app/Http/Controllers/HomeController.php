<?php

namespace App\Http\Controllers;

use App\Models\entrepreneurship;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de emprendimientos
        $entrepreneurships = Entrepreneurship::all();
        
        // Pasar los datos a la vista
        return view('home', compact('entrepreneurships'));
    }
}

