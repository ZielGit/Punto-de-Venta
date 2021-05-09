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
        $adm = Role::create(['name' => 'Administrador']);
        $venta = Role::create(['name' => 'Asistente de Venta']);
        $inventario = Role::create(['name' => 'Asistente de Inventario']);

        Permission::create(['name' => 'categories.index'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.create'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.edit'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.show'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.destroy'])->syncRoles([$adm, $inventario]);

        Permission::create(['name' => 'clients.index'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.create'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.edit'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.show'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.destroy'])->syncRoles([$adm, $venta]);

        Permission::create(['name' => 'products.index'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.create'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.edit'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.show'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.destroy'])->syncRoles([$adm, $inventario]);

        Permission::create(['name' => 'providers.index'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.create'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.edit'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.show'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.destroy'])->syncRoles([$adm, $inventario]);

        Permission::create(['name' => 'purchases.index'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'purchases.create'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'purchases.show'])->syncRoles([$adm, $inventario]);
        
        Permission::create(['name' => 'sales.index'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'sales.create'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'sales.show'])->syncRoles([$adm, $venta]);
    }
}
