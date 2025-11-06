<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'sku', 'category', 'cost', 'price', 'quantity', 'supplier_id',
    ];

    // المنتج يخص مورد واحد
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // المنتج له معاملات مخزون كتير
    public function stockTransactions()
    {
        return $this->hasMany(StockTransaction::class);
    }
}
