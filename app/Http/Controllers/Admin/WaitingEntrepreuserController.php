<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class WaitingEntrepreuserController extends Controller
{
    public function activate(User $user)
{
    $user->status = 'Activo'; // Cambia el estado a "Activo"
    $user->save(); // Guarda los cambios

    return redirect()
        ->route('admin.waiting_entrepreneur.index')
        ->with('info', 'El emprendedor: ' . $user->name . ' ha sido activado.');
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener solo los usuarios que tienen el rol de Entrepreneur y el estado "En espera"
        $waitingEntrepreneurs = User::whereHas('roles', function($query) {
            $query->where('name', 'Entrepreneur');
        })->where('status', 'En espera')->get();

        return view('admin.waiting_entrepreneur.index', compact('waitingEntrepreneurs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $waiting_entrepreneur)
    {
        return view('admin.waiting_entrepreneur.show', ['user' => $waiting_entrepreneur]);
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete(); // Eliminar el usuario
        return redirect()
            ->route('admin.waiting_entrepreneur.index')
            ->with('info', 'El emprendedor: '.$user->name.' ha sido eliminado de la lista de espera');
    }
    
}
