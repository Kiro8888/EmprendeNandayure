<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\category;
use App\Models\entrepreneurship;

class ServiceController extends Controller
{

    public function __construct(){
        $this->middleware('can:admin.services.index')->only('index');
        $this->middleware('can:admin.services.create')->only('create', 'store');
        $this->middleware('can:admin.services.edit')->only('edit', 'update');
        $this->middleware('can:admin.services.destroy')->only('destroy');
        // $this->middleware('can:admin.services.show')->only('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        $user = auth()->user();
    
        if ($user->hasRole('Entrepreneur')) {
            $entrepreneurships = entrepreneurship::where('etp_id_user', $user->id)->get();
            $services = service::whereIn('srv_id_etp', $entrepreneurships->pluck('id'))->paginate(10); // Use paginate
        } else {
            $services = service::paginate(10); // Use paginate
            $entrepreneurships = entrepreneurship::all();
        }
    
        return view('admin.services.index', compact('services', 'categories', 'entrepreneurships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        $user = auth()->user();

        // Si el usuario tiene el rol de Entrepreneur, filtrar sus emprendimientos
        if ($user->hasRole('Entrepreneur')) {
            $entrepreneurships = entrepreneurship::where('etp_id_user', $user->id)->get();
        } else {
            // Si es Admin u otro rol, mostrar todos los emprendimientos
            $entrepreneurships = entrepreneurship::all();
        }
        return view('admin.services.create', compact('categories', 'entrepreneurships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'srv_name'        => 'required',
            'srv_description' => 'required',
            'srv_price'       => 'required',
            'srv_id_ctg'      => 'required',
            'srv_id_etp'      => 'required',
        ]);

        $serviceData = $request->all();

        if ($request->hasFile('srv_img')) {
            $imageName = time().'.'.$request->srv_img->extension();  
            $request->srv_img->move(public_path('images/services'), $imageName);
            $serviceData['srv_img'] = 'images/services/' . $imageName;
        } else {
            // Set default image if none is uploaded
            $serviceData['srv_img'] = 'images/services/default.png';
        }

        $service = service::create($serviceData);

        return redirect()->route('admin.services.index')
            ->with('info', 'El servicio se creó correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(service $service,category $categories, entrepreneurship $entrepreneurships)
    {
        $categories = category::all(); 
        $entrepreneurships = entrepreneurship::all(); 
       return view('admin.services.show', compact('service','categories','entrepreneurships'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service,category $categories , entrepreneurship $entrepreneurships)
    {
        $categories = category::all(); 
        $entrepreneurships = entrepreneurship::all(); 
      
       return view('admin.services.edit', compact('service', 'categories', 'entrepreneurships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
        $request->validate([
            'srv_name'        => 'required',
            'srv_description' => 'required',
            'srv_price'       => 'required',
        ]);

        $serviceData = $request->all();

        if ($request->hasFile('srv_img')) {
            // Delete the old image if it exists
            if ($service->srv_img && file_exists(public_path($service->srv_img))) {
                unlink(public_path($service->srv_img));
            }

            $imageName = time().'.'.$request->srv_img->extension();  
            $request->srv_img->move(public_path('images/services'), $imageName);
            $serviceData['srv_img'] = 'images/services/' . $imageName;
        } else if (!$service->srv_img) {
            // Set default image if none exists
            $serviceData['srv_img'] = 'images/services/default.png';
        }

        $service->update($serviceData);

        return redirect()->route('admin.services.index', $service)
            ->with('info', 'El servicio se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service $service)
    {
        $service->delete();
        return redirect()
        ->route('admin.services.index')
        ->with('info', 'El servicio: '.$service->srv_name.'ha sido eliminado');
    }
}
