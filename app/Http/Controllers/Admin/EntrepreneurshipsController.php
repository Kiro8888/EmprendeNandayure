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
            $entrepreneurships = entrepreneurship::where('etp_id_user', $user->id)->paginate(10); // Paginación de 10 por página
        } else {
            // Si es Admin u otro rol, mostrar todos los emprendimientos
            $entrepreneurships = entrepreneurship::paginate(10); // Paginación de 10 por página
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
    
        // Validación de los datos recibidos
        $request->validate([
            'etp_name' => ['required', 'string'],
            'etp_latitude' => ['required'],
            'etp_longitude' => ['required'],
            'etp_num' => ['required', 'digits:8', 'unique:entrepreneurships,etp_num'],
            'etp_email' => ['required', 'string', 'email', 'unique:entrepreneurships,etp_email'],
        ], [
            'etp_num.unique' => 'El número de teléfono ya está registrado.',
        ]);
    
        // Guardar el nuevo emprendimiento
        $entrepreneurshipData = $request->all();
        $entrepreneurshipData['etp_id_user'] = $user->id; // Asignar el ID del usuario al emprendimiento
    
        // Si se sube una nueva imagen, guárdala y actualiza la ruta
        if ($request->hasFile('etp_img')) {
            $imageName = time() . '.' . $request->etp_img->extension();
            $request->etp_img->move(public_path('images/entrepreneurships'), $imageName);
            $entrepreneurshipData['etp_img'] = 'images/entrepreneurships/' . $imageName;
        } else {
            // Set default image if none is uploaded
            $entrepreneurshipData['etp_img'] = 'images/entrepreneurships/default.png';
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
            'etp_name' => ['required', 'string'],
            'etp_latitude' => ['required'],
            'etp_longitude' => ['required'],
            'etp_num' => ['required', 'digits:8', 'unique:entrepreneurships,etp_num,' . $entrepreneurship->id],
            'etp_email' => ['required', 'string', 'email'],
        ], [
            'etp_num.unique' => 'El número de teléfono ya está registrado.',
        ]);
    
        // Si se sube una nueva imagen, guárdala y actualiza la ruta
        if ($request->hasFile('etp_img')) {
            // Eliminar la imagen anterior si existe
            if ($entrepreneurship->etp_img && file_exists(public_path($entrepreneurship->etp_img))) {
                unlink(public_path($entrepreneurship->etp_img));
            }
    
            $imageName = time() . '.' . $request->etp_img->extension();
            $request->etp_img->move(public_path('images/entrepreneurships'), $imageName);
            $entrepreneurship->etp_img = 'images/entrepreneurships/' . $imageName;
        } else if (!$entrepreneurship->etp_img) {
            // Set default image if none exists
            $entrepreneurship->etp_img = 'images/entrepreneurships/default.png';
        }
    
        // Actualiza los demás campos del emprendimiento
        $entrepreneurship->update($request->except(['etp_img'])); // Excluye 'etp_img' del request original
        $entrepreneurship->save(); // Guarda el nuevo valor de 'etp_img' si se actualizó
    
        return redirect()->route('admin.entrepreneurships.index')
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

    public function checkPhoneNumber(Request $request)
    {
        $exists = entrepreneurship::where('etp_num', $request->etp_num)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkEmail(Request $request)
    {
        $exists = entrepreneurship::where('etp_email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkPhone(Request $request)
    {
        $exists = entrepreneurship::where('etp_num', $request->phone)->exists();
        return response()->json(['exists' => $exists]);
    }
}
