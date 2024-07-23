<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;

class EventController extends Controller
{
    //index return data


    public function index(){
    
        $events = event::all();
        return view('events.index', compact('events'));

    }
}
