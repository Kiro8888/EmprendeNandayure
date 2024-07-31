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
        //Roles
        $role_admin = Role::create(['name' => 'Admin']);
        $role_emprendedor = Role::create(['name' => 'Emprendedor']);
        $role_usuario = Role::create(['name' => 'Usuario']);


        //Permisos
           //home
        Permission::create(['name' => 'admin.home']);

            //categorias(admin)
        Permission::create(['name' => 'admin.categories.index']);
        Permission::create(['name' => 'admin.categories.create']);
        Permission::create(['name' => 'admin.categories.edit']);
        Permission::create(['name' => 'admin.categories.show']);
        Permission::create(['name' => 'admin.categories.destroy']);

            //entrepreneurs(admin)
        Permission::create(['name' => 'admin.entrepreneurs.index']);
        Permission::create(['name' => 'admin.entrepreneurs.create']);
        Permission::create(['name' => 'admin.entrepreneurs.edit']);
        Permission::create(['name' => 'admin.entrepreneurs.show']);
        Permission::create(['name' => 'admin.entrepreneurs.destroy']);

            //products(productor y admin)
        Permission::create(['name' => 'admin.products.index']);
        Permission::create(['name' => 'admin.products.create']);
        Permission::create(['name' => 'admin.products.edit']);
        Permission::create(['name' => 'admin.products.show']);
        Permission::create(['name' => 'admin.products.destroy']);

            //services(productor y admin)
        Permission::create(['name' => 'admin.services.index']);
        Permission::create(['name' => 'admin.services.create']);
        Permission::create(['name' => 'admin.services.edit']);
        Permission::create(['name' => 'admin.services.show']);
        Permission::create(['name' => 'admin.services.destroy']);

            //events(admin)
        Permission::create(['name' => 'admin.events.index']);
        Permission::create(['name' => 'admin.events.create']);
        Permission::create(['name' => 'admin.events.edit']);
        Permission::create(['name' => 'admin.events.show']);
        Permission::create(['name' => 'admin.events.destroy']);


    }
}
