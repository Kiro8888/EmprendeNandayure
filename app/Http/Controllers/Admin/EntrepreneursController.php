<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\entrepreneur;

class EntrepreneursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entrepreneurs = entrepreneur::all();
        return view('admin.entrepreneurs.index', compact('entrepreneurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.entrepreneurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //hay que agregar la validacion unica
        $request->validate([
            'etp_name'  =>'required',
            'etp_last_name'  =>'required',
            'etp_latitude'  =>'required',
            'etp_longitude'  =>'required',
            // 'etp_status'  =>'required',
            'etp_num'  =>'required|unique:entrepreneurs,etp_num',
            'etp_email'  =>'required|unique:entrepreneurs,etp_email',
        ]);

        // ESTE ES EL VERDADERO
        // $entrepreneurs = entrepreneur::create($request->all());

        $entrepreneurData = $request->all();
        $entrepreneurData['etp_id_rol'] = 1; 
    
        $entrepreneurs = entrepreneur::create($entrepreneurData);
    


        return redirect()->route('admin.entrepreneurs.index', $entrepreneurs)
        ->with('info', 'el emprendedor se guardo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(entrepreneur $entrepreneur)
    {
        return view('admin.entrepreneurs.show',compact('entrepreneur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(entrepreneur $entrepreneur)
    {
        return view('admin.entrepreneurs.edit',compact('entrepreneur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, entrepreneur $entrepreneur)
    {
        $request->validate([
            'etp_name'  =>'required',
            'etp_last_name'  =>'required',
            'etp_status'  =>'required',
            'etp_num'  =>'required',
            'etp_email'  =>'required',
        ]);
        $entrepreneur->update($request->all());
        return redirect()->route('admin.entrepreneurs.index', $entrepreneur)
        ->with('info', 'El emprendedor se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(entrepreneur $entrepreneur)
    {
        $entrepreneur->delete();
        return redirect()
        ->route('admin.entrepreneurs.index')
        ->with('info', 'La categoria: '.$entrepreneur->etp_name.'ha sado elimado');
    }
}
