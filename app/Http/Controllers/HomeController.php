<?php

namespace App\Http\Controllers;

use App\Models\entrepreneurship;
use App\Models\category;
use App\Models\event;
use App\Models\product;
use App\Models\service;
use App\Models\User;
class HomeController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de emprendimientos
        $entrepreneurships = Entrepreneurship::all();
        
        // Pasar los datos a la vista
        return view('home', compact('entrepreneurships'));
    }

    public function indexAdmin()
    {
        $categoriesCount = category::count();
        $entrepreneurshipsCount = entrepreneurship::count();
        $eventsCount = event::count();
        $productsCount = product::count();
        $servicesCount = service::count();
        $usersCount = User::count();

        return view('admin.index', compact('categoriesCount', 'entrepreneurshipsCount', 'eventsCount', 'productsCount', 'servicesCount', 'usersCount'));
    }

    
}

