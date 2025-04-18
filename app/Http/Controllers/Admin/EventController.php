<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;
use App\Mail\EventCreatedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class EventController extends Controller
{

    public function __construct(){
        $this->middleware('can:admin.events.index')->only('index');
        $this->middleware('can:admin.events.create')->only('create', 'store');
        $this->middleware('can:admin.events.edit')->only('edit', 'update');
        $this->middleware('can:admin.events.destroy')->only('destroy');
        // $this->middleware('can:admin.events.show')->only('show');
    }


    public function index()
    {
        $events = event::paginate(10); // Use paginate
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

        if ($request->hasFile('evt_img')) {
            $imageName = time().'.'.$request->evt_img->extension();  
            $request->evt_img->move(public_path('images/events'), $imageName);
            $eventData['evt_img'] = 'images/events/' . $imageName;
        } else {
            // Set default image if none is uploaded
            $eventData['evt_img'] = 'images/events/default.png';
        }
    
        $events = event::create($eventData);
    
    // Obtener los usuarios activos
    $users = User::where('status', 'Activo')->pluck('email');
        
    // Enviar el correo a cada usuario
    foreach ($users as $email) {
        Mail::to($email)->send(new EventCreatedMail($events));
}


        return redirect()->route('admin.events.index', $events)
        ->with('info', 'el evento se guardo correctamente y  se envió el correo a los usuarios registrados correctamente');
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
     
         $eventData = $request->all();
     
         // Si se sube una nueva imagen, guárdala y actualiza la ruta
         if ($request->hasFile('evt_img')) {
             // Eliminar la imagen anterior si existe
             if ($event->evt_img && file_exists(public_path($event->evt_img))) {
                 unlink(public_path($event->evt_img));
             }
     
             $imageName = time().'.'.$request->evt_img->extension();  
             $request->evt_img->move(public_path('images/events'), $imageName);
             $eventData['evt_img'] = 'images/events/' . $imageName;
         } else if (!$event->evt_img) {
            // Set default image if none exists
            $eventData['evt_img'] = 'images/events/default.png';
        }
     
         $event->update($eventData);
     
         return redirect()->route('admin.events.index', $event)
             ->with('info', 'El servicio se actualizó correctamente');
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

    // View Users
    public function showEventsToClients()
    {
    $events = event::where('evt_date', '>=', now())->get();
    return view('events.index', compact('events'));
    }

}