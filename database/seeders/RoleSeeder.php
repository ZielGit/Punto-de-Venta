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
        Permission::create(['name' => 'categories.create', 'description' => 'Crear categoría'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.edit', 'description' => 'Editar categoría'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.show', 'description' => 'Ver detalles de categoría'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'categories.destroy', 'description' => 'Eliminar categoría'])->syncRoles([$adm, $inventario]);

        Permission::create(['name' => 'clients.index', 'description' => 'Ver lista de clientes'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.create', 'description' => 'Crear cliente'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.edit', 'description' => 'Editar cliente'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.show', 'description' => 'Ver detalles de cliente'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'clients.destroy', 'description' => 'Eliminar cliente'])->syncRoles([$adm, $venta]);

        Permission::create(['name' => 'products.index', 'description' => 'Ver lista de productos'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.create', 'description' => 'Crear producto'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.edit', 'description' => 'Editar producto'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.show', 'description' => 'Ver detalles de producto'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'products.destroy', 'description' => 'Eliminar producto'])->syncRoles([$adm, $inventario]);

        Permission::create(['name' => 'providers.index', 'description' => 'Ver lista de proveedores'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.create', 'description' => 'Crear proveedor'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.edit', 'description' => 'Editar proveedor'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.show', 'description' => 'Ver detalles de proveedor'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'providers.destroy', 'description' => 'Eliminar proveedor'])->syncRoles([$adm, $inventario]);

        Permission::create(['name' => 'purchases.index', 'description' => 'Ver lista de compras'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'purchases.create', 'description' => 'Crear compra'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'purchases.show', 'description' => 'Ver detalles de compra'])->syncRoles([$adm, $inventario]);
        
        Permission::create(['name' => 'sales.index', 'description' => 'Ver lista de ventas'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'sales.create', 'description' => 'Crear venta'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'sales.show', 'description' => 'Ver detalles de venta'])->syncRoles([$adm, $venta]);

        Permission::create(['name' => 'users.index', 'description' => 'Ver lista de usuarios'])->syncRoles([$adm]);
        Permission::create(['name' => 'users.create', 'description' => 'Crear usuario'])->syncRoles([$adm]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar usuario'])->syncRoles([$adm]);
        Permission::create(['name' => 'users.show', 'description' => 'Ver detalles de usuario'])->syncRoles([$adm]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar usuario'])->syncRoles([$adm]);

        Permission::create(['name' => 'roles.index', 'description' => 'Ver lista de roles'])->syncRoles([$adm]);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear rol'])->syncRoles([$adm]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar rol'])->syncRoles([$adm]);
        Permission::create(['name' => 'roles.show', 'description' => 'Ver detalles de rol'])->syncRoles([$adm]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar rol'])->syncRoles([$adm]);

        Permission::create(['name' => 'home.index', 'description' => 'Ver dashboard'])->syncRoles([$adm, $venta, $inventario]);

        Permission::create(['name' => 'purchases.pdf', 'description' => 'Descargar pdf de compras'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'sales.pdf', 'description' => 'Descargar pdf de ventas'])->syncRoles([$adm, $venta]);

        Permission::create(['name' => 'sales.print', 'description' => 'Imprimir boleta de ventas'])->syncRoles([$adm, $venta]);

        Permission::create(['name' => 'change.status.products', 'description' => 'Cambiar estado de producto'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'change.status.purchases', 'description' => 'Cambiar estado de compra'])->syncRoles([$adm, $inventario]);
        Permission::create(['name' => 'change.status.sales', 'description' => 'Cambiar estado de venta'])->syncRoles([$adm, $venta]);

        Permission::create(['name' => 'reports.day', 'description' => 'Ver reportes por dia'])->syncRoles([$adm, $venta]);
        Permission::create(['name' => 'reports.date', 'description' => 'Ver reportes por fecha'])->syncRoles([$adm, $venta]);
    }
}
