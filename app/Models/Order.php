<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'product_id',
        'quantity',
        'status',
        // Thêm các trường khác cần thiết ở đây
    ];

    // Định nghĩa các quan hệ với các model khác nếu cần thiết
}
