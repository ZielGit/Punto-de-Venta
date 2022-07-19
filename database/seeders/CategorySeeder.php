<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Laptop',
            'description' => 'Portátiles'
        ]);

        Category::create([
            'name' => 'Mouse',
            'description' => 'Mouse para pcs y laptops'
        ]);

        Category::create([
            'name' => 'Audífonos',
            'description' => 'Periférico de sonido'
        ]);
    }
}
