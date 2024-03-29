<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['order_detail_id', 'order_id', 'product_id', 'quantity', 'size', 'subtotal'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
