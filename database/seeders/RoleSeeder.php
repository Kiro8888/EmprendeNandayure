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
        Permission::create(['name' => 'admin.home'])->syncRoles([ $role_admin,  $role_entrepreneur]);

        //categories
        Permission::create(['name' => 'admin.categories.index'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([ $role_admin]);


        //entrepreneur
        Permission::create(['name' => 'admin.entrepreneurs.index'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.entrepreneurs.create'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.entrepreneurs.edit'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.entrepreneurs.destroy'])->syncRoles([ $role_admin]);

        
        //products
        Permission::create(['name' => 'admin.products.index'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.products.create'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.products.edit'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.products.destroy'])->syncRoles([ $role_admin,  $role_entrepreneur]);

        //services
        Permission::create(['name' => 'admin.services.index'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.services.create'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.services.edit'])->syncRoles([ $role_admin,  $role_entrepreneur]);
        Permission::create(['name' => 'admin.services.destroy'])->syncRoles([ $role_admin,  $role_entrepreneur]);

        //events
        Permission::create(['name' => 'admin.events.index'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.events.create'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.events.edit'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.events.destroy'])->syncRoles([ $role_admin]);

        //Users
        Permission::create(['name' => 'admin.users.index'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([ $role_admin]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([ $role_admin]);
    }
}
