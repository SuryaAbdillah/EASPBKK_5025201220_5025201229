<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            'name' => 'Coca-Cola Grosir',
            'location' => 'entah dimana',
        ]);
        DB::table('suppliers')->insert([
            'name' => 'Indofud Grosir',
            'location' => 'entah disitu',
        ]);
    }
}
