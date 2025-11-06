<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'type', 'quantity', 'reason', 'user_id',
    ];

    // العملية تخص منتج معين (include soft deleted products)
    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    // العملية تمت بواسطة مستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
