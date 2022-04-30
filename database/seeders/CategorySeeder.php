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
        for ($x = 1; $x <= 30; $x++) {
            Category::create([
                'id' => $x,
                'name' => "Category $x",
                'saved_minutes' => rand(15, 120),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
       
           
       
    }
}
