<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions_products')->insert([
            'product_id' => 1,
            'transaction_id' => 1,
            'jumlah' => 1,
        ]);
        DB::table('transactions_products')->insert([
            'product_id' => 2,
            'transaction_id' => 2,
            'jumlah' => 3,
        ]);
        DB::table('transactions_products')->insert([
            'product_id' => 2,
            'transaction_id' => 1,
            'jumlah' => 3,
        ]);
    }
}
