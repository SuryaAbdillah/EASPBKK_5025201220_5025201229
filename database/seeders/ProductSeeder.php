<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Indomie',
            'description' => 'Mi Goreng Nusantara',
            'brand' => 'Indofud',
            'category' => 'Makanan',
            'price' => 3000,
            'stock' => 100,
            'supplier' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Coca-Cola',
            'description' => 'Minuman Jos',
            'brand' => 'Coca-Cola',
            'category' => 'Minuman',
            'price' => 5500,
            'stock' => 50,
            'supplier' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Pepsi',
            'description' => 'Minuman Brr',
            'brand' => 'Peps',
            'category' => 'Minuman',
            'price' => 4500,
            'stock' => 20,
            'supplier' => 2,
        ]);
    }
}
