<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class InitialProductsSeeder extends Seeder
{
    public function run()
    {
        $defaults = [
            ['name' => 'Keripik Kuan-Kreek 380 gram', 'price' => 66900, 'description' => 'Keripik kulit singkong khas', 'image' => null],
            ['name' => 'Keripik Singkong Balado', 'price' => 26900, 'description' => 'Singkong Balado renyah', 'image' => null],
            ['name' => 'Kripik Tempe Banyumas', 'price' => 32000, 'description' => 'Kripik tempe gurih', 'image' => null],
            ['name' => 'Tahu Snack Kalijonjo', 'price' => 13500, 'description' => 'Tahu snack pedas', 'image' => null],
        ];

        foreach ($defaults as $d) {
            Product::updateOrCreate(['name' => $d['name']], $d);
        }
    }
}
