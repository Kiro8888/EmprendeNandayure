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
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{   

    public function index()
    {
        if (Auth::user()->hasRole('Entrepreneur')) {
            $entrepreneurships = entrepreneurship::where('etp_id_user', Auth::id())->get();
            $entrepreneurshipsCount = $entrepreneurships->count();
            $productsCount = product::whereIn('pdt_id_etp', $entrepreneurships->pluck('id'))->count();
            $servicesCount = service::whereIn('srv_id_etp', $entrepreneurships->pluck('id'))->count();
            $categoriesCount = null;
            $eventsCount = null;
            $usersCount = null;
        } else {
            $categoriesCount = category::count();
            $entrepreneurshipsCount = entrepreneurship::count();
            $eventsCount = event::count();
            $productsCount = product::count();
            $servicesCount = service::count();
            $usersCount = User::count();
        }

        return view('admin.index', compact(
            'categoriesCount', 
            'entrepreneurshipsCount', 
            'eventsCount', 
            'productsCount', 
            'servicesCount', 
            'usersCount',
            'entrepreneurships'
        ));
    }
}
