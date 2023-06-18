<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'brand', 'category', 'price', 'stock', 'supplier'];

    public function restockings()
    {
        return $this->belongsTo(Restocking::class, 'restokings');
    }
    
    public function suppliers()
    {
        return $this->hasMany(Supplier::class, 'suppliers');
    }

    public function voucher()
    {
        return $this->hasOne(Voucher::class, 'vouchers');
    }
    
    public function transactions(): BelongsToMany
    {
        return $this->belongsToMany(Transaction::class, 'transactions_products', 'transaction_id', 'product_id')->as('transactions_products')->withPivot('jumlah');
    }
}
