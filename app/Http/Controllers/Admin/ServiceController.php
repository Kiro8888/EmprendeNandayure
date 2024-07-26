<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\category;
use App\Models\entrepreneur;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        $entrepreneurs = entrepreneur::all();
        return view('admin.services.create', compact('categories', 'entrepreneurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'srv_name'        => 'required',
            'srv_description' => 'required',
            'srv_price' => 'required',
        ]);
    
        $service = service::create($request->all());
    
    
            return redirect()->route('admin.services.index', $service)
            ->with('info', 'el servicio se creo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(service $service,category $categories,entrepreneur $entrepreneurs)
    {
        $categories = category::all(); 
        $entrepreneurs = entrepreneur::all(); 
       return view('admin.services.show', compact('service','categories', 'entrepreneurs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service,category $categories,entrepreneur $entrepreneurs)
    {
        $categories = category::all(); 
        $entrepreneurs = entrepreneur::all(); 
      
       return view('admin.services.edit', compact('service', 'categories', 'entrepreneurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
        $request->validate([
            'srv_name'        => 'required',
            'srv_description' => 'required',
            'srv_price' => 'required',
        ]);
        $service->update($request->all());
        return redirect()->route('admin.services.index',$service)
        ->with('info', 'el servicio se actualizo correctamente');
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
