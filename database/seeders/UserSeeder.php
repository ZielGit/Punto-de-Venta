<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Frans',
            'email' => 'frans@gmail.com',
            'password' => bcrypt('SistemaVenta')
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Venta',
            'email' => 'venta@gmail.com',
            'password' => bcrypt('SistemaVenta')
        ])->assignRole('Asistente de Venta');

        User::create([
            'name' => 'Inventario',
            'email' => 'inventario@gmail.com',
            'password' => bcrypt('SistemaVenta')
        ])->assignRole('Asistente de Inventario');
    }
}
