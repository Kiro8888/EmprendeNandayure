<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\entrepreneurship;
use App\Models\event;
use App\Models\product;
use App\Models\service;
use App\Models\User;

class HomeController extends Controller
{
    //index() route admin

    public function index()
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
