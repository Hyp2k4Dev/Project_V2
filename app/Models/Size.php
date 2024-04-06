<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    protected $fillable = [
        'product_id',
        'product_code',
        'size_name',
        'quantity',
        
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
