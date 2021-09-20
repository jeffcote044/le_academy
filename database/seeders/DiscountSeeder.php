<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::create([
            'name' => 'Lanzamiento 50% OFF',
            'type' => 2,
            'value' => 50.00,
            'expires_at' =>  '2021-06-05 00:00:00',
            'user_id' => 1,
        ]);
        Discount::create([
            'name' => 'Black Friday 75% OFF',
            'type' => 2,
            'value' => 75.00,
            'expires_at' =>  '2021-06-05 00:00:00',
            'user_id' => 1,
        ]);
    }
}
