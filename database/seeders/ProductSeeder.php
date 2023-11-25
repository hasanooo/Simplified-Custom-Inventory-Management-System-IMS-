<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::factory()->create([
            'name' => 'Shirt',
            'quantity' => '20',
            'price' => '2000',
        ]);
        \App\Models\Product::factory()->create([
            'name' => 'Jeans',
            'quantity' => 15,
            'price' => 1500,
        ]);
        \App\Models\Product::factory()->create([
            'name' => 'Shoes',
            'quantity' => 30,
            'price' => 3000,
        ]);
    }
}