<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ['jumlah_diskon', 'poduct_id'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
