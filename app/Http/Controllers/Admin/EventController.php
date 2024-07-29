<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;


class EventController extends Controller
{
    public function index()
    {
        $events = event::all();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //hay que agregar la validacion unica
        $request->validate([
            'evt_name'  =>'required',
            'evt_description'  =>'required',
            'evt_date'  =>'required',
            'evt_hour'  =>'required',
            'evt_location'  =>'required',
          
        ]);

        

        $eventData = $request->all();
        $eventData['evt_id_rol'] = 1; 
    
        $events = event::create($eventData);
    


        return redirect()->route('admin.events.index', $events)
        ->with('info', 'el evento se guardo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(event $event)
    {
        return view('admin.events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(event $event)
    {
        return view('admin.events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, event $event)
    {
        $request->validate([
            'evt_name'  =>'required',
            'evt_description'  =>'required',
            'evt_date'  =>'required',
            'evt_hour'  =>'required',
            'evt_location'  =>'required',
        ]);
        $event->update($request->all());
        return redirect()->route('admin.events.index', $event)
        ->with('info', 'El emprendedor se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        $event->delete();
        return redirect()
        ->route('admin.events.index')
        ->with('info', 'el evento: '.$event->evt_name.'ha sido elimado');
    }
}
