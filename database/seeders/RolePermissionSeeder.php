<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // User
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        // Role
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']);
        // Location
        Permission::create(['name' => 'view location']);
        Permission::create(['name' => 'create location']);
        Permission::create(['name' => 'edit location']);
        Permission::create(['name' => 'delete location']);
        // Assets
        Permission::create(['name' => 'view asset']);
        Permission::create(['name' => 'create asset']);
        Permission::create(['name' => 'edit asset']);
        Permission::create(['name' => 'delete asset']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('edit user');

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
