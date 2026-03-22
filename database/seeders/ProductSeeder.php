<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop',
            'description' => 'High-performance laptop',
            'price' => 999.99,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Mouse',
            'description' => 'Wireless mouse',
            'price' => 29.99,
            'stock' => 200,
        ]);

        Product::create([
            'name' => 'Keyboard',
            'description' => 'Mechanical keyboard',
            'price' => 79.99,
            'stock' => 150,
        ]);
    }
}