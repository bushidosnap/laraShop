<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'GPU','slug' => 'gpu','created_at' => $now,'updated_at' => $now ],
            ['name' => 'Tablet','slug' => 'tablet','created_at' => $now,'updated_at' => $now ],
            ['name' => 'Mobile Phones','slug' => 'mobile-phones','created_at' => $now,'updated_at' => $now ],
            ['name' => 'Monitors','slug' => 'monitors','created_at' => $now,'updated_at' => $now ],
            ['name' => 'Storage Devices','slug' => 'storage-devices','created_at' => $now,'updated_at' => $now ],
            ['name' => 'RAM','slug' => 'ram','created_at' => $now,'updated_at' => $now ],
            ['name' => 'Laptop','slug' => 'laptop','created_at' => $now,'updated_at' => $now ],
            ['name' => 'Desktops','slug' => 'desktops','created_at' => $now,'updated_at' => $now ],
            ['name' => 'Cameras','slug' => 'cameras','created_at' => $now,'updated_at' => $now ],
            ['name' => 'Appliances','slug' => 'appliances','created_at' => $now,'updated_at' => $now ],
        ]);
    }
}
