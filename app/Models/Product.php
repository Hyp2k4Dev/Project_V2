<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'Name_sneaker',
        'Brand',
        'Color',
        'Origin',
        'Material',
        'Status_Sneaker',
        'Product_Code',
        'Price',
        'Description',
        'Image'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
}
