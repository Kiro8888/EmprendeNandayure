<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Rol
        $role_admin = Role::create(['name' => 'Admin']); 
        $role_entrepreneur = Role::create(['name' => 'Entrepreneur']); 
        $role_user = Role::create(['name' => 'User']); 



        //Permission
        Permission::create(['name' => 'admin.home', 'description' => 'Ver el dashboard'])->syncRoles([ $role_admin,  $role_entrepreneur]);


        //Users
        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver los usuarios'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.users.create', 'description' => 'Crear usuarios'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar usuarios'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.users.update', 'description' => 'Actualizar usuarios'])->syncRoles([ $role_admin]);
 


        //categories
        Permission::create(['name' => 'admin.categories.index', 'description' => 'Ver las categorias'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.categories.create', 'description' => 'Crear las categorias'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.categories.edit', 'description' => 'Editar  las categorias'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.categories.destroy',  'description' => 'Eliminar las categorias'])->syncRoles([ $role_admin]);


        //entrepreneur
        Permission::create(['name' => 'admin.entrepreneurships.index', 'description' => 'Ver los emprendimientos'])->syncRoles([ $role_admin,$role_entrepreneur]);
        Permission::create(['name' => 'admin.entrepreneurships.create', 'description' => 'Crear los emprendimientos'])->syncRoles([ $role_admin, $role_entrepreneur]);
        Permission::create(['name' => 'admin.entrepreneurships.edit', 'description' => 'Editar los emprendimientos'])->syncRoles([ $role_admin, $role_entrepreneur]);
        Permission::create(['name' => 'admin.entrepreneurships.destroy','description' => 'Eliminar los emprendimientos'])->syncRoles([ $role_admin, $role_entrepreneur]);
        Permission::create(['name' => 'admin.entrepreneurships.show','description' => 'Ver los emprendimientos'])->syncRoles([ $role_admin, $role_entrepreneur]);
        
        //products
        Permission::create(['name' => 'admin.products.index', 'description' => 'Ver los productos'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.products.create', 'description' => 'Crear los productos'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.products.edit', 'description' => 'Editar los productos'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.products.destroy', 'description' => 'Eliminar los productos'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.products.show', 'description' => 'Ver los productos'])->syncRoles([ $role_admin,  $role_entrepreneur]);

        //services
        Permission::create(['name' => 'admin.services.index', 'description' => 'Ver los servicios'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.services.create', 'description' => 'Crear los servicios'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.services.edit', 'description' => 'Editar los servicios'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.services.destroy', 'description' => 'Eliminar los servicios'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.services.show', 'description' => 'Ver los servicios'])->syncRoles([ $role_admin,  $role_entrepreneur]);

        //events
        Permission::create(['name' => 'admin.events.index', 'description' => 'Ver los eventos'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.events.create',  'description' => 'Crear eventos'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.events.edit',  'description' => 'Editar eventos'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.events.destroy',  'description' => 'Eliminar eventos'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.events.show',  'description' => 'Ver eventos'])->syncRoles([ $role_admin]);

        //roles
        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver los roles'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.roles.create',  'description' => 'Crear roles'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.roles.edit',  'description' => 'Editar roles'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.roles.destroy',  'description' => 'Eliminar roles'])->syncRoles([ $role_admin]);


        //Waiting Entrepreneur
        Permission::create(['name' => 'admin.waiting_entrepreneur.index', 'description' => 'Ver los emprendedores en espera'])->syncRoles([ $role_admin]);


    }
}
