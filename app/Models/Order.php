<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = ['customer_id', 'order_date', 'total_amount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
