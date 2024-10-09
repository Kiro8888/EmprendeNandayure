<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\entrepreneurship;

class EntrepreneurshipsController extends Controller
{

    public function __construct(){
        $this->middleware('can:admin.entrepreneurships.index')->only('index');
        $this->middleware('can:admin.entrepreneurships.create')->only('create', 'store');
        $this->middleware('can:admin.entrepreneurships.edit')->only('edit', 'update');
        $this->middleware('can:admin.entrepreneurships.destroy')->only('destroy');
        // $this->middleware('can:admin.entrepreneurships.show')->only('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();
    
        // Si el usuario tiene el rol de Entrepreneur, filtrar los emprendimientos por su ID
        if ($user->hasRole('Entrepreneur')) {
            $entrepreneurships = entrepreneurship::where('etp_id_user', $user->id)->get();
        } else {
            // Si es Admin u otro rol, mostrar todos los emprendimientos
            $entrepreneurships = entrepreneurship::all();
        }
    
        return view('admin.entrepreneurships.index', compact('entrepreneurships'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.entrepreneurships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtener el usuario autenticado
        $user = auth()->user();
    
    
        // if ($user->hasRole('Entrepreneur')) {
        
        //     if (entrepreneurship::where('etp_id_user', $user->id)->exists()) {
        //         return redirect()->route('admin.entrepreneurships.create')
        //             ->withErrors(['msg' => 'Ya has creado un emprendimiento. No puedes agregar más.']);
        //     }
        // }
    
        // Validación de los datos recibidos
        $request->validate([
            'etp_name'  => 'required',
            'etp_latitude'  => 'required',
            'etp_longitude'  => 'required',
            'etp_num'  => 'required|unique:entrepreneurships,etp_num',
            'etp_email'  => 'required|unique:entrepreneurships,etp_email',
            // Validación adicional para la imagen si es necesario
        ]);
    
        // Guardar el nuevo emprendimiento
        $entrepreneurshipData = $request->all();
        $entrepreneurshipData['etp_id_user'] = $user->id; // Asignar el ID del usuario al emprendimiento
    
        // Si se sube una nueva imagen, guárdala y actualiza la ruta
        if ($request->hasFile('etp_img')) {
            $imageName = time() . '.' . $request->etp_img->extension();
            $request->etp_img->move(public_path('images/entrepreneurships'), $imageName);
            $entrepreneurshipData['etp_img'] = 'images/entrepreneurships/' . $imageName;
        }
    
        entrepreneurship::create($entrepreneurshipData);
    
        return redirect()->route('admin.entrepreneurships.index')
            ->with('info', 'El emprendimiento se guardó correctamente');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(entrepreneurship $entrepreneurship)
    {

        return view('admin.entrepreneurships.show', compact('entrepreneurship'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(entrepreneurship $entrepreneurship)
    {
        return view('admin.entrepreneurships.edit',compact('entrepreneurship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, entrepreneurship $entrepreneurship)
    {
        $request->validate([
            'etp_name'  =>'required',
            'etp_latitude'  =>'required',
            'etp_longitude'  =>'required',
            'etp_num'  =>'required',
            'etp_email'  =>'required',
        ]);
    
        // Si se sube una nueva imagen, guárdala y actualiza la ruta
        if ($request->hasFile('etp_img')) {
            // Eliminar la imagen anterior si existe
            if ($entrepreneurship->etp_img && file_exists(public_path($entrepreneurship->etp_img))) {
                unlink(public_path($entrepreneurship->etp_img));
            }
    
            $imageName = time().'.'.$request->etp_img->extension();  
            $request->etp_img->move(public_path('images/entrepreneurships'), $imageName);
            $entrepreneurship->etp_img = 'images/entrepreneurships/' . $imageName;
        }
    
        // Actualiza los demás campos del emprendimiento
        $entrepreneurship->update($request->except('etp_img'));  // Excluye 'etp_img' del request original
        $entrepreneurship->save();  // Guarda el nuevo valor de 'etp_img' si se actualizó
    
        return redirect()->route('admin.entrepreneurships.index', $entrepreneurship)
            ->with('info', 'El emprendimiento se actualizó correctamente');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(entrepreneurship $entrepreneurship)
    {
        $entrepreneurship->delete();
        return redirect()
        ->route('admin.entrepreneurships.index')
        ->with('info', 'El emprendimiento: '.$entrepreneurship->etp_name.'ha sido elimado');
    }
}
