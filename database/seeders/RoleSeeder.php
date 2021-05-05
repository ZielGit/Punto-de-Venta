<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// Modelo creado por laravel-permission
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Asistente de Venta']);
        $role3 = Role::create(['name' => 'Asistente de Inventario']);

        Permission::create(['name' => 'categories.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'categories.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'categories.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'categories.show'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'categories.destroy'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'sales.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'sales.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'sales.show'])->syncRoles([$role1, $role2]);

    }
}
