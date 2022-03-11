<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        
        $this->call(UserSeeder::class);

        \App\Models\Category::factory(3)->create();

        \App\Models\Customer::factory(5)->create();

        \App\Models\Provider::factory(5)->create();

        \App\Models\Product::factory(5)->create();
    }
}
