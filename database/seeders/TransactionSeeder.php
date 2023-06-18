<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            'tanggal' => Carbon::parse('06/17/2023'),
            'jenis_pembayaran' => 'cash',
            'nominal_pembayaran' => 30000,
            'user_id' => 1,
        ]);
        DB::table('transactions')->insert([
            'tanggal' => Carbon::parse('06/17/2023'),
            'jenis_pembayaran' => 'cash',
            'nominal_pembayaran' => 20000,
            'user_id' => 1,
        ]);
    }
}
