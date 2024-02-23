<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name_sneaker',
        'Quantity',
        'Brand',
        'Color',
        'Origin',
        'Material',
        'Status_Sneaker',
        'Product_Code',
        'Price',
        'Size',
    ];
}
