<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'GPU 1',
            'slug' => 'gpu-1',
            'details' => ' RTX 3080, 10GB, GDDR5',
            'price' => 99999,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui reiciendis minus, impedit error aspernatur voluptate voluptatum doloremque quidem enim maiores dolorem quos incidunt atque porro!',
        ]);
        Product::create([
            'name' => 'GPU 2',
            'slug' => 'gpu-2',
            'details' => ' RTX 3080, 10GB, GDDR5',
            'price' => 99999,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui reiciendis minus, impedit error aspernatur voluptate voluptatum doloremque quidem enim maiores dolorem quos incidunt atque porro!',
        ]);
        Product::create([
            'name' => 'GPU 3',
            'slug' => 'gpu-3',
            'details' => ' RTX 3080, 10GB, GDDR5',
            'price' => 99999,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui reiciendis minus, impedit error aspernatur voluptate voluptatum doloremque quidem enim maiores dolorem quos incidunt atque porro!',
        ]);
        Product::create([
            'name' => 'GPU 4',
            'slug' => 'gpu-4',
            'details' => ' RTX 3080, 10GB, GDDR5',
            'price' => 99999,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui reiciendis minus, impedit error aspernatur voluptate voluptatum doloremque quidem enim maiores dolorem quos incidunt atque porro!',
        ]);
        Product::create([
            'name' => 'GPU 5',
            'slug' => 'gpu-5',
            'details' => ' RTX 3080, 10GB, GDDR5',
            'price' => 99999,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui reiciendis minus, impedit error aspernatur voluptate voluptatum doloremque quidem enim maiores dolorem quos incidunt atque porro!',
        ]);
        Product::create([
            'name' => 'GPU 6',
            'slug' => 'gpu-6',
            'details' => ' RTX 3080, 10GB, GDDR5',
            'price' => 99999,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui reiciendis minus, impedit error aspernatur voluptate voluptatum doloremque quidem enim maiores dolorem quos incidunt atque porro!',
        ]);
        Product::create([
            'name' => 'GPU 7',
            'slug' => 'gpu-7',
            'details' => ' RTX 3080, 10GB, GDDR5',
            'price' => 99999,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui reiciendis minus, impedit error aspernatur voluptate voluptatum doloremque quidem enim maiores dolorem quos incidunt atque porro!',
        ]);
        Product::create([
            'name' => 'GPU 8',
            'slug' => 'gpu-8',
            'details' => ' RTX 3080, 10GB, GDDR5',
            'price' => 99999,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui reiciendis minus, impedit error aspernatur voluptate voluptatum doloremque quidem enim maiores dolorem quos incidunt atque porro!',
        ]);
        Product::create([
            'name' => 'GPU 9',
            'slug' => 'gpu-9',
            'details' => ' RTX 3080, 10GB, GDDR5',
            'price' => 99999,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui reiciendis minus, impedit error aspernatur voluptate voluptatum doloremque quidem enim maiores dolorem quos incidunt atque porro!',
        ]);
    }
}
