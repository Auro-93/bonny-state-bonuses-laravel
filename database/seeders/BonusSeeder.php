<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Bonus;

class BonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 30; $x++) {
            Bonus::create([
                'id' => $x,
                'name' => "Bonus $x",
                'category_id' => rand(1, 30),
                'quantity_sold' => rand(10, 310),
                'sold_at' => date('Y-m-d', mt_rand(1, time())),
                'created_at' => date('Y-m-d H:i:s'),
            ]);

        }
       
    
    }
}
