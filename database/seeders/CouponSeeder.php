<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            ['code' => 'abc',]
        ]);
    }
}