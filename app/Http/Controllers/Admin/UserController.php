<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function __construct(){
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.destroy')->only('destroy');
        $this->middleware('can:admin.users.show')->only('show');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('status', 'Activo')->paginate(10); // Paginación de 10 usuarios por página
        $roles = Role::all(); // Obtener todos los roles
    
        return view('admin.users.index', compact('users', 'roles'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //hay que agregar la validacion unica
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'], // Puedes agregar reglas adicionales si es necesario
        ]);
        $users = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        // ESTE ES EL VERDADERO
        //  $users = user::create($request->all());


        return redirect()->route('admin.users.index', $users)
        ->with('info', 'el usuario se guardo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $rolesUser = [];

        if($user->roles->count() > 0){

            foreach($user->roles as $rol){
                $rolesUser += [$rol->id => $rol->name];
            }
        }

        $statuses = ['Activo', 'Inactivo']; // Add statuses for selection

        return view('admin.users.edit', compact('user', 'roles', 'rolesUser', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'roles' => 'array',
            'status' => 'required|in:Activo,Inactivo', // Validate status
        ]);

        $user->update($request->only('name', 'last_name', 'email', 'status')); // Include status in update

        // Sincronizar roles
        if ($request->has('roles')) {
            $user->roles()->sync($request->roles);
        }

        return redirect()->route('admin.users.index')->with('info', 'El usuario se actualizó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
