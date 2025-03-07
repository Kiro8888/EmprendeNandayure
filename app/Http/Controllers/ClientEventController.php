<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
class ClientEventController extends Controller
{
    public function index()
    {
        // Obtener eventos que son "activos" (ej: fecha igual o posterior a la actual)
        $events = event::where('evt_date', '>=', now())->get();
        
        // Retornar la vista con los eventos activos
        return view('client.events', compact('events'));
    }
}
