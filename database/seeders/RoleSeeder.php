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

        Permission::create(['name' => 'categories.index', 'description' => 'Ver lista de categorías'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.create', 'description' => 'Crear categorías'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.edit', 'description' => 'Editar categoría'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.show', 'description' => 'Ver detalles de categoría'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.destroy', 'description' => 'Eliminar categoría'])->syncRoles([$adm, $inventario]);

        Permission::create(['name' => 'clients.index', 'description' => 'Ver lista de clientes'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.create', 'description' => 'Crear clientes'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.edit', 'description' => 'Editar cliente'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.show', 'description' => 'Ver detalles de cliente'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.destroy', 'description' => 'Eliminar cliente'])->syncRoles([$adm, $venta]);

        Permission::create(['name' => 'products.index', 'description' => 'Ver lista de productos'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.create', 'description' => 'Crear productos'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.edit', 'description' => 'Editar producto'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.show', 'description' => 'Ver detalles de producto'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.destroy', 'description' => 'Eliminar producto'])->syncRoles([$adm, $inventario]);

        Permission::create(['name' => 'providers.index', 'description' => 'Ver lista de proveedores'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.create', 'description' => 'Crear proveedores'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.edit', 'description' => 'Editar proveedor'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.show', 'description' => 'Ver detalles de proveedor'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.destroy', 'description' => 'Eliminar proveedor'])->syncRoles([$adm, $inventario]);

        Permission::create(['name' => 'purchases.index', 'description' => 'Ver lista de compras'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'purchases.create', 'description' => 'Crear compras'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'purchases.show', 'description' => 'Ver detalles de compra'])->syncRoles([$adm, $inventario]);
        
        Permission::create(['name' => 'sales.index', 'description' => 'Ver lista de ventas'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'sales.create', 'description' => 'Crear ventas'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'sales.show', 'description' => 'Ver detalles de venta'])->syncRoles([$adm, $venta]);
    }
}
