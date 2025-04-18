<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.create')->only('create', 'store');
        $this->middleware('can:admin.roles.edit')->only('edit', 'update');
        $this->middleware('can:admin.roles.destroy')->only('destroy');
        $this->middleware('can:admin.roles.show')->only('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        $routeName = request()->route()->getName();
        $roles = Role::paginate(10); // Use paginate

        return view('admin.roles.index', compact('roles', 'permissions', 'routeName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $routeName = request()->route()->getName();

        return view('admin.roles.create', compact('permissions', 'routeName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:roles,name']
        ]);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        
        return redirect()->route('admin.roles.index', $role)
        ->with('info', 'El rol ha sido creado con exito');         
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {

        $routeName = request()->route()->getName();
        $permissions = Permission::get();
        $role_permissions = $role->permissions()->get();

        return view('admin.roles.edit', compact('role', 'routeName', 'permissions', 'role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50', "unique:roles,name,{$role->id}"]
        ]);
        
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index', $role)
        ->with('info', 'El rol ha sido actualizado con exito'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')
        ->with('info', 'El rol ha sido eliminado');
    }
}
