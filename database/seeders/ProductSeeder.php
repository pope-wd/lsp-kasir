<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->create([
            'name' => 'Sepatu A',
            'price' => 100000,
            'quantity' => 3,
        ]);
        Product::query()->create([
            'name' => 'Baju S',
            'price' => 50000,
            'quantity' => 10,
        ]);
        Product::query()->create([
            'name' => 'Celana T',
            'price' => 200000,
            'quantity' => 15,
        ]);
    }
}
