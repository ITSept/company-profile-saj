<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Produk A',
                'description' => 'Deskripsi produk A yang menarik.',
                'price' => 150000.00,
                'image' => 'products/product-a.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk B',
                'description' => 'Deskripsi produk B dengan fitur unggulan.',
                'price' => 250000.00,
                'image' => 'products/product-b.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Produk C',
                'description' => 'Deskripsi produk C favorit pelanggan.',
                'price' => 350000.00,
                'image' => 'products/product-c.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
