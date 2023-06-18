<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restocking extends Model
{
    use HasFactory;
    protected $fillable = ['jumlah_produk', 'poduct_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
